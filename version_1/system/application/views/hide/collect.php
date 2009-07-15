<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen"/>
		<title>Signup :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Signup</h1>
			<p>Thank you for taking the time to join in with the fun! 
			Signup is simple. Just fill in <strong>ALL</strong> the bellow information and your done! 
			If signup is successfull you will be taken directly to the login form where you view the 
			total amount of hunters to find the panda you take, no need to wait!</p>
			<?php
				if($check)
				{
					?>
			<div class="error">
				<ul>
					<? if($name){echo "<li>Please enter your name</li>";} ?>
					<? if($domain){echo "<li>Please enter your username</li>";} ?>
					<? if($passcode){echo "<li>Please ensure you have entered the correct passcode</li>";} ?>
					<? if($email){echo "<li>Please enter your email</li>";} ?>
					<? if($email_used){echo "<li>Sorry, that email is in use. You cannot have more than 1 account for this hunt</li>";} ?>
					<? if($valid){echo "<li>Please make sure you enter a valid email</li>";} ?>
					<? if($validate){echo "<li>Please confirm your email</li>";} ?>
					<? if($emails){echo "<li>Emails do not match</li>";} ?>
					<? if($password){echo "<li>Please enter your password</li>";} ?>
					<? if($confirm){echo "<li>Please confrim your password</li>";} ?>
					<? if($passwords){echo "<li>Passwords do not match</li>";} ?>
					<? if($tos){echo "<li>If you do not agree with our ".anchor('about/terms', 'terms of use', array('target' => '_blank'))." then we cannot permit you to take part.</li>";} ?>
				</ul>
			</div>
					<?php
				}
			?>
			<?=form_open('hide/signup', array('id'=>'form'))?>
				<input type="hidden" value="true" name="process" id="process">
				<table border="0" cellspacing="5" cellpadding="5">
					<tr><td><p>Name</p></td><td><p><input class="required" type="text" name="name" id="name" value="<?=$data['name']?>"></p></td></tr>
					<tr><td><p>Domain</p></td><td><p><input type="text" name="domain" id="domain" value="<?=$data['domain']?>"></p></td></tr>
					<tr><td><p>Email</p></td><td><p><input type="text" name="email" id="email" value="<?=$data['email']?>"></p></td></tr>
					<tr><td><p>Confirm Email</p></td><td><p><input type="text" name="validate" id="validate" value="<?=$data['validate']?>"></p></td></tr>
					<tr><td><p>Password</p></td><td><p><input type="password" name="password" id="password"></p></td></tr>
					<tr><td><p>Confirm Password</p></td><td><p><input type="password" name="confirm" id="confirm"></p></td></tr>
					<tr><td><p>Passcode</p></td><td><p><input type="password" name="passcode" id="passcode"></p></td></tr>
					<tr><td colspan="2"><p><input type="checkbox" value="true" name="tos" id="tos"> I have read and accept the <?=anchor('about/terms', 'terms of use', array('target' => '_blank'))?></p></td></tr>
					<tr><td class="action"><input type="submit" name="submit" id="submit" value="Submit"></td><td>&nbsp;</td></tr>
				</table>
			</form>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>