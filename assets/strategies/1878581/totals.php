<?

// totals from: http://www.myfxbook.com/members/vesboltltd/explorer-1/1878581

//$products['total'] = 23;
//$products['trades'] = 753;

$products['settings']['MFXBshowstatement'] = false; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = false; // myfxbook trades window
$products['settings']['BackupFundsLevel'] = 65; // show use of backup funds (percentage of the fund backup used)

$products['items'] = array( // total trades per pair
					'AUDCAD' => 40,
					'AUDJPY' => 2,
					'AUDNZD' => 10,
					'AUDUSD' => 66,

					'EURAUD' => 2,
					'EURJPY' => 10,
					'EURUSD' => 195,

					'GBPCAD' => 14,
					'GBPUSD' => 182,
					
					'NZDJPY' => 1,
					'NZDUSD' => 48,

					'USDCAD' => 161,
					'USDJPY' => 2006,

					'XAGUSD' => 53,
					'XAUUSD' => 8,
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
	'trades' => 2784,
	'profitability' => 93,
	'avg-win-pip' => 16.62,
	'avg-loss-pip' => -122.96,
	'lots' =>	321.42,
	'win-long' =>	83,		// % value of winners
	'short-win' =>	95,		// % value of winners
	'avg-trade-length' =>	'2d',

	'pips' => 19186.3,
	'profit-factor' => 3.32,
	'gain' => 438.3,				// general stats
	'abs-gain' => 482.34,			// general stats
	'dd' => 26.66,				// general stats
	'avg-daily' => 0.12,		// general stats
	'avg-monthly' => 3.58,		// general stats
	'lifetime' => 1370217600, 	// get from http://localhost/Code/Projects/trade/swingfish.trade/assets/ventor/myfxbook/myfxbhtml.php
	'lastupdate' => 1500094361,
	'gain-today' => 0,
	'currency' => @$TradeStats['currency'],
	'balance' => @$TradeStats['balance'],
	'MFXBaccount' => $account,
	'image' => $img,
	'raw' => $TradeStats, // tihis is just so i not have to add  all fields to all fines while development
	);
