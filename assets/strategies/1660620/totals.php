<?

//$products['total'] = 23;
//$products['trades'] = 753;

$products['settings']['MFXBshowstatement'] = false; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = false; // myfxbook trades window
$products['settings']['BackupFundsLevel'] = 99; // show use of backup funds (percentage of the fund backup used)

$products['items'] = array( // total trades per pair
					'AUDCAD' => 73,
					'AUDCHF' => 17,
					'AUDJPY' => 136,
					'AUDNZD' => 148,
					'AUDUSD' => 395,
					

					'CADJPY' => 38,
					'CHFJPY' => 3,

					'EURAUD' => 294,
					'EURCAD' => 48,
					'EURCHF' => 43,
					'EURGBP' => 97,
					'EURJPY' => 297,
					'EURNZD' => 12,
					'EURUSD' => 977,

					'GBPAUD' => 159,
					'GBPCAD' => 178,
					'GBPCHF' => 35,
					'GBPJPY' => 226,
					'GBPNZD' => 33,
					'GBPUSD' => 1130,
					
					'NZDCAD' => 9,
					'NZDCHF' => 2,
					'NZDJPY' => 102,
					'NZDUSD' => 102,

					'USDCAD' => 520,
					'USDCHF' => 159,
					'USDJPY' => 708,

					'XAGUSD' => 90,
					'XAUUSD' => 454,
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
	'trades' => 6485,
	'profitability' => 62,
	'avg-win-pip' => 45.45,
	'avg-loss-pip' => -85.55,
	'lots' =>	6212.29,
	'win-long' =>	63,		// % value of winners
	'short-win' =>	60,		// % value of winners
	'avg-trade-length' =>	'1d',
        'sharpe' =>     0.02,

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

