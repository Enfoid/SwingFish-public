<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
	
$funds = json_decode(file_get_contents('http://enfoid.com/api/c/fundstats.json'));	
// echo "<!-- ";  print_r($funds); echo " -->"; die();
	
	?><section class="main-container">
	<div class="container">
		<div class="row">
			<div class="main col-md-12">
				<h1 class="page-title swingfish">Risk Free with Backed Funds</h1>
					<p>Our <a href="<?=URL?>risk-free">Risk-Free Offering</a> is based on the amount of reserve capital, which resides in secure seperate accounts directly with the brokers.</p>
					<p>We can only take in more capital once we have reached a certain reserve fund target.</p>
					<div class="alert alert-warning alert-dismissible" role="alert"><strong>All</strong> participants in the <a href="<?=URL?>risk-free">Risk-Free Offering</a> contribute to this fund and are not involved in any actual trading activity!</div>
			</div>
		</div>
		<div class="row">
			<div class="main col-md-6">
				<h6>Real-time Risk Coverage</h6>
				<blockquote>for transparency, this data is automatically generated.<br />
					more details are available inside <a href="https://enfoid.com/lenders/" target="_blank">EnFoid Lenders</a>.
				</blockquote>
				<ul class="list-icons">
					<li><i class="icon-info-circled"></i> we only accept Lenders funds, not exceeding the total Security funds.</li>
					<li><i class="icon-help-circled"></i> this is to ensure liabilities can be met at all times.</li>
					<li><i class="icon-gauge"></i> <strong><?=$funds->totalaccounts?> Lenders covering <?php echo round($funds->backedby,1); ?>%</strong> of the avaiable Security funds.</li>
					<li><i class="icon-credit-card"></i> <?php
													if ($Coverstats['newsize'] < 1000) {
														echo '<font color="red">Currently, we cannot take on any new protected accounts.</font>.';
													}
													else {
														echo '<font color="green"><strong>US$ '.number_format(round($funds->newsize, -1)).'</font> Maximum Lending Size</strong>';
													}
													?></li>
				<li><i class="icon-clock"></i> as of <strong><?=date("r", $funds->updated)?></strong></li>
				</ul>
				<div class="progress">
					<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo round($funds->backedby,3); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($funds->backedby,3); ?>%">
						<span class="sr-only"><?php echo round($funds->backedby,3); ?>% Coverage by Loaned Funds</span>
					</div>
				</div>
			</div>
			<div class="main col-md-6">
				<h6>Current Allocation <small>(updated <?=HumanAgo($funds->updated,1)?>)</small></h6>
				<div id="piechart"></div>
<?
	/*				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="//www.youtube.com/embed/0nUga6VHwoc?mute=1&rel=0&loop=1&autoplay=1"></iframe>
				</div>
*/
?>			</div>
		</div>
		<div class="row">
			<br />
			<br />
		</div>
		<div class="row">
			<div class="main col-md-10">
				<h2 class="page-title swingfish">We do not gamble!</h2>
				<blockquote><strong>Funds traded are limited to the amount of reserve funds on standby.</strong><br />
					<a href="<?=URL?>risk-free">Risk Free</a> works only if we can back up the accounts.</blockquote>
				<ul>Here is how:
					<li>Funds traded are backed by the reserve fund as shown above.</li>
					<li>Approximately 7.5% of the reserve funds are held with brokerages to enable rapid response and transactions.</li>
					<li>80% is held offsite in EnFoid bank accounts to provide an additional level of security and peace of mind.</li>
					<li>The remainder (~12.5%) is left in circulation, such as for swaps, offshore accounts, foreign currency accounts etc.</li>
					<li>The aim is to keep 100% of the reserve funds available most of the time to ensure lenders can be paid out at any time, even in the unlikely event of simultaneous withdrawal requests or mutiple losses.</li>
				</ul>
			
</div>
			<div class="main col-md-2">
				<img src="/assets/images/content/risk-free/risk-free-guarantee.gif" alt="">
			</div>
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
<?=$funds->accoountchart?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':"100%", 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

