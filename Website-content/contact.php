<?
$_SESSION['captcha'] = rand(3, 7).rand(2, 5);

?><div class="container padding-bottom">
	<div class="row padding-top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>Contact</h2>   

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
					?><form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake" method="post" action="/lib/3rd/PHPMailer/tawkmail.php">
						<input type="hidden" name="return" value="contact">
						<div class="form-group">
							<div class="controls">
								<input type="text" id="name" name="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="controls">
								<input type="email" class="email form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your email">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="controls">
								<textarea id="message" name="message" rows="7" placeholder="Message" class="form-control" required data-error="Write your message"></textarea>
								<div class="help-block with-errors"></div>
							</div>  
						</div>
						<div class="form-group">
							<div class="controls">
								<span class="text-muted space-bottom space-top-2x">Human test: select Number <code><?=$_SESSION['captcha']?></code> below</span>
								<div class="form-group">
									<label class="radio radio-inline">
										<input type="radio" required name="cc" value="<?=$_SESSION['captcha']{0}?>4"> <?=$_SESSION['captcha']{0}?>4
									</label>
									<label class="radio radio-inline required">
										<input type="radio" required name="cc" value="<?=$_SESSION['captcha']{0}?>3"> <?=$_SESSION['captcha']{0}?>3
									</label>
									<label class="radio radio-inline required">
										<input type="radio" required name="cc" value="<?=$_SESSION['captcha']{0}?>5"> <?=$_SESSION['captcha']{0}?>5
									</label>
									<label class="radio radio-inline required">
										<input type="radio" required name="cc" value="<?=$_SESSION['captcha']{0}?>2"> <?=$_SESSION['captcha']{0}?>2
									</label>
									<button type="submit" id="submit" class="btn btn-success"></i> Send Message</button>
								</div>
							</div>
						</div>
						<div id="msgSubmit" class="h3 text-center hidden"></div> 
						<div class="clearfix"></div>   
					</form>     
				</div>
				<div class="col-md-6">
					<h2><a style="float:right;" class="btn btn-danger btn-sm" href="https://www.enfoid.com/contact" target="_blank">Business Contacts</a></h2>   
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.721887949575!2d103.885185!3d1.343329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da17fe7746dc29%3A0x6105270ed8e17b55!2sEnFoid+Pte+Ltd!5e0!3m2!1sen!2sth!4v1527096187850" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>	
				</div>
			</div>
		</div>
