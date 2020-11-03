<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Description" CONTENT="<?
	    if (isset($Meta[$hl]['summary'])) {
		    echo $Meta[$hl]['summary'];
		}
		else {
			echo 'SwingFish is a community-based project, by traders, for traders, with the goal of obtaining financial independence quickly and without the usual costs involved.';
		}
	    ?>">
   	<title><?=$Meta[$hl]['title']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic,400italic,600italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?=URL?>assets/styles/main.css?tz=<?=$Svn['revision']?>">
	<link rel="stylesheet" href="<?=URL?>assets/styles/tooltips.css">
	<? readfile(URI."lib/3rd/Facebook/pixel/include.js"); ?>
</head>

<body>
	<div id="main">
		<div class="layout">
			<div class="layout--header">
<?
			include(URI."assets/theme/topbar.php");

?>				<header class="header">
					<div class="container">
						<div class="header--inner">
							<div class="row">
								<div class="col-lg-2 col-md-12">
									<div class="header--logo logo">
										<a href="<?=URL?>"><img src="<?=URL?>assets/images/swingfish/logo_full.png" alt="" /><br /><small></a>
									</div>
								</div>
								<div class="col-lg-10 col-md-12 visible-md-block visible-lg-block">
									<div class="header--right">
										<div class="header_contacts">
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-phone color_violet"></i>
													<strong><a href="tel:+6531590589">+65 31 59 0589</a></strong>
													<span><a href="tel:+4962118069680">+49 621 180 69 680</a></span>
												</div>
											</div>
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-refund-2 color_violet"></i>
													<a href="<?=URL?>backed-funds"><strong>Equity: $ <?=number_format($Coverstats['totalequity'])?></strong></a>
													<span> <?
													if ($Coverstats['newsize'] > 1000) {
														echo '<a href="'.URL.'risk-free">Available: <font color="green">$ '.number_format(round($Coverstats['newsize'], -3)).'</font></a>';
													}
													?></span>
												</div>
											</div>
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-currency-exchange color_violet"></i>
													<strong><a href="<?=URL?>strategies"><acronym title="Updated: <?=$TradeStats['updated']?>"><?=$TradeStats['name']?></acronym>: +<?=round($TradeStats['gain'],2)?>%</strong></a>
													<span><? if ($TradeStats['today']['gain'] > 0) {
														echo ' Gain Today: '.$TradeStats['today']['gain'].'%';
													} else {echo "waiting for Setup..."; } ?></span>
												</div>
											</div>
										</div>
										<?
											/*
												if ($Youtube['live'] == 'true') {
												echo '<a href="'.URL.'live" class="button -red -menu_size"><span class="button--inner">Trading Live !!</span></a>';
											}
											else {
												echo '<a href="'.URL.'youtube" class="button -blue_light -bordered -menu_size"><span class="button--inner">Video Archive</span></a>';
											}
											*/
											?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<nav class="header_nav -violet -wide visible-md-block visible-lg-block">
						<div class="header_nav--inner">
							<ul class="menu">
<?
	/*
								<li class="menu-item current-menu-item"><a href="<?=URL?>">Home</a></li>
										<li class="menu-item">
									<a href="#">About</a>
									<!-- submenu-->
									<ul class="sub-menu">
										<li class="menu-item"><a href="#">Page 1</a></li>
										<li class="menu-item"><a href="#">Page 2</a></li>
										<li class="menu-item menu-item-has-children">
											<a href="#">Page 3</a>
											<ul class="sub-menu">
												<li class="menu-item"><a href="#">Page 1</a></li>
												<li class="menu-item menu-item-has-children">
													<a href="#">Page 2</a>
													<ul class="sub-menu">
														<li class="menu-item"><a href="#">Page 1</a></li>
														<li class="menu-item"><a href="#">Page 2</a></li>
														<li class="menu-item"><a href="#">Page 4</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>
<?
*/
?>
								<li class="menu-item"><a href="<?=URL?>risk-free"><font color="green"><strong>Risk Free</strong></font></a></li>
								<li class="menu-item menu-item-has-mega-menu">
									<a href="<?=URL?>strategies">Strategies</a>
									<div class="mega-menu">
										<div class="mega_nav">
											<div class="container">
												<div class="row">
													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>strategy/1000" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/001.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>1000</strong></dt>
																<dd>Trading Room</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>strategy/solarwave" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/002.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>Solar Wave</strong></dt>
																<dd>Short-term Swing Scalping</dd>
															</dl>
														</a>
													</div>

													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>strategy/ub-noise" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/001.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>UB Noise</strong></dt>
																<dd>This makes Noise</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>strategy/mfcrowd" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/001.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>mf Crowd</strong></dt>
																<dd>power of Unity</dd>
															</dl>
														</a>
													</div>
												</div>
											</div>
											<a href="<?=URL?>strategies" class="mega_nav--open_all"><span>All Strategies</span></a>
										</div>
									</div>
								</li>
<?
	/*
										<li class="menu-item menu-item-has-mega-menu">
									<a href="#">News</a>
									<div class="mega-menu">
										<div class="mega_nav">
											<div class="container">
												<div class="row">
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/201.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>What it takes to learn text text</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/202.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>How to invest in a sma...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/203.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>8 ways to start saving t...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/204.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>How to become rich</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/205.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>Financial market is gro...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/206.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>Best Finance Managing...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/207.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>Finance is a core thing i...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/208.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>The less you spent...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/209.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>In 2016 industry will d...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/210.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>How to increase your sa...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/211.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>Spend less than you earn</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/212.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong>Investment opportu...</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
												</div>
											</div>
											<a href="#" class="mega_nav--open_all"><span>All News</span></a>
										</div>
									</div>
								</li>
*/
?>
<?
if ($Youtube['live'] == 'true') {
	echo '								<li class="menu-item"><a href="'.URL.'live"><font color="red"><strong>Trading LIVE</strong></font>';
	echo '<span class="menu-item-notify" style="background: red;">NOW!</span>';
	echo '</a></li>';
}
else {
	echo '								<li class="menu-item"><a href="'.URL.'youtube">Videos<span class="menu-item-notify">'.$Youtube['videocount'].'</span></a></li>';
}
	echo '								<li class="menu-item"><a href="'.URL.'chat">Chat';
	if ($Discord['usercount'] > 3) { echo '<span class="menu-item-notify">'.$Discord['usercount'].'</span>'; }
	echo '</a></li>';
?>
								<li class="menu-item"><a href="<?=$wp_draft['link']?>">Journal<?
									if ($wp_draft['hasdraft'] == '1') {
										echo '<span class="menu-item-notify" style="background: red;">New Draft!</span>'; 
									}
								?></a></li>
								<li class="menu-item menu-item-has-mega-menu">
									<a href="<?=URL?>blog">Blog<span class="menu-item-notify"><?=$wp_totals[1]?></span></a>
									<div class="mega-menu">
										<div class="mega_nav">
											<div class="container">
												<div class="row">
<?
	foreach ($wp_cat as $v) {
		if ($v['count'] > 0) {?>
													<div class="col-md-3 col-xs-4">
														<a href="<?=$v['link']?>" class="mega_nav--item">
															<figure class="mega_nav--item_image"><img src="<?=URL?>assets/images/content/mega_nav/001.jpg" alt="" /></figure>
															<dl class="mega_nav--item_body">
																<dt><strong><?=$v['name']?></strong></dt>
																<dd><?=$v['count']?> entries</dd>
															</dl>
														</a>
													</div>
	<?	}
	}
?>
												</div>
											</div>
											<a href="<?=URL?>blog" class="mega_nav--open_all"><span>Explore Blog</span></a>
										</div>
									</div>
								</li>
									<li class="menu-item">
									<a href="#">Connect</a>
									<!-- submenu-->
									<ul class="sub-menu">
										<li class="menu-item"><a href="<?=URL?>enfoid-clientlogin">Client Login</a></li>
										<li class="menu-item"><a href="<?=URL?>contact">Contact Us</a></li>
										<li class="menu-item"><a href="<?=URL?>brokers-ctrader">Our Brokers</a></li>
										<li class="menu-item menu-item-has-children">
											<a href="#">Social</a>
											<ul class="sub-menu">
														<li class="menu-item"><a target="_blank" href="<?=$LINKS['youtube']?>">Youtube</a></li>
														<li class="menu-item"><a href="<?=$LINKS['facebook']?>">Facebook</a></li>
                                                                                                               <li class="menu-item"><a href="<?=$LINKS['line']?>" target="_blank">Line</a></li>
														<li class="menu-item"><a href="<?=URL?>chat">Chatroom</a></li>

											</ul>
										</li>
									</ul>
								</li>
								<li class="menu-item menu-item-has-mega-menu">
									<a href="<?=URL?>info">Information</a>
									<div class="mega-menu">
										<div class="mega_nav">
											<div class="container">
												<div class="row">
													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>economic-calendar" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-overtime"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Economic Calendar</strong></dt>
																<dd>Intra-Day Events and News</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>currency-divergence_xscalp.com" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-bullish"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Currency Divergence</strong></dt>
																<dd>36 Hour Divergence</dd>
															</dl>
														</a>
													</div>

													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>backed-funds" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-umbrella"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Real-time Coverage</strong></dt>
																<dd>SwingFish Backup Funds</dd>
															</dl>
														</a>
													</div>

													<div class="col-md-3 col-xs-4">
														<a href="<?=URL?>calculate-compounded-earnings" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-refund-2"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Compounding Calculator</strong></dt>
																<dd>Witness  the power of compounding interest</dd>
															</dl>
														</a>
													</div>
<?
	/*
														<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-diamond"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Accounting1</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-umbrella"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Finance Aid2</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-online-support"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Worldwide Support3</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-reviewer"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Financial Planning</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-business"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Consulting</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-currency-exchange"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Money Transfers</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-idea"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Idea Generation</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-coins"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Consulting</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-customer-support"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Online Support</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
													<div class="col-md-3 col-xs-4">
														<a href="#" class="mega_nav--item -icon">
															<span class="mega_nav--item_icon icons8-lifebuoy"></span>
															<dl class="mega_nav--item_body">
																<dt><strong>Additional Help</strong></dt>
																<dd>Ut vitae eros ipsum supe ut vitae eros ipsum supe</dd>
															</dl>
														</a>
													</div>
												</div>
*/
?>											</div>
											<a href="<?=URL?>info" class="mega_nav--open_all"><span>All Information</span></a>
										</div>
									</div>
								</li>
								<li class="menu-item"><a href="<?=URL?>terms">FAQ</a></li>
<?
	/*
										<li class="menu-item menu-item-search">
									<form action="#" class="header_search js-header_search">
										<button type="button" class="header_search--opener js-header_search--opener"><i class="icons8-search"></i></button>
										<fieldset class="header_search--dropdown js-header_search--dropdown">
											<input type="text" placeholder="SEARCH" />
										</fieldset>
									</form>
								</li>
*/
?>							</ul>
						</div>
					</nav>
					<div class="header--menu_opener visible-xs-block visible-sm-block">
						<span class="c-hamburger c-hamburger--htx">
							<span>toggle menu</span>
						</span>
					</div>
				</header>
			</div>
<?
	// banner on top for news and realtime stuff
/*
	if ($Youtube['live'] == 'true') {
	echo '<div class="layout--container">
				<div class="page_header">
					<div class="container">
						<button class="button -red -menu_size"><span class="button--inner">Trading Live Now!</span></button>
					</div>
			</div>';
}
*/

/*
	// breadcrumbs
					<nav class="breadcrumbs">
					<div class="container">
						<ul class="breadcrumbs--list">
							<li class="breadcrumbs--item"><a href="#" class="breadcrumbs--link">Home</a></li>
							<li class="breadcrumbs--item"><a href="#" class="breadcrumbs--link -active">Careers</a></li>
						</ul>
					</div>
				</nav>
*/
