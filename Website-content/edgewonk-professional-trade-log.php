<?php

$readme = "https://www.dropbox.com/s/eou9w2mbpxn6fza/readme.txt?dl=1";
$app = "edgewonk";

$now = (int)time();
$cachetime = (int)86400; // 86400
$cachefile = CACHE."/app_".$app.".txt";

function delete_first_line($filename) {
  $file = file($filename);
  $output = $file[0];
  unset($file[0]);
  file_put_contents($filename, $file);
  return $output;
}

if (file_exists($cachefile) && (filemtime($cachefile) > ($now-$cachetime))) {
	// file up to date 
	// do nothing, just load it and assign the array
}
else {
	syslog(LOG_INFO,"content: Swingfish Helper Readme ".$cachetime);
	$data= file_get_contents($readme);
	if (strlen($data)>10) {
		// not cache empty results
		unlink($cachefile);
		file_put_contents($cachefile, $data);
		$version = file($cachefile);
		file_put_contents(CACHE.'/app_'.$app.'.version.txt', $version[0]);
	}
}
?>			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title swingfish">SwingFish Helper<span class="badge">cTrader</span><span class="badge"><?php echo get_AppVersion($app); ?></span></h1>
							<div class="separator-2"></div>
							<!-- page-title end -->
							
							<div class="alert alert-warning" role="alert"><strong>Warning!</strong> this algo is for the cTrader Platfrom only !! it can NOT be used in Metatrader (MT4/MT5).<br /></div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<img src="/assets/tools/swingfish-helper/SwingFish-Helper-settings.png" alt="">
										</div>
										<div class="col-md-6">
											<button class="btn btn-default" data-toggle="modal" data-target="#myModal">Download</button>
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4 class="modal-title" id="myModalLabel">Download SwingFish Helper</h4>
														</div>
														<div class="modal-body">
															<p>SwingFish Helper is not avaiable for public download, its designed for friends and members of the SwingFish Community.</p>
															<p>just talk to the user <strong>SwingFish</strong> in the Chatroom to get the download link and some introduction on how to use it. no worries, it's free.</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
															<a href="/chat" class="btn btn-sm btn-default">ask in chat</a>
															<a href="/contact" class="btn btn-sm btn-default">send a email</a>
														</div>
													</div>
												</div>
											</div>
											<p>SwingFih Helper is a cTrader algo, that helps you protect yourself from drawdown by hedging positions and sets of positions.</p>
											<p>once the Drawdown set is reched for a single Symbol, SwingFish Helper will buy the same size in the oposite direction in order to protect You.</p>
										</div>
									</div>
									<div class="space hidden-md hidden-lg"></div>
								</div>
								<div class="col-md-6">
									<div class="owl-carousel content-slider-with-controls">
										<div class="overlay-container margin-top-clear">
											<img src="/assets/tools/swingfish-helper/SwingFish-Helper-settings-explained.png" alt="">
											<a href="/assets/tools/swingfish-helper/SwingFish-Helper-settings-explained.png" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
										</div>
										<div class="overlay-container margin-top-clear">
											<img src="/assets/tools/swingfish-helper/SwingFish-Helper-negative.png" alt="">
											<a href="/assets/tools/swingfish-helper/SwingFish-Helper-negative.png" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
										</div>
										<div class="overlay-container margin-top-clear">
											<img src="/assets/tools/swingfish-helper/SwingFish-Helper-positive.png" alt="">
											<a href="/assets/tools/swingfish-helper/SwingFish-Helper-positive.png" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
										</div>
										<div class="overlay-container margin-top-clear">
											<img src="/assets/tools/swingfish-helper/SwingFish-Helper-positive-timeclose-hedge.png" alt="">
											<a href="/assets/tools/swingfish-helper/SwingFish-Helper-positive-timeclose-hedge.png" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<ul class="list-icons">additinal features:
										<li class="object-non-visible" data-animation-effect="fadeInUpSmall"><i class="icon-check"></i> auto-Hedge all positions combined of a single symbol.</li>
										<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100"><i class="icon-check"></i> Close ALL Trades based on a given financial target. <i>[TP Equity / TP Profit]</i></li>
										<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100"><i class="icon-check"></i> Close ALL Trades based on a given Time of the day. <i>[Close Hour/Close Minute]</i></li>
										<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300"><i class="icon-check"></i> Auto-close all positions once a global Loss has been reached. <i>[Margin Call]</i></li>
										<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500"><i class="icon-check"></i> Realtime Display of current Profit/loss in Percentages. for (Equity/Account Balance/Relative Capital</li>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h2>Changelog &amp; Documentation</h2>
									<div class="separator-2"></div>
									<? echo "<pre>"; print(file_get_contents($cachefile)); echo "</pre>";?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>