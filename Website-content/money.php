<?
$funds = json_decode(file_get_contents('http://www.enfoid.com/api/a/enfoid/fundstats.php')); // use the PHP so this page will trigger the update of data	
// print_r($funds);
?>
<section class="container">
	<div class="row padding-top">
		<div class="main col-md-12">
			<h3 class="swingfish">Money, the Commodity of Traders!</h3>
        <h4><small>and we've got it!</small></h4>
      <p>We believe that a successful trader has no need to take money from a beginner or someone wants to get a better edge, as a result, <strong>all Services, Tools and Advice is offered Free of Charge to SwingFish Members (Non-Profit)</strong>, SwingFish partners only with other companies if they can directly and positively effect our Members and the SwingFish goal of providing an edge for free or a mutual benefit.</p>
<?
/*
        <div class="row padding-top">
        <div class="col-sm-4">
          <div class="counter" data-duration="2700">
            <div class="digits"><?=round($funds->stats->iblink->w*2.9,0)?></div> 
            <footer class="counter-footer">
              Broker Rebates Paid back this week
            </footer>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="counter" data-duration="1500">
            <div class="digits"><?=round($funds->stats->paid->m*2.9,0)?></div>
            <footer class="counter-footer">
              Interests Paid this week
            </footer>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="counter featured" data-duration="2500">
            <div class="digits"><?=round($funds->totals->newsize,0)?></div>
            <footer class="counter-footer">
              Payable this week! via EnFoid Lenders
            </footer>
          </div>
        </div>
      </div><!-- .row -->
*/
?>	  <div class="row padding-top">
          <!-- Plan -->
          <div class="col-sm-4">
            <div class="pricing-plan">
              <div class="pricing-header">
                <div class="pricing-icon">
                  <img src="/assets/images/swingfish-blurr-bg.png" style="height:37;" height="37" alt="SwingFish Rebate">
                </div>
                <h3 class="pricing-title">SwingFish Trader Rebate</h3>
                <p>Cash-back on your Trades</p>
              </div>
                <a href="<?=URL?>free-money-trade-rebate" class="btn btn-primary btn-icon-right waves-effect waves-light">more details<i class="icon-arrow-right"></i></a>
              <ul>
                <li>Discounts paid back to you</li>
                <li>Per Lot <strong>~ 2$</strong></li>
                <li>Spread <strong>~ 0.3 - 0.5 pips</strong></li>
              </ul>
				<div class="counter" data-duration="2700">
					<div class="digits"><?=round($funds->stats->iblink->w*2.9,0)?></div>
					<font size="0.8em">Broker Rebates Paid back this week</font>
				</div>
            </div>
          </div>
          <!-- Plan -->
          <div class="col-sm-4">
            <div class="pricing-plan">
              <div class="pricing-header">
                <div class="pricing-icon">
                  <img src="/assets/images/enfoid/enfoidlogo_header_small.png" style="height:37;" height="37" alt="EnFoid">
                </div>
                <h3 class="pricing-title">Funded Trading Account</h3>
                <p>Trade our Money</p>
                <a href="/funded-trading-account-with-shared-profit" target="_top" class="btn btn-info btn-icon-right waves-effect waves-light">more details<i class="icon-arrow-right"></i></a>
              </div>
              <ul>
                <li>Straight forward Profit-Share</li>
                <li><strong>5 Million USD</strong> Buying Power</li>
                <li>get <strong>50%</strong> of your Profits</li>
              </ul>
          <div class="counter" data-duration="1000">
            <div class="digits"><?=round($funds->totals->newsize,0)?></div>
            <font size="0.8em">Payable this week! via EnFoid Lenders</font>
          </div>
            </div>
          </div>
          <!-- Plan -->
          <div class="col-sm-4">
            <div class="pricing-plan">
              <div class="pricing-header">
                <div class="pricing-icon">
                  <img src="/blog/wp-content/uploads/2017/12/enfoid-lenders-logo.png" style="height:37;" height="37" alt="EnFoid">
                </div>
                <h3 class="pricing-title">EnFoid Lenders</h3>
                <p>Lending Based with Guaranteed Gains</p>
                <a href="https://www.enfoid.com/investors" target="_blank" class="btn btn-default btn-icon-right waves-effect waves-light">more details<i class="icon-arrow-right"></i></a>
              </div>
              <ul>
                <li>No Minimum required</li>
                <li>Interest <strong>9.55%</strong> <small>p.a.</small> (Guaranteed)</li>
                <li>Dividends up to <strong>0.35%</strong> <small>weekly</small></li>
              </ul>
          <div class="counter" data-duration="1500">
            <div class="digits"><?=round($funds->stats->paid->m*2.9,0)?></div>
            <font size="0.8em">Interests Paid this week</font>
          </div>
            </div>
          </div>
		<p align="right" font-size="0.8em"><small>[ financial values in S$, updated <?=HumanAgo($funds->updated)?> ]</small></p>
      </div><!-- .row -->
	  <div class="row padding-top">
		  <div class="col-sm-12" style="width:100%;padding-top:10px;border: 2px solid #1bdb68; margin: 0 auto 30px auto;">
			  <h3 class="pricing-title">Partner with us</h3>
			  <p>Help spread the word, we pay 1% deposit and 6% Profit commissions, forever.</p>
			  <p align="right"><a href="/contact" class="btn btn-default btn-icon-right waves-effect waves-light">send us a Message<i class="icon-arrow-right"></i></a></p>
		  </div>
		  <div class="col-sm-12" style="width:100%;padding-top:10px;border: 2px solid #1bdb68; margin: 0 auto 30px auto;">
			  <h3 class="pricing-title">Show the Love</h3>
			  <p>Here are a few way's where you can support the cause and be a part of it, without us capitalise on you<br />
			  However members that do support us enjoy a more direct support by myself and our Mates.</p>
			  <p align="right">There are 4 ways of doing this:<br />
			  <a href="https://www.youtube.com/channel/UCqEcEGQ0sG89j7ZhOdgFOyg/join" class="btn btn-default btn-icon-right waves-effect waves-light mr-3">become a Youtube Member<i class="icon-arrow-right"></i></a><a href="https://www.patreon.com/swingfish" class="btn btn-default btn-icon-right waves-effect waves-light mr-3">become a Patreon<i class="icon-arrow-right"></i></a><a href="https://www.youtube.com/channel/UCqEcEGQ0sG89j7ZhOdgFOyg/join" class="btn btn-default btn-icon-right waves-effect waves-light mr-3">Boost the Discord Server<i class="icon-arrow-right"></i></a>			  <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=paypal@enfoid.com&item_name=SwingFish Community&item_number=Direct Donation&amount=5%2e00&currency_code=SGD" class="btn btn-default btn-icon-right waves-effect waves-light">Donate<i class="icon-arrow-right"></i></a></p>
		  </div>
</p>
		  </div>
      </div><!-- .row -->
      </section><!-- .container -->

