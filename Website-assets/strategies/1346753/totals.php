<?

//$products['total'] = 23;
//$products['trades'] = 753;

$products['settings']['MFXBshowstatement'] = false; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = false; // myfxbook trades window
$products['settings']['BackupFundsLevel'] = 0; // show use of backup funds (percentage of the fund backup used)

$products['items'] = array( // total trades per pair
					'AUDCHF' => 12,
					'EURAUD' => 13,
					'EURCHF' => 130,
					'EURGBP' => 32,
					'GBPAUD' => 38,
					'GBPCAD' => 159,
					'GBPCHF' => 48,
					'GBPUSD' => 127,
					'USDCAD' => 167,
					'USDCHF' => 44,
					'USDJPY' => 80,

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
	'trades' => 850,
	'profitability' => 72,
	'avg-win-pip' => 12.12,
	'avg-loss-pip' => -18.44,
	'lots' =>	687.01,
	'win-long' =>	70,		// % value of winners
	'short-win' =>	73,		// % value of winners
	'avg-trade-length' =>	'10h 57m',

	'pips' => 3060.3,
	'profit-factor' => 3.12,
	'gain' => 297.13,				// general stats
	'abs-gain' => 14.32,			// general stats
	'dd' => 8.29,				// general stats
	'avg-daily' => 0.2,		// general stats
	'avg-monthly' => 6.18,		// general stats
	'lifetime' => 1460764800, 	// get from http://localhost/Code/Projects/trade/swingfish.trade/assets/ventor/myfxbook/myfxbhtml.php
	'lastupdate' => 1500094361,
	'gain-today' => 0,
	'currency' => @$TradeStats['currency'],
	'balance' => @$TradeStats['balance'],
	'MFXBaccount' => $account,
	'image' => $img,
	'raw' => $TradeStats, // tihis is just so i not have to add  all fields to all fines while development
	);

