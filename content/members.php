<div class="container">
	<div class="row padding-top">
		<div class="col-lg-9 col-md-8 col-lg-push-3 col-md-push-4">
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
if ((isset($go[1]))&&($go[1]!="")&&(is_file(URI.'content/members/'.$go[1].'.php'))) {
	include(URI.'content/members/'.$go[1].'.php');
}
else {
	include(URI.'content/members/index.php');
}

$BookCountFile = CACHE.'aws_bookcount';

?>
		</div>
		<div class="col-lg-3 col-md-4 col-lg-pull-9 col-md-pull-8">
			<div class="space-top-3x visible-sm visible-xs"></div>
			<aside class="sidebar space-bottom-2x">
				<section class="widget widget_categories">
					<h3 class="widget-title"><i class="icon-ribbon"></i> Member Center</h3>
					<ul>
						<li><a href="/members">Insider</a></li>
						<? if (checkDiscordPermission(hasDiscord(),'mod')){ echo '<li><a href="/members/cabincrew" style="border: 1px solid #4286f4;">for Cabincrew</a></li>'; } ?>
						<li><a href="/members/prop">Free Forex Funding</a></li>
						<li><a href="/members/downloads">Downloads</a></li>
						<? if (checkDiscordPermission(hasDiscord(),'mate')){
							echo '<li><a href="/members/bookclub" style="border: 1px solid #4286f4;">Book Club<span>'.file_get_contents($BookCountFile).'</span></a></li>';
							echo '<li><a href="https://drive.google.com/drive/u/1/folders/1f6BZuZ3sZOV1pUIjUDyDzrY8NNI_LS2T" target="_blank" style="border: 1px solid #4286f4;">Google Drive</a></li>';
						} ?>
						<li><a href="/members/20percent_more">Higher rebate payout<span>+20%</span></a></li>
						<? if (hasDiscord()){ echo '<li><a href="/members/discordout" style="border: 1px solid #db361b;">Logout</a></li>'; } ?>
					</ul>
				</section>
			</aside>
			<h6 class="text-normal text-muted">Relevant pages</h6>
			<hr class="space-bottom">
			<ul class="list-featured">
				<li><a target="_top" href="/money" class="no-border">SwingFish Money</a></li>
				<li><a target="_blank" href="https://www.enfoid.com/swingfish-business-terms?dv=true" class="no-border">SwingFish Legal</a></li>
				<li><a target="_blank" href="https://www.enfoid.com/prop" class="no-border">EnFoid Prop Trading</a></li>
				<li><a target="_blank" href="https://www.enfoid.com/investors/dv" class="no-border">EnFoid Investments</a></li>
			</ul>
		</div>
	</div>
</div>
