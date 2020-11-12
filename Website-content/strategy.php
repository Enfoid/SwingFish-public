<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<strong>Hey!</strong> as you may have noticed, we in the middle updating the webisite, there may be some layout issues we are still working on, please be partient,<br />we will fix this in the comming days, also adding a new backoffice for EnFoid Lenders with better reporting and more details
</div>
<?
include("assets/strategies/accountmap.php");

$account = $accountName = $cid;
$account= intval($AccountMap[$account]);

if ($account <= 0) {
	echo '<H1>Strategy not found!, <a href="'.URL.'strategies" target="_top">Click here to see all Stategies</a></H1>';
	die();
}
//$account = base64_decode(substr($_REQUEST['id'], 0, -1));
//print_r($account); die();
include("assets/strategies/".$account."/totals.php");
if ((isset($products['days']))&&($products['days'] >0)) { $Manual = true; } else { $Manual = false; } // for check if use myfxbook or manual stats

//print_r($products);
if (is_file("assets/strategies/".$account."/text.".$hl.".php")) {
	include("assets/strategies/".$account."/text.".$hl.".php"); }
else { include("assets/strategies/".$account."/text.php"); }


if ($products['settings']['MFXBshowstatement'] === true) {
	if (!isset($AccountText['links'])) { $AccountText['links'] = array(); }
	array_push($AccountText['links'], array('title' => 'Statement', 'target' => "_blank", 'url' => 'https://www.myfxbook.com/secure/statements/'.$account.'/statement.pdf'));
}

//print_r($products);
//die();
?>
<div class="section">
	<div class="container">
		<div class="case_study">
			<div class="row">
<?
	if ($Manual) {
$RowBal = $products['manualbalance']; $RowGain = $products['manualbalance'].", "; $RowSetup = "0, ";
foreach ($products['days'] as $v) {
//	$RowBal = $RowBal . ($RowBal*($v['gain']/100)) . ", ";
	if ($v['gain'] < 0) {
		$v['gain'] = number_format((float)abs($v['gain']), 2);
		@$RowBal = $RowBal - ($RowBal * (@$v['gain']/100));
	} else {
		@$RowBal = $RowBal + ($RowBal * (@$v['gain']/100));
	}
	$RowSetup = $RowSetup . $v['setups'] . ", ";
	$RowGain = $RowGain . round($RowBal,3) . ", ";
};
$RowSetup = rtrim($RowSetup, ",");
$RowGain = rtrim($RowGain, ",");

?><!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
				<div class="col-md-6"><div id="Chartdiv"></div>
  <script>
var trace1 = {
  y: [<?=$RowGain?>],
  mode: 'lines+markers',
  line: {shape: 'spline'},
  connectgaps: true,
  name: 'Equity Gain'
  };
var data = [trace1];
var layout = {
  title: 'Equity Gain & loss',
  showlegend: false,
  xaxis: {
    title: 'Day',
    showgrid: false,
    zeroline: true
  },
  yaxis: {
    title: 'Equity',
    showline: false
  }
  };
Plotly.newPlot('Chartdiv', data);
  </script>
<? } else {?>
				<div class="col-md-6">
					<figure class="case_study--media">
  
  <a href="#"><img src="<?=URL?>lib/3rd/myfxbook/statimage.png.php?strategy=<?=$accountName?>&dm=<?=date("B")?>" alt=""></a>
					</figure>
<? } ?>				</div>
				<div class="col-md-6">
					<div class="case_study--section">
						<h2 class="case_study--section_title"><?=$AccountText['title']?></h2>
						<div class="case_study--text"><p><?=$AccountText['desc']?></p></div>
					</div>
				</div>
			</div>
			<div class="row">
<?	if (isset($AccountText['links'])) { ?>
				<div class="col-md-9">
<? } else { ?>
				<div class="col-md-12">
<? } ?>
					<div class="article--content">
						<center><h1><?
	if ($Manual) {
								echo HtmlToolTip('gain', 'gains/loss relative and absolute').' of <strong>'.(round($RowBal,3)-100).'%</strong>';
								echo ' generated in just <strong>'.count($products['days']).' days';
} else {
								if ($products['stats']['abs-gain'] == $products['stats']['gain']) {
								echo HtmlToolTip('gain', 'gains/loss relative and absolute').' of <strong>'.($products['stats']['abs-gain']).'%</strong>';
							}
							elseif ($products['stats']['abs-gain'] > $products['stats']['gain']) {
								echo HtmlToolTip('absolute gain', 'gains/loss based on the capital deposit to the account').' of <strong>'.($products['stats']['abs-gain']).'%</strong>';
							}
							else {
								echo HtmlToolTip('total gain', 'Absolute: '.$products['stats']['abs-gain'].'% (based on deposits)').' of <strong>'.($products['stats']['gain']).'%</strong>';
							}
							echo 'generated in just <strong>'.humanAgo($products['stats']['lifetime'],1,false,'no');
}
							?> </strong></h1></center>
									<?
									if ((isset($AccountText['warning']))&&(strlen($AccountText['warning'])>5)) {
										// echo "<br />";
										echo '<blockquote>Warning: '.$AccountText['warning'].'</blockquote>';
									}
									?>
					</div>
				</div>
<?	if (isset($AccountText['links'])) { ?>
				<div class="col-md-3">
					<div class="blog_sidebar">
						<div class="widget">
							<h2 class="widget--title"><i class="icons8-page-overview-3"></i>extra</h2>
							<ul>
								<?
								foreach ($AccountText['links'] as &$v) {
									echo '<li><a href="'.$v['url'].'" target="'.$v['target'].'">'.$v['title'].'</a></li>'."\n\r";
								}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
<? } ?>

<?
		if (!$Manual) {
?>			<div class="row">
				<div class="col-md12">
					<div class="article--content">
						<h2 class="case_study--section_title">Statistical Breakdown</h2>
										<table>
											<tbody>
												<tr>
													<th>Term</th>
													<th class="views">Value</th>
													<th>Description</th>
												</tr>
<?
	/*
														<tr class="even">
													<td>Trades</td>
													<td><?=$products['stats']['trades']?></td>
													<td>Number of trades executed</td>
												</tr>
*/
?>
												<tr class="odd">
													<td>Strategy Started</td>
													<td><?=HumanAgo($products['stats']['lifetime'],2)?></td>
													<td>Period of time this strategy has been active</td>
												</tr>
<? if ((isset($products['settings']['showBalance']))&&($products['settings']['showBalance'] === true)) { ?>
												<tr class="even">
													<td>Current Balance</td>
													<td><?=$products['stats']['currency']?> <strong><?=MoneyFormat($products['stats']['balance'])?></strong></td>
													<td>Current balance of the account</td>
												</tr>
												<tr class="odd">
													<td>Current Positions</td>
													<td><?=$products['stats']['currency']?> <strong><?=MoneyFormat(($products['stats']['raw']['raw']['equity']-$products['stats']['balance']))?></strong></td>
													<td>value of Current Trades (not realised)</td>
												</tr>
<? }  ?>
												<tr class="even">
													<td>Average Yearly</td>
													<td><?=round(($products['stats']['avg-monthly']*12),2)?>%</td>
													<td><strong>Average growth over the year (return on investment)</strong></td>
												</tr>
												<tr class="odd">
													<td>Average Monthly</td>
													<td><?=$products['stats']['avg-monthly']?>%</td>
													<td>Average gains for the month</td>
												</tr>
												<tr class="even">
													<td>Average Daily</td>
													<td><?=$products['stats']['avg-daily']?>% <?
														if ($products['stats']['gain-today'] >0) {
															echo '(<strong>today: '.$products['stats']['gain-today'].'%</strong>)';
														} ?></td>
													<td>Average gains for the day</td>
												</tr>
												<tr class="even">
													<td>Profit Factor</td>
													<td><?=$products['stats']['profit-factor']?></td>
													<td>Difference after deducting gross losses from gross wins</td>
												</tr>
												<tr class="odd">
													<td>Trade Count</td>
													<td><?=number_format((round($products['stats']['trades'])))?></td>
													<td>Total Number of Trades Executed</td>
												</tr>
												<tr class="even">
													<td>Trade Volume</td>
													<td><div class="tooltip"><?=number_format((round($products['stats']['lots'])*1000))?> k$<span class="tooltiptext">value is approximated due to currency fluctuations.</span></div></td>
													<td>Total amount of trades made</td>
												</tr>
												<tr class="odd">
													<td>Pips</td>
													<td><?=round($products['stats']['pips'])?></td>
													<td>Distance covered with active trades</td>
												</tr>
												<tr class="even">
													<td>Length</td>
													<td><?=$products['stats']['avg-trade-length']?></td>
													<td>Average time trades are active</td>
												</tr>
												<tr class="odd">
													<td>Average Gain/Loss</td>
													<td><?=$products['stats']['avg-win-pip']?> / <?=$products['stats']['avg-loss-pip']?></td>
													<td>Average distance until a win/loss is realised</td>
												</tr>
												<?
													if ($products['stats']['lastupdate'] > (time()-604800)) {
													?><tr class="even">
													<td>Updated</td>
													<td><?=humanago($products['stats']['lastupdate'],1)?></td>
													<td>Last time this statistic was calculated</td>
												</tr>
												<? } ?>
											</tbody>
										</table>
					</div>
				</div>
			</div>
<? } ?>			<div class="row">
				<div class="col-md12">
					<div class="row progressbars js-progressbars">
						<!-- item-->
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="progressbars--item">
								<div data-value="<?=$products['stats']['profitability']?>%" data-options='{"color":"green","trailColor":"#d5eaf7"}' class="progressbar"></div>
								<h3 class="progressbars--item_title"><?=HtmlToolTip('Profitability', $products['stats']['profitability'].'% of all trades where Profitable')?></h3>
							</div>
						</div>
<?
if ((isset($products['stats']['sharpe'])) && ($products['stats']['sharpe']>0)) { ?>
                                                <!-- item-->
                                                <div class="col-md-2 col-sm-4 col-xs-12">
                                                        <div class="progressbars--item">
                                                                <div data-value="<?=($products['stats']['sharpe']*100)?>%" data-options='{"color":"green","trailColor":"#d5eaf7"}' class="progressbar"></div>
                                                                <h3 class="progressbars--item_title"><?=HtmlToolTip('Sharpe Rate', $products['stats']['sharpe'].' sharpe Ratio')?></h3>
                                                        </div>
                                                </div>
<? } ?>
						<!-- item-->
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="progressbars--item">
								<div data-value="<?=$products['stats']['win-long']?>%" data-options='{"color":"#34c1e4","trailColor":"#d5eaf7"}' class="progressbar"></div>
								<h3 class="progressbars--item_title"><?=HtmlToolTip('Buy', 'Profitable Buy Positions')?></h3>
							</div>
						</div>
						<!-- item-->
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="progressbars--item">
								<div data-value="<?=$products['stats']['short-win']?>%" data-options='{"color":"#34c1e4","trailColor":"#d5eaf7"}' class="progressbar"></div>
								<h3 class="progressbars--item_title"><?=HtmlToolTip('Sell', 'Profitable Sell Positions')?></h3>
							</div>
						</div>
						<!-- item-->
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="progressbars--item">
								<div data-value="<?=$products['stats']['dd']?>%" data-options='{"color":"red","trailColor":"#d5eaf7"}' class="progressbar"></div>
								<h3 class="progressbars--item_title"><?=HtmlToolTip('Drawdown', 'This is normally calculated by getting the difference between a relative peak in capital minus a relative trough.')?></h3>
							</div>
						</div>
						<!-- item-->

<? if ((isset($products['settings']['BackupFundsLevel']))&&($products['settings']['BackupFundsLevel'] >0)) {?>
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="progressbars--item">
								<div data-value="<?=$products['settings']['BackupFundsLevel']?>%" data-options='{"color":"#f4b642","trailColor":"#d5eaf7"}' class="progressbar"></div>
								<h3 class="progressbars--item_title"><?=HtmlToolTip('Backup', 'Allocation of outside Coverage-Funds for Protection and Hedges')?></h3>
							</div>
						</div>
<? } ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="section">
					<div class="container">
						<div class="progressbars js-progressbars">
							<h2 class="progressbars--title">Products Traded</h2>
<?
$percall = 100;
foreach($products['items'] as $item => $v) {
$perc = round((($v/$products['stats']['trades'])*100),1);
	if ($perc > 4) {
	$percall = $percall - $perc;
?>									<!-- item-->
							<div class="col-md-2 col-sm-4 col-xs-12">
								<div class="progressbars--item">
									<div data-value="<?=$perc?>%" data-options='{"color":"#34c1e4","trailColor":"#d5eaf7"}' class="progressbar"></div>
										<h3 class="progressbars--item_title"><?=strtoupper($item)?></h3>
								</div>
							</div>
<? }}
	if ($percall > 1) {?>
							<!-- item-->
							<div class="col-md-2 col-sm-4 col-xs-12">
								<div class="progressbars--item">
									<div data-value="<?=$percall?>%" data-options='{"color":"gray","trailColor":"#d5eaf7"}' class="progressbar"></div>
										<h3 class="progressbars--item_title">others</h3>
								</div>
							</div>
<? } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<img src="<?=URL?>lib/3rd/myfxbook/GetMyfxbookStats.php?totals=ajax&id=<?=$account?>&flag=de" width="1" height="1">
<?
	if ($products['settings']['MFXBshowtrades'] === true) {?>
		<div class="row">
				<div class="container">
					<!-- myfxbook.com open trades widget - Start -->
                    <div><script class="powered" type="text/javascript" src="http://widgets.myfxbook.com/scripts/fxOpenTrades.js?oid=<?=$account?>&link=1"></script>
                    <div style="color: #706f6f;font-weight: bold;font-size: 11px;font-family: Tahoma;">Powered by <a href="https://www.myfxbook.com"class="myfxbookLink" ><b style="color: #575454;">Myfxbook.com</b></a></div>
                    <script type="text/javascript">showOpenTradesWidget()</script></div>
                    <!-- myfxbook.com open trades widget - End -->
				</div>
			</div>
<? }?>
		</div>
	</div>
	<div class="container">
		<? include('lib/3rd/disqus/commentbox.php'); ?>
	</div>
</div>
