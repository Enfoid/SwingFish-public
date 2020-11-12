<?

//$products['total'] = 23;
//$products['trades'] = 753;

$products['settings']['MFXBshowstatement'] = false; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = false; // myfxbook trades window
$products['settings']['BackupFundsLevel'] = 0; // show use of backup funds (percentage of the fund backup used)

$products['items'] = array( // total trades per pair
					'AUDCAD' => 83,
					'AUDNZD' => 39,
					'AUDUSD' => 1097,
					'EURAUD' => 86,
					'EURCAD' => 171,
					'EURGBP' => 51,
					'EURNZD' => 70,
					'EURUSD' => 1328,
					'NZDCAD' => 32,
					'NZDUSD' => 147,
					'USDCAD' => 217,
					'USDJPY' => 1,

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
	'trades' => 3322,
	'profitability' => 98,
	'avg-win-pip' => 4.26,
	'avg-loss-pip' => -70.99,
	'lots' =>	2816.1,
	'win-long' =>	98,		// % value of winners
	'short-win' =>	98,		// % value of winners
	'avg-trade-length' =>	'19h 14m',

	'pips' => 10531.5,
	'profit-factor' => 6.27,
	'gain' => 3895.03,				// general stats
	'abs-gain' => 2291.71,			// general stats
	'dd' => 84.87,				// general stats
	'avg-daily' => 1.01,		// general stats
	'avg-monthly' => 35.03,		// general stats
	'lifetime' => 1460764800, 	// get from http://localhost/Code/Projects/trade/swingfish.trade/assets/ventor/myfxbook/myfxbhtml.php
	'lastupdate' => 1493729245,
	'gain-today' => 0,
	'currency' => @$TradeStats['currency'],
	'balance' => @$TradeStats['balance'],
	'MFXBaccount' => $account,
	'image' => $img,
	'raw' => $TradeStats, // tihis is just so i not have to add  all fields to all fines while development
	);

