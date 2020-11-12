<?
$cachefile = CACHE."youtube_playlist";
$cachetime = 1200;


$crefresh = false;

if (!file_exists($cachefile) || (filemtime($cachefile) < (time()-$cachetime ))) {
//	$b = file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=24&playlistId=PLfixdpfYwUzHZ9IaWN_0xiQK3o6FXy29B&key=AIzaSyB1aAeNvPJ-b8e-IbjL9mrXo988zYWvFCw');

	$crefresh = true;
	touch($cachefile);
//	$b = file_get_contents('https://www.googleapis.com/youtube/v3/search?q=live%20OR%20recap&part=snippet&channelId=UCqEcEGQ0sG89j7ZhOdgFOyg&maxResults=24&order=date&type=video&videoType=any&key=AIzaSyCt0-jxjgHhwk6zvM31p8XNb5tCikZcOno');
	$b = @file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCqEcEGQ0sG89j7ZhOdgFOyg&maxResults=24&order=date&type=video&videoType=any&key=AIzaSyCt0-jxjgHhwk6zvM31p8XNb5tCikZcOno');

//	print_r($b);
	$string_data = serialize($b);
	if (strlen($string_data)>10) {
		// not cache empty results
		file_put_contents($cachefile, $string_data);
	}
	unset($string_data);
}
$A = @file_get_contents($cachefile);
$b = json_decode(unserialize($A), true);

if (count($b) <1) {
	echo "<hr /><h3><center>Error connecting to YouTube, please check out the channel directly for updates</center></h3>";
	echo '<h4><center><a class="btn btn-primary" href="https://www.youtube.com/channel/UCqEcEGQ0sG89j7ZhOdgFOyg/videos?view=0&sort=dd&sub_confirmation=1" target="_blank">SwingFish on YouTube</a></center></h4>';
	echo '<h5><center>sorry ...</center></h5><hr>';
	echo '<br />&nbsp; <br />&nbsp; <br />&nbsp; <br />&nbsp; ';
//	echo '<br />&nbsp; <br />&nbsp; <br />&nbsp; <br />&nbsp; ';
//	die();
} else {

if (isset($b['pageInfo']['totalResults'])){
	file_put_contents(CACHE.'youtube_count', $b['pageInfo']['totalResults']);
}

//$b = file_get_contents($cachefile);
//$b = unserialize($b);
$b = $b['items'];
?><section class="container">
	<div class="row padding-top">
		<div class="main col-md-12"><h3 class="swingfish">Video Archive (Youtube)</h3>
		<p>Unlike many trading services, we record trading activity via <a href="https://www.youtube.com/c/swingfish/live" target="_blank">Youtube Live</a>.
							Already with <a target="_blank" href="https://www.youtube.com/channel/UCqEcEGQ0sG89j7ZhOdgFOyg/videos?view=0&sort=dd&sub_confirmation=1"><strong><?php echo get_YoutubeLive()['videocount']; ?> Videos</strong> stored</a>, showing the day's trades in full with gain or loss. Losses should be considered a normal part of trading.
							You can see in real time how trades are developing and also how they are managed. Additionally, you can find older videos previously recorded live for reference.</p>
				<p>Below are some of our Youtube Videos and Stream Recordings <a href="https://www.youtube.com/channel/UCqEcEGQ0sG89j7ZhOdgFOyg/videos?view=0&sort=dd&sub_confirmation=1" target="_blank">our YouTube channel</a>. <a href="<?=$LINKS['youtube']?>" target="_blank"><img border="0" title="SwingFish YouTube Channel <?=$crefresh?>" src="<?URL?>assets/images/swingfish/youtubes.png"></a></p>
				<div class="isotope-container row grid-space-20">
<?
$i = 0;
foreach ($b as &$v) {
if (substr($v['snippet']['title'], 4, 23) =="Day Trading #Forex LIVE") {
	$v['snippet']['title'] = trim(substr($v['snippet']['title'], strpos($v['snippet']['title'], '[')));
	$v['snippet']['title'] = trim(substr($v['snippet']['title'], 0, strpos($v['snippet']['title'], ']')+1));
}
if (substr($v['snippet']['title'], 0, 22) =="LIVE Day Trading Forex") {
	$v['snippet']['title'] = trim(substr($v['snippet']['title'], 32));
}
if (substr($v['snippet']['title'], 0, 23) =="Live: DayTrading #Forex") {
	$v['snippet']['title'] = trim(substr($v['snippet']['title'], 23));
}
if ((substr($v['snippet']['title'], 4, 22) =="Live Forex Day Trading")||(substr($v['snippet']['title'], 4, 17) =="Forex Day Trading")){
//        $v['snippet']['title'] = trim(substr($v['snippet']['title'], 26, strpos($v['snippet']['title'], ']',1)));
        $v['snippet']['title'] = trim(substr($v['snippet']['title'], strpos($v['snippet']['title'], '[')));
	$v['snippet']['title'] = trim(substr($v['snippet']['title'], 0, strpos($v['snippet']['title'], ']')+1));
}

?>								<div class="col-sm-6 col-md-3">
									<div class="image-box">
										<div class="overlay-container">
											<a target="_blank" href="https://www.youtube.com/watch?v=<?=$v['id']['videoId']?>&list=PLfixdpfYwUzGxEWKeP1-JbL0rp22oUNy1">
												<img src="<?=$v['snippet']['thumbnails']['medium']['url']?>" alt="<?=$v['snippet']['title']?>" />
											</a>
										</div><small><?=$v['snippet']['title']?></small></a>
									</div>
								</div>
<?php } }
?>
							</div>
							<!-- portfolio items end -->

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>

