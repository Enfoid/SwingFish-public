<div class="layout--footer">
				<footer class="footer">
					<div class="footer--bg"></div>
					<div class="footer--inner">
						<div class="container">
							<div class="footer_main">
								<div class="row"><? include(URI."lib/3rd/TradingView/Widgets/Ticker-mainsite.inc.php"); ?></div>
								<div class="row">
									<div class="col-lg-3 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
										<div class="footer_main--column">
											<strong class="footer_main--column_title">About Us</strong>
											<div class="footer_about">
												<p class="footer_about--text">
													SwingFish is a community-based project, by traders, for traders, with the goal of obtaining financial independence quickly and without the usual costs involved.
												</p>
												<p class="footer_about--text">
													Additionally, we enjoy gains collectively through our diversifcation strategies and leveraging our combined assets.
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
										<div class="footer_main--column">
											<strong class="footer_main--column_title">Latest Blog Posts</strong>
											<ul class="footer_navigation"><?
													foreach($wp_last as $v) {
														echo '<li class="footer_navigation--item"><a title="'.urlencode($v['title']['rendered']).'" href="'.$v['link'].'" class="footer_navigation--link">'.substr($v['title']['rendered'], 0, 40).'</a></li>';
													} ?>
												<li class="footer_navigation--item"><a href="<?=URL?>blog/" class="footer_navigation--link">All Posts</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix visible-sm-block"></div>
									<div class="col-lg-3 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
										<div class="footer_main--column">
											<strong class="footer_main--column_title">More Links</strong>
											<ul class="footer_navigation">
						<li class="footer_navigation--item"><a href="<?=URL?>lib/ib/icmarkets" target="_blank" class="footer_navigation--link">IC Markets</a></li>


												<li class="footer_navigation--item"><a href="<?=URL?>lib/ib/kawase" target="_blank" class="footer_navigation--link">Kawase Exchange</a></li>
												<li class="footer_navigation--item"><a href="<?=URL?>lib/ib/pepperstone" target="_blank" class="footer_navigation--link">Pepperstone</a></li>
												<li class="footer_navigation--item"><a href="<?=$LINKS['youtube']?>" target="_blank" class="footer_navigation--link">All Videos</a></li>
												<li class="footer_navigation--item"><a href="<?=URL?>terms" class="footer_navigation--link">Terms &amp; FAQ</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
										<div class="footer_main--column">
											<strong class="footer_main--column_title">Contact Info</strong>
											<ul class="footer_contact_info">
												<li class="footer_contact_info--item"> <i class="bi_com-phone"></i><span>Call Us  <a href="tel:+6531590589">+65 (31) 59 0589</a></span></li>
												<li class="footer_contact_info--item"> <i class="bi_com-email"></i><span><a href="mailto:ripe@swingfish.trade">ripe@swingfish.trade</a></span></li>
												<li class="footer_contact_info--item"><i class="bi_location-alt-pin"></i><span><? include(URI."lib/3rd/mailchimp/lists/reports-updates/subscribe.php"); ?></span></li>
											<!--	<li class="footer_contact_info--item"><i class="bi_time-clock-a"></i><span>Monday - Friday, 10:00 - 20:00 Weekends closed</span></li> -->
											</ul>
										</div>
									</div>
								</div>
							</div>
														<section class="footer_copyrights">
								<div class="footer_copyrights--container">
									<div class="row">
										<? include("lib/riskwarning.html"); ?>
<div class="col-sm-6 col-xs-12">
											<div class="footer_copyrights--item">
												<div class="footer_copyrights--logo">
													<a href="<?=URL?>"><img src="<?=URL?>assets/images/swingfish/logo_text_smaller.png" alt="" /></a>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-xs-12">
											<div class="footer_copyrights--item">
												<p class="footer_copyrights--item_copyrights">SwingFish &copy; <?=date("Y")?>. All Rights Reserved. [<acronym title="updated: <?=HumanAgo($Svn['int'])?>"><?=$Svn['revision']?></acronym>|<?=$hl?>.<? if (isset($_SERVER['HTTP_CF_IPCOUNTRY'])) { echo $_SERVER['HTTP_CF_IPCOUNTRY']; } else { echo "no CF"; } ?> | <?=$load?>]</p>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<div id="mobile_sidebar" class="mobile_sidebar">
		<div class="mobile_sidebar--closer -white">
			<button class="c-hamburger c-hamburger--htx is-active"><span>toggle menu</span></button>
		</div>
		<div class="mobile_menu">
			<ul class="menu">
				<li class="menu-item"><a href="#">ABOUT</a></li>
				<li class="menu-item"><a href="<?=URL?>risk-free"><font color="green">RISK FREE</font></a></li>
				<li class="menu-item menu-item-has-children">
					<a href="#">STRATEGIES</a>
					<ul class="sub-menu">
						<li class="menu-item"><a href="<?=URL?>strategy/1000">1000</a></li>
						<li class="menu-item"><a href="<?=URL?>strategy/mfcrowd">mf Crowd</a></li>
						<li class="menu-item"><a href="<?=URL?>strategy/ub-noise">UB Noise</a></li>
						<li class="menu-item"><a href="<?=URL?>strategy/yaser">Chatroom</a></li>
						<li class="menu-item"><a href="<?=URL?>strategy/mmmcompound">MMM Compound</a></li>
						<li class="menu-item"><a href="<?=URL?>strategies">- All Strategies</a></li>

					</ul>
				</li>
				<? if ($Youtube['live'] == 'true') { ?><li class="menu-item"><a href="<?=URL?>live"><font color="red">TRADING LIVE NOW!</font></a></li> <? } ?>
				<li class="menu-item"><a href="<?=URL?>youtube">VIDEO [<?=$Youtube['videocount']?>]</a></li>

				<li class="menu-item"><a href="<?=URL?>chat">CHAT [<?=$Discord['usercount']?>]</a></li>
				<li class="menu-item"><a href="<?=$wp_draft['link']?>">Journal <?
									if ($wp_draft['hasdraft'] == '1') {
										echo '[ Draft ]';
									}
								?></a></li>

				<li class="menu-item menu-item-has-children">
					<a href="#">Blog [<?=$wp_totals[1]?>]</a>
					<ul class="sub-menu">
<?
	foreach ($wp_cat as $v) {
		if ($v['count'] > 0) {
			echo '<li class="menu-item"><a href="'.$v['link'].'">'.$v['name'].' ['.$v['count'].']</a></li>';
		}
	}
	echo '<li class="menu-item"><a href="'.URL.'/blog">- ALL Posts ['.$wp_totals[1].']</a></li>';
?>
					</ul>
				</li>
				<li class="menu-item"><a href="<?=URL?>faq">FAQ</a></li>
				<li class="menu-item"><a href="<?=URL?>contact">CONTACT US</a></li>
				<li class="menu-item"><a href="<?=URL?>enfoid-clientlogin">CLIENT LOGIN</a></li>
			</ul>
		</div>
		<!-- select language-->
		<div class="select_language -mobile_sidebar">
			<button type="button" class="select_language--opener"><i class="select_language--opener_icon icons8-globe-earth"></i>Language</button>
			<ul class="select_language--list">
				<li><a href="<?=URL?>hl=en">English</a></li>
				<li><a href="<?=URL?>hl=de">Deutsch</a></li>
			</ul>
		</div>
		<!-- /select language-->
		<!-- topbar_contacts-->
		<ul class="topbar_contacts -mobile_sidebar">
			<li class="topbar_contacts--item">
				<span class="contact_phone">
					<i class="icons8-phone"></i><a href="tel:+6531590589">+65 (31) 59 0589</a>
				</span>
			</li>
			<li class="topbar_contacts--item">
				<span class="contact_email">
					<i class="icons8-message"></i>
					<a href="mailto:ripe@swingfish.trade">ripe@swingfish.trade</a>
				</span>
			</li>
			<li class="topbar_contacts--item">
				<span class="contact_quote">
					<i class="icons8-talk"></i>
					<a href="#">Get a Quote</a>
				</span>
			</li>
		</ul>
		<!-- /topbar_contacts-->
		<!-- follow us-->
		<div class="follow_us -mobile_sidebar">
			<strong>Follow us</strong>
			<ul>
				<li><a href="https://www.facebook.com/SwingFish-151803395351801/" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/nullx8" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="https://youtube.com/c/swingfish" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
		</div>
		<!-- /follow us-->
		<div class="mobile_sidebar--buttons">
			<?
											if ($Youtube['live'] == 'true') {
												echo '<a href="'.URL.'index.php?go=live" class="button -waikawa_red">Trading Live!!</a>';
												}
												else {
													echo '<<a href="'.URL.'youtube" class="button -waikawa_gray">Video Archive</a>';
												} ?>
		</div>
	</div>
	<script src="<?=URL?>assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="<?=URL?>assets/libs/Headhesive.js/dist/headhesive.min.js"></script>
	<script src="<?=URL?>assets/libs/slideout.js/dist/slideout.min.js"></script>
	<link rel="stylesheet" href="<?=URL?>assets/libs/magnific-popup/dist/magnific-popup.css">
	<script src="<?=URL?>assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="<?=URL?>assets/libs/youtubeBackground.min/build/jquery.youtubebackground.min.js"></script>
	<script src="<?=URL?>assets/libs/vide/dist/jquery.vide.min.js"></script>
	<script src="<?=URL?>assets/libs/social-sharing-buttons/social-buttons.js"></script>
	<link rel="stylesheet" href="<?=URL?>assets/libs/social-sharing-buttons/social-buttons.css">
	<script src="<?=URL?>assets/libs/mixitup/build/jquery.mixitup.min.js"></script>
	<script src="<?=URL?>assets/libs/isMobile/isMobile.min.js"></script>
	<script src="<?=URL?>assets/libs/isInViewport/lib/isInViewport.min.js"></script>
	<script src="<?=URL?>assets/libs/progressbar.js/dist/progressbar.min.js"></script>
	<script src="<?=URL?>assets/libs/select2/dist/js/select2.min.js"></script>
	<script src="<?=URL?>assets/libs/tabby/dist/js/tabby.min.js"></script>
	<script src="<?=URL?>assets/libs/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
	<script src="<?=URL?>assets/libs/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
	<script src="<?=URL?>assets/libs/blueimp-file-upload/js/jquery.fileupload.js"></script>
	<script src="<?=URL?>assets/libs/slick-carousel/slick/slick.min.js"></script>
	<link rel="stylesheet" href="<?=URL?>assets/libs/slick-carousel/slick/slick.css">
<? if ((isset($LoadYoutubePlayer))&&($LoadYoutubePlayer===true)) { ?>
	<script type="text/javascript" id="www-widgetapi-script" src="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/www-widgetapi.js" async=""></script>
	<script src="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/iframe_api"></script>

	<link href="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/css.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/icons.min.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/youtube-video-player.min.css">

	<!-- Main Javascript -->
	<script type="text/javascript" src="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/youtube-video-player.jquery.js"></script>

	<!-- Perfect Scrollbar -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/perfect-scrollbar.css">
	<script type="text/javascript" src="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?=URL?>lib/3rd/youtube/youtube-playlist-video-player/perfect-scrollbar.js"></script>
<script>
if (window.top !== window.self) {
	document.write = "";
	window.top.location = window.self.location;
	setTimeout(function(){
		document.body.innerHTML='';
	},0);

	window.self.onload=function(evt) {
		document.body.innerHTML='';
	};
}else {
$(document).ready(function() {
			$("#swingfish-live").youtube_video({
				<?=$Youtube['player']?>
				user: false,
				max_results: 10,
				pagination: true,
				continuous: true,
				first_video: 0,
				show_playlist: 'auto',
				playlist_type: 'horizontal',
				show_channel_in_playlist:true,
				show_channel_in_title: true,
				width: false,
				show_annotations: false,
				now_playing_text: 'Now Playing',
				load_more_text: 'Load More',
				force_hd: false,
				hide_youtube_logo: false,
				play_control: true,
				time_indicator: 'full',
				volume_control: true,
				share_control: true,
				fwd_bck_control: true,
				youtube_link_control: true,
				fullscreen_control: true,
				playlist_toggle_control:true,
				volume: false,
				show_controls_on_load: true,
				show_controls_on_pause: true,
				show_controls_on_play: false,
				player_vars: {},
				colors: {
					'controls_bg': 'rgba(0,0,0,.9)'
				},
			});

		});
}
</script>
<? } ?>
<script src="<?=URL?>assets/scripts/main.js"></script>
<?
//readfile(URI."lib/3rd/mylivechat/embed.txt");
readfile(URI."lib/3rd/google/analytics/include.js");
readfile(URI."lib/3rd/twak/embed.".$_SESSION['hl'].".txt");
?></body>
</html>
