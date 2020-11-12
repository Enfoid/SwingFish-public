<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<strong>Hey!</strong> as you may have noticed, we in the middle updating the webisite, there may be some layout issues we are still working on, please be partient,<br />we will fix this in the comming days, also adding a new backoffice for EnFoid Lenders with better reporting and more details
</div>
<?
	$LoadYoutubePlayer = true; // this is to load the javascripts in the footer
	
?><section class="sectionf">
	<div class="container">
		<div class="section--container">
			<div class="row">
<?
if ($Youtube['live'] == 'true') {
        echo '<center><a href="#" target="_blank" class="button">Live Session in Progress !!</a></center>';
}
?>
		<br><br>
		<h2>SwingFish <? if ($Youtube['live'] == 'true') { echo "Live Trading"; } else { echo "Video Archive, once back live, you will see the live Trading Room here"; } ?></h2>

			<div id="swingfish-live" class="yesp" style="width: 100%;"></div>



			</div>
		</div>
	</div>
</section>
<style>#playlist.yesp .yesp-controls{background:rgba(0,0,0,.9)!important}#playlist.yesp .yesp-controls a{color:rgba(255,255,255,.5)!important}#playlist.yesp .yesp-controls a:hover{color:rgba(255,255,255,1)!important}#playlist.yesp .yesp-controls a:active{color:rgba(255,255,255,1)!important}#playlist.yesp .yesp-time{color:#FFFFFF!important}#playlist.yesp .yesp-bar,#playlist.yesp .yesp-volume .yesp-volume-bar{background:rgba(255,255,255,.5)!important}#playlist.yesp .yesp-bar .yesp-bar-buffer{background:rgba(255,255,255,.25)!important}#playlist.yesp .yesp-bar .yesp-bar-time,#playlist.yesp .yesp-volume .yesp-volume-bar .yesp-volume-amount{background:#FFFFFF!important}#playlist.yesp .yesp-title-wrapper{color:#FFFFFF!important}#playlist.yesp .yesp-title a.yesp-subtitle{border-color:#FFFFFF!important}#playlist.yesp .yesp-title-wrapper a{color:#DFF76D!important}#playlist.yesp .yesp-playlist-overlay,#playlist.yesp .yesp-hp-overlay,#playlist.yesp .yesp-playlist-current,#playlist.yesp .yesp-hp-current{background: rgba(0,0,0,.5) !important;}#playlist.yesp .yesp-playlist-overlay .yesp-playlist-title,#playlist.yesp .yesp-hp-overlay .yesp-hp-title,#playlist.yesp .yesp-playlist-current,#playlist.yesp .yesp-hp-current{color: #FFFFFF !important;}#playlist.yesp .yesp-playlist-overlay .yesp-playlist-channel,#playlist.yesp .yesp-hp-overlay .yesp-hp-channel {color: #DFF76D !important;}#playlist.yesp .ps-scrollbar-y-rail, #playlist.yesp .ps-scrollbar-x-rail {background: rgba(255,255,255,.25) !important;}#playlist.yesp .ps-scrollbar-y,#playlist.yesp .ps-scrollbar-x {background: #FFFFFF !important;}#playlist.yesp .yesp-next-page,#playlist.yesp .yesp-hp-next-page {background:#000000 !important;color:#FFFFFF !important;}</style><style>#playlist-horizontal.yesp .yesp-controls{background:rgba(0,0,0,.9)!important}#playlist-horizontal.yesp .yesp-controls a{color:rgba(255,255,255,.5)!important}#playlist-horizontal.yesp .yesp-controls a:hover{color:rgba(255,255,255,1)!important}#playlist-horizontal.yesp .yesp-controls a:active{color:rgba(255,255,255,1)!important}#playlist-horizontal.yesp .yesp-time{color:#FFFFFF!important}#playlist-horizontal.yesp .yesp-bar,#playlist-horizontal.yesp .yesp-volume .yesp-volume-bar{background:rgba(255,255,255,.5)!important}#playlist-horizontal.yesp .yesp-bar .yesp-bar-buffer{background:rgba(255,255,255,.25)!important}#playlist-horizontal.yesp .yesp-bar .yesp-bar-time,#playlist-horizontal.yesp .yesp-volume .yesp-volume-bar .yesp-volume-amount{background:#FFFFFF!important}#playlist-horizontal.yesp .yesp-title-wrapper{color:#FFFFFF!important}#playlist-horizontal.yesp .yesp-title a.yesp-subtitle{border-color:#FFFFFF!important}#playlist-horizontal.yesp .yesp-title-wrapper a{color:#DFF76D!important}#playlist-horizontal.yesp .yesp-playlist-overlay,#playlist-horizontal.yesp .yesp-hp-overlay,#playlist-horizontal.yesp .yesp-playlist-current,#playlist-horizontal.yesp .yesp-hp-current{background: rgba(0,0,0,.5) !important;}#playlist-horizontal.yesp .yesp-playlist-overlay .yesp-playlist-title,#playlist-horizontal.yesp .yesp-hp-overlay .yesp-hp-title,#playlist-horizontal.yesp .yesp-playlist-current,#playlist-horizontal.yesp .yesp-hp-current{color: #FFFFFF !important;}#playlist-horizontal.yesp .yesp-playlist-overlay .yesp-playlist-channel,#playlist-horizontal.yesp .yesp-hp-overlay .yesp-hp-channel {color: #DFF76D !important;}#playlist-horizontal.yesp .ps-scrollbar-y-rail, #playlist-horizontal.yesp .ps-scrollbar-x-rail {background: rgba(255,255,255,.25) !important;}#playlist-horizontal.yesp .ps-scrollbar-y,#playlist-horizontal.yesp .ps-scrollbar-x {background: #FFFFFF !important;}#playlist-horizontal.yesp .yesp-next-page,#playlist-horizontal.yesp .yesp-hp-next-page {background:#000000 !important;color:#FFFFFF !important;}</style>
