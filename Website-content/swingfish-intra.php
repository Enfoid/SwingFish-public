<?php

// download: https://drive.google.com/file/d/16snQO4EZRz8mZWRIsDE8emLoRvssQyTT/view?usp=sharing

$readme = "https://drive.google.com/uc?export=download&id=1uOmKEtQ-BhS4CGhh1IMCWQjc_9I-MoiA";
$app = "swingfish-intra";

$now = (int)time();
$cachetime = (int)86400; // 86400
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
}?>    <!-- Page Title -->
    <!--Add modifier class : "pt-fullwidth" to stretch page title and make it occupy 100% of the page width. -->
    <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title swingfish">
              <h1>SwingFish Intra [vWap &amp; Tools]</h1>
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
              <img src="/assets/tools/swingfish-intra/swingfish-intra-indicator-forex-open-position.png?v=1<?php echo get_AppVersion($app); ?>" title="SwingFish Intra vWap Indicator with Buy Position" alt="SwingFish Intra vWap Indicator with Buy Position">
              <img src="/assets/tools/swingfish-intra/swingfish-intra-with-vwap-histogram.png?v=1<?php echo get_AppVersion($app); ?>" title="SwingFish Intra vWap Indicator with histogram" alt="SwingFish Intra vWap Indicator with histogram">
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
		  <p>SwingFish Intra is a Intraday/Day-trader/Scalper Suite that provides all in one Indicator.</p>
		  <div class="shop-tools">
			  <button class="btn btn-success" data-toggle="modal" data-target="#downloadmd">Download</button>
			  <!-- Modal -->
			  <div class="modal fade" id="downloadmd" tabindex="-1" role="dialog">
				  <div class="modal-dialog">
					  <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <div class="modal-content text-center">
						  <h4>Download SwingFish Intra</h4>
						  <div class="modal-body">
							  <p>SwingFish Intra is not available for public download, its designed for friends and members of the SwingFish Community.</p>
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
							  <span class="text-bold">vWap</span>
							  <p class="text-gray">vWap <a href="https://www.investopedia.com/terms/v/vwap.asp" target="_blank">more details about vWap @investopia</a></p>
							  <span class="text-bold">Deviation Indicator</span>
							  <p class="text-gray">Standard Deviation calculated based on vWap Pricing</p>
							  <span class="text-bold">Profit &amp; Loss Display</span>
							  <span class="text-bold">Volume Direction</span>
							  <p class="text-gray">calculated the realtime volume direction based on tick and/or Real Volume</p>
							  <span class="text-bold">Average Price</span>
							  <p class="text-gray">Calculates the average position price and displays it as a line</p>
							  <span class="text-bold">Position Size Indicator</span>
							  <p class="text-gray"></p>
							  <span class="text-bold">Symbol Label</span>
							  <p class="text-gray"></p>
					</div>
				</div>
            <div role="tabpanel" class="tab-pane transition fade" id="tab2">
              <h4>Settings &amp; usage Description</h4>
										<div class="row">
											<div class="col-md-8">
												<ul class="list-icons">
													<li><i class="pr-10 glyphicon glyphicon-pencil"></i><b>Show Symbol</b><br />
														Shows the current Symbol on the Chart.
													</li>
													<li><i class="pr-10 glyphicon glyphicon-check"></i><b>Show Direction</b><br />
														Shows "buying", "Selling", "Hedging"
													</li>

													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>Show vWap</b><br />
														Shows last 20 vWap Prices
													</li>
													<li><i class="pr-10 glyphicon glyphicon-edit"></i><b>Show wVap History</b><br />
														Shows a complete Histogram
													</li>


												</ul>
											</div>
											<div class="col-md-4">
												<p><img align="center" src="/assets/tools/swingfish-intra/swingfish-intra-settings.png?v=<?php echo get_AppVersion($app); ?>" title="SwingFish Intra vWap Indicator Settings" alt="SwingFish Intra vWap Indicator Settings"></p>
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
