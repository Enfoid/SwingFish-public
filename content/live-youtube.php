<?
if ((get_YoutubeLive()['live'] == 'true')) {
	$rcounts = unserialize(file_get_contents(URI."tmp/restream_stats"));
}

?><section class="page-title">
	<div class="container">
		<div class="row">
			<span><? readfile('http://swingfish.trade/lib/3rd/wordpress/Tradelog_draft_content.php?justtitle=true');?>&nbsp; <? if ((get_YoutubeLive()['live'] == 'true')&&(intval($rcounts['stats']['viewers']) > 0)) {	?>≫ <font color="green"><strong><?php echo $rcounts['stats']['viewers']; ?> Watching Right now</strong></font> <small>(via <?=$rcounts['stats']['destinations']?> Services)</small><? } ?></span>
			<iframe width="100%" height="641" src="https://www.youtube.com/embed/<?php echo get_YoutubeLive()['videoId'];?>?autoplay=1&amp;list=PLfixdpfYwUzHFl-4PeMeFcJ-LbSE9x8wV" frameborder="0" allowfullscreen></iframe>
			<center>
<?
if (($rcounts['status']['channels'])>0){
	foreach ($rcounts['status']['channels'] as &$v){
		echo '<a class="btn btn-success btn-sm" target="_blank" href="'.$v->dst->url.'">';
		$title = substr(strstr($v->dst->url, '//'),2);
		$title = strstr($title, '/', true);
		$title = str_replace("www.", "", $title);
		echo $title.' ('.intval($v->viewers).')</a> &nbsp; ';
	}
}
else {
	echo '<a class="btn btn-info btn-lg" target="_top" href="/youtube">This is a recording! see the whole archive here ...</a>';
}
?>			</center>
<?
/*			<center><a class="btn btn-success btn-sm" target="_blank" href="https://www.youtube.com/embed/<?php echo get_YoutubeLive()['videoId'];?>?autoplay=1">Watch on Youtube</a> &nbsp; <a class="btn btn-success btn-sm" target="_blank" href="https://www.twitch.tv/swingfish12">Watch on Twitch</a> &nbsp; <a class="btn btn-success btn-sm" target="_blank" href="https://www.pscp.tv/nullx8">Watch on Twitter</a> &nbsp; <a class="btn btn-success btn-sm" target="_blank" href="https://facebook.com/swingfish12/live">Watch on Facebook</a> &nbsp; <a class="btn btn-success btn-sm" target="_blank" href="https://mixer.com/SwingFish">Watch on Mixer</a></center>
*/
?>		</div>
		<div class="row">
			<hr />
			<div class="col-sm-9 space-bottom">
				<ul class="list">
					<li><img id="cbe1D16a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D16n">... loading</span> <span id="cbe1D16b"></span></li>
					<li><img id="cbe1D17a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D17n">... loading</span> <span id="cbe1D17b"></span></li>
					<li><img id="cbe1D18a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D18n">... loading</span> <span id="cbe1D18b"></span></li>
					<li><img id="cbe1D19a" src="/assets/images/swingfish/square_50.png" style="width:28px; height:28px; float:left;"><span class="badge" id="cbe1D19n">...</span> <span id="cbe1D19b"></span></li>
				</ul>
			</div>
			<div class="col-sm-3 space-bottom">
				<a class="btn btn-success btn-sm" href="/chat">Join in the Chat!, it's Free!</a><br />
				<a class="btn btn-info btn-sm" href="/tradingroom">Trading Room with Trade Log</a><br />
			</div>
		</div>
	</div>
</section>
<?
/*

   <section class="page-title">
      <div class="container">
        <div class="inner">
          <div class="column">
            <div class="title swingfish">
              <h1>Live Stream</h1>
            </div><!-- .title -->
          </div><!-- .column -->
          <div class="column">
           <div class="breadcrumbs">
			   <a href="/tradingroom">Tradingroom</a>
              <span class="delimiter"><i class="icon-arrow-right"></i></span>
              <span>Live</span>
            </div><!-- .breadcrumbs -->
          </div><!-- .column -->
        </div>
      </div>
    </section><!-- .page-title -->
<section class="container">
		<?php if (get_YoutubeLive()['live'] == "true") {?>
		<div class="row">
			<p>
				<center>Live Trading Active ! this is happening in Realtime!
					&nbsp; <a href="<?=URL?>tradingroom"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>everything together in the Tradingroom</button></a>
					&nbsp; <a href="<?=URL?>journal"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>Open Current Trading Journal</button></a>
					&nbsp; <a href="<?=URL?>youtube"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>see Recordings</button></a>
				</center>
			</p>
		</div>
		<? } else { ?>
		<div class="row">
			<p>
				<center><strong>Stream currently offline</strong> sorry (below is playing a Cut-Out or a Replay)<br />
				<small>once the stream is back online, this site will display the current live stream.</small>
				</center>
			</p>
			<p>
				<center>
					<a href="<?=URL?>journal"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>Current Trading Journal</button></a>
					&nbsp; <a href="youtube"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>full video archive</button></a>
				</center>
			</p>
		</div>
		<? } ?>
		<div class="row">
			<center>
				<iframe width="1138" height="641" src="https://www.youtube.com/embed/<?php echo get_YoutubeLive()['videoId'];?>?autoplay=1&amp;list=PLfixdpfYwUzHFl-4PeMeFcJ-LbSE9x8wV" frameborder="0" allowfullscreen></iframe>
			</center>
		</div>
	</div>
</section>
<? if ($Youtube['live'] == 'true') {
	include('assets/strategies/accountmap.php');
?>
<section class="sectionf">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img align="left" border="2" src="http://0x8.in.th/scripts/vera/cam261.jpg.php" width="360" height="180">
			</div>
			<div class="col-md-9">
				<div class="container">
					<!-- myfxbook.com open trades widget - Start -->
                    <div><script class="powered" type="text/javascript" src="http://widgets.myfxbook.com/scripts/fxOpenTrades.js?oid=<?=$AccountMap['1000']?>&link=1"></script>
                    <div style="color: #706f6f;font-weight: bold;font-size: 11px;font-family: Tahoma;">Powered by <a href="https://www.myfxbook.com"class="myfxbookLink" ><b style="color: #575454;">Myfxbook.com</b></a></div>
                    <script type="text/javascript">showOpenTradesWidget()</script></div>
                    <!-- myfxbook.com open trades widget - End -->
				</div>

			</div>
		</div>
</section>
<? } ?>
*/
?>
