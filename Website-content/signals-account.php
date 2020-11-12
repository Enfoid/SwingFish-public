<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?
//$now1 = explode($_REQUEST);
include(URI.'lib/3rd/wordpress/site_posts_cat_21.php');

$SignalStats = array('tp' => 0, 'progress' => 0, 'stop' => 0, 'complete' => 0);
foreach ($wp_posts as $v) {
	$t = explode(" ", $v['title']['rendered']);
	if ($t[0] == "[STOPOUT]") {
		$SignalStats['stop']++;		
	}
	elseif (substr($t[0], 0, 9) == "[COMPLETE") {
		$SignalStats['complete']++;		
	}
	elseif ($t[0]{1} == "T") {
		$SignalStats['tp']++;		
		$SignalStats['progress']++;
	}
	else {
		$SignalStats['progress']++;		
	}
}
//print_r($SignalStats);
//print_r($wp_posts);
//die();
// myfxbook stuff
require_once(URI."assets/strategies/accountmap.php");

$account = $AccountMap['signals']; unset($AccountMap);
if ((isset($go[1]))&&($go[1] == "update-now")) {
	// force update
//	$stt = json_decode(file_get_contents('http://swingfish.trade/lib/3rd/myfxbook/GetMyfxbookStats.php?totals=direct&id='.$account));
}
$stt = json_decode(file_get_contents('http://swingfish.trade/lib/3rd/myfxbook/GetMyfxbookStats.php?totals=include&id='.$account));

$OpenTrades = @json_decode(file_get_contents('https://www.myfxbook.com/api/get-open-trades.json?session='.$stt->myfxbookSession.'&id='.$account));
$OpenTrades = $OpenTrades->openTrades;

$OpenOrders = @json_decode(file_get_contents('https://www.myfxbook.com/api/get-open-orders.json?session='.$stt->myfxbookSession.'&id='.$account));
$OpenOrders = $OpenOrders->openOrders;

$History = @json_decode(file_get_contents('https://www.myfxbook.com/api/get-history.json?session='.$stt->myfxbookSession.'&id='.$account));
$History = $History->history;


 echo "<!-- "; print_r('https://www.myfxbook.com/api/get-open-trades.json?session='.$stt->myfxbookSession.'&id='.$account); echo " -->";


//echo "<pre>"; print_r($stt);

?>
<section class="main-container">
	<div class="container">
		<div class="row">
			<h1 class="page-title swingfish">Free Forex Signals</h1>
			<div class="separator-2"></div>
			<div class="alert alert-danger alert-dismissible" role="alert"><strong>Risk Warning!</strong><br />SwingFish does offer a "<a href="/risk-free">Risk-Free Service</a>" where no losses do occur to your funds, ever. <strong>the Signals below are NOT part of this service!</strong></div>
			<div class="tabs-style-2">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#h2Conditions" role="tab" data-toggle="tab"><i class="fa fa-home pr-5"></i>Conditions</a></li>
					<li><a href="#h2Status" role="tab" data-toggle="tab"><i class="fa fa-user pr-5"></i>Status <span class="badge"><?php
if ($stt->absGain > 100){
	if ($stt->gain > $stt->absGain) { echo ($stt->gain-100); } 
	else { echo ($stt->absGain-100); } ?>
<? } else { echo $stt->gain-100; }?>%</a></li>
<?
	if (count($OpenTrades) > 0) { ?>
					<li><a href="#h2Trades" role="tab" data-toggle="tab"><i class="fa fa-list pr-5"></i>Active <span class="badge"><?=count($OpenTrades)?></span></a></li>
	<?}?>
<?
	if (count($OpenOrders) > 0) { ?>
					<li><a href="#h2Orders" role="tab" data-toggle="tab"><i class="fa fa-list pr-5"></i>Pending <span class="badge"><?=count($OpenOrders)?></span></a></li>
	<?}?>
					<li><a href="#h2History" role="tab" data-toggle="tab"><i class="fa fa-list pr-5"></i>History <span class="badge">20++</span></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="h2Conditions">
						<div class="space-bottom"></div>
						<div class="row">
							<div class="main col-md-8">
								<ul class="list-icons">
									<li><i class="icon-check pr-10"></i> This Forex Signals, are Free to use by anyone at no cost.</li>
									<li><i class="icon-check pr-10"></i> provided as a Non-Profit Community Service.</li>
									<li><i class="icon-check pr-10"></i> reflect the personal opinion(s) of various Analysts & Members, <strong>not Trade advice</strong>.</li>
									<li><i class="icon-check pr-10"></i> <a href="/blog/c/forex-signal-cfd-analysis/">all signals can also be found in the Blog</a>, </li>
									<li><i class="icon-check pr-10"></i> you are free to <a href="/blog/wp-admin/post-new.php">add new Singnals by yourself</a> (they will then automatically added to this list)</li>
									<li><i class="icon-check pr-10"></i> remember: a Community works better if many do contribute</li>
									<li><i class="icon-check pr-10"></i> also: the more contribute, the greater the diversification</li>
									<li><i class="icon-check pr-10"></i> you confirming knowing that trading comes at a risk and you do know how to handle your risk!</li>
								</ul>
							</div>
							<div class="main col-md-4">
								<div id="piechart"></div>
							</div>
						</div>
					</div>
						<div class="tab-pane fade" id="h2Status">
						<div class="space-bottom"></div>
						<div class="row">
							<table class="table table-bordered">
								<?php if ($stt->gain > $stt->absGain) { $gain = $stt->gain; } else { $gain = $stt->absGain; } ?>
								<tr><td>Capital (total):</td><td><?=$gain?>% after <?=HumanAgo(($stt->lifetime+7655353), 2, false, 'no')?></td></tr>

								<tr><td>Average Monthly Gain:</td><td><?=$stt->raw->monthly?>%</td></tr>
<?
if ($stt->equityPercent > 80) { ?>								<tr><td>Equity:</td><td>$ <?=$stt->equityPercent?>%
<? } ?>								<?
								//	if ($stt->equityPercent != 100) { 
								//		echo "[ Equity: ".$stt->equityPercent."%]"; }
										?></td></tr>
								<tr><td>Deposits:</td><td>$ <?=$stt->raw->deposits?></td></tr>
								<tr><td>Withdrawals:</td><td>$ <?=$stt->raw->withdrawals?></td></tr>
								<tr><td></td><td></td></tr>
<?
/*								<tr><td>Max drawdown</td><td><?=$stt->drawdown?>%</td></tr>
*/
?>								<tr><td>Profit Factor</td><td><?=$stt->raw->profitFactor?></td></tr>
								<tr><td>Last Update</td><td><?=HumanAgo($stt->lastupdate)?> <a href="/signals/update-now" class="btn radius btn-gray btn-sm">Force Update</a></td></tr>
<?php
if ($stt->absGain > 1000){ ?>								<tr><td align="right" colspan="2"><a target="_blank" title="more detailed Data at MyFxBook.com" href="https://www.myfxbook.com/members/SwingFish/swingfish-signals/<?=$account?>"><img align="center" src="https://www.myfxbook.com/api/get-custom-widget.png?session=<?=$stt->myfxbookSession?>&id=<?=$account?>&width=720&height=240&bart=0&linet=0&bgColor=ffffff&gridColor=BDBDBD&lineColor=00CB05&barColor=FF8D0A&fontColor=000000&title=&titles=20&chartbgc=ffffff" /></a></td></tr>
<?php } ?>							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="h2Trades">
						<div class="space-bottom"></div>
						<div class="row">
							<table class="table table-bordered">
									<tr>
										<th>Symbol</th>
										<th>Filled</th>
										<th>Dist.</th>
										<th>TP</th>
										<th>SL</th>
										<th>Comment</th>
									<?
//	<th></th>
?>									</tr>
									<?php
									$tpips = 0;
									$profit = 0;
									foreach ($OpenTrades as $v){
//										print_r($v);
									echo '<tr>';
										echo '<td>';
										 echo $v->action;
										 echo " <strong>".$v->symbol."</strong>";
										echo '</td>';
										
									echo '<td>';
										echo humanago(strtotime($v->openTime)+18000,2);
//										echo '<font color="blue">@'.$v->openPrice.'</font> ';
										echo ' @ '.$v->openPrice;
									echo '</td>';

									echo '<td>';
										echo '<font color="'; echo $v->pips < 1 ? "red" : "green"; echo '">'; echo $v->pips; echo '</font>';
										$tpips = $tpips+$v->pips;
//										echo $v->pips;
									echo '</td>';

									echo '<td>';
//										echo '<font color="green">'.$v->tp.'</font>';
										echo $v->tp;
									echo '</td>';

									echo '<td>';
//										echo '<font color="red">'.$v->sl.'</font>';
										echo $v->sl;
									echo '</td>';

									echo '<td>';
										 $c1 = explode(" ", $v->comment);
										 if ($c1[0] > 5000) {
											 // we have a post comment
											 echo '<i class="icon-chart-line"> <a title="link to Signal page" href="/'.trim($c1[0]).'">'.$v->comment.'</a>';
										 } else {
											 echo $v->comment;
										 }
									echo '</td>';

									//echo '<td>';
										//echo '<font color="'; echo $v->profit < 1 ? "red" : "green"; echo '">'; echo $v->profit; echo '</font>';
										$profit = $profit + $v->profit;
									//echo '</td>';

									echo '</tr>';
									}
									?>
									<tr>
										<td colspan="7" align="right">Total: </td>
										<td><strong><?php echo '<font color="'; echo $tpips < 1 ? "red" : "green"; echo '"> '; echo $tpips; echo '</font>'; ?></strong></td>
									</tr>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="h2Orders">
						<div class="space-bottom"></div>
						<div class="row">
							<table class="table table-bordered">
									<tr>
										<th>Symbol</th>
										<th>Order Time</th>
										<th>Price</th>
										<th>TP</th>
										<th>SL</th>
										<th>Comment</th>
									</tr>
									<?php
									foreach ($OpenOrders as $v){
//										print_r($v);
									echo '<tr>';
										echo '<td>';
										 echo $v->action;
										 echo " <strong>".$v->symbol."</strong>";
										echo '</td>';

										echo '<td>';
										 echo $v->openTime;
										echo '</td>';

										echo '<td>';
										 echo $v->openPrice;
										echo '</td>';

										echo '<td>';
										 echo $v->tp;
										echo '</td>';

										echo '<td>';
										 echo $v->sl;
										echo '</td>';

										echo '<td>';
										 $c1 = explode(" ", $v->comment);
										 if ($c1[0] > 5000) {
											 // we have a post comment
											 echo '<i class="icon-chart-line"> <a title="link to Signal page" href="/'.trim($c1[0]).'">'.$v->comment.'</a>';
										 } else {
											 echo $v->comment;
										 }
										echo '</td>';

									echo '</tr>';
									}
									?>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="h2History">
						<div class="space-bottom"></div>
						<div class="row">
							<small>&nbsp; Showing last 20 history entries</small>
							<table class="table table-bordered">
									<tr>
										<th>Symbol</th>
										<th>Time</th>
										<th>price</th>
										<th>pips</th>
										<th>Comment</th>
									</tr>
									<?php
									$i = 0;
									foreach ($History as $v){
										if ($i > 20) { break; } // stop loop after 20 records
//										print_r($v);
										echo '<td>';
										 echo $v->action;
										 echo " <strong>".$v->symbol."</strong>";
										echo '</td>';

										echo '<td>';
										 echo $v->openTime . " - ". $v->closeTime;
										echo '</td>';

										echo '<td>';
										 echo $v->openPrice;
										 //if ($v->pips >0) { echo " +";} else { echo " ";}
										 //echo $v->pips;
										echo '</td>';

										echo '<td>';
										 //echo "$";
										 echo '<font color="'; echo $v->pips < 1 ? "red" : "green"; echo '">'; echo $v->pips; echo '</font>';
										//if ($v->pips >0) { echo " +";} else { echo " ";}
										 //echo $v->pips;
										echo '</td>';

										echo '<td>';
										 if ($v->action != "Deposit") {
											 $c1 = explode(" ", $v->comment);
											 if ($c1[0] > 5000) {
											 	// we have a post comment
											 	echo '<i class="icon-chart-line"> <a title="link to Signal page" href="/'.trim($c1[0]).'">'.$v->comment.'</a>';
										 		} else {
										 		echo $v->comment;
										 		}
										 		}
										echo '</td>';

									echo '</tr>';
									$i++;
									}
									?>
							</table>
						</div>
					</div>
				</div>
			</div>
										
			<hr />
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Symbol</th>
						<th>Status &amp; Title</th>
						<th></th>
						<th align="right" width="195">Posted</span></th>
<!--						<th>updated</th> -->
					</tr>
				</thead>
				<tbody>
<?php
	foreach ($wp_posts as $v) {
		echo '			<tr>';
		echo '				<td>'.$v['tags'][0].'</td>';
		echo '				<td><a href="'.$v['link'].'" title="'.$v['excerpt']['rendered'].'">'.$v['title']['rendered'].'</td>';
		echo '				<td>';
//		$id = $v['id']; // for wp_comments
//		include (URI.'lib/3rd/wordpress/wp_comments.php');
//		echo count($wp_co);
		echo '</td>';
		echo '				<td align="right">'.$v['date'].'</td>';
//		echo '				<td>'.$v['modified'].'</td>';
		echo '			</tr>';
	}
?>				</tbody>
			</table>
		</div>
	</div>
</section>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Account', 'Allocation'],
  ['Stop Out', <?=$SignalStats['stop']?>],['Completed', <?=$SignalStats['complete']?>],['TP Reached', <?=($SignalStats['tp']+$SignalStats['complete'])?>],['in Progress', <?=$SignalStats['progress']?>]]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':"100%", 'height':300, legend:{position:'none'},colors: ['#800000', '#009933', '#00ff00', '#0066ff']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script><img src="<?=URL?>lib/3rd/myfxbook/GetMyfxbookStats.php?totals=ajax&id=<?=$account?>&flag=de" width="1" height="1">

