<?php

// download: https://drive.google.com/file/d/16s89aYWuLfPNNuYwQgd740TgImrBl7PW/view?usp=sharing

$readme = "https://drive.google.com/uc?export=download&id=1729-GUbQ8CFArCrzV6uSOk2FOElzRQSU";
$app = "stop-syncer";

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
}
?>    <!-- Page Title -->
    <!--Add modifier class : "pt-fullwidth" to stretch page title and make it occupy 100% of the page width. -->
    <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title swingfish">
              <h1>Stop Syncer</h1>
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
        <div class="col-lg-6 col-md-6 space-bottom-2x">
			<div class="embed-responsive embed-responsive-16by9">
                <img src="/assets/tools/stop-syncer/StopSyncer2.png?v=<?php echo get_AppVersion($app); ?>">
			</div>
		</div><!-- .col-lg-5.col-md-6 -->
        <div class="col-lg-6 col-md-6 space-bottom-2x">
          <div class="shop-meta space-bottom-2x">
             <span>
              <i class="icon-ribbon hidden-md"></i> for cTrader > 3.2
              <span class="badge">App Version <?php echo get_AppVersion($app); ?></span>
            </span>
          </div>
		  <p>Stop-Syncer is a cTrader algo Helper,<br />
		  designed to update multiple positions with just one click.<br />
		  setting TP SL or Dynamic actions for TP or SL, Trailing stop on fixed value or dynamic Average price.
		  </p>
		  <div class="shop-tools">
			  <button class="btn btn-success" data-toggle="modal" data-target="#downloadmd">Download</button>
			  <!-- Modal -->
			  <div class="modal fade" id="downloadmd" tabindex="-1" role="dialog">
				  <div class="modal-dialog">
					  <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <div class="modal-content text-center">
						  <h4>Download Stop Syncer</h4>
						  <div class="modal-body">
							  <p>Stop Syncer is not available for public download, its designed for friends and members of the SwingFish Community.</p>
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
				  <li class="active"><a href="#features" role="tab" data-toggle="tab">Features</a></li>
				  <li><a href="#settings" role="tab" data-toggle="tab">Settings Description</a></li>
				  <li><a href="#log" role="tab" data-toggle="tab">Change-log</a></li>
			  </ul><!-- .nav-tabs -->
			  <!-- Tab panes -->
			  <div class="tab-content">
				  <div role="tabpanel" class="tab-pane transition fade in active" id="features">
					  <div class="row">
							  <span class="text-bold">Reset all Orders on the Same Symbol</span>
							  <p class="text-gray">auto apply SL and TP to ALL Positions on the same Symbol.
								  <br>
								  <a class="btn" href="#settings" role="tab" data-toggle="tab">Usage details</a>
							  </p>
					</div>
				</div>
            <div role="tabpanel" class="tab-pane transition fade" id="settings">
              <h4>Settings &amp; usage Description</h4>
										<div class="row">
											<div class="col-md-8">
												<ul class="list-icons">
													<li><i class="pr-10 glyphicon"></i><b>Action Price</b><br />
														will auto decide to use SL or TP.<br />
														if Buy position & Price is higher than given value = SL<br />
														if Buy position & Price is lower than given value = TP<br />
													</li>
													<li><i class="pr-10 glyphicon"></i><b>Use AVG</b><br />
														use Average Price for TP or SL instead of Action price.
													</li>
													<li><i class="pr-10 glyphicon"></i><b>TSL</b><br />
														enable Trailing Stop from given price (works with Action Price and with hard-set SL)
													</li>
													<li><i class="pr-10 glyphicon"></i><b>Stop Loss & Take Profit</b><br />
														hard set to apply fixed values to all positions.
													</li>


												</ul>
											</div>
											<div class="col-md-4">
												<p><img align="center" src="/assets/tools/stop-syncer/stop-syncer2_settings.png?v=<?php echo get_AppVersion($app); ?>" title="SwingFish Stop Syncer 2 Settings" alt="SwingFish Stop Syncer S2 ettings"></p>
												<div class="separator-2"></div>
												<p><small>Settings allow the location to be set on the Chart</small>
<!-- <small>in order to access cTrader's UI, StopSyncer needs System access.<br />
												we will not collect any data, or send anything to our Servers.</small><br />
												<img align="center" src="/assets/tools/swingfish-helper/swingfish-helper-fullaccess.png?v=<?php echo get_AppVersion($app); ?>" alt="SwingFish Helper access request"> --></p>
												
											</div>
										</div>
            </div>
            <div role="tabpanel" class="tab-pane transition fade" id="log">
              <h4>Detailed Change log</h4>
              <div class="row">
				  <? echo "<pre>"; print(file_get_contents($cachefile)); echo "</pre>";?>
              </div>
            </div>
          </div><!-- .tab-content -->
        </div><!-- .col-sm-6 -->
      </div><!-- .row -->
    </section><!-- .shop-single -->
