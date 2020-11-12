<section class="sectionf">
	<div class="container">
		<? if ($Youtube['live'] == 'true') { ?>
		<div class="row">
			<p>
				<center>Live Trading Active ! dies ist ein Live-Video!
					&nbsp; <a href="<?=URL?>journal"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>Aktueller Tagebuch eintrag (English)</button></a>
					&nbsp; <a href="youtube"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>Alle Aufzeichnungen</button></a>
				</center>
			</p>
		</div>
		<? } else { ?>
		<div class="row">
			<p>
				<center><strong>Stream ist momentan nicht aktiv</strong> (unten koenne sie aufzeichnungen sehen)<br />
				<small>sobald die Live-Übertragung weiter geht können Sie diese hier sehen.</small>
				</center>
			</p>
			<p>
				<center>
					<a href="<?=URL?>journal"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>Aktueller Tagebuch eintrag (English)</button></a>
					&nbsp; <a href="youtube"><button type="button" class="share--opener js-share--opener"> <i class="icons8-share"></i>Alle Aufzeichnungen</button></a>
				</center>
			</p>
		</div>
		<? } ?>
		<div class="row">
			<center>
				<iframe width="1138" height="641" src="https://www.youtube.com/embed/<?=$Youtube['videoId']?>?autoplay=1&amp;list=PLfixdpfYwUzHFl-4PeMeFcJ-LbSE9x8wV" frameborder="0" allowfullscreen></iframe>
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
	</div>
</section>
<? } ?>