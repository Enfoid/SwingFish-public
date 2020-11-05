<h3 class="swingfish">50% of the profit is yours!</h3>
<?
require_once(URI.'lib/3rd/discord/link/permission-functions.php');
$_SESSION['discord']['return'] = "/members/prop";
if (checkDiscordPermissionHtml('member')){

?>
<div class="row">
						<div class="col-12">
		<div class="card">
				Discord: @<?=$_SESSION['discord']['nick']?> (<?=$_SESSION['discord']['email']?>)
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
					else { 
						echo '<blockquote class="bg-warning">Message data missing<br /><a href=/members/prop>form-info is missing, please complete the initial step first!</a></blockquote>';
					}
					?>
					<a href="/members" target="_top" class="btn">back to members area</a>
			</div>
		</div>
	</div> 
</div>

<?  

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