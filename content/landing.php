<?php

$funds = json_decode(file_get_contents('http://www.enfoid.com/api/c/fundstats.json'));

/*
    $jsonIn = file_get_contents('https://discordapp.com/api/guilds/292323550990172170/widget.json');
    $JSON = json_decode($jsonIn, true);

    $membersCount = count($JSON['members']);
*/
    $wp_cat = json_decode(unserialize(file_get_contents(URI.'tmp/wp_categories')));
	$i = 0;
	$wp_totals = 0;
	$wp_news = 0;
	$wp_signals = 0;
	foreach ($wp_cat as $v) {
		$wp_totals = $wp_totals + $v->count;
		if ($v->slug == "market-news") { $wp_news = $v->count; }
		if ($v->slug == "forex-signal-cfd-analysis") { $wp_signals = $v->count; }
//		echo $v->name."#".$v->count;
		$i++;
	}

//    $wp_totals = json_decode(unserialize(file_get_contents(URI.'tmp/wp_totals')));
//	$wp_totals = $wp_totals[1];

$wpr = json_decode(file_get_contents(URL.'lib/3rd/wordpress/site_lastpost.php'), true)[0];
   ?>
   <section class="container padding-top-3x padding-bottom">
      <h2 class="block-title text-center swingfish">
        The Trading Co-space for Everyone
        <small>No BS, no Sales, 100% Non-Profit | Traders advisory that actually works!</small>
<?
/*	<br /><i>Last post: <a href="/<?=$wpr['id']?>"><?=$wpr['title']['rendered']?></a></small>
*/
?></h2>      <div class="row padding-top">
		<?php if (get_YoutubeLive()['live'] == "true") {?>
		<div class="col-sm-6">
 			  <iframe align="center" width="100%" height="240" src="https://www.youtube.com/embed/<?php echo get_YoutubeLive()['videoId'];?>?autoplay=0&amp;list=PLfixdpfYwUzHFl-4PeMeFcJ-LbSE9x8wV" frameborder="0" allowfullscreen></iframe>
			  <footer class="counter-footer btn-danger" align="center"><a href="/tradingroom" class="btn-danger">Streaming LIVE Right now !</a></footer>
        </div>
        <div class="col-sm-3">
          <!-- Data API: 
               data-decimal="number" How many digits after decimal point.
               data-duration="number" The number of milliseconds it should take to finish counting.
          -->
          <div class="counter" data-duration="5000">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/tradingroom"><img src="/assets/images/icons/root/icons8-discord-500.png" alt="SwingFish Forex Trader Discord Server"></a>
            </header>
            <a href="/tradingroom"><div class="digits" style="opacity: 1; visibility: visible;"><?php echo get_Discord()['usercount']; ?></div></a>
            <footer class="counter-footer swingfish">
              <a href="/tradingroom">Online now</a>
            </footer>
          </div>
        </div>
        <? } else {?>
        <div class="col-sm-3">
          <!-- Data API: 
               data-decimal="number" How many digits after decimal point.
               data-duration="number" The number of milliseconds it should take to finish counting.
          -->
          <div class="counter" data-duration="3000">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/tradingroom"><img src="/assets/images/icons/root/icons8-discord-500.png" alt="SwingFish Forex Trader Discord Server"></a>
            </header>
            <a href="/tradingroom"><div class="digits" style="opacity: 1; visibility: visible;"><?php echo get_Discord()['usercount']; ?></div></a>
            <footer class="counter-footer swingfish">
              <a href="/tradingroom">Members Online</a>
            </footer>
          </div>
        </div>
        <div class="col-sm-3">
          <!-- Data API: 
               data-decimal="number" How many digits after decimal point.
               data-duration="number" The number of milliseconds it should take to finish counting.
          -->
          <div class="counter" data-duration="3200">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/youtube"><img src="/assets/images/icons/root/icons8-play-button-500.png" alt="SwingFish Forex Video Archive"></a>
            </header>
            <a href="/youtube"><div class="digits" style="opacity: 1; visibility: visible;"><?php echo get_YoutubeLive()['videocount']; ?></div></a>
            <footer class="counter-footer swingfish">
              <a href="/youtube">Videos</a>
            </footer>
          </div>
        </div>
        <div class="col-sm-3">
          <!-- Data API: 
               data-decimal="number" How many digits after decimal point.
               data-duration="number" The number of milliseconds it should take to finish counting.
          -->
          <div class="counter" data-duration="2500">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/money"><img src="/assets/images/icons/root/icons8-paycheque-500.png" alt="Paid to Members"></a>
            </header>
            <a href="/money"><div class="digits" style="opacity: 1; visibility: visible;"><?=(round($funds->stats->paid->m*2.9,0)+round($funds->stats->iblink->w*2.9,0))?></div></a>
            <footer class="counter-footer swingfish">
              <a href="/money">US$ Paid this Week</a>
            </footer>
          </div>
        </div>
        <? } ?>
        <div class="col-sm-3">
          <!-- Data API: 
               data-decimal="number" How many digits after decimal point.
               data-duration="number" The number of milliseconds it should take to finish counting.
          -->
          <div class="counter" data-duration="3500">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/signals"><img src="/assets/images/icons/root/icons8-combo-chart-500.png" alt="Free Forex Trade Signals"></a>
            </header>
            <a href="/signals"><div class="digits" style="opacity: 1; visibility: visible;"><?=$wp_signals?></div></a>
            <footer class="counter-footer swingfish">
              <a href="/signals">Trade Signals</a>
            </footer>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="counter">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/blog"><img src="/assets/images/icons/root/icons8-new-topic-500.png" alt="Trading Blog Articles"></a>
            </header>
            <footer class="counter-footer swingfish">
              <a href="/blog"><?=$wp_totals?> Articles</a>
            </footer>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="counter">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/casual"><img src="<?php echo get_template_directory_uri(); ?>/img/features/08.png" alt="Icon"></a>
            </header>
            <footer class="counter-footer swingfish">
              <a href="#"><strike>Trading Truth</strike></a>
            </footer>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="counter">
            <header class="counter-icon">
              <!-- <i class="icon-map"></i> -->
              <a href="/tools"><img src="/assets/images/icons/root/icons8-administrative-tools-500.png" alt="Icon"></a>
            </header>
            <footer class="counter-footer swingfish">
              <a href="/tools">Free Trader Tools</a>
            </footer>
          </div>
        </div>
      </div><!-- .row -->
    <center><i>Last Post: <a href="/<?=$wpr['id']?>"><?=$wpr['title']['rendered']?></a></center>
</section>
