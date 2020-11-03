<?

//$products['total'] = 23;
//$products['trades'] = 753;

$products['settings']['MFXBshowstatement'] = false; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = true; // myfxbook trades window
$products['settings']['BackupFundsLevel'] = 0; // show use of backup funds (percentage of the fund backup used)

$products['items'] = array( // total trades per pair
					'AUDCAD' 	=> 1,
					'AUDJPY' 	=> 2,
					'AUDUSD' 	=> 9,
					'DE30' 	=> 80,
					'EURAUD' 	=> 4,
					'EURJPY' 	=> 10,
					'EURUSD' 	=> 11,
					'GBPAUD' 	=> 15,
					'GBPCAD' 	=> 3,
					'GBPCHF' 	=> 1,
					'GBPJPY' 	=> 23,
					'GBPUSD' 	=> 6,
					'NZDJPY' 	=> 1,
					'NZDUSD' 	=> 1,
					'US30' 	=> 1,
					'USDCAD' 	=> 6,
					'USDJPY' 	=> 44,
					'XAUUSD' 	=> 3,
					);

$A = file_get_contents(ULOCAL."lib/3rd/myfxbook/GetMyfxbookStats.php?totals=include&id=".$account);
$TradeStats = json_decode($A, true); unset($A);

$img = URI.@$TradeStats['statimage'];
if ((!is_file($img)) || (filesize($img) <100)) {
        $img = URL.'assets/strategies/'.$account.'/growth-chart.png';
}
else {
        $img = URL.$TradeStats['statimage'];
}

$products['stats'] = array(
	'trades' => 221,
	'profitability' => 65,
	'avg-win-pip' => 11.90,
	'avg-loss-pip' => -31.98,
	'lots' =>	233.51,
	'win-long' =>	70,		// % value of winners
	'short-win' =>	58,		// % value of winners
	'avg-trade-length' =>	'2h 32m',

	'pips' => @$TradeStats['pips'],
	'profit-factor' => @$TradeStats['profitfactor'],
	'gain' => round((@$TradeStats['gain']-100),2),				// general stats
	'abs-gain' => round((@$TradeStats['absGain']-100),2),			// general stats
	'dd' => @$TradeStats['drawdown'],				// general stats
	'avg-daily' => @$TradeStats['avg-day'],		// general stats
	'avg-monthly' => @$TradeStats['avg-month'],		// general stats
	'lifetime' => @$TradeStats['lifetime'], 	// get from http://localhost/Code/Projects/trade/swingfish.trade/assets/ventor/myfxbook/myfxbhtml.php
	'lastupdate' => @$TradeStats['lastupdate'],
	'gain-today' => @$TradeStats['today']['gain'],
	'currency' => @$TradeStats['currency'],
	'balance' => @$TradeStats['balance'],
	'MFXBaccount' => $account,
	'image' => $img,
	'raw' => $TradeStats, // tihis is just so i not have to add  all fields to all fines while development
	);

