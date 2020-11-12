<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<strong>Hey!</strong> as you may have noticed, we in the middle updating the webisite, there may be some layout issues we are still working on, please be partient,<br />we will fix this in the comming days, also adding a new backoffice for EnFoid Lenders with better reporting and more details
</div>
<?
function getppa($account) {
	$m = json_decode(@file_get_contents(ULOCAL."lib/3rd/myfxbook/GetMyfxbookStats.php?totals=include&id=".$account),true);
	if ((isset($m['raw']['monthly']))&&(intval($m['raw']['monthly']) >0)) {
		return "[".round(($m['raw']['monthly']*12),1)."%]";
	}
}
?><div class="section">
<div class="container">
						<header class="section--header">
							<h2 class="section--title">Which strategy best suits you?</h2>
							<p class="section--description">
								See our portofolio of practiced strategies below and how they play out in numbers.</p>
						</header>
						<div class="section--container">
							<div class="services_page">
								<div class="services">
									<div class="row">
<?
	/*										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-business color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>strategy/1000">The $1000 Challenge</a> <?=getppa(2256255)?></h3>
												<div class="service_item--text">
													<p><strong>LiveStream account</strong><br />
														Trading a small-sized account for more relatable results.
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategy/1000" class="link -blue_light">More details</a></footer>
											</div>
										</div>
*/
?>										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-business color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>strategy/yaser">Signals (chat)</a> <?=getppa(2267486)?></h3>
												<div class="service_item--text">
													<p><strong>Chatroom Trades</strong><br />
														Trading the Signals from out <a href="<?=URL?>blog/c/forex-cfd-analysis/">Blog</a> and <a href="<?=URL?>chat">Chatrooms</a>.
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategy/yaser" class="link -blue_light">More details</a></footer>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-currency-exchange color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>strategy/ub-noise">UB Noise</a> <?=getppa(2093870)?></h3>
												<div class="service_item--text">
													<p><strong>Automated "noise generator"</strong><br />
														Tiny random trades to keep things moving 24/5.
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategy/ub-noise" class="link -blue_light">More details</a></footer>
											</div>
										</div>

										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-training color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>strategy/1000">1000</a></h3>
												<div class="service_item--text">
													<p><strong>Trading Room</strong><br />our Live Trading Account.<br />&nbsp;</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategy/1000" class="link -blue_light">More details</a></footer>
											</div>
										</div>

										<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>

										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-reviewer color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>strategy/mfcrowd">mf Crowd</a> <?=getppa(1660620)?></h3>
												<div class="service_item--text">
													<p><strong>"Crowd trading" reinvented</strong><br />
														We pick and manage the traders, ensure funds are safe.
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategy/mfcrowd" class="link -blue_light">More details</a></footer>
											</div>
										</div>

										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-training color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>strategy/mmmcompound">MMM Compound</a> <?=getppa(1609364)?></h3>
												<div class="service_item--text">
													<p><strong>Demo account</strong><br />
														Provided purely for educational purposes, learn "How to Compound".
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategy/mmmcompound" class="link -blue_light">More details</a></footer>
											</div>
										</div>


										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal" style="background-color: #e9e9e9;">
												<i class="service_item--icon icons8-umbrella color_picton_blue"></i>
												<h3 class="service_item--title"><a href="<?=URL?>risk-free">SwingFish Traders</a></h3>
												<div class="service_item--text">
													<p><strong>Don't want the hassle?</strong><br />
														SwingFish can trade your accounts all for you.<br />
														<font color="red"><strong>Free and loss protected!</strong></font>
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>risk-free" class="link -blue_light">Show me how</a></footer>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
