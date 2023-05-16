<?php

$download= 'https://github.com/Enfoid/SwingFish-CommunityCode/raw/main/mql4/Prop%20Risk%20Calculator/Prop%20Risk.ex4';

$readme = "https://raw.githubusercontent.com/Enfoid/SwingFish-CommunityCode/main/mql4/Prop%20Risk%20Calculator/README.md";
$app = "prop-risk";

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
              <h1>Prop Trader Risk Indicator</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
            <div class="breadcrumbs">
              <a href="/tools">Tools</a>
              <span class="delimiter"><i class="icon-arrow-right"></i></span>
              <span>MT4</span>
            </div><!-- .breadcrumbs -->
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->

    <!-- Single Product -->
    <section class="shop-single container">
      <div class="row">
        <div class="col-lg-6 col-md-6 space-bottom-2x">
<!--			<div class="embed-responsive embed-responsive-16by9"> -->
			<div>
                <img height="462" src="https://raw.githubusercontent.com/Enfoid/SwingFish-CommunityCode/main/mql4/Prop%20Risk%20Calculator/prop-risk-indicator-screenshoot.jpg?v=<?php echo get_AppVersion($app); ?>">
			</div>
		</div><!-- .col-lg-5.col-md-6 -->
        <div class="col-lg-6 col-md-6 space-bottom-2x">
          <div class="shop-meta space-bottom-2x">
             <span>
              <i class="icon-ribbon hidden-md"></i> for MT4 > 608
              <span class="badge">App Version <?php echo get_AppVersion($app); ?></span>
            </span>
          </div>
		  <p>Prop Trader Risk Indicator is a very simple Metatrader 4 Indicator,<br />
		  designed to calculate and display the "next risk" in account currency.<br />
		  in combination with the <a href="https://www.earnforex.com/metatrader-expert-advisors/Position-Sizer/" target="_blank">EarnForex Position sizer</a>, makes this a safe way to never fail a challenge, and ensure long term trading without ever losing a challenge or live account.
		  </p>
		  <div class="shop-tools">
			  <button class="btn btn-success" data-toggle="modal" data-target="#downloadmd">Download</button>
			  <!-- Modal -->
			  <div class="modal fade" id="downloadmd" tabindex="-1" role="dialog">
				  <div class="modal-dialog">
					  <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <div class="modal-content text-center">
						  <h4>Download Risk Indicator</h4>
						  <div class="modal-body">
							  <p>Risk Indicator Source code is not available for public download, but you can download the compiled version, ready to use here.</p>
							 </div>
						<div class="modal-footer">
							<a href="<?=$download?>" class="btn btn-sm btn-success">Download ex4</a>
							<a href="/members/downloads" class="btn btn-sm btn-info">Source Code</a>
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
							  <span class="text-bold">display realtime Risk to be applied on the next position.</span>
							  <p class="text-gray">Min Equity and base balance used to calculate. in combination with risk parameters for both profits and base equity.
								  <br>
								  <a class="btn" href="#settings" role="tab" data-toggle="tab">Usage details</a>
							  </p>
					</div>
				</div>
            <div role="tabpanel" class="tab-pane transition fade" id="settings">
              <h4>Settings &amp; usage Description</h4>
										<div class="row">
											<div class="col-md-6">
												<ul class="list-icons">
													<li><i class="pr-10 glyphicon"></i><b>AccBaseBalance</b><br />
														Account size (used as base balance).
													</li>
													<li><i class="pr-10 glyphicon"></i><b>AccBaseLimit</b><br />
														Minimum Equity (below usually leads to failure)
													</li>
													<li><i class="pr-10 glyphicon"></i><b>RiskSplit</b><br />
														risk of Base Equity in Percentage (% of rest equity)<br />
														<i>10% is recommended</i>
													</li>
													<li><i class="pr-10 glyphicon"></i><b>RiskProfits</b><br />
														risk of Profits in Percentage (% of generated profits to risk).<br />
														<i>10-20% is recommended, (100% will add ALL profits to the risk)<br />
														if the account is in a loss, this setting will be ignored</i>
													</li>

												</ul><br />
<b>use example:</b>
<pre>
FTMO Challenge	100k
AccBaseBalance:	100000
AccBaseLimit:	90000
RiskSplit:	10
RiskProfits:	30

MFF Accelerated	25k
AccBaseBalance:	25000
AccBaseLimit:	23750
RiskSplit:	10
RiskProfits:	10
</pre>									  



											</div>
											<div class="col-md-6">
												<p><img align="center" src="https://raw.githubusercontent.com/Enfoid/SwingFish-CommunityCode/main/mql4/Prop%20Risk%20Calculator/prop-position-calculator-settings-screenshoot.png" title="SwingFish Prop Risk Calculator Settings Screenshoot" alt="SwingFish Prop Risk Calculator Settings Screenshoot"></p>
												<div class="separator-2"></div>
												<p><small>Settings allow the location to be set on the Chart, equity, balance and risk percentages</small>
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
