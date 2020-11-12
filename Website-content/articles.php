<? include("lib/articles.php"); ?><section class="section">
					<div class="container">
						<div class="section--header">
							<h2 class="section--title">Latest Finance News</h2>
							<p class="section--description">
								Morbi placerat justo in scelerisque dapibus. Quisque tristique, nisi id viverra tristique,
								<br> lorem enim vestibulum ante, sed maximus magna neque nec metus.
							</p>
						</div>
						<div class="section--container">
							<div class="blog">
								<div class="row">

<?
	$m = getStructure("Tradinglog");
// print_r($m);
foreach ($m as $v) {
	
?>									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b01.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="<?=$v['url']?>" rel=""><?=$v['name']?></a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date"><?=HumanAgo($v['date'],2)?></li>
<? //													<li class="article--meta_item -comments">33 Comments</li>
?>												</ul>
											</header>
											<div class="article--content">
												<p><? print_r($v); ?></p>
											</div>
											<div class="article--footer">
												<a href="<?=$v['url']?>" class="link">Read More</a>
											</div>
										</div>
									</div>

<? } ?>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b02.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">What It Takes To Learn Finance?</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="clearfix visible-sm-block"></div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b03.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">In 2016 The Industry Will Disrupt</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="clearfix visible-lg-block clearfix visible-md-block"></div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b04.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">How To Invest In a Smart Way?</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="clearfix visible-sm-block"></div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b05.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">Best Finance Managing Apps</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b06.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">How To Increase Your Savings?</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="clearfix visible-lg-block clearfix visible-md-block visible-sm-block"></div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b07.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">8 Ways To Start Saving Today</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b08.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">Finance Is A Core Thing In Life</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="clearfix visible-sm-block"></div>
									<div class="col-md-4 col-sm-6">
										<div class="article -blog_page">
											<figure class="article--preview"><img src="./assets/images/content/blog/b09.jpg" alt=""></figure>
											<header class="article--header">
												<h2 class="article--title"><a href="#" rel="">Spend Less Than You Earn</a></h2>
												<ul class="article--meta">
													<li class="article--meta_item -date">December 28, 2015</li>
													<li class="article--meta_item -comments">33 Comments</li>
												</ul>
											</header>
											<div class="article--content">
												<p>Praesent mollis vitae erat eu vulputatole stie, purus ut elementum placerat, nibauris scelerisque nulla, hendrerit vulpate augue.</p>
											</div>
											<div class="article--footer">
												<a href="#" class="link">Read More</a>
											</div>
										</div>
									</div>
									<div class="clearfix visible-lg-block clearfix visible-md-block"></div>
								</div>
								<!-- pagination-->
								<nav class="pagination"><a href="#" class="pagination--link -prev"><i class="icons8-right"></i>&nbsp; Previous Page</a>
									<ul>
										<li><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#" class="-active">3</a></li>
										<li>...</li>
										<li><a href="#">9</a></li>
										<li><a href="#">10</a></li>
									</ul><a href="#" class="pagination--link -next">Next Page &nbsp;<i class="icons8-right"></i></a>
								</nav>
							</div>
						</div>
					</div>
				</section>