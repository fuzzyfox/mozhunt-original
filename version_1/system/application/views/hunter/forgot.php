<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>Password Reset :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Password Reset</h1>
			<p>Please enter your email below and we will send you a new password. Please note: You will not be able to change this new password for security reasons.</p>
			<?php
				if($check)
				{
					?>
			<div class="error">
				<ul>
					<? if($empty){echo "<li>You must enter your email to reset your password.</li>";} ?>
					<? if($invalid){echo "<li>Sorry, that email is not valid.</li>";} ?>
				</ul>
			</div>
					<?php
				}
			?>
			<?php
				if($sent)
				{
					?>
			<div class="success">
				<ul>
					<? if($sent){echo "<li>You new password has been sent to ".strtolower($this->input->post('email'))."</li>";} ?>
					<? if($sent){echo "<li>Once again we remind you that you will <strong>NOT</strong> be able to change this password</li>";} ?>
				</ul>
			</div>
					<?php
				}
			?>
			<?=form_open('hunter/forgot')?>
				<div><input type="hidden" value="true" name="process" id="process"></div>
				<table border="0" cellspacing="5" cellpadding="5">
					<tr><td><p>Email</p></td><td><p><input type="text" name="email" id="email"></p></td></tr>
					<tr><td><p><input type="submit" name="submit" id="submit" value="Submit"></p></td><td><p>&nbsp;</p></td></tr>
				</table>
			</form>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>