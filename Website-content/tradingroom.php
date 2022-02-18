<?
$funds = json_decode(file_get_contents('http://enfoid.com/api/c/fundstats.json'));	
include_once(URI.'lib/3rd/youtube/youtube-livecheck.php');
/*
	if ((get_YoutubeLive()['live'] == 'true')) {
	$rcounts = unserialize(file_get_contents(URI."tmp/restream_stats"));
}
*/
?><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
<section class="container">
	<div class="row padding-top">
		<h3 class="swingfish">The Trading room</h3>
		<div class="col-sm-6 space-bottom">
			<div class="grid-item">
				<article class="post-item format-video">
					<div class="post-body">
						<div class="post-meta">
							<div class="column">
								<span><? if (get_YoutubeLive()['live'] != 'true') {?><a href="/journal"><i class="icon-ribbon"></i> <?=$dayJournalCount?> Records</a> &nbsp;  <a href="/youtube"><i class="icon-camera"></i> <?php echo get_YoutubeLive()['videocount']; ?> Videos</a> &nbsp;  <? } ?><a href="/discord"><i class="icon-head"></i> <?php echo get_Discord()['usercount']; ?> Chatting</a> <? if ((get_YoutubeLive()['live'] == 'true')&&(intval($rcounts['stats']['viewers']) > 0)) {?> &nbsp;  <i class="icon-camera"></i> <a href="/live" class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Streaming Live via <?=$rcounts['stats']['destinations']?> Services"> <strong><font color="blue"><?php echo $rcounts['stats']['viewers']; ?> Watching LIVE</font></strong></a><? } ?></span>
							</div>
							<div class="column"><span><? 
										$wpdate = intval(file_get_contents('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?part=time'));
										if ($wpdate > 14000) { echo "Log updated <strong><font color=\"green\">".HumanAgo($wpdate-28800, 1)."</font></strong>"; } else { echo date("D j M Y"); } ?></span>
							</div>
						</div><!-- .post-meta -->
<?php
	if ((get_wp_draft()['hasdraft'] == "1")&&((get_YoutubeLive()['live'] != 'true'))) {
		echo '<h4><center><font color="red">in Session...</font></center></h4>';
		readfile('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?part=header');
		echo '<a class="btn btn-lg btn-success" href="/journal">Click here for Activity log as it happens</a>';
	}
	elseif ((get_YoutubeLive()['live'] == 'true')) {
		echo '<h4><font color="green">Livestream active</font></h4><p><a href="/live">'.get_YoutubeLive()['title'].'</a></p>';
		if ((get_wp_draft()['hasdraft'] == "1")) {
			readfile('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?part=header');
			echo '<a class="btn btn-lg btn-success" href="/journal">Click here for Activity log as it happens</a>';
			} else {
				echo '<br /><i>No Trade Log found!</i><br />that could have serval reasons, like<br /><i>done trading already, Stream may be not trade related,<br />or we just showing some market activities</i>.<hr /><ul class="nav-tabs" role="tablist">
			<li><a href="/chat">Join the Chat</a></li>
			<li><a href="/journal">Trading Logs</a></li>
			<li><a href="/youtube">Video Archive</a></li>
		</ul><!-- .nav-tabs -->
';
			}
	}	
	else {
		?><h4><center>Live trading Session completed</center></h4>
		<center>we usually trade Asia Session, but not all day, we got lives too :)</center><?
/*
		<br />
		<ul class="nav-tabs" role="tablist">
			<li><a href="/chat">Join the Chat</a></li>
			<li><a href="/journal">Trading Logs</a></li>
			<li><a href="/youtube">Video Archive</a></li>
		</ul><!-- .nav-tabs -->
*/
?><? } ?>            
					</div>
				</article>
				<? if ((get_YoutubeLive()['live'] != 'true') && (get_wp_draft()['hasdraft'] != "1")) {?>
		<hr />
         <article class="post-item">
            <div class="post-body">
              <div class="post-meta">
                <div class="column">
                  <span class="post-format"></span>
                  <span>
                    <i class="icon-paper"></i>
                    Day trades
                  </span>
                  <span>
                    <i class="icon-ribbon"></i>
                    <a href="/journal"><?=$dayJournalCount?> Days Recorded</a>
                  </span>
                </div>
                <div class="column"><span>updated: <?=$funds->visuals->swingfish1000->updatedAgo?></span></div>
              </div><!-- .post-meta -->
<canvas id="myChart" height="180"></canvas>
<script>
new Chart(document.getElementById("myChart"), {
    type: 'bar',
    data: {
      labels: <?=$funds->visuals->swingfish1000->chartcategories?>,
      datasets: [{
          label: "FOREX",
          type: "line",
		  yAxisID: 'forex',
          borderColor: "#8e5ea2",
          data: [<?=substr($funds->visuals->swingfish1000->chartgain, 9)?>,
          fill: true
        },
{
          label: "SYNTHETICS",
          type: "line",
		  yAxisID: 'synthetics',
          borderColor: "#62b7ff",
          data: [<?=substr($funds->visuals->swingfishSynth->chartgain, 9)?>,
          fill: false
        }
      ]
    },
    options: {
		scales: {
			xAxes: [{
				gridLines: {
					display:false
				}
				}],
			yAxes: [{
				id: 'synthetics',
				type: 'linear',
				position: 'left',
				gridLines: { display:false },
			}, {
				id: 'forex',
				type: 'linear',
				position: 'left',
				gridLines: { display:false },
			}]
		},
		title: {
			display: true,
			text: 'Last <?=$funds->visuals->swingfish1000->lookback?> Trading days (Daytrades only)'
		},
		legend: { display: true }
	}
});</script>			<ul class="nav-tabs" role="tablist">
				<li><a href="#ResultsForex" role="tab" data-toggle="tab">Forex</a></li>
				<li><a href="#ResultsSynthetics" role="tab" data-toggle="tab">Synthetics</a></li>
			</ul><!-- .nav-tabs -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane transition fade in active" id="ResultsForex">
<div class="progress progress-animated" style="height: 28px;">
            <div class="label">
              <?
              $wrr = round(((1 - intval($funds->visuals->swingfish1000->TradesTotal-$funds->visuals->swingfish1000->TradesWon) / intval($funds->visuals->swingfish1000->TradesTotal)) * 100),0);
              ?><span style="line-height: 8px;">Winrate <?=$wrr?>%</span>
            </div>
            <div class="progress-bar progress-bar-primary" data-valuenow="<?=$wrr?>" style="width: <?=$wrr?>%;"></div>
          </div>
<h3><?=round($funds->visuals->swingfish1000->gain,2)?>% Cumulative <strong><u>Forex</u></strong> Gain</h3>
<?
setlocale(LC_MONETARY, 'en_US.utf8');
?><p><strong><?=money_format("%.0n", round($funds->visuals->swingfish1000->volume,-2))?></strong> Traded Volume over </i><?=$funds->visuals->swingfish1000->TradesTotal?> Trades</p>
<p><?=$funds->visuals->swingfish1000->TradesWon?> Trades won vs. <?=$funds->visuals->swingfish1000->TradesTotal-$funds->visuals->swingfish1000->TradesWon?> Trades lost</p>
<p><?
if (($funds->visuals->swingfish1000->lookback-$funds->visuals->swingfish1000->DaysWon) == 0) {
}
else {?>
	<p><?=$funds->visuals->swingfish1000->DaysWon?> Profitable day<? if ($funds->visuals->swingfish1000->DaysWon>1 || $funds->visuals->swingfish1000->DaysWon == 0) { echo "s"; }?> vs. <?=$funds->visuals->swingfish1000->DaysLost?> Losing day<? if ($funds->visuals->swingfish1000->DaysLost>1 || $funds->visuals->swingfish1000->DaysLost == 0) { echo "s"; } }?></p>
<?
if ($funds->visuals->swingfish1000->Profitfactor > 0.8) { ?><p>Profit Factor <?=round($funds->visuals->swingfish1000->Profitfactor,2)?> &amp; <?=round($funds->visuals->swingfish1000->Sharperatio,2)?> Sharpe Ratio</p>
<? }
if (($funds->visuals->swingfish1000->lookback-$funds->visuals->swingfish1000->DaysWon) == 0) {
	echo '<p align="right">[<small>Last losing day was <strong>'. round(((time()-$funds->visuals->swingfish1000->DayLostLast)/86400),0).' days ago</strong></small>]</p>';
}
?></p><a class="btn btn-sm btn-success" href="https://www.enfoid.com/investors/profit-share" target="_blank">More details ..</a>
</div>
				<div role="tabpanel" class="tab-pane transition fade" id="ResultsSynthetics">
<div class="progress progress-animated" style="height: 28px;">
            <div class="label">
              <?
              $wrr = round(((1 - intval($funds->visuals->swingfishSynth->TradesTotal-$funds->visuals->swingfishSynth->TradesWon) / intval($funds->visuals->swingfishSynth->TradesTotal)) * 100),0);
              ?><span style="line-height: 8px;">Winrate <?=$wrr?>%</span>
            </div>
            <div class="progress-bar progress-bar-primary" data-valuenow="<?=$wrr?>" style="width: <?=$wrr?>%;"></div>
          </div>
<h3><?=round($funds->visuals->swingfishSynth->gain,2)?>% Cumulative <strong><u>Synthetics</u></strong> Gain</h3>
<?
setlocale(LC_MONETARY, 'en_US.utf8');
?><p><strong><?=money_format("%.0n", round($funds->visuals->swingfishSynth->volume,-2))?></strong> Traded Volume over </i><?=$funds->visuals->swingfishSynth->TradesTotal?> Trades</p>
<p><?=$funds->visuals->swingfishSynth->TradesWon?> Trades won vs. <?=$funds->visuals->swingfishSynth->TradesTotal-$funds->visuals->swingfishSynth->TradesWon?> Trades lost</p>
<p><?
if (($funds->visuals->swingfish1000->lookback-$funds->visuals->swingfish1000->DaysWon) == 0) {
}
else {?>
	<p><?=$funds->visuals->swingfishSynth->DaysWon?> Profitable day<? if ($funds->visuals->swingfishSynth->DaysWon>1 || $funds->visuals->swingfishSynth->DaysWon == 0) { echo "s"; }?> vs. <?=$funds->visuals->swingfishSynth->DaysLost?> Losing day<? if ($funds->visuals->swingfishSynth->DaysLost>1 || $funds->visuals->swingfishSynth->DaysLost == 0) { echo "s"; } }?></p>



<?
if ($funds->visuals->swingfishSynth->Profitfactor > 0.8) { ?><p>Profit Factor <?=round($funds->visuals->swingfishSynth->Profitfactor,2)?> &amp; <?=round($funds->visuals->swingfishSynth->Sharperatio,2)?> Sharpe Ratio</p>
<? }
if (($funds->visuals->swingfishSynth->lookback-$funds->visuals->swingfishSynth->DaysWon) == 0) {
//	echo '<p align="right">[<small>Last losing day was <strong>'. round(((time()-$funds->visuals->swingfishSynth->DayLostLast)/86400),0).' days ago</strong></small>]</p>';
}
?></p><a class="btn btn-sm btn-success" href="https://www.enfoid.com/investors/profit-share" target="_blank">More details ..</a>
</div>
</div>
<div class="text-center mt-6">
<?
/*
	<a href="https://www.enfoid.com/investors/profit-share" class="btn btn-success">Get a Piece of it!</a>
	<a href="/strategies" class="btn btn-info">more Strategies</a>
*/
?></div>
            </div><!-- .post-body -->
          </article><!-- .post-item -->
<? } ?>        </div><!-- .grid-item -->
       </div>
        <div class="col-sm-6 space-bottom">
<!--        <div class="grid-item"> -->
          <article class="post-item">
            <div class="post-body">
              <div class="post-meta">
                <div class="column">
			<ul class="nav-tabs" role="tablist"><?
				/*
				<li<? if (get_YoutubeLive()['live'] == 'true') { echo '  class="active"'; }?>><a href="#live" role="tab" data-toggle="tab">Livestream</a></li>
				<li<? if ((get_YoutubeLive()['live'] != 'true')&&(get_wp_draft()['hasdraft'] == "1")) { echo '  class="active"'; }?>><a href="#webcam" role="tab" data-toggle="tab">Webcam</a></li>
				<li<? if ((get_YoutubeLive()['live'] != 'true')&&(get_wp_draft()['hasdraft'] != "1")) { echo '  class="active"'; }?>><a href="#chat" role="tab" data-toggle="tab">Chat</a></li>
*/
				?><li<? if (get_wp_draft()['hasdraft'] == "1") { echo '  class="active"'; }?>><a href="#live" role="tab" data-toggle="tab">Livestream</a></li>
				<li><a href="#webcam" role="tab" data-toggle="tab">Webcam</a></li>
				<li<? if (get_wp_draft()['hasdraft'] != "1") { echo '  class="active"'; }?>><a href="#chat" role="tab" data-toggle="tab">Chat</a></li>
<li><a role="tab" href="/chat"><font color="green">Join the Chat!</font></a></li>
			</ul><!-- .nav-tabs -->
                </div>
              </div><!-- .post-meta -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane transition fade<? if ((get_YoutubeLive()['live'] != 'true')&&(get_wp_draft()['hasdraft'] != "1")) { echo ' in active'; }?>" id="chat">
					<ul class="list-unstyled" align="left">
						<? if ((get_YoutubeLive()['live'] != 'true') && (get_wp_draft()['hasdraft'] != "1")) {?>
						<li><img id="cbe1D1a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D1n">... loading</span> <span id="cbe1D1b"></span></li>
						<li><img id="cbe1D2a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D2n">...</span> <span id="cbe1D2b"></span></li>
						<li><img id="cbe1D5a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D3n">...</span> <span id="cbe1D3b"></span></li>
						<li><img id="cbe1D4a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D4n">...</span> <span id="cbe1D4b"></span></li>
						<li><img id="cbe1D5a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D5n">...</span> <span id="cbe1D5b"></span></li>
						<li><img id="cbe1D6a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D6n">...</span> <span id="cbe1D6b"></span></li>
						<li><img id="cbe1D7a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D7n">...</span> <span id="cbe1D7b"></span></li>
						<li><img id="cbe1D8a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D8n">...</span> <span id="cbe1D8b"></span></li>
						<li><img id="cbe1D9a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D9n">...</span> <span id="cbe1D9b"></span></li>
						<li><img id="cbe1D10a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D10n">...</span> <span id="cbe1D10b"></span></li>
						<li><img id="cbe1D11a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D11n">...</span> <span id="cbe1D11b"></span></li>
						<li><img id="cbe1D12a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D12n">...</span> <span id="cbe1D12b"></span></li>
						<? } ?><li><img id="cbe1D13a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D13n">...</span> <span id="cbe1D13b"></span></li>
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
<?
/*
<iframe src="https://embed.restream.io/player/index.html?token=c7cf82d256e24898e73c8cf1db4474c2" width="640" height="396" frameborder="0" allowfullscreen></iframe>
<iframe width="1138" height="641" src="https://www.youtube.com/embed/live_stream?channel=UCqEcEGQ0sG89j7ZhOdgFOyg&autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>
*/
?>
<iframe width="1138" height="641" src="https://www.youtube.com/embed/live_stream?channel=UCqEcEGQ0sG89j7ZhOdgFOyg&autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>
						<p><a href="/live">check out the live page for more details</a>.</p>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane transition fade<? if ((get_YoutubeLive()['live'] != 'true')&&(get_wp_draft()['hasdraft'] == "1")) { echo ' in active'; }?>" id="webcam">
					<div class="overlay-container">
						<img src="https://swingfish.trade/lib/ajax/cam261.php" id="webcama" alt="Trading Room Webcam">
					</div>
				</div>
			</div><!-- .tab-content -->
            </div><!-- .post-body -->
          </article><!-- .post-item -->
        </div><!-- .grid-item -->
      </div><!-- .grid.isotope-grid.col-2 -->
    </section><!-- .container -->

<?php
						if (get_wp_draft()['hasdraft'] == "1") {
echo '<a name="draft">.</a><section class="container">
	<div class="row padding-top">
		<div class="main col-md-12">';

							echo '<div class="row padding-top"><hr />';
						//	readfile('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?part=body');
							echo '</div>';
echo '		</div>
	</div>
</section>';
						}
