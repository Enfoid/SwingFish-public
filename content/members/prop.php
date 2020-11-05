<h3 class="swingfish">50% of the profit is yours!</h3>
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
$_SESSION['discord']['return'] = "/members/prop";
unset($_SESSION['form']);
if (!checkDiscordPermission($_SESSION['discord']['id'], 'member')) {

if (!checkDiscordPermission($_SESSION['discord']['id'], 'ball')) {
?>
	<div class="col-sm-12" style="width:100%;padding-top:10px;border: 2px solid #1bdb68; margin: 0 auto 30px auto;">
			  <h3 class="pricing-title">Active Membership required !</h3>
			  <p>In order to qualify for Free Forex funding, you need to be an 
			  <h2 align="center">ACTIVE &amp; RESPECTED Member!</h2>
			  <small>You must achieve this first before you can apply here. The application will automatically be visible once this step is completed.</small></p>
<ul>You can achieve this in any way you see fit, but:
	<li> <strong>DO NOT</strong> ask a mod on how to achieve this<br />
		<small>if you do need help in such a basic task, we have no interest in you.</small></li>
	<li> <strong>DO NOT</strong> write support tickets to EnFoid about getting the enrolment done.<br />
		<small>it's free for you, but not for us! don't add to the cost by have us babysit you!. FIGURE IT OUT!</small></li>
	<li> <strong>DO NOT</strong> ask other members to Endorse you!<br />
		<small>it's not how endorsement works, people will regornice your skills and will come forward themselves.<br />
			cutting this short leads to community and application ban</small></li>
	<li> <strong>DO NOT</strong> join the discord for the sole purpose of getting free funding.<br />
<small>if you just join the community for the sole purpose of getting free money,<br />
with no genuine interest in being a active, supportive and respected member, we have no interest in you being here!</small></li>
</ul>

			<p align="right"><a href="https://www.enfoid.com/prop/qform/fasttrack" target="_blank" class="btn btn-default btn-icon-right waves-effect waves-light">Too much ? no problem, with Fast-track you can get enrolled Today!</a> &nbsp; <a href="https://www.discord.com/invite/swingfish" target="_blank" class="btn btn-secondary btn-icon-right waves-effect waves-light">Back to Discord<i class="icon-arrow-right"></i></a></p>
		  </div>
<?
}
elseif ((checkDiscordPermission($_SESSION['discord']['id'], 'rookie'))&&(checkDiscordPermission($_SESSION['discord']['id'], 'ball'))) {
?>
	<div class="col-sm-12" style="width:100%;padding-top:10px;border: 2px solid #1bdb68; margin: 0 auto 30px auto;">
			  <h3 class="pricing-title">Experienced Traders Only !</h3>
			  <p>EnFoid does not provide Educational services. 
<ul>we expect you to be
	<li> <strong>Well Trained</strong> in Money Management</li>
	<li> have successfully traded <strong>Your Own live funds</strong> profitable over a period of time.</li>
	<li> <strong>Respectful</strong> over funds that are not yours.</li>
	<li> <strong>Respect what EnFoid does and SwingFish is trying to accomplish here.</strong> </li>
</ul>

			<p align="right"><a href="https://www.enfoid.com/prop/qform/fasttrack" target="_blank" class="btn btn-default btn-icon-right waves-effect waves-light">Too much ? no problem, with Fast-track you can get enrolled Today!</a> &nbsp; <a href="https://www.discord.com/invite/swingfish" target="_blank" class="btn btn-secondary btn-icon-right waves-effect waves-light">Back to Discord<i class="icon-arrow-right"></i></a></p>
		  </div>
<?
}
	else {
?>
<img src="https://www.enfoid.com/assets/images/enfoidprop3.png?1" align="right" width="145px" alt="EnFoid Prop Logo">
<p>EnFoid provides free Proprietary Funding to talented SwingFish Members.
	<ul> <strong>You MUST have completed ALL the 3 steps below before proceed!</strong>
		<li> you are already a long standing Member of the Swingfish community</li>
		<li> you have provided help to other members over a LONG PERIOD OF TIME in the SwingFish community.</li>
		<li> you have shown to Moderators or First mates, that you know trading in detail.</li>
	</ul>
	<h5>WARNING: ignoring any of the requirements,<br />
	or giving out false information will lead to you being ignored and banned!</h5>

<form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake" method="post" action="/members/prop-enrol">
			<span class="text-muted space-bottom space-top-2x">Check eligibility
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> I have worked hard to be a <strong>active and respected</strong> member of the community.
									</label>
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> some of the Moderators or Mates do know me well.<br />
<small>Asking a mate for endorsement before making a selection in the form below results in disqualification!<br />
randomly selecting one will also lead to a ban and the application to be ignored.</small>
									</label>
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> I understand that the revenue from the <a href="https://www.enfoid.com/project/swingfish" target="_blank">Swingfish project</a> is important to be able to provide the infrastructure.<br />
										<small>i'm aware on how this revenue is created.</small>
									</label>

								<hr />
								
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> I will not give wrong personal and technical information or i will risk disqualification, payment refusal &amp; community ban.
									</label>
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> I understand SwingFish is actually paying my security deposit for me, to be be covered with future profits.
									</label>
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> I agree that i will be able to respond to EnFoid Staff regarding my actions at any time.
									</label>
									<label class="radio required">
										<input type="checkbox" required name="cc" value="imActive"> I agree to continue contributing and helping the community going forward.
									</label>

									<select name="endorsedby" class="form-control custom-select" required>
										<option value="" SELECTED>-- Mate that vouches for you?</option>
										<option value="-none-">... Nobody knows me</option>
										<?
											$mates = explode(";", file_get_contents('http://www.enfoid.com/content/prop/_swingfish_mates.txt'));
											foreach ($mates as $v){ 
												echo '<option value="'.$v.'">'.$v.'</option>';
											}
										?>
									</select>
									<input type="text" id="donate" name="donation" class="form-control" placeholder="what amount (0 - 500 USD) are you willing to donate towards security deposit? (optional)" required data-error="">
									<button type="submit" id="submit" class="btn btn-success"></i> Proceed</button>
									</label>

</p>
<? } ?><? } else {?>
<p><img src="https://www.enfoid.com/assets/images/enfoidprop3.png?1" align="right" width="145px" alt="EnFoid Proprietary Trading Logo">
SwingFish provides, in cooperation with EnFoid, Proprietary Funding to talented Members.<br />
<h5>Read the conditions below before you proceeding!</h5>
This way of becoming funded may be free of charge, however it is NOT:<br />
- A way for the lazy ones to grab some free money!<br />
- A way to bypass EnFoid's risk or participation requirements.<br />
- To skip parts of the process.<br />
<br />
<center><h5 class="text-danger">The slightest hint of you trying to abuse this offer,<br />
leads to a permanent community ban without warning!</h5></center>
<br />
<li> You have to be a <strong>ACTIVE & RESPECTED Member</strong> of the SwingFish community.</li>
<li> Revenue created by the <a href="https://www.enfoid.com/project/swingfish" target="_blank">SwingFish Project</a> is used to pay for this process.</li>
<li> This way of getting funded may take some time.</li>
<li> By clicking the "Login with Discord" button above you are confirming that you agree and understand the requirements.</li>
<hr />
<?
checkDiscordPermissionHtml('member');
?>
Is this taking too long? <a class="btn btn-sm" href="https://www.enfoid.com/prop/fast-track">Click Here to enrol immediately via Fast-track</a> <small>(does not require any participation)</small>.</center></p>
<? } ?>
