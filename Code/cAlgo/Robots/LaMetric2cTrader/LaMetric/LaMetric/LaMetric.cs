using cAlgo.API;
using System;
using System.Collections.Generic;
using System.Net;
using System.Net.Http;
using System.Net.Security;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Web.Script.Serialization;

using System.Linq;
using cAlgo.API;
using cAlgo.API.Indicators;
using cAlgo.API.Internals;
using cAlgo.Indicators;
using System.IO;

/* Changelog
- Better communication
- fixed icon issue
- added margin warning level (shows a different icon when level is crossed)
- only shows "today" when no position is open


ToDo:
- send a actual Notification on Margin cross
- position Notification ?
- OnStop needs to wait a bit to complete the last transmission .. bot quits too fast last update of the clock does not work

*/

namespace cAlgo.Robots
{
    //[Serializable]
    public class Frame
    {
        public string text { get; set; }
        public int icon { get; set; }
        public int index { get; set; }
    }

    [Robot(TimeZone = TimeZones.UTC, AccessRights = AccessRights.FullAccess)]
    public class LaMetric : Robot
    {
        [Parameter("Local Push URL", Group = "LaMetric", DefaultValue = "https://developer.lametric.com/applications/list")]
        public string Url { get; set; }

        [Parameter("App Access Token", Group = "LaMetric", DefaultValue = "https://developer.lametric.com/applications/list")]
        public string AccessToken { get; set; }

        // will be used later for Push
        [Parameter("Clock API Token", Group = "BETA - Not used!", DefaultValue = "https://developer.lametric.com/user/devices")]
        public string APIToken { get; set; }


        [Parameter("Update Clock (20s)", Group = "LaMetric", DefaultValue = 20)]
        public int TimerDelay { get; set; }

        [Parameter("Show Margin", Group = "BETA - Not used!", DefaultValue = true)]
        public bool ShowMargin { get; set; }

        [Parameter("Day Start Balance", Group = "cTrader", DefaultValue = 0)]
        public double DayStart { get; set; }

        [Parameter("Running Profit by Equity", Group = "cTrader", DefaultValue = true)]
        public bool RunningEquityProfit { get; set; }

        [Parameter("Margin Warning Level", Group = "cTrader", DefaultValue = 3000)]
        public int MarginWarning { get; set; }


 
        protected override void OnStart()
        {
             if (DayStart == 0)
            {
                DayStart = AccountBalanceAtTime(Time.Date);
            }


            ServicePointManager.Expect100Continue = false;
            ServicePointManager.ServerCertificateValidationCallback = new RemoteCertificateValidationCallback(delegate { return true; });

            UpdateLaMetric();

            Timer.Start(TimeSpan.FromMilliseconds((TimerDelay*1000)));
        }

        protected override void OnTick()
        {
 //            UpdateLaMetric();
        }

        protected override void OnTimer()
        {
             UpdateLaMetric();
        }

        protected void UpdateLaMetric()
        {

            // ctrader logo 7463

            
            double PnLEquity =0;
            if (RunningEquityProfit){
                PnLEquity = Math.Round(Account.Equity / DayStart * 100 - 100,3);
            }
            else {
                PnLEquity = Math.Round(Account.Balance / DayStart * 100 - 100,3);
            }
            
            var PnLText = Math.Round(PnLEquity, (PnLEquity >10 ? 2:3)) + "%";
            int PnLIcon = 20953;
            if (PnLEquity > 0) {
                PnLIcon = 7465;
            }
            if (PnLEquity < 0) {
                PnLIcon = 7463;
            }
            
            double PnLOEquity = Math.Round(Account.Equity / Account.Balance * 100 - 100, 3);
            
            if (Account.Balance != Account.Equity) {
                var MarginlevelText = "-/-";
                int MarginlevelIcon = 315;

                if (Account.MarginLevel.HasValue) {
                    if (Account.MarginLevel.Value < MarginWarning) {
                        MarginlevelText = Math.Round(Account.MarginLevel.Value,0)+"%";
                        MarginlevelIcon = 7921;
                    }
                    else if (Account.MarginLevel.Value < 10000) {
                        MarginlevelText = Math.Round(Account.MarginLevel.Value,0)+"%";
                    }
                    else {
                        MarginlevelText = " > 10k";
                    }
                }
                else {
                    MarginlevelText = "n/a";
                }                

                var PnLOText = Math.Round(PnLOEquity, (PnLEquity >10 ? 2:3)) + "%";
                int PnLOIcon = 20953;
                if (PnLOEquity > 0) {
                    PnLOIcon = 7465;
                }
            
                if (PnLOEquity < 0) {
                    PnLOIcon = 7463;
                }

                if (PnLOEquity > 0)
                {
                    PnLOIcon = 7465;
                }
    
                var frames = new[] 
                {
                    new Frame 
                    {
                        text = MarginlevelText,
                        icon = MarginlevelIcon,
                        index = 0
                    },
                    new Frame 
                    {
                        text = "PnL",
                        icon = 35196,
                        index = 1
                    },
                    new Frame
                    {
                        text = PnLOText,
                        icon = PnLOIcon,
                        index = 2
                    },
                    new Frame 
                    {
                        text = "Profit TODAY",
                        icon = 35196,
                        index = 3
                    },
                    new Frame
                    {
                        text = PnLText,
                        icon = PnLIcon,
                        index = 4
                    }
                };
            SendFramesAsync(frames);
            }
            else {
                var PnLOText = Math.Round(PnLOEquity, 3) + "%";
                int PnLOIcon = 20953;
                if (PnLOEquity > 0) {
                    PnLOIcon = 7465;
                }
            
                if (PnLOEquity < 0) {
                    PnLOIcon = 7463;
                }

                if (PnLOEquity > 0)
                {
                    PnLOIcon = 7465;
                }
                if (PnLEquity < 0) {
                    PnLOIcon = 7463;
                }
    
                var frames = new[] 
                {
                    new Frame 
                    {
                        text = "Profits TODAY",
                        icon = 234,
                        index = 0
//                        text = MarginlevelText,
//                        icon = 315,
//                        index = 0
                    },
                    new Frame
                    {
                        text = PnLText,
                        icon = PnLIcon,
                        index = 1
                    }
                };
            SendFramesAsync(frames);
                }
            
        }

        private bool _stop;
        protected void OnStop()
        {

            var frames = new[] 
            {
            new Frame 
                {
                    text = "CTRADER",
                    icon = 7463,
                    index = 0
                }
            };

            var thread = new Thread(() =>
            {
                Thread.Sleep(5000);

                _stop = true;
            });
            
            thread.Start();
            
            while (_stop == false)
            {
                SendFramesAsync(frames);
                Thread.Sleep(1000);
//            int milliseconds = 3500;
//            System.Threading.Thread.Sleep(milliseconds);
            }
            
        }


        private double AccountBalanceAtTime(DateTime dt)
        {
            var historicalTrade = History.LastOrDefault(x => x.ClosingTime < dt);
            return historicalTrade != null ? historicalTrade.Balance : Account.Balance;
        }

        private async Task<HttpResponseMessage> SendFramesAsync(IEnumerable<Frame> frames)
        {
            var json = new JavaScriptSerializer().Serialize(new 
            {
                frames
            });
            var request = new HttpRequestMessage 
            {
                Method = HttpMethod.Post,
                RequestUri = new Uri(Url),
                Content = new StringContent(json, Encoding.UTF8, "application/json"),
                Headers = 
                {
                    {
                        "Accept",
                        "application/json"
                    },
                    {
                        "X-Access-Token",
                        AccessToken
                    },
                    {
                        "Cache-Control",
                        "no-cache"
                    }
                }
            };

            using (var client = new HttpClient())
            {
                return await client.SendAsync(request);
            }
        }
    }
}
