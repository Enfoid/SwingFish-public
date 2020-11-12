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

			<iframe src="https://www.joicaster.co/embed/swingfish?autoplay=true&mode=dark&transparent=true" frameborder="0" style="width:768px;height:432px;" allowfullscreen></iframe>



			</div>
		</div>
	</div>
</section>