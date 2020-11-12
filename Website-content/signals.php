<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?
//$now1 = explode($_REQUEST);
include(URI.'lib/3rd/wordpress/site_posts_cat_21.php');

$SignalStats = array('total' => 0, 'tp' => 0, 'progress' => 0, 'stop' => 0, 'complete' => 0);

foreach ($wp_posts as $v) {
	$SignalStats['total']++;
	$t = explode(" ", $v['title']['rendered']);
	if ($t[0] == "[STOPOUT]") {
		$SignalStats['stop']++;		
	}
	elseif (substr($t[0], 0, 9) == "[CANCELED") {
	}
	elseif (substr($t[0], 0, 9) == "[COMPLETE") {
		$SignalStats['complete']++;		
	}
	elseif ($t[0]{1} == "T") {
		$SignalStats['tp']++;		
	//	$SignalStats['progress']++;
	}
	else {
		$SignalStats['progress']++;		
	}
}
function SignalStatusColor($title) {
	$t = explode(" ", $title);
	if ($t[0] == "[STOPOUT]") {
		return '#f27b89';
	}
	elseif (substr($t[0], 0, 9) == "[CANCELED") {
		return '#c9d6e8';
	}
	elseif (substr($t[0], 0, 9) == "[COMPLETE") {
		return '#35f245';
	}
	elseif ($t[0]{1} == "T") {
		return '#46997e';
	}
	else {
		return '#0066ff';
	}

}

?>
   <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title">
              <h1>Free Forex Signals</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
           <div class="breadcrumbs">
			   <a href="/tradingroom">Tradingroom</a>
              <span class="delimiter"><i class="icon-arrow-right"></i></span>
              <span>Signals</span>
            </div><!-- .breadcrumbs -->
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->
	<section class="container">
		<div class="row padding-top">
			<blockquote class="bg-warning">
				<strong>Risk Warning</strong><br />
				SwingFish does offer a "<a href="https://www.enfoid.com/investors">Lending based Equity Fund Service</a>" where no losses to your funds will occur, ever!<br />
				<strong>Please remember the signals below are NOT part of this service!</strong>
			</blockquote>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<ul class="list-featured">
					<li> These Forex signals are free to use by anyone at no cost.</li>
					<li> Provided as a Non-Profit Community Service.</li>
					<li> Signals reflect the personal opinions of Analysts or members and are <strong>not trade advice</strong>.</li>
					<li> <a href="/blog/c/forex-signal-cfd-analysis/">All signals can also be found in the Blog</a>, </li>
					<li> You are free to <a href="/blog/wp-admin/post-new.php">add new Signals by yourself</a> (they will then automatically be added to this list)<br />
						Remember our community works best the more we each contribute.<br />
						Our goal is a diverse collection of trade ideas not reliant on any single strategy.</li>
					<li> This Signals are not here to Spoon-feed you!<br />
					<li> You are alone in control of your success, trading someone else's idea's will not bring you closer to that goal.</li>
					<li> You understand that trading has risks and you (and only you) are responsible for manage them correctly.</li>
				</ul>
			</div>
			<div class="main col-md-4">
				<div id="piechart"></div>
				<div class="progress progress-animated">
					<div class="label">
						<span>Overall Win-rate <?=abs(round(($SignalStats['stop']/$SignalStats['total'])*100,1)-100)?>%</span>
					</div>
					<div class="progress-bar progress-bar-sm progress-bar-primary" data-valuenow="<?=abs(round(($SignalStats['stop']/$SignalStats['total'])*100,1)-100)?>%" style="width: <?=abs(round(($SignalStats['stop']/$SignalStats['total'])*100,1)-100)?>%;"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="165">Author</th>
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
		echo '				<td><a href="'.$v['_embedded']['author'][0]['link'].'">'.$v['_embedded']['author'][0]['name'].'</a></td>';
		echo '				<td><a href="'.$v['link'].'" title="'.$v['excerpt']['rendered'].'"><font color="'.SignalStatusColor($v['title']['rendered']).'">'.$v['title']['rendered'].'</font></td>';
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
</section>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Account', 'Allocation'],
  ['Failed', <?=$SignalStats['stop']?>],['Complete', <?=$SignalStats['complete']?>],['some Targets Reached', <?=($SignalStats['tp']+$SignalStats['complete'])?>],['in Progress', <?=$SignalStats['progress']?>]]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':"100%", 'height':300, legend:{position:'none'},colors: ['#800000', '#35f245', '#46997e', '#0066ff']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script><? 
/* <img src="<?=URL?>lib/3rd/myfxbook/GetMyfxbookStats.php?totals=ajax&id=<?=$account?>&flag=de" width="1" height="1">
*/
