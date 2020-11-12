<?php

// download: https://drive.google.com/file/d/16s89aYWuLfPNNuYwQgd740TgImrBl7PW/view?usp=sharing

$readme = "https://drive.google.com/uc?export=download&id=1zzoBAy5w9Qs9QsuTBY69l_0KPHPRj5tZ";
$app = "tl-trader";

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
              <h1>TL-Trader</h1>
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
                <iframe src="https://www.youtube.com/embed/2cTFehTfTV8?rel=0&amp;showinfo=0" width="640" height="360"></iframe>
			</div>
		</div><!-- .col-lg-5.col-md-6 -->
        <div class="col-lg-6 col-md-6 space-bottom-2x">
          <div class="shop-meta space-bottom-2x">
             <span>
              <i class="icon-ribbon hidden-md"></i> for cTrader > 3.01
              <span class="badge">App Version <?php echo get_AppVersion($app); ?></span>
            </span>
          </div>
		  <p>TL-Trader is a cTrader algo, that allow to "take profit" based on Trend-lines manually drawn by the Trader.it will also be able to places Trades on an opposite sides of the drawn Trend-line (like Limit orders).</p>
		  <div class="shop-tools">
			  <button class="btn btn-success" data-toggle="modal" data-target="#downloadmd">Download</button>
			  <!-- Modal -->
			  <div class="modal fade" id="downloadmd" tabindex="-1" role="dialog">
				  <div class="modal-dialog">
					  <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <div class="modal-content text-center">
						  <h4>Download TL-Trader</h4>
						  <div class="modal-body">
							  <p>TL Trader is not available for public download, its designed for friends and members of the SwingFish Community.</p>
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
						  <span class="text-bold">Placing Buy/Sell orders</span>
						  <p class="text-gray">Place orders based on Trend-line set via Key Combination.</p>
						  <span class="text-bold">Take Profit (close orders)</span>
						  <p class="text-gray">Take Profit based on Trend-line set via Key Combination.</p>
					</div>
				</div>
            <div role="tabpanel" class="tab-pane transition fade" id="tab2">
              <h4>Settings &amp; usage Description</h4>
										<div class="row">
<h4>Settings and proeceedures are still constantly changing due to your valuable inputs!</h4>
<h6>the development state is still in <strong>BETA</strong>!</h6>
<p>please refer to the attached description with the distribuatable,<br />after the Public release, here will be a better settings decription.</p>
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
