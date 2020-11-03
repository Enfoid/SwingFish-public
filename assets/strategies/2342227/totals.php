<?

//print_r($TradeStats);

//$products['total'] = 23;
//$products['trades'] = 753;

$products['settings']['MFXBshowstatement'] = true; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = true; // myfxbook trades window
$products['settings']['showBalance'] = true; // show account balance
$products['settings']['BackupFundsLevel'] = 98; // show use of backup funds (percentage of the fund backup used)

$products['items'] = array( // total trades per pair
					'CADCHF' => 79,
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
	'trades' => 81,
	'profitability' => 75,
	'avg-win-pip' => 6.92,
	'avg-loss-pip' => -12.13,
	'lots' =>	1.97,
	'win-long' =>	76,		// % value of winners
	'short-win' =>	74,		// % value of winners
	'avg-trade-length' =>	'4h 13m',
	'sharpe' =>     0.17,

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

