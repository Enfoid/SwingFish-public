using System.Drawing;
using System.Net;
using System.Net.Sockets;
using System.Text;
using System.Threading.Tasks;
using cAlgo.API;
using cAlgo.API.Internals;
using OpenMacroBoard.SDK;
using StreamDeckSharp;
using System.Linq;
using System;


using System.Diagnostics;
using System.Collections.Generic;


//using System.Collections.Generic;
//using cAlgo.API.Indicators;
//using cAlgo.Indicators;
//using System.IO;

namespace cAlgo
{
    [Robot(TimeZone = TimeZones.UTC, AccessRights = AccessRights.FullAccess)]
    public class StreamDeckUDP : Robot
    {
//        [Parameter("Default ScaleIn (Units)", DefaultValue = 100000, MinValue = 1000, Step = 1000)]
//        public double ScaleQuantity { get; set; }
        public double ScaleQuantity = 0;

        [Parameter("Default Button", DefaultValue = 0, MinValue = -1, MaxValue = 31, Step = 1)]
        public int defaultButton { get; set; }

        [Parameter("Show P/L", DefaultValue = false)]
        public bool showPL { get; set; }

        [Parameter("Play Sound", DefaultValue = true)]
        public bool playSounds { get; set; }

        [Parameter("Accept ST Commands", DefaultValue = true)]
        public bool allowExecute { get; set; }

        private UdpClient _client;
        private IStreamDeckBoard _deck;

        private string documentsPath = Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments);
        private readonly List<Symbol> _symbols = new List<Symbol>();
        protected override void OnStart()
        {
            _client = new UdpClient();
            _client.Client.SetSocketOption(SocketOptionLevel.Socket, SocketOptionName.ReuseAddress, true);
            _client.Client.Bind(new IPEndPoint(IPAddress.Any, 1337));

            _deck = StreamDeck.OpenDevice();

            var task = new Task(() =>
            {
                var remoteIpEndPoint = new IPEndPoint(IPAddress.Any, 0);
                var message = string.Empty;
                do
                {
                    var receivedBytes = _client.Receive(ref remoteIpEndPoint);
                    message = Encoding.ASCII.GetString(receivedBytes);

                    BeginInvokeOnMainThread(() => DeckKeyPressed(message));
                } while (message != "stop" && !_client.Client.Connected);
                Stop();
            });
            task.Start();
            if (!allowExecute)
            {
                sendImage(defaultButton, "PASSIVE\n" + Account.Number, "blue", 23);
            }
            else
            {
                sendImage(defaultButton, "Starting\n" + Account.Number, "orange", 23);
            }
        }

        private double AccountBalanceAtTime(DateTime dt)
        {
            var historicalTrade = History.LastOrDefault(x => x.ClosingTime < dt);
            return historicalTrade != null ? historicalTrade.Balance : Account.Balance;
        }

        private bool Say(string Sim)
        {
            //    _synthesizer.Speak(Sim);
            return true;
        }

        private string CmdArgs;
        private bool Say2(string Sim)
        {
            CmdArgs = "-Command \"Add-Type –AssemblyName System.Speech; (New-Object System.Speech.Synthesis.SpeechSynthesizer).Speak('" + Sim + "');\"";
            {
                Process myProcess = new Process();
                myProcess.StartInfo.UseShellExecute = false;
                myProcess.StartInfo.Arguments = CmdArgs;
                myProcess.StartInfo.FileName = "PowerShell";
                myProcess.StartInfo.CreateNoWindow = true;
                myProcess.Start();
                myProcess.WaitForExit();
                return true;
            }
        }
        private void DeckKeyPressed(string message)
        {
            Print(message);

            int keyId;
            if ((int.TryParse(message.Split(',')[0], out keyId)) && (allowExecute))
            {
                if (keyId > 14)
                {
                    return;
                }
                else
                {
                    var command = message.Split(',')[1];

                    if (command == "CancelPending")
                    {
                        closeAllOrder();
                        Print("CancelPending");
                        sendImage(defaultButton, "Del\nPend");
                        if (playSounds)
                        {
                            Say2("Limits Off");
                        }
                    }

                    if (command == "CloseAll")
                    {
                        closeAllPosition();
                        closeAllOrder();
                        Print("CloseAll");
                        sendImage(defaultButton, "Closing");
                        if (playSounds)
                        {
                            Say2("Close All");
                        }
                    }

                    if (command == "CloseBuy")
                    {
                        closeAllBuyPosition();
                        Print("CloseBuy");
                        sendImage(defaultButton, "Close\nBuy");
                        if (playSounds)
                        {
                            Say2("Close Buys");
                        }
                    }

                    if (command == "CloseSell")
                    {
                        closeAllSellPosition();
                        Print("CloseSell");
                        sendImage(defaultButton, "Close\nSell");
                        if (playSounds)
                        {
                            Say2("Close Sells");
                        }
                    }

                    if (command == "RemoveTPSL")
                    {
                        Print("RemoveTPSL");
                        sendImage(defaultButton, "- TP\n -SL");

                        var symbols = new Dictionary<string, Symbol>();
                        foreach (var pos in Positions)
                        {
                            ModifyPositionAsync(pos, null, null);
                        }

                        if (playSounds)
                        {
                            Say2("stops off");
                        }
                    }

                    if (command == "RemoveTP")
                    {
                        Print("RemoveTP");
                        sendImage(defaultButton, "\n- TP");

                        var symbols = new Dictionary<string, Symbol>();
                        foreach (var pos in Positions)
                        {
                            ModifyPositionAsync(pos, null, null);
                        }

                        if (playSounds)
                        {
                            Say2("TP off");
                        }
                    }

                    if (command == "HedgeAll")
                    {
                        var groups = Positions.GroupBy(x => x.SymbolCode).ToList();
                        foreach (var positions in groups)
                        {
                            // gets symbol code
                            var symbolCode = positions.First().SymbolCode;

                            double buyVolume = 0;
                            double sellVolume = 0;
                            foreach (var position in positions)
                            {
                                if (position.TradeType == TradeType.Buy)
                                    buyVolume += position.Volume;
                                else
                                    sellVolume += position.Volume;
                            }

                            Print(buyVolume);
                            if (buyVolume == sellVolume)
                            {
                                continue;
                            }
                            if (buyVolume > sellVolume)
                            {
                                if (GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume - sellVolume, RoundingMode.Up) >= (GetSymbol(symbolCode).VolumeInUnitsMax / 2))
                                {
                                    ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits((GetSymbol(symbolCode).VolumeInUnitsMax / 2)), "StreamDeck", 0, 0, null, "Hedge Part");
                                    if (playSounds)
                                    {
                                        Say2("Hedge part");
                                    }
                                }
                                else
                                {
                                    ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume - sellVolume), "StreamDeck", 0, 0, null, "Hedge Full");
                                    if (playSounds)
                                    {
                                        Say2("Hedge all");
                                    }
                                }
                                Print("sell " + GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume - sellVolume));
                            }
                            else
                            {
                                if (GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume - buyVolume, RoundingMode.Up) >= (GetSymbol(symbolCode).VolumeInUnitsMax / 2))
                                {
                                    ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits((GetSymbol(symbolCode).VolumeInUnitsMax / 2)), "StreamDeck", 0, 0, null, "Hedge Part");
                                    if (playSounds)
                                    {
                                        Say2("Hedge part");
                                    }
                                }
                                else
                                {
                                    ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume - buyVolume), "StreamDeck", 0, 0, null, "Hedge Full");
                                    if (playSounds)
                                    {
                                        Say2("Hedge all");
                                    }
                                }
                                Print("Buy " + GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume - buyVolume));
                            }

                            Print("HedgeAll");
                            sendImage(defaultButton, "Hedging");
                        }
                    }

                                        /*
if (command == "HedgeHalf")
                    {
                        var direction;
                        if (var.TryParse(message.Split(',')[2], out direction))
                        {
                            direction = commandSize;
                        }
                        else
                        {
                            continue;
                        }
                        Print("HedgeHalf");
                        sendImage(defaultButton, "Hedge 50%");
                        var groups = Positions.GroupBy(x => x.SymbolCode).ToList();
                        foreach (var positions in groups)
                        {
                            // gets symbol code
                            var symbolCode = positions.First().SymbolCode;

                            double buyVolume = 0;
                            double sellVolume = 0;
                            foreach (var position in positions)
                            {
                                if (position.TradeType == TradeType.Buy)
                                    buyVolume += position.Volume;
                                else
                                    sellVolume += position.Volume;
                            }

                            // Print(buyVolume);
                            if (buyVolume == sellVolume)
                            {
                                continue;
                            }
                            if (buyVolume > sellVolume)
                            {
                                if (GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume - sellVolume, RoundingMode.Up) >= (GetSymbol(symbolCode).VolumeInUnitsMax / 2))
                                {
                                    ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits((GetSymbol(symbolCode).VolumeInUnitsMax / 2)), "StreamDeck", 0, 0, null, "Hedge Part");
                                    Say2("Hedge part");
                                }
                                else
                                {
                                    ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume - sellVolume), "StreamDeck", 0, 0, null, "Hedge Full");
                                    Say2("Hedge all");
                                }
                                Print("sell " + GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume - sellVolume));
                            }
                            else
                            {
                                if (GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume - buyVolume, RoundingMode.Up) >= (GetSymbol(symbolCode).VolumeInUnitsMax / 2))
                                {
                                    ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits((GetSymbol(symbolCode).VolumeInUnitsMax / 2)), "StreamDeck", 0, 0, null, "Hedge Part");
                                    Say2("Hedge part");
                                }
                                else
                                {
                                    ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume - buyVolume), "StreamDeck", 0, 0, null, "Hedge Full");
                                    Say2("Hedge all");
                                }
                                Print("Buy " + GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume - buyVolume));
                            }
                        }
                    }

*/
if (command == "ScaleIn")
                    {
                        Print("ScaleIn");
                        int commandSize;
                        if (int.TryParse(message.Split(',')[2], out commandSize))
                        {
                            ScaleQuantity = commandSize;
                        }

                        // find symbol with trades
                        // add position to found symbol


                        // list of positions grouped by symbol code
                        var groups = Positions.GroupBy(x => x.SymbolCode).ToList();

                        // loop through each group of positions
                        foreach (var positions in groups)
                        {
                            // gets symbol code
                            var symbolCode = positions.First().SymbolCode;

                            // calculates total buy and sell volume (find hedge)
//                            var buyVolume = positions.Where(x => x.TradeType == TradeType.Buy).Sum(x => x.Volume);
//                            var sellVolume = positions.Where(x => x.TradeType == TradeType.Sell).Sum(x => x.Volume);
                            double buyVolume = 0;
                            double sellVolume = 0;
                            foreach (var position in positions)
                            {
                                if (position.TradeType == TradeType.Buy)
                                    buyVolume += position.Volume;
                                else
                                    sellVolume += position.Volume;
                            }

                            if (buyVolume == sellVolume)
                            {
                                continue;
                            }

                            // if buy volume is higher than sell volume
                            if (buyVolume > sellVolume)
                            {
                                // opens sell order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), ScaleQuantity, "StreamDeck", 0, 0, null, "Scale X");

                            }
                            else
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), ScaleQuantity, "StreamDeck", 0, 0, null, "Scale X");
                            }
                        }

                        sendImage(defaultButton, "Scaling");

                        if (playSounds)
                        {
                            Say2("Scaling times " + commandSize);
                        }
                    }
                    if (command == "Tsl")
                    {
                        double Tsl = 1;
                        double TslP = 0;
                        double commandSize;
                        if (double.TryParse(message.Split(',')[2], out commandSize))
                        {
                            Tsl = commandSize;
                        }


                        var symbols = new Dictionary<string, Symbol>();
                        foreach (var pos in Positions)
                        {
                            if (!symbols.ContainsKey(pos.SymbolName))
                                symbols.Add(pos.SymbolName, Symbols.GetSymbol(pos.SymbolName));

                            var symbol = symbols[pos.SymbolName];

                            if (pos.TradeType == TradeType.Buy)
                            {
                                TslP = symbol.Bid - (symbol.PipSize * Tsl);
                            }
                            else
                            {
                                TslP = symbol.Ask + (symbol.PipSize * Tsl);
                            }

                            ModifyPositionAsync(pos, TslP, null, true);
                        }


                        if (playSounds)
                        {
                            Say2("T " + Tsl);
                        }
                    }

                    if (command == "SlTp")
                    {
                        double Tsl = 1;
                        double TslP = 0;
                        double commandSize;
                        if (double.TryParse(message.Split(',')[2], out commandSize))
                        {
                            Tsl = commandSize;
                        }


                        var symbols = new Dictionary<string, Symbol>();
                        foreach (var pos in Positions)
                        {
                            if (!symbols.ContainsKey(pos.SymbolName))
                                symbols.Add(pos.SymbolName, Symbols.GetSymbol(pos.SymbolName));

                            var symbol = symbols[pos.SymbolName];

                            if (pos.TradeType == TradeType.Buy)
                            {
                                TslP = symbol.Bid - (symbol.PipSize * Tsl);
                            }
                            else
                            {
                                TslP = symbol.Ask + (symbol.PipSize * Tsl);
                            }

                            ModifyPositionAsync(pos, TslP, null, false);
                        }


                        if (playSounds)
                        {
                            Say2("S " + Tsl);
                        }
                    }
                    /*
foreach (var pos in Positions)
                        {
                            if (pos.TradeType == TradeType.Buy)
                            {
                                TslP = Symbol.Bid - (Symbol.PipSize * Tsl);
                            }
                            else
                            {
                                TslP = Symbol.Ask + (Symbol.PipSize * Tsl);
                            }

                            ModifyPositionAsync(pos, TslP, 0, true);

                            Print(Symbol.Ask);
                            Print(Tsl);
                            Print(TslP);

                        }
*/
                    if (command == "ScalePercent")
                    {
                        Print("ScalePercent");
                        int commandSize;
                        if (int.TryParse(message.Split(',')[2], out commandSize))
                        {
                            ScaleQuantity = commandSize;
                        }

                        sendImage(defaultButton, "Scale %");
                        // find symbol with trades
                        // add position to found symbol


                        // list of positions grouped by symbol code
                        var groups = Positions.GroupBy(x => x.SymbolCode).ToList();
                        foreach (var positions in groups)
                        {
                            // gets symbol code
                            var symbolCode = positions.First().SymbolCode;

                            double buyVolume = 0;
                            double sellVolume = 0;
                            foreach (var position in positions)
                            {
                                if (position.TradeType == TradeType.Buy)
                                    buyVolume += position.Volume;
                                else
                                    sellVolume += position.Volume;
                            }
                            if (buyVolume == sellVolume)
                            {
                                continue;
                            }

                            // if buy volume is higher than sell volume
                            if (buyVolume > sellVolume)
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume * (ScaleQuantity / 100)), "StreamDeck", 0, 0, null, "Scale %");

                            }
                            else
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume * (ScaleQuantity / 100)), "StreamDeck", 0, 0, null, "Scale %");
                            }
                        }

                        if (playSounds)
                        {
                            Say2("Scale in  " + commandSize);
                        }
                    }

                    if (command == "ScalePercentLimit")
                    {
                        Print("ScalePercentLimit");
                        int commandSize;
                        if (int.TryParse(message.Split(',')[2], out commandSize))
                        {
                            ScaleQuantity = commandSize;
                        }

                        sendImage(defaultButton, "Scale %L");
                        // find symbol with trades
                        // add position to found symbol


                        // list of positions grouped by symbol code
                        var groups = Positions.GroupBy(x => x.SymbolCode).ToList();
                        foreach (var positions in groups)
                        {
                            // gets symbol code
                            var symbolCode = positions.First().SymbolCode;

                            double buyVolume = 0;
                            double sellVolume = 0;
                            foreach (var position in positions)
                            {
                                if (position.TradeType == TradeType.Buy)
                                    buyVolume += position.Volume;
                                else
                                    sellVolume += position.Volume;
                            }
                            if (buyVolume == sellVolume)
                            {
                                continue;
                            }

                            // if buy volume is higher than sell volume
                            if (buyVolume > sellVolume)
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume * (ScaleQuantity / 100)), "StreamDeck", 0, 0, null, "Scale %");
                                PlaceStopLimitOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume * (ScaleQuantity / 100)), Symbol.Bid, 1);

                            }
                            else
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume * (ScaleQuantity / 100)), "StreamDeck", 0, 0, null, "Scale %");
                                PlaceStopLimitOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume * (ScaleQuantity / 100)), Symbol.Ask, 1);
                            }
                        }

                        if (playSounds)
                        {
                            Say2("Scale in  " + commandSize);
                        }
                    }

                    if (command == "HedgePercent")
                    {
                        Print("HedgePercent");
                        int commandSize;
                        if (int.TryParse(message.Split(',')[2], out commandSize))
                        {
                            ScaleQuantity = commandSize;
                        }

                        sendImage(defaultButton, "Hedge %");
                        // find symbol with trades
                        // add position to found symbol


                        // list of positions grouped by symbol code
                        var groups = Positions.GroupBy(x => x.SymbolCode).ToList();
                        foreach (var positions in groups)
                        {
                            // gets symbol code
                            var symbolCode = positions.First().SymbolCode;

                            double buyVolume = 0;
                            double sellVolume = 0;
                            foreach (var position in positions)
                            {
                                if (position.TradeType == TradeType.Buy)
                                    buyVolume += position.Volume;
                                else
                                    sellVolume += position.Volume;
                            }
                            if (buyVolume == sellVolume)
                            {
                                continue;
                            }

                            // if buy volume is higher than sell volume
                            if (buyVolume > sellVolume)
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Sell, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(buyVolume * (ScaleQuantity / 100)), "StreamDeck", 0, 0, null, "Hedge %");
                            }
                            else
                            {
                                // opens buy order equal to the difference of volumes
                                ExecuteMarketOrderAsync(TradeType.Buy, GetSymbol(symbolCode), GetSymbol(symbolCode).NormalizeVolumeInUnits(sellVolume * (ScaleQuantity / 100)), "StreamDeck", 0, 0, null, "Hedge %");
                            }
                        }

                        if (playSounds)
                        {
                            Say2("Hedge  " + commandSize);
                        }
                    }
                }

                //       var accountPnL = Math.Round(100 * Positions.Sum(t => t.NetProfit) / Account.Balance, 2);
            }
        }

        private void closeAllOrder()
        {
            //  close all pending orders
            foreach (PendingOrder o in PendingOrders)
                CancelPendingOrder(o);
        }

        private void closeAllPosition()
        {
            // target is reached 
            foreach (Position p in Positions)
                ClosePositionAsync(p);
        }

        private void closeAllBuyPosition()
        {

            Positions.Where(x => x.TradeType == TradeType.Buy).ToList().ForEach(x => ClosePositionAsync(x));


//            foreach (Position p in Positions)
//                if (position.TradeType == TradeType.Buy)
//                    ClosePositionAsync(p);
        }

        private void closeAllSellPosition()
        {

            Positions.Where(x => x.TradeType == TradeType.Sell).ToList().ForEach(x => ClosePositionAsync(x));

//            foreach (Position p in Positions)
//                if (position.TradeType == TradeType.Sell)
//                ClosePositionAsync(p);
        }

        private void closeAllPositionSync()
        {
            // same as CloseAllPositions() but syncs the orders
            // target is reached 
            foreach (Position p in Positions)
                ClosePosition(p);
        }
        protected override void OnStop()
        {
            sendImage(defaultButton, "cTrader\nLink OFF", "red", 22);
            _client.Close();
        }

        protected override void OnTick()
        {
            if (showPL)
            {
                var pNLt = "";
                var pNL = Math.Round(Account.Equity / Account.Balance * 100 - 100, 3);

                var FreeeMargin = Account.MarginLevel;
                var FreeMargint = "";
                if (Account.MarginLevel.HasValue)
                {
                    if (FreeeMargin > 2000)
                    {
                        FreeMargint = " > 2k%";
                    }
                    else
                    {
                        FreeMargint = Math.Round(Account.MarginLevel.Value, 0) + "%";
                    }
                }
                else
                {
                    FreeMargint = "&&";
                }


                if (Account.Equity != Account.Balance)
                {

                    if (Account.Equity > Account.Balance)
                    {
                        if (pNL > 0.01)
                        {
                            pNLt = Math.Round(Account.Equity / Account.Balance * 100 - 100, 2) + "%";
                        }
                        else
                        {
                            pNLt = Math.Round(Account.Equity / Account.Balance * 100 - 100, 3) + "%";
                        }
                        sendImage(defaultButton, pNLt + "\n" + FreeMargint, "green");
                    }
                    else
                    {
                        if (pNL < -0.01)
                        {
                            pNLt = Math.Abs(Math.Round(Account.Equity / Account.Balance * 100 - 100, 2)) + "%";
                        }
                        else
                        {
                            pNLt = Math.Abs(Math.Round(Account.Equity / Account.Balance * 100 - 100, 3)) + "%";
                        }
                        if (FreeeMargin > 2000)
                        {
                            sendImage(defaultButton, FreeMargint + "\n" + pNLt, "blue");
                        }
                        else
                        {
                            sendImage(defaultButton, Math.Round(Account.MarginLevel.Value) + "%\n" + pNLt, "red");
                        }
                    }
                }
                else                /*
}
                    else if (pNL > 10)
                    {
                        pNLt = "+" + Math.Round(Account.Equity / Account.Balance * 100 - 100, 1) + "%";
                        pNLt = pNLt + "\n" + Math.Round(Account.FreeMargin, 0);
                        sendImage(defaultButton, pNLt, "green");
                    }

                    else                    
else if (pNL < 0.3)
                    {


                        var valO = "";
                        double val = 0;
                        if (Account.MarginLevel.HasValue)
                        {
                            val = Math.Round(Account.MarginLevel.Value, 0);
                            if (val > 1500)
                            {
//                                valO = "> 1k%\n";
                                valO = " ∞ %\n";
                                valO = valO + Math.Abs(Math.Round(Account.Equity / Account.Balance * 100 - 100, 2)) + "%";
//                                valO = valO + "\n" + Math.Round(Account.FreeMargin, 0);
                                sendImage(defaultButton, valO, "blue");
                            }
                            else
                            {
                                valO = val + "%\n";
                                valO = valO + Math.Abs(Math.Round(Account.Equity / Account.Balance * 100 - 100, 2)) + "%";
                                // valO = valO + Math.Round(Account.FreeMargin, 0);
                                sendImage(defaultButton, valO, "red");
                            }
                        }

                    }
*/
                {
                    sendImage(defaultButton, "Idle...\n" + " [ " + Math.Round(Account.Equity / AccountBalanceAtTime(Time.Date) * 100 - 100, 2) + "% ]", "orange", 23);
//                    sendImage(defaultButton, "ACTIVE\n" + Account.Number, "orange", 23);
                }

            }
        }

        private string GetFilePath(string soundName)
        {
            return string.Format("{0}\\cAlgo\\Sources\\Robots\\Stream Deck\\Files\\{1}", documentsPath, soundName);
        }

        private Symbol GetSymbol(string symbolCode)
        {
            // tries to find a match in our collection of symbols
            var matchingSymbol = _symbols.FirstOrDefault(x => x.Code == symbolCode);

            // returns the matching symbol if found
            if (matchingSymbol != null)
            {
                return matchingSymbol;
            }

            // else adds the symbol into the collection and returns it
            var symbol = MarketData.GetSymbol(symbolCode);
            _symbols.Add(symbol);
            return symbol;
        }

        private void sendImage(int button, string text, string Color = "white", int fontSize = 30)
        {

            var lColor = Brushes.White;
            if (Color == "red")
            {
                lColor = Brushes.Red;
            }
            if (Color == "orange")
            {
                lColor = Brushes.Orange;
            }
            if (Color == "green")
            {
                lColor = Brushes.Lime;
            }
            if (Color == "blue")
            {
                lColor = Brushes.Blue;
            }

            var font = new Font("Arial", fontSize);
//            var bitmap = KeyBitmap.Create.FromFile(GetFilePath("cTrader_dark.png"));
//            var bitmap = KeyBitmap.Create.FromGraphics(100, 100, graphics => graphics.DrawString(text, font, color, new PointF(0, 33)));
//            var bitmap = KeyBitmap.Create.FromGraphics(144, 144, graphics => graphics.DrawString(text, font, lColor, new PointF(5, 38)));
            var bitmap = KeyBitmap.Create.FromGraphics(144, 144, graphics => graphics.DrawString(text, font, lColor, new PointF(0, 33)));

            _deck.SetKeyBitmap(button, bitmap);
        }

    }
}
