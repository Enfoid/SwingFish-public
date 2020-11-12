<section class="container">
	<div class="row padding-top">
		<div class="main col-md-12">
			<h3 class="swingfish">Free Money with SwingFish Trade rebate!</h3>
      <div class="tile-tabs padding-top padding-bottom">
        <div class="row">
          <div class="col-sm-3">
            <a href="#start" class="tab active" data-toggle="tab">
              <h3 class="tab-title">Get Started</h3>
              <p>some things you need to know,<br />
	              read this first!
              </p>
            </a>
          </div>
          <div class="col-sm-3">
            <a href="#affiliate" class="tab" data-toggle="tab">
              <h3 class="tab-title">Step 1</h3>
              <p>affiliate with SwingFish<br />
	              Sign up or set affiliation
              </p>
            </a>
          </div>
          <div class="col-sm-3">
            <a href="#enfoid" class="tab" data-toggle="tab">
              <h3 class="tab-title">Step 2</h3>
              <p>Register or Log on to EnFoid<br />required to receive Payments</p>
            </a>
          </div>
          <div class="col-sm-3">
            <a href="#linkaccount" class="tab" data-toggle="tab">
              <h3 class="tab-title">Step 3</h3>
              <p>Link your Trading Account<br />
	              let us it's Yours.
              </p>
            </a>
          </div>
        </div><!-- .row -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane transition fade scale in active" id="start">
            <h4>Get Started</h4>
			<p>Forex Brokers mainly use "Partners" (known as "IB" for Introducing Brokers) to advertise their services. These partners help promote the broker to the world. 
For every new customer that is introduced a reward is paid. This reward is called a rebate and is taken from the fees that are always charged to each client as they trade anyway. So you're not paying anything extra, it's just the normal cost of trading with the broker and part of it sometimes goes to the partner who introduced you. </p>
			<p>Now, SwingFish is an IB Partner with several brokers, but we do things a little different. Because SwingFish is non-profit, we pay back the rebates to you! 
So it's extra money coming back to you that would have been lost otherwise. </p>
			<blockquote>In summary, we we pay you back what we would have earned, it's as simple as that!<br /><a align="right" href="/brokers" class="btn btn-sm btn-info">Brokers</a></blockquote>
			<p>Take a look at our <a href="/brokers">Brokers page</a> and you can see all the ones affiliated with us that offer this using the filter "With SwingFish Rebate"
We also include brokers that do not offer rebates to remove any "conflict of interest" as we have no intention of directing someone to a specific broker for any personal and/or financial reasons.
All Broker reviews and listings are for transparency only, giving you a good base to make a decision. Some brokers have good features, whilst others may offer different assets or do things differently. </p>
			<p>just follow Steps 1, 2 and 3 here to get access to the rebates<br /><small>** Please note that all Financial transactions are managed and executed by EnFoid, as SwingFish itself is not a Business but a Non-Profit Project.</small></p>
			<blockquote>SwingFish will not have any Access to your Funds.</blockquote>
		</div><!-- .tab-pane -->
          <div role="tabpanel" class="tab-pane transition fade scale" id="affiliate">
            <h4>Step 1, get Affiliated</h4>
			<p>to make this work you need to "link" your brokerage account to the SwingFish Partner ID, this is so the broker can actually pay us, so we can pay you.</p>
			<ul>
				<li>if you not yet with a Broker, just head to the Broker page, pick the ones that pay rebates, and sign up using the link provided on the page, that will automatically link your new account to SwingFish.</li>
				<li>if you are already with a Broker, you can tell them to Link your account, select from the list below to get emails and ID's to use</li>
			</ul>
			<div id="select" class=""></div>
			<div id="bname" class=""></div>
			<div id="bid" class=""></div>
			<div id="bemail" class=""></div>
			<pre id="bchangetext"></pre><hr />
			<blockquote>not to worry, you can revert this step at any time, as you (and only you) have permission to allow any connections<br />the control over this stays completely in your hand.</blockquote>
          </div><!-- .tab-pane -->
          <div role="tabpanel" class="tab-pane transition fade scale" id="enfoid">
            <h4>Step 2, Login to EnFoid Lenders</h4>
			<p>our company EnFoid does manage all Financial transactions, you will be paid via our Investment System "EnFoid Lenders".</p>
			<p>you will not need to have any balance on your own, all funds in your Lenders account will get paid Interest and Dividends. regardless where they are from.</p>
			<hr />
			<p>head over to <a href="https://www.enfoid.com/user" target="_blank">EnFoid Lenders to log on</a> or <a href="https://www.enfoid.com/fc/register" target="_blank">register a new account</a> (it's free)</p>
			
          </div><!-- .tab-pane -->
          <div role="tabpanel" class="tab-pane transition fade scale" id="linkaccount">
            <img src="/assets/enfoidservices/addibaccount_large.gif" width="320" align="right"><h4>Step 3, Link your Trading account</h4>
			<p>due to privacy, we do not know who owns which account, in order to receive payments you need to link your Trading Account to EnFoid Lenders. simply head to "more" and then to "<a href="https://www.enfoid.com/user/iblink" target="_blank">Link your IB Accounts</a>" to establish the link, after the account receives the first time funds, it will be automatically activated.</p>
			<p>please note that there are additional terms do apply, which you can see here: <a href="https://www.enfoid.com/swingfish-business-terms#ib" target="_blank">SwingFish IB Terms</a>, also in order to eligible for a 100% repayment, you will need to link your Discord account to EnFoid, to confirm that you are a SwingFish Member, you can do this after your account is created by just clicking the <a href="https://www.enfoid.com/user/notifications">authorization link on the Notifications or Profile page</a>.</p>
			<p>that's it, you are all done, money will come your way soon.</p>
			
          </div><!-- .tab-pane -->
        </div><!-- .tab-content -->
      </div><!-- .tile-tabs -->
    </section><!-- .container -->
  <script>

	$(document).ready(function() {
		$.getJSON( "/lib/ib/brokers.json", function( data ) {
			var objs = data;//JSON.parse(input);
		var html = '<select><option>-- Select a Broker --</option>';
		for(var key in objs) {
			console.log(objs[key]);
			html += '<option value="' + key + '">' + objs[key].name + '</option>';
		}
		html += '</select>';
		$('#select').html(html);
		$('select').change(function() {
			var mailtemplate = 'Dear '+objs[$('select').val()].name+' Support Team,\nI would like to request to put my account and profile under SwingFish as introducing broker\non a campaign level.\nas soon as possible. the referral ID for SwingFish is: '+objs[$('select').val()].id+'\n\nYour quick action will be highly appreciated. ';
			$('#bname').html("Affiliate/IB Link: <a target=_blank href="+objs[$('select').val()].link+">"+objs[$('select').val()].name+"</a> (use this <a target=_blanl href="+objs[$('select').val()].link+">link</a> to sign up, and you are all set)<hr />if you already have an account with "+objs[$('select').val()].name+":<br />");
			$('#bid').html("give the Broker our SwingFish IB ID <strong>"+objs[$('select').val()].id+"</strong> (so they can Link your account to Us) ");
			$('#bemail').html("send a email to: <a href=mailto:"+objs[$('select').val()].email+">"+objs[$('select').val()].email+"</a>");
			$('#bchangetext').html(mailtemplate);
		});
	});
});
  </script>
