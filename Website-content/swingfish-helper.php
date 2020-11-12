<?php

// download: https://drive.google.com/file/d/16s89aYWuLfPNNuYwQgd740TgImrBl7PW/view?usp=sharing

//$readme = "https://drive.google.com/uc?export=download&id=16mz2uLi08Jol8pm3CaA61KmGqMc0YKIb";
$readme = "https://swingfish.trade/assets/downloads/SwingFish_Helper/README.md";

$app = "swingfish-helper";

$now = (int)time();
//$cachetime = (int)86400; // 86400
$cachetime = (int)1; // 86400
$cachefile = CACHE."/app_".$app.".readme.txt";

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
	syslog(LOG_INFO,"content: ".$app." Readme ".$cachetime);
	$data= file_get_contents($readme);
	if (strlen($data)>10) {
		// not cache empty results
		unlink($cachefile);
		file_put_contents($cachefile, $data);
		$version = file($cachefile);
		file_put_contents(CACHE.'/app_'.$app.'.version.txt', trim($version[0]));
	}
}
?>    <!-- Page Title -->
    <!--Add modifier class : "pt-fullwidth" to stretch page title and make it occupy 100% of the page width. -->
    <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title swingfish">
              <h1>SwingFish Helper</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
            <div class="breadcrumbs">
              <a href="/tools">Tools</a>
              <span class="delimiter"><i class="icon-arrow-right"></i></span>
              <span>Algos</span>
            </div><!-- .breadcrumbs -->
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->

    <!-- Single Product -->
    <section class="shop-single container">
      <div class="row">
        <div class="col-lg-5 col-md-6 space-bottom-2x">
          <!-- Shop Image Carousel -->
          <!-- Data API:
            data-loop="true/false" enable/disable looping
            data-autoplay="true/false" enable/disable carousel autoplay
            data-interval="3000" autoplay interval timeout in miliseconds
            data-autoheight="true/false" enable/disable autoheight with transition
            Simply add necessary data attribute to the ".image-carousel" with appropriate value to adjust carousel functionality.
           -->
          <div class="image-carousel">
            <div class="inner">
              <img src="/assets/tools/swingfish-helper/SwingFish-Helper-positive-timeclose-hedge.png?v=<?php echo get_AppVersion($app); ?>" title="SwingFish Helper Time Close and auto hedge active" alt="SwingFish Helper Time Close and auto hedge active">
              <img src="/assets/tools/swingfish-helper/SwingFish-Helper-settings-explained.png?v=<?php echo get_AppVersion($app); ?>" title="SwingFish Helper Settings and Status" alt="SwingFish Helper Settings and Status">
              <img src="/assets/tools/swingfish-helper/SwingFish-Helper-negative.png?v=<?php echo get_AppVersion($app); ?>" title="SwingFish Helper show Position and equity loss" alt="SwingFish Helper  show Position and equity loss">
              <img src="/assets/tools/swingfish-helper/SwingFish-Helper-positive.png?v=<?php echo get_AppVersion($app); ?>" title="SwingFish Helper show Position and equity gain" alt="SwingFish Helper  show Position and equity gain">
            </div>
          </div><!-- .image-carousel -->
        </div><!-- .col-lg-5.col-md-6 -->
        <div class="col-lg-7 col-md-6 space-bottom-2x">
          <div class="shop-meta space-bottom-2x">
             <span>
              <i class="icon-ribbon hidden-md"></i> for cTrader > 2.0
              <span class="badge">App Version <?php echo get_AppVersion($app); ?></span>
            </span>
          </div>
		  <p>SwingFish Helper is a cTrader algo, that helps you protect yourself from drawdown by hedging positions and sets of positions.</p>
		  <p>once the Drawdown set is reached for a single Symbol, SwingFish Helper will buy the same size in the opposite direction in order to protect You.</p>
		  <div class="shop-tools">
			  <button class="btn btn-success" data-toggle="modal" data-target="#downloadmd">Download</button>
			  <!-- Modal -->
			  <div class="modal fade" id="downloadmd" tabindex="-1" role="dialog">
				  <div class="modal-dialog">
					  <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <div class="modal-content text-center">
						  <h4>Download SwingFish Helper</h4>
						  <div class="modal-body">
							  <p>SwingFish Helper is not available for public download, its designed for friends and members of the SwingFish Community.</p>
							 </div>
						<div class="modal-footer">
							<a href="/members/downloads" class="btn btn-sm btn-success">Download Here</a>
							<a href="/chat" class="btn btn-sm btn-info">ask in chat</a>
						</div>
					</div><!-- .modal-content -->
				</div><!-- .modal-dialog -->
			</div><!-- .modal.fade -->
			<span class="text-lg"> Free</span>
		</div>
<?
/*          <div class="post-tools space-top">
            <div class="column">
              <div class="tags-links">
                <a href="#">Smartwatch</a>
                <a href="#">Wearables</a>
              </div>
            </div><!-- .column -->
            <div class="column">
              <div class="social-bar">
                <a href="#" class="sb-skype" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                  <i class="fa fa-skype"></i>
                </a>
                <a href="#" class="sb-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="sb-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                  <i class="fa fa-twitter"></i>
                </a>
              </div><!-- .social-bar -->
            </div><!-- .column -->
          </div>
        </div><!-- .col-lg-7.col-md-6 -->
*/
?>
      </div><!-- .row -->
	  <div class="row padding-top">
		  <div class="col-sm-12 space-bottom">
			  <!-- Nav Tabs -->
			  <ul class="nav-tabs" role="tablist">
				  <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Features</a></li>
				  <li><a href="#tab2" role="tab" data-toggle="tab">Settings Description</a></li>
				  <li><a href="#tab3" role="tab" data-toggle="tab">Changelog</a></li>
			  </ul><!-- .nav-tabs -->
			  <!-- Tab panes -->
			  <div class="tab-content">
				  <div role="tabpanel" class="tab-pane transition fade in active" id="tab1">
					  <div class="row">
						  <div class="col-sm-6 padding-top-2x">
							  <span class="text-bold">Auto Hedge</span>
							  <p class="text-gray">auto-Hedge all positions combined of a single symbol.</p>
							  <span class="text-bold">Cash Targets</span>
							  <p class="text-gray">Close ALL Trades based on a given financial target.</p>
							  <span class="text-bold">Time Targets</span>
							  <p class="text-gray">Close ALL Trades based on a given Time of the day.</p>
							  <span class="text-bold">Custom Margin call</span>
							  <p class="text-gray">Auto-close all positions once a global Loss has been reached.</p>
							  <span class="text-bold">Realtime Position informations</span>
							  <p class="text-gray">Realtime Display of current Profit/loss in Percentages. for (Equity/Account Balance/Relative Capital)</p>
						 </div>
						 <div class="col-sm-6 padding-top-2x">
							 <div class="row text-center">
								<div class="col-sm-4 col-xs-6 padding-bottom">
									<p class="space-bottom-none">Auto Hedging</p>
									<img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/22.png" class="block-center" alt="Feature">
								</div>
								 <div class="col-sm-4 col-xs-6 padding-bottom">
									 <p class="space-bottom-none">Position informations</p>
									 <img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/18.png" class="block-center" alt="Feature">
								 </div>
								 <div class="col-sm-4 col-xs-6 padding-bottom">
									 <p class="space-bottom-none">Time Targets</p>
									 <img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/17.png" class="block-center" alt="Feature">
								 </div>
								 <div class="col-sm-4 col-xs-6 padding-bottom">
									 <p class="space-bottom-none">Cash Targets</p>
									 <img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/19.png" class="block-center" alt="Feature">
								</div>
								<div class="col-sm-4 col-xs-6 padding-bottom">
									<p class="space-bottom-none">Margin call</p>
									<img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/20.png" class="block-center" alt="Feature">
								</div>
							</div>
						</div><!-- .col-sm-6 -->
					</div>
				</div>
            <div role="tabpanel" class="tab-pane transition fade" id="tab2">
              <h4>Settings &amp; usage Description</h4>
										<div class="row">
											<div class="col-md-8">
												<ul class="list-icons">
<?
/*
													<li><i class="pr-10 glyphicon glyphicon-remove-circle"></i><b>Current capital</b><br />
														<strike>No Calculative Function (additional Capital value for later use)</strike>
													</li>
*/
?>													<li><i class="pr-10 glyphicon glyphicon-pencil"></i><b>Day Start Balance</b><br />
														This is your starting balance of the day, Calculations will be based on this value.<br />
														<small><i>if this is not set, SwingFish-Helper will try to get the starting balance of the day automatically.</i></small>
													</li>


													<li><i class="pr-10 glyphicon glyphicon-check"></i><b>Hedge Active</b><br />
														Enable/Disable Hedging Features.
													</li>

													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>Hedge max loss (%)</b><br />
														The bot will automatically start a hedge at “X%” loss covering all positions in the same Symbol.
													</li>
													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>Margin call</b><br />
														This is a Hard set “no questions asked drawdown level” in percentages (%)<br />
														If that level is reached the bot will close All positions on the account.<br />
														<small>(active even when Hedging is turned off, to disable set it to 0)</small>
													</li>

												<div class="separator-2"></div>

													<div class="alert alert-danger" role="alert"><strong>Warning!</strong> the TP (Take Profit) Features are for <strong>TEMPORARY use only!</strong><br />you should NEVER TRADE THE MONEY!<br></div>

													<li><i class="pr-10 glyphicon glyphicon-check"></i><b>TP Active</b><br />
														Enable/Disable Take-Profit Features.
													</li>
													<li><i class="pr-10 glyphicon glyphicon-check"></i><b>Stop TP after</b><br />
														this will Turn Off the TP-Features (set TP Active to false), once it has been triggered once,<br />
														leaving all other protection Features active but not take profits anymore.
														<blockquote><small>This is done to avoid stuff like:
															You have set TP equity to 100. Your equity reaches 100 and the bot auto takes profit but you have the Stop TP after parameter on off. When you enter another trade, the bot would instantly close the new position because the equity is higher. So, if you have a TP on equity active this parameter should be set to “yes”.</small></blockquote>

													</li>
													
													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>TP equity</b><br />
														to be set with a <strong>cash value</strong> for the ending balance you expecting (not %)!<br />
														once the amount you enter is reached, it will close ALL trades on the account.<br />
													</li>
													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>TP profit</b><br />
														to be set with a <strong>cash value</strong> for the profit you expecting on all trades combined (not %)<br />
														<blockquote><small>Example: account balance 100 dollar with the bot active. TP profit set to 10. 
If you open a trade and your equity reached 110 it will close ALL trades on the account.</small></blockquote>
														<small><strong>If this parameter is active it will have a higher priority than TP equity has, Ignoring the TP Equity parameter entirely.</strong></small>
													</li>
													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>TP Hour</b><br />
														Is a time close (Local time Hours) Meaning if TP active is set to “Yes” it will close ALL trades on the account once the time is reached.<br />
														<blockquote><small>If a TP equity is active at the same time and that target gets reached the TP equity parameter rules apply. (which ever comes first)</small></blockquote>

													</li>
													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>TP Minute</b><br />
														same as <i>Close Hour</i> for the Minutes<br />
														<blockquote>Example: Set Close Hours to 15 and Close Minute to 10,<br />
														ALL Trades will be closed at 15:10 (local Time) regardless of the Profit/Loss at the given time.</blockquote>
													</li>

												<div class="separator-2"></div>

													<li><i class="pr-10 glyphicon glyphicon-check"></i><b>Fast mode</b><br />
														If active equity &amp; drawdown check and recheck will happen every 100ms, regardless of prices have moved or not.<br />
														If turned Off the check will happen only once the next Price information arrives. (per-tick).<br />
														<blockquote><small>note that this can cause some high CPU consumption, if you run SwingFish-Helper multiple times, only one instance should run in Fast Mode.</small></blockquote>
													</li>
													<li><i class="pr-10 glyphicon glyphicon-check"></i><b>Play Order Sounds</b><br />
														Plays a Sound once Orders or Hedges are executed
													</li>
												</ul>
											</div>
											<div class="col-md-4">
												<p><img align="center" src="/assets/tools/swingfish-helper/SwingFish-Helper-settings.png?v=<?php echo get_AppVersion($app); ?>" alt="SwingFish Helper cAlgo Settings"></p>
												<div class="separator-2"></div>
												<p><small>in order to Play Sounds, write logs and check for updates, SwingFish Helper will need Internet and FileSystem access, thats why you may asked for Full-Access Permission.<br />
												we will not collect any data, or send anything to our Servers.</small><br />
												<img align="center" src="/assets/tools/swingfish-helper/swingfish-helper-fullaccess.png?v=<?php echo get_AppVersion($app); ?>" alt="SwingFish Helper access request"></p>
												
											</div>
										</div>
            </div>
            <div role="tabpanel" class="tab-pane transition fade" id="tab3">
              <h4>Detailed Change log</h4>
              <div class="row">
				  <? echo "<pre>"; print(file_get_contents($cachefile)); echo "</pre>";?>
              </div>
            </div>
          </div><!-- .tab-content -->
        </div><!-- .col-sm-6 -->
      </div><!-- .row -->
    </section><!-- .shop-single -->
