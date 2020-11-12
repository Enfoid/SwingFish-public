<?php
if ((isset($_REQUEST['fields']))&&(intval($_REQUEST['fields']['amount'])>0)) { $havedata = true; } else { $havedata = false; } ?>
<section class="main-container">
	<div class="container">
		<div class="row">
			<div class="main col-md-12">
				<h1 class="page-title swingfish">Compound Earnings Calculator</h1>
				<div class="panel-group panel-transparent" id="accordion-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3"><i class="icon-pencil"></i>the Numbers</a></h4>
						</div>
						<div id="collapseOne-3" class="panel-collapse collapse<? if (!$havedata) { echo ' in'; }?>">
							<div class="panel-body">
								<form enctype="multipart/form-data" method="post">
									<fieldset>
										<div class="row">
											<div class="col-md-6 col-xs-12">
												<label class="field -wide">
													<input type="text" placeholder="<?php
														if (isset($_REQUEST['fields']['amount']) && intval($_REQUEST['fields']['amount'])>0) {
															echo $_REQUEST['fields']['amount'].'" value="'.$_REQUEST['fields']['amount'];
														}
														else {
															//	echo 'Starting Amount';
														}?>" name="fields[amount]" required=""> Amount in your currency
												</label>
											</div>
											<div class="col-md-6 col-xs-12">
												<label class="select -wide">
													<select name="fields[rate]" class="js-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
														<option value="0.175"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "0.175") { echo " SELECTED"; }?>>9.55% (Guaranteed, 0.175% Weekly)</option>
														<option value="0.265"<? if ((isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "0.265") OR (!isset($_REQUEST['fields']['rate']))) { echo " SELECTED"; }?>>14.47% (Average, 0.265% Weekly)</option>
														<option value="0.35" <? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "0.35") { echo " SELECTED"; }?>>0.35% Weekly (18 Locked option)</option>
														<option value="0.42"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "0.42") { echo " SELECTED"; }?>>0.42% Weekly (Speculative / other)</option>
														<option value="1"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "1") { echo " SELECTED"; }?>>1.00% Weekly (Speculative / other)</option>
														<option value="1.5"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "1.5") { echo " SELECTED"; }?>>1.50% Weekly (Speculative / other)</option>
														<option value="1.75"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "1.75") { echo " SELECTED"; }?>>1.75% Weekly (Speculative / other)</option>
														<option value="2"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "2") { echo " SELECTED"; }?>>2.00% Weekly (Speculative / other)</option>
														<option value="2.5"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "2.5") { echo " SELECTED"; }?>>2.50% Weekly (Speculative / other)</option>
														<option value="3"<? if (isset($_REQUEST['fields']['rate']) && $_REQUEST['fields']['rate'] == "3") { echo " SELECTED"; }?>>3.00% Weekly (Speculative / other)</option>
													</select>
												</label>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-xs-12">
												<label class="select -wide">
													<select name="fields[periods]" class="js-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
														<option value="2">2 Weeks</option>
														<option value="4">1 Month</option>
														<option value="12">3 Months</option>
														<option value="24">6 Months</option>
														<option value="52">1 Year</option>
														<option value="72" SELECTED>18 Months</option>
														<option value="104">2 Years</option>
														<option value="156">3 Years</option>
														<option value="208">4 Years</option>
														<option value="260">5 Years</option>
														<option value="520">10 Years</option>
													</select> Time <small>[ you wont be required to hold for this long ...]</small>
												</label>
											</div>
											<div class="col-md-6 col-xs-12">
												Compounding periods do matter!<br />
												<span style="font-size: 11px;">SwingFish uses calendar weeks to calculate interest.</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-9 col-xs-12">
												<div class="contact_form--submit">
													<button class="button -menu_size -waikawa_gray -bordered" type="submit" onclick="submit()"><span class="button--inner">Calculate now!</span></button>
												</div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-3" href="#collapseThree-3"<? if (!$havedata) { echo 'class="collapsed"'; }?>><i class="icon-list"></i>Results</a></h4>
						</div>
						<div id="collapseThree-3" class="panel-collapse collapse<? if ($havedata) { echo ' in'; } ?>">
							<div class="panel-body">
<?php
if ((isset($_REQUEST['fields']))&&(intval($_REQUEST['fields']['amount'])>0)) {

$i = 1; $amount = $baseamount = intval($_REQUEST['fields']['amount']);
$graph = "";
$graphcount = "";
$graphstraight = "";
$td = "";
$dago = ($_REQUEST['fields']['periods']*604800);

while ($i <= intval($_REQUEST['fields']['periods'])) {
    $amount = $amount*($_REQUEST['fields']['rate']/100)+$amount;
    $amountstraight = (((($baseamount/100)*$_REQUEST['fields']['rate'])*$i)+$baseamount);
	$gain = ((($amount-$baseamount)/$baseamount)*100);
	$graph = $graph . $amount . ", ";
	$graphcount = $graphcount . $i . ", ";
	$graphstraight = $graphstraight . $amountstraight.", ";

	if ((($i % 3 == 0)||($i == 1))&&($i < 32)||(($i == $_REQUEST['fields']['periods']))) {
		if (0 == $i % 2) {
			$td  .= '			<tr class="odd">';
		}
		else {
			$td .= '			<tr class="even">';
		}
		$td .= '					<td>'.$i.'</td>';
		$td .= '					<td>'.number_format($amount, 2, '.', ',').'</td>';
//		$td .= '					<td>'.number_format($amount-$baseamount, 2, ',', '').'</td>';
		$td .= '					<td>'.number_format($gain, 2, '.', ',').'%</td>';
		$td .= '				</tr>';
	}
	$i++;
}
?>
		<div class="row">
			<div class="col-md-5 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
				<div class="article--content">
					<table class="article--content table">
						<tr>
							<td width="125">Invested</td>
							<td><?=number_format($baseamount, 2, '.', ',')?></td>
						</tr>
						<tr>
							<td>Rate</td>
							<td><strong><?=number_format($_REQUEST['fields']['rate'], 3, '.', ',')?>%</strong></td>
						</tr>
						<tr>
							<td>Time</td>
<? /*							<td><strong><?=trim(str_replace("away", '', HumanAgo(time()+$dago+504800)))?></strong></td>
	*/ ?>
							<td><strong><?=trim(intval($_REQUEST['fields']['periods']))?> Weeks</strong></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td></td>
						</tr>
						<tr>
							<td><strong>Return</strong></td>
							<td><strong><font color="green"><?=number_format($amount, 2, '.', ',')?></font></strong></td>
						</tr>
						<tr>
							<td>Total Gain</td>
							<td><strong><font color="green"><?=number_format($gain, 3, '.', ',')?>% (<?=number_format($amount-$baseamount, 3, '.', ',')?>)</font></strong></td>
						</tr>
					</table>
					<div id="GrowthChart" style="width: 480px; height: 400px;"><!-- Plotly chart will be drawn inside this DIV --></div>
				</div>

			</div>
			<div class="col-md-5 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
				<div class="article--content">
					<table class="article--content table">
						<tbody>
							<tr>
								<th>Week</th>
								<th>Balance</th>
<?
//	echo'								<th>Profit</th>';

?>								<th>Gain</th>
							</tr>
<?
print($td);
?>						</tbody>
					</table>
				</div>
			</div>
<?
// chart lib: https://plot.ly/javascript/line-charts/#connect-gaps-between-data
?>			<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

  			<script>
    var Compounded = {
  x: [<?=rtrim($graphcount, ",")?>],
  y: [<?=rtrim($graph, ",")?>],
  line: {shape: 'spline'},
  name: 'Compounded',
  type: 'scatter'
};
var Standard = {
  x: [<?=rtrim($graphcount, ",")?>],
  y: [<?=rtrim($graphstraight, ",")?>],
  name: 'non-Compounded',
  type: 'scatter'
};
var data = [Compounded, Standard];
var layout = {
  title: 'Capital Compounded & non-Compounded',
  showlegend: false,
  xaxis: {
    title: 'Weeks',
    showgrid: false,
    zeroline: true
  },
  yaxis: {
    title: 'Capital',
    showline: false
  }
};
Plotly.newPlot('GrowthChart', data, layout);  </script>
		</div>
<?} else {
?><p>nothing to show, fill the form first ...</p>
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	if (!$havedata) {
		// placeholder to keep the footer down
	?>
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />
	&nbsp; <br />

<?php } ?></section>
							
