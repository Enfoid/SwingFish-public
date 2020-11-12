<? if ($Youtube['live'] == 'true') { ?>
							<div class="video">
								<div class="video--content">
									<div class="slide_simple -backgroundless">
										<div class="slide_simple--container">
											<div class="container">
												<div class="col-sm-10 col-sm-offset-1">
													<h1 class="slide_simple--title">Live Trading in Progress!</h1>
													<p class="slide_simple--text">
														<strong><font color="yellow"><?=$Youtube['title']?></font></strong><br />
														<h3>This is not a recording! It's happening right NOW. Click "Trading LIVE" in the menu.</h3>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="video--background">
									<div class="video--background_placeholder" style="background-image: url(assets/images/swingfish/YoutubeLiveDefault.png)"></div>
									<div class="video--background_color"></div>
									<div data-video-youtube='{"videoId":"<?=$Youtube['videoId']?>"}' class="video--background_video"></div>
								</div>
							</div>
<? } ?>
					<section class="section">
					<div class="container">
<? if ($Youtube['live'] != 'true') { ?>
						<header class="section--header">
							<h2 class="section--title">An Online Trading Co-space for Everyone</h2>
							<p class="section--description">
							SwingFish brings traders and investors together for better results, safer returns, greater gains.
							</p>
						</header>
<? } ?>
						<div class="section--container">
								<div class="services">
									<div class="row">
										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-conference color_picton_blue"></i>
												<h3 class="service_item--title">United we trade</h3>
												<div class="service_item--text">
													<p>Live video, ideas, logs, experiences shared by anyone for anyone. All for free!</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>strategies" class="link -blue_light">Join the team...free!</a></footer>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-currency-exchange color_picton_blue"></i>
												<h3 class="service_item--title">We pay you interest</h3>
												<div class="service_item--text">
													<p>We do not manage funds. We pay you &ndash; no matter what! Not just words, but <strong>by contract</strong>.</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>risk-free" class="link -blue_light">Let's make money!</a></footer>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
											<div class="service_item -horizontal">
												<i class="service_item--icon icons8-umbrella color_picton_blue"></i>
												<h3 class="service_item--title"><span style="white-space: nowrap">Your money protected</span></h3>
												<div class="service_item--text">
													<p>External funds are used to protect your account.
													</p>
												</div>
												<footer class="service_item--footer"><a href="<?=URL?>backed-funds" class="link -blue_light">Tell me more</a></footer>
											</div>
										</div>

										<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
