<?php

$funds = json_decode(file_get_contents('http://enfoid.com/api/c/fundstats.json'));
?><section class="main-container">
	<div class="container">
		<div class="row">
			<div class="main col-md-12">
				<h1 class="page-title swingfish">Our Risk-free Offer</h1>
				<h3>There is no such thing as "risk-free" in trading!</h3>
				<p>SwingFish does experience losses too! This is just a normal part of trading, regardless of what and how you trade. Anyone offering a product that promises you incredible gains without any risk exposure by directly trading Your assets on any market is very likely not being entirely honest with you.</p>
				<hr />
				<h4>So what is different with us?</h4>
				<p><strong><u>SwingFish does NOT engage in portfolio management and/or the trade of any funds in your (or any other 3rd party) name.</u></strong></p>
				<p>SwingFish trades exclusively with funds provided by <a href="/about-enfoid">EnFoid</a>, like the day-trading activities shown on our livestreams and the Log entries in the Blogs.<br />
				there is NO legal connection to any clients at all. If losses do occur, they are simply dealt with between SwingFish and EnFoid internally.</p>
				<p>Funds provided by you are legally classified as a loan granted to EnFoid, which is not used for trading directly, but instead go into the EnFoid Security Fund. The larger this fund, the more equity is available for use by SwingFish</p>
				<p>EnFoid owns fixed assets such as real estate and long-term holdings, which are placed with financial institutions as collateral. With the funds lent by you, we can in effect make these assets temporarily "liquid" for immediate use.</p>

				<p>For this privilege, <strong>EnFoid Pte. Ltd. pays you an effective interest rate of 9.55% p.a.</strong> There is also a performance dividend, which is variable and depends on weekly performance.</p>

				<p>In the event of a default and/or failure of delivery, the same assets are used to fulfil the guarantee and return the funds lent.</p>

				<p>Thanks to this construct, EnFoid can offer this product to you <strong>truly risk-free</strong> to ensure your capital grows with safe gains within a protected environment.</p>

<?
	// <p align="right"><iframe src="https://www.investmentnetwork.sg/embed/795081/468x60" width="468" height="60" frameborder="0"><p>Your browser does not support iframe</p></iframe></p>
?>				<div class="vertical hc-tabs">
					<h2 class="swingfish" align="center">Quick Facts &amp; FAQs</h2>
					<div class="arrow hidden-sm hidden-xs"><i class="fa fa-caret-up"></i></div>
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#hctab1" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-life-saver pr-10"></i> Our responsibility</a></li>
						<li class=""><a href="#hctab2" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-expand pr-10"></i> How much does this cost?</a></li>
						<li class=""><a href="#hctab3" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-magic pr-10"></i> What is the minimum amount?</a></li>
						<li class=""><a href="#hctab4" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-file-o pr-10"></i> By the numbers...</a></li>
						<li class=""><a href="#hctab5" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-magic pr-10"></i> When can I withdraw?</a></li>
						<li class=""><a href="#hctab6" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-magic pr-10"></i> Do you really guarantee returns?</a></li>
						<li class=""><a href="#hctab7" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-magic pr-10"></i> The bottom line</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="hctab1">
							<h3 class="text-center title">Our responsibility</h3>
							<p>...is to protect you from typical financial issues or failures.</p>

							<p>This product <strong>is a loan</strong> with flexible rates starting from at least 9.55%, and in the case of gains, as high as 21.9%. (Effective yield for comparison: 9.55%) This provides a basis for calculating earnings that can be expected from Day 1.</p>
						</div>
						<div class="tab-pane fade" id="hctab2">
							<h3 class="text-center title">How much does this cost?</h3>
							<ul class="list-icons">
								<li><i class="icon-check pr-10"></i><strong>This costs you NOTHING!</strong></li>
								<li><i class="icon-check pr-10"></i> Bank fees (inbound transfers) will also be covered (not exceeding 1.5%), meaning the calculation of interest will start at 100% of the original amount transferred.</li>
								<li><i class="icon-check pr-10"></i> You will, however, be responsible for third-party costs, like taxes and exchange rates.</li>
								<li><i class="icon-check pr-10"></i> Gains in excess of 0.35% weekly will be used to cover future losses and expenses.</li>
							</ul>
						</div>
						<div class="tab-pane fade" id="hctab3">
							<h3 class="text-center title">What is the minimum amount I can invest?</h3>
							<ul class="list-icons">
								<li><i class="icon-check pr-10"></i> First of all: <strong>this is NOT an investment!</strong></li>
								<li><i class="icon-check pr-10"></i> Legally, you are extending credit to EnFoid Pte. Ltd. with interests calculated on a weekly basis.</li>
								<li><i class="icon-check pr-10"></i> There is no minimum amount required! (Even US$50 will suffice.)</li>
								<li><i class="icon-check pr-10"></i> 100% of your capital is protected and will be paid back in full.</li>
								<li><i class="icon-check pr-10"></i> The maximum amount, however, is limited to the amount of funds held and available in the reserved <a href="<?=URL?>backed-funds">Security Fund</a>.</li>
								<li><i class="icon-check pr-10"></i> <?php
									if ($Coverstats['newsize'] < 1000) {
														echo '<font color="red">We cannot take on any new protected accounts at present.</font>';
													}
													else {
														echo '<font color="green">As of now, the largest loan possible is <strong>US$'.number_format(round($funds->newsize, -3)).'.</font></strong>';
													}
													?> <a href="/backed-funds">More details</a></li>

							</ul>
							<a href="<?php echo URL; ?>backed-funds" class="btn btn-default">Read more</a>
						</div>
						<div class="tab-pane fade" id="hctab4">
							<h3 class="text-center title">By the numbers...</h3>
							<ul class="list-icons">
								<li><i class="icon-check pr-10"></i> * <strong><?=HtmlToolTip('A WEEKLY GAIN OF 0.175% IS GUARANTEED','sound small?<br />0.175*52= 9.1% in one year')?></strong></li>
								<li><i class="icon-check pr-10"></i> Compare our effective return of <strong><font color="green">9.55% p.a.</font></strong> to competing products. <font size="0.9em">(Effective returns must be expressly stated by law.)</font></li>
								<li><i class="icon-check pr-10"></i> However, typical weekly gains paid are 0.26-0.35%.</li>
								<li><i class="icon-check pr-10"></i> 100% of your capital is protected and will be paid back in full.</li>
								<li><i class="icon-check pr-10"></i> Gains exceeding 0.35% weekly will be used to protect against future losses.</li>
							</ul>
						</div>
						<div class="tab-pane fade" id="hctab5">
							<h3 class="text-center title">When can I withdraw</h3>
							<p>You can request a withdrawal at any time, but before the markets close for the weekend. We calculate earnings and performance for the week prior while the markets are closed, then process your request and deduct from your account at the same time.</p>
							<p>also: All plans can be canceled 14 days before end of the month. We will simply use the last balance and profit calculation as of the last weekend, then pay you all earnings as well as your principal amount. Unless otherwise agreed, there is no commitment period longer than one month.</p>
						</div>
						<div class="tab-pane fade" id="hctab6">
							<h3 class="text-center title">Do you really guarantee returns of 9.55%?</h3>
							<p>We calculate earnings on a weekly basis, which means there will be 52 summaries made during the whole year, not just one at the end of the year. Weekly gains are set at a guaranteed return of at least 0.175%. In case of a gain, this can go as high as 0.35%. By simply multiplying 0.175 by 52, we arrive at a return of 9.1%. Adding the compounding factor 52 times pushes you over the 9.55% value (excluding withdrawals or additional dividends paid to you).</p>
						</div>
						<div class="tab-pane fade" id="hctab7">
							<h3 class="text-center title">The bottom line</h3>
							<p>Your money is NOT subject to any actions of a speculative nature, and will be treated legally as a loan. This makes us a Juristic Person and personally liable in the case of losses.</p>
							<a href="<?php echo URL; ?>backed-funds" class="btn btn-default">Read more</a>
						</div>




					</div>
				</div>
			</div>
		</div>




<?php
	/*

		TO DO !!



<?php include_once 'lib/3rd/twitter/functions.php'; ?>
							<div class="col-md-3">
								<div class="service_sidebar">
									<div class="widget -iconless">
										<h2 class="widget--title">More Details
										</h2>
										<ul class="widget_solutions">
											<li><a href="<?=URL?>backed-funds"><i class="icons8-currency-exchange"></i><span>Transparency</span></a></li>
											<li><a href="<?=URL?>calculate-compounded-earnings"><i class="icons8-coins"></i><span>Earnings</span></a></li>
										</ul>
									</div>
									<div class="widget -iconless">
										<h2 class="widget--title">Latest Tweets
										</h2>
										<div class="widget_twitter">
											<i class="icons8-twitter"></i>
											<div class="widget_twitter--slider widget_slider js-widget_slider">
												<?php get_twitts( 'nullx8', 5, 'widget' ); ?>
											</div>
										</div>
									</div>
									<div class="widget -iconless">
										<h2 class="widget--title">Support
										</h2>
										<div class="widget_support">
											<div class="widget_support--person">
												<figure class="widget_support--person_userpic"><img src="./assets/images/content/avatar/nullx8.jpg" alt=""></figure><strong class="widget_support--person_name">Mario Hennenberger</strong><strong class="widget_support--person_position">Trader Support</strong>
											</div>
											<p class="widget_support--text">
												For immediate assistance,<br />email or call us

												<br>
												<strong><a href="tel:+6531590589">+65 31 59 0589</a></strong><br />
												<strong><a href="tel:+6531590589">+49 621 180 69680</a></strong><br />
												<strong><a href="mailto:mario@swingfish.trade">mario@swingfish.trade</a></strong>

											</p>
										</div>
									</div>
								</div>
									<div class="widget -iconless">
										<h2 class="widget--title">Terms
										</h2>
										<div class="widget_brochure">
											<p class="widget_brochure--text">
												To ensure no misunderstandings between traders, yourself and SwingFish, below are the terms you need to read and accept.
											</p><a href="#" class="link_download -pdf">Risk-free Terms</a>
										</div>
									</div>
							</div>
							</div>
						<div class="row">
*/

?>
		<div class="row">
			<div class="col-md-12">
				<h2 class="page-title swingfish">Compare Some Other Products</h2>
				<table class="table table-hover">
					<tbody>
						<tr>
							<th></th>
							<th class="views">SwingFish</th>
							<th>Bank Account</th>
							<th>Trade Yourself</th>
							<th>Self Investment</th>
							<th>401(k) (Retirement Plan)</th>
						</tr>
						<tr class="odd">
							<td>Interest</td>
							<td>9.55 to <strong>21.9%</strong></td>
							<td>0.06 - 1% [<a target="_blank" href="http://money.cnn.com/2013/10/01/pf/savings-account-yields/index.html">info</a>]</td>
							<td>0-40%</td>
							<td>~7% [<a target="_blank" href="https://www.thesimpledollar.com/where-does-7-come-from-when-it-comes-to-long-term-stock-returns/">info</a>]</td>
							<td>5% to 8%</td>
						</tr>
						<tr class="even">
							<td>Term</td>
							<td>1 week</td>
							<td>Anytime</td>
							<td>Anytime</td>
							<td>Months</td>
							<td>Years [<a target="_blank" href="https://www.fidelity.com/viewpoints/retirement/cashing-out">penalties</a>]</td>
						</tr>
							<tr class="odd">
							<td>Funds at Risk</td>
							<td>No Risk</td>
							<td>No Risk</td>
							<td>100% or more</td>
							<td>100% or more</td>
							<td>Some</td>
						</tr>
						<tr class="even">
							<td>Guaranteed Returns</td>
							<td>9.55%</td>
							<td>0.5%</td>
							<td>None</td>
							<td>None</td>
							<td>~</td>
						</tr>
						<tr class="odd">
							<td>Compounding</td>
							<td>52 times</strong></td>
							<td>Once</td>
							<td>~</td>
							<td>~</td>
							<td>Once</td>
						</tr>
					</tbody>
				</table>
				<blockquote>
					<cite>Data for comparision is collected from various sources and may vary in different countries</cite>
				</blockquote>
			</div>
		</div>
	</div>
</section>
