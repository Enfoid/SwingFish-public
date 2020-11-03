<?

$products['settings']['MFXBshowstatement'] = true; // show myfxbook Statement Link
$products['settings']['MFXBshowtrades'] = true; // myfxbook trades window
$products['settings']['showBalance'] = true; // show account balance
$products['settings']['BackupFundsLevel'] = 73; // show use of backup funds (percentage of the fund backup used)


$products['items'] = array( // total trades per pair
					'AUDCHF'	=> 1,
					'AUDJPY'	=> 7,
					'AUDUSD'	=> 2,
					'BTCUSD'	=> 92,
					'CADCHF'	=> 2,
					'CADJPY'	=> 1,
					'DAX'		=> 111,
					'EURAUD'	=> 5,
					'EURCAD'	=> 1,
					'EURGBP'	=> 5,
					'EURJPY'	=> 1,
					'EURNZD'	=> 5,
					'EURUSD'	=> 3,
					'GBPAUD'	=> 4,
					'GBPCHF'	=> 2,
					'GBPNZD'	=> 4,
					'GBPUSD'	=> 9,
					'NZDJPY'	=> 3,
					'NZDUSD'	=> 3,
					'USDCHF'	=> 3,
					'USDJPY'	=> 12,
					'SILVER'	=> 2,
					'GOLD'		=> 731,
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
	'trades' => 1009,
	'profitability' => 50,
	'avg-win-pip' => 103.36,
	'avg-loss-pip' => -95.60,
	'lots' =>	769.18,
	'win-long' =>	57,		// % value of winners
	'short-win' =>	26,		// % value of winners
	'sharpe' => 0.02,
	'avg-trade-length' =>	'10h 42m',

	'pips' => $TradeStats['pips'],
	'profit-factor' => $TradeStats['profitfactor'],
	'gain' => round(($TradeStats['gain']-100),2),				// general stats
	'abs-gain' => round(($TradeStats['absGain']-100),2),			// general stats
	'dd' => $TradeStats['drawdown'],				// general stats
	'avg-daily' => $TradeStats['avg-day'],		// general stats
	'avg-monthly' => $TradeStats['avg-month'],		// general stats
	'lifetime' => $TradeStats['lifetime'], 	// get from http://localhost/Code/Projects/trade/swingfish.trade/assets/ventor/myfxbook/myfxbhtml.php
	'lastupdate' => $TradeStats['lastupdate'],
	'gain-today' => $TradeStats['today']['gain'],
	'currency' => @$TradeStats['currency'],
	'balance' => @$TradeStats['balance'],
	'MFXBaccount' => $account,
	'image' => $img,
	'raw' => $TradeStats, // tihis is just so i not have to add  all fields to all fines while development
	);

