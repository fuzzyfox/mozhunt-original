<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen"/>
		<title>Login :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Login</h1>
			<p>Just enter your login details to collect your panda and to see how many people have found it!</p>
			<? if($this->input->post('process')){ echo "<div class=\"error\" colspan=\"2\"><ul><li>Username or Password was incorrect</li><li>".anchor('hunter/forgot', 'Forgotten your login?')."</li></ul></div>"; } ?>
			<?=form_open('hide/login')?>
				<input type="hidden" value="true" name="process" id="process" />
				<table border="0" cellspacing="5" cellpadding="5">
					<tr><td>Email</td><td><input type="text" name="email" id="email"/></td></tr>
					<tr><td>Password</td><td><input type="password" name="password" id="password"/></td></tr>
					<tr><td><input type="submit" name="submit" id="submit" value="Submit"/></td><td><p><?=anchor('hide/signup', 'Not got an account?')?></p></td></tr>
				</table>
			</form>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>