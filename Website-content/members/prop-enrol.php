<h3 class="swingfish">50% of the profit is yours!</h3>
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
$_SESSION['discord']['return'] = "/members/prop";
if (checkDiscordPermissionHtml('member')){


if ((!isset($_REQUEST['endorsedby']))||(strlen($_REQUEST['endorsedby'])<3)) {
	echo'<pre><a href=/members/prop>form-info is missing, please complete the initial step first!</a></pre>';
}
else {
$_SESSION['captcha'] = rand(3, 7).rand(2, 5);
?>
<form method="post" action="/lib/3rd/PHPMailer/tawkmail.php">
<div class="row">
					<?
					if (isset($_SESSION['form'])){
						if ($_SESSION['form'] == "OK") {
							echo '<blockquote class="bg-success">Message has been sent<br />
						you will receive a confirmation by email in a few moments,<br />
						if you not got a confirmation, <strong>check your SPAM Folder!</strong></blockquote>';
						}
						else {
							echo '<blockquote class="bg-danger">Message has NOT sent<br />'. $_SESSION['form'].'</blockquote>';
						}
						unset($_SESSION['form']);
					}
					?>	<div class="col-12">
		<div class="card">
				Discord: @<?=$_SESSION['discord']['nick']?> (<?=$_SESSION['discord']['email']?>) | endorsed by: <?=$_REQUEST['endorsedby']?> | donation: <?=intval(@$_REQUEST['donation'])?> USD
				<input type="hidden" name="return" value="members/prop-enrol-confirm">
				<input type="hidden" name="cc" value="<?=$_SESSION['captcha']?>">
				<input type="hidden" name="discord" value="<?=$_SESSION['discord']['id']?>">
				<input type="hidden" name="email" value="<?=$_SESSION['discord']['email']?>">
				<input type="hidden" name="endorsedby" value="<?=$_REQUEST['endorsedby']?>">
				<input type="hidden" name="donation" value="<?=$_REQUEST['donation']?>">
				<label class="form-label">Personal Information</label>
				<input type="text" name="message" placeholder="Firstname" required>
				<input type="text" name="lname" placeholder="Lastname" required>
				<input type="text" name="country" placeholder="Country" required>
		</div>
	</div>
</div>

<hr />


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="form-group">
				<label class="form-label">Demo Trading Experience?<span class="form-required">*</span></label>
				<select name="experience_demo" class="form-control custom-select" required>
					<option value="" SELECTED>-- Select true statement</option>
					<option value="never">Never traded Demo</option>
					<option value="months">few months</option>
					<option value="+1year">more than one year</option>
					<option value="+3year">more than 3 years</option>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">Live account (<strong>MORE THAN 5000$!!!</strong>)<span class="form-required">*</span></label>
				<select name="experience_live" class="form-control custom-select" required>
					<option value="" SELECTED>-- Select true statement</option>
					<option value="never">Never traded Live</option>
					<option value="months">few months</option>
					<option value="+1year">more than a year</option>
					<option value="+3year">more than 3 years</option>
				</select>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<p><i>Account Leverage</i></p>
				<p>compare 2 accounts <br />
					one has 1:1000 Leverage and the other one has 1:30 Leverage, Buying 1 Lot EURUSD on both with a 10 pip stop.</p>
				<div class="form-group">
					<label class="form-label">Which account will have the greater loss when Stop-loss is hit?<span class="form-required">*</span></label>
					<select name="q1_leverage" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="1000">the account with 1:1000 Leverage will have a Greater Loss</option>
						<option value="30">the account with 1:30 Leverage will have a Greater Loss</option>
						<option value="SAME.">Both accounts will have the same loss</option>
						<option value="dontknow">i don't know</option>
					</select>
				</div>
				<p><i>Loss recovery</i></p>
				<div class="form-group">
					<label class="form-label">how much gain do you need to produce in order to recover from a 50% loss?<span class="form-required">*</span></label>
					<select name="q1_lossrecovery" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="50">make 50% to recover the loss</option>
						<option value="100.">a future gain of 100% will pay for the loss</option>
						<option value="150">a future gain of 150% will pay for the loss</option>
						<option value="dontknow">i don't know</option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">Your drawdown limit is 5%. Do you think open positions contribute to this limit? (according to our <a href="/prop/rules">rules</a>)?<span class="form-required">*</span></label>
					<select name="q1_equitydd" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="ddcountasloss.">Yes, because the open positions do contribute to Equity Drawdown</option>
						<option value="dddnotrecorded">No, Open positions are not recorded on the Account balance</option>
						<option value="ddprofit">No, the profit will be greater.</option>
						<option value="dontknow">i don't know</option>
					</select>
				</div>

				<div class="form-group">
					<label class="form-label">if you risk 5% per trade, and have 5 losses in a row how great will be the total loss?<span class="form-required">*</span></label>
					<select name="q1_compounding" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="-15">less than 15% loss</option>
						<option value="-25.">less than 25% loss</option>
						<option value="25">25% loss</option>
						<option value="+25">more than 25% loss</option>
						<option value="+50">more than 50% loss</option>
						<option value="dontknow">i don't know</option>
					</select>
				</div>

				<p><i>Chance</i></p>
				<div class="form-group">
					<label class="form-label">if you flip a coin 10 times and it comes up "Tails" 7 times, how likely is it that it will come up "tails" the next flip?<span class="form-required">*</span></label>
					<select name="q1_coinflip" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="HEADS">Very likely to be "Heads"</option>
						<option value="TAILS">Very likely to be "Tails"</option>
						<option value="SAME.">50:50 chance for Heads or Tails</option>
						<option value="dontknow">i don't know</option>
					</select>
				</div>

				<p><i>Technical</i></p>
						<div class="form-group">
							<label class="form-label">which position has the greater loss?<span class="form-required">*</span></label>
							<select name="q1_loss" class="form-control custom-select" required>
								<option value="" SELECTED>-- Select true statement</option>
								<option value="2EURUSD60">Buy 2 Lots EUR / USD with 60 pip Stop-loss</option>
								<option value="4EURUSD30">Buy 4 Lots EUR / USD with 30 pip Stop-loss</option>
								<option value="5EURAUD60">Buy 5 Lots EUR / AUD with 60 pip Stop-loss</option>
								<option value="5EURUSD60.">Buy 5 Lots EUR / USD with 60 pip Stop-loss</option>
								<option value="20EURUSD6">Buy 20 Lots EUR / USD with 6 pip Stop-loss</option>
								<option value="20EURAUD6">Buy 20 Lots EUR / AUD with 6 pip Stop-loss</option>
							</select>
							<label class="form-label">Why?<span class="form-required">*</span></label>
							<input type="text" class="form-control" name="q1_loss_why" placeholder="reason for your answer above" value="" required>
						</div>

				<div class="form-group">
					<label class="form-label">which type of order has the least amount of Slippage against you?<span class="form-required">*</span></label>
					<select name="q1_slipageorder" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="MARKET">MARKET (instant execution)</option>
						<option value="LIMIT.">BUY LIMIT / SELL LIMIT</option>
						<option value="STOP">BUY STOP / SELL STOP</option>
						<option value="dontknow">i don't know</option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">will trading larger size via Market order (eg. 1 Lot and 10 Lots make a difference in Slippage and how?<span class="form-required">*</span></label>
					<select name="q1_slipagesize" class="form-control custom-select" required>
						<option value="" SELECTED>-- Select true statement</option>
						<option value="1LOT.">trading smaller than 1 Lot has smaller Slippage</option>
						<option value="10LOTS">trading greater than 10 Lots get you less Slippage</option>
						<option value="SAME">Slippage will be the same as it is based on the Liquidity of the Broker</option>
						<option value="dontknow">i don't know</option>
					</select>
<button type="submit" class="btn btn-primary">Submit Information</button>				</div>
			</div>
		</div>
	</div> 
</div>

<? } 

} else {?>
<img src="https://www.enfoid.com/assets/images/enfoidprop3.png?1" align="right" width="145px" alt="Image">
<p>EnFoid provides free Proprietary Funding to talented SwingFish Members.
<li> you have to be a <strong>ACTIVE & RESPECTED Member</strong> of the SwingFish community.</li>
<li> Revenue created by the <a href="https://www.enfoid.com/project/swingfish" target="_blank">SwingFish Project</a> is used to pay for this process.</li>
<li> Wrong or Fake data provided does result in Disqualification!</li>
<li> this way of getting funded may take some time.</li>
<li> click the "Login with Discord" Button to continue, if you do agree and understand this requirements</li>
<hr />
This may take some time! <a class="btn btn-sm" href="https://www.enfoid.com/prop/fast-track">Click Here to enrol immediately</a> <small>(not requires any participation)</small>.</center></p>
<? } ?>