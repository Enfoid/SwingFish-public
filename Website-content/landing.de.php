<?
	$Islive = false; // prevent from empty variable error
	if ($Youtube['live'] == 'true') { $Islive = true; }
?><section class="section">
	<div class="container">
		<div class="row">
			<header class="section--header">
				<h2 class="section--title">Die Trading Co-Space für Alle</h2>
				<p class="section--description">SwingFish bringt Händler und Investoren zusammen<br />zur Erzielung besserer Ergebnisse in Form von konkurrenzfähigen und insbesonderen <strong>sicheren</strong> Renditen.</p>
			</header>
		</div>
		<div class="row">
			<? if ($Islive === true) { ?><div class="col-md-6"><? } else { ?><div class="col-md-12"><? } ?>
				<ul class="promo_detailed--list">
					<li class="promo_detailed--list_item">
						<span class="promo_detailed--list_item_icon"><i class="icons8-historic-ship"></i></span>
						<dl>
							<dt>Unser Grundsatz</dt>
							<dd>Finanzmärkte sind Märkte an den das Produkt "Geld" in den unterschiedlichsten Formen gehandelt wird, unabhängig von Zeit und Wirtschaft.</dd>
						</dl>
					</li>
					<li class="promo_detailed--list_item">
						<span class="promo_detailed--list_item_icon"><i class="icons8-idea"></i></span>
						<dl>
							<dt>Kein Interessenkonflikt</dt>
							<dd>Alle Leistungen von SwingFish sind im Wesentlichen unentgeltlich! Kostenpflichtige erfolgsungebundene Dienstleistungen würden Ihnen schlussendlich nur einen geringen oder gar keinen Nutzen bieten. Wenn wir Gebühren erheben würden, ergeben sich im Zweifelsfall aus Ihren Verlusten unsere Gewinne, das ist keine Grundlage für seriöse Geldgeschäfte. Aus diesem Grund gibt es bei SwingFish keine Vorab-Gebühren. Einfach formuliert: Wenn Sie erfolgreich sind, sind wir es gemeinsam.</dd>
						</dl>
					</li>
				</ul>
			</div>
			<? if ($Islive === true) { ?><div class="col-md-6 col-sm-12">
											<div class="video">
												<div class="video--content">
													<div class="slide_simple--container">
														<h2 class="slide_simple--title">Live Trading Aktiv!</h2>
														<h4>
															<strong><font color="yellow"><?=$Youtube['title']?></font></strong></h4>
															<h3>Dies ist keine Aufnahme!! Sie Können in Echtzeit die aktivitäten Verfolgen.<br />Klicken sie auf den link "Trading LIVE" oben im Menü.</h3>
														</p>
													</div>
												</div>
											</div>
											<div class="video--background">
												<div class="video--background_placeholder" style="background-image: url(assets/images/swingfish/YoutubeLiveDefault.png)"></div>
												<div class="video--background_color"></div>
												<div data-video-youtube='{"videoId":"<?=$Youtube['videoId']?>"}' class="video--background_video"></div>
											</div>
										</div>
			<? } ?>
		</div>
		<div class="row">
			<div class="services">
				<div class="col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
					<div class="service_item -horizontal">
						<i class="service_item--icon icons8-conference color_picton_blue"></i>
						<h3 class="service_item--title">Zusammen sind wir stark</h3>
						<div class="service_item--text">
							<p>Live-Videos, Ideen, Protokolle, Erfahrungen, von jedermann für jedermann. Alles gebührenfrei!</p>
						</div>
						<footer class="service_item--footer"><a href="<?=URL?>strategies" class="link -blue_light">Werde Teil des Teams...</a></footer>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
					<div class="service_item -horizontal">
						<i class="service_item--icon icons8-currency-exchange color_picton_blue"></i>
						<h3 class="service_item--title">SwingFish zahlt Zinsen</h3>
						<div class="service_item--text">
							<p>Wir verwalten kein Kapital. Wir zahlen ohne Wenn und Aber! Und <strong>das sind keine leeren Worte, sondern bildet die vertragliche Grundlage</strong>.</p>
						</div>
						<footer class="service_item--footer"><a href="<?=URL?>risk-free" class="link -blue_light">Geld verdienen!</a></footer>
					</div>
				</div>
				<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
			</div>
		</div>
	</div>
</section>
