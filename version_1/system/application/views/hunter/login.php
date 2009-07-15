<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>Login :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Login</h1>
			<p>Just enter your login details to start saving our little friends, <strong>OR</strong>, <?=anchor('about/leaders', 'click here')?> to see who is in the lead!</p>
			<? if($this->input->post('process')){ echo "<div class=\"error\" colspan=\"2\"><ul><li>Username or Password was incorrect</li><li>".anchor('hunter/forgot', 'Forgotten your login?')."</li></ul></div>"; } ?>
			<?=form_open('hunter/login')?>
				<div><input type="hidden" value="true" name="process" id="process"></div>
				<table border="0" cellspacing="5" cellpadding="5">
					<tr><td><p>Username</p></td><td><p><input type="text" name="username" id="username"></p></td></tr>
					<tr><td><p>Password</p></td><td><p><input type="password" name="password" id="password"></p></td></tr>
					<tr><td><p><input type="submit" name="submit" id="submit" value="Submit"></p></td><td><p><?=anchor('hunter/signup', 'Not got an account?')?></p></td></tr>
				</table>
			</form>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>