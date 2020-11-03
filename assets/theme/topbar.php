<?
	// language filter
	if ((isset($_REQUEST['go']))&&($_REQUEST['go']!='')){
		$hlgo = $_REQUEST['go'];
	}
	else {
		$hlgo = 'landing';
	}
	?><div class="topbar -violet visible-md-block visible-lg-block">
	<div class="container">
		<div class="row">
			<div class="col-md-1">
				<div class="topbar--left">
					<div class="select_language">
						<?
							if ($_SESSION['hl'] != 'en') {
								?><a title="SwingFish in English" href="<?=URL?>index.php?go=<?=$hlgo?>&hl=en"><img alt="SwingFish in English" src="<?=URL?>lib/3rd/myfxbook/GetMyfxbookStats.php?totals=ajax&flag=en"></a>
						<? }
							if ($_SESSION['hl'] != 'de') {
							?><a title="SwingFish in Deutsch" href="<?=URL?>index.php?go=<?=$hlgo?>&hl=de"><img alt="SwingFish in Deutsch" src="<?=URL?>lib/3rd/myfxbook/GetMyfxbookStats.php?totals=ajax&flag=de"></a>
						<? }
							if ($_SESSION['hl'] == 'th') {
							?><a title="Thai" href="<?=URL?>index.php?go=<?=$hlgo?>&hl=th"><img alt="SwingFish in English" src="<?=URL?>lib/3rd/myfxbook/GetMyfxbookStats.php?totals=ajax&flag=th"></a>
						<? } ?><!-- <button type="button" class="select_language--opener"><i class="select_language--opener_icon icons8-globe-earth"></i>Language</button>
						<ul class="select_language--list">
							<li><a href="<?=URL?>?hl=en">English</a></li>
						
							<li><a href="<?=URL?>?hl=de">Deutsch</a></li>
								<li><a href="<?=URL?>?hl=de">Deutsch</a></li>
							    <li><a href="<?=URL?>?hl=th">&#3652;&#3607;&#3618;</a></li>
						
						</ul> -->
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<a href="<?=URL?>/info"><span style="font-weight: bold; color:white;"><?
					if ($_SESSION['hl'] == 'de') { 
						echo 'Kostenlose Infos, Chat und Hilfe';
					}
					else {
						echo 'Free Infos, Chat, strategies and help'; 
					}
					?></span></a>
				
					<?
					if ($wp_draft['hasdraft'] == '1') {
						echo ' | <a href="'.$wp_draft['link'].'"><span style="font-weight: bold; color:red;">';
						if ($_SESSION['hl'] == 'de') { 
							echo 'Neuer live Tagebucheintrag';
						} else {
							echo 'New Live Journal Draft';
						}
					}
					?></span></a>

					<?
					if ($Youtube['live'] == 'true') {
						echo ' | <a href="'.URL.'live"><span style="font-weight: bold; color:red;">';
						if ($_SESSION['hl'] == 'de') { 
							echo 'Live Trading Aktiv!';
						} else {
							echo 'Live Trading Active!';
						}
					}
					?></span></a>
			</div>
			<div class="col-md-4">
				<div class="topbar--right">
					<div class="follow_us">
						<strong>Social</strong>
						<ul>
							<li><a href="<?=$Links['youtube']?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
							<li><a href="<?=$Links['twitter']?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?=$Links['facebook']?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?=$Links['twitter']?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?=$Links['google+']?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
					<? //		<li><a href="#"><i class="fa fa-pinterest" target="_blank"></i></a></li>
						
						//	<li><a href="#"><i class="fa fa-instagram" target="_blank"></i></a></li>
						//	<li><a href="#"><i class="fa fa-linkedin" target="_blank"></i></a></li>
						?>	
							<li><a href="https://swingfish.trade/blog/feed/" target="_blank"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
