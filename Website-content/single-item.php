    <!-- Page Title -->
    <!--Add modifier class : "pt-fullwidth" to stretch page title and make it occupy 100% of the page width. -->
    <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title">
              <h1>Tradingroom</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
            <div class="breadcrumbs">
              <a href="/tradingroom">Tradingroom</a>
              <span class="delimiter"><i class="icon-arrow-right"></i></span>
              <span>Offline</span>
            </div><!-- .breadcrumbs -->
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->

    <!-- Single Product -->
    <section class="shop-single container">
      <div class="row padding-top">
        <div class="col-sm-6 space-bottom">
          <!-- Nav Tabs -->
          <ul class="nav-tabs" role="tablist">
            <li<? if (get_YoutubeLive()['live'] == 'true') { echo '  class="active"'; }?>><a href="#live" role="tab" data-toggle="tab">Livestream</a></li>
            <li<? if (get_YoutubeLive()['live'] != 'true') { echo '  class="active"'; }?>><a href="#chat" role="tab" data-toggle="tab">Chat</a></li>
            <li><a href="#webcam" role="tab" data-toggle="tab">Webcam</a></li>
          </ul><!-- .nav-tabs -->
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane transition fade<? if (get_YoutubeLive()['live'] != 'true') { echo ' in active'; }?>" id="chat">
              <a class="btn btn-group btn-success btn-sm" href="/chat">Join in the Chat!, it's Free!</a>
											<ul class="list">
												<li><img id="cbe1D12a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D12n">... loading</span> <span id="cbe1D12b"></span></li>
												<li><img id="cbe1D13a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D13n">...</span> <span id="cbe1D13b"></span></li>
												<li><img id="cbe1D14a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D14n">...</span> <span id="cbe1D14b"></span></li>
												<li><img id="cbe1D15a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D15n">...</span> <span id="cbe1D15b"></span></li>
												<li><img id="cbe1D16a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D16n">...</span> <span id="cbe1D16b"></span></li>
												<li><img id="cbe1D17a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D17n">...</span> <span id="cbe1D17b"></span></li>
												<li><img id="cbe1D18a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D18n">...</span> <span id="cbe1D18b"></span></li>
												<li><img id="cbe1D19a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D19n">...</span> <span id="cbe1D19b"></span></li>
											</ul>
            </div>
            <div role="tabpanel" class="tab-pane transition fade<? if (get_YoutubeLive()['live'] == 'true') { echo ' in active'; }?>" id="live">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe width="1138" height="641" src="https://www.youtube.com/embed/live_stream?channel=UCqEcEGQ0sG89j7ZhOdgFOyg&autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>
												<p><a href="/live">check out the live page for more details</a>.</p>
											</div>
            </div>
            <div role="tabpanel" class="tab-pane transition fade" id="webcam">
              <div class="overlay-container">
													<img src="https://swingfish.trade/lib/ajax/cam261.php" id="webcama" alt="Trading Room Webcam">
<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Webcam does not (yet) reload automatically .. sorry</div>
												</div>
            </div>
          </div><!-- .tab-content -->
        </div><!-- .col-sm-6 -->
        <div class="col-sm-6 padding-top-2x">
<?php
						if (get_wp_draft()['hasdraft'] == "1") {
							echo '          <div class="row padding-top">';
							echo '<blockquote class="bg-warning">this article is still being updated! (the Day is not over yet),<br />
							make sure you Reload the page from time to time ...</blockquote>';
							readfile('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?part=header');
						}
						else {?>          <div class="row text-center">
			  <h5>Sorry no Live Trading right now</h5>
			  <p>usually SwingFish does trade every day, but not all day, we got lives too :)<br />
			  meanwhile here are a few things you could do.</p>

            <div class="col-sm-4 col-xs-6 padding-bottom">
              <p class="space-bottom-none"><a href="/journal">Check Trading Logs</a></p>
              <a href="/journal"><img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/19.png" class="block-center" alt="Feature"></a>
            </div>
            <div class="col-sm-4 col-xs-6 padding-bottom">
              <p class="space-bottom-none"><a href="/youtube">Video Archive</a></p>
              <a href="/youtube"><img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/18.png" class="block-center" alt="Feature"></a>
            </div>

            <div class="col-sm-4 col-xs-6 padding-bottom">
              <p class="space-bottom-none"><a href="/chat">Join the Chat</a></p>
              <a href="#chat" role="tab" data-toggle="tab"><img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/22.png" class="block-center" alt="Feature"></a>
            </div>

            <div class="col-sm-4 col-xs-6 padding-bottom">
              <p class="space-bottom-none"><a href="#webcam" role="tab" data-toggle="tab">Trader Webcam</a></p>
              <a href="#tab3" role="tab" data-toggle="tab"><img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/20.png" class="block-center" alt="Feature"></a>
            </div>


            <div class="col-sm-4 col-xs-6 padding-bottom">
              <p class="space-bottom-none">Time Tracking</p>
              <img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/17.png" class="block-center" alt="Feature">
            </div>
            <div class="col-sm-4 col-xs-6 padding-bottom">
              <p class="space-bottom-none">Fingerprint Scan</p>
              <img src="/blog/wp-content/themes/nucleus/_src/nucleus-11/main/Nucleus/img/features/21.png" class="block-center" alt="Feature">
            </div>
<? }?>
          </div>
        </div><!-- .col-sm-6 -->
      </div><!-- .row -->
<?php
						if (get_wp_draft()['hasdraft'] == "1") {
							echo '<div class="row padding-top"><hr />';
							readfile('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?part=body');
							echo '</div>';
						}
?>
    </section><!-- .shop-single -->
