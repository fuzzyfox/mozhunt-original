<?php
	if($type == 'got')
	{
		$message = "is has been found already";
	}
	if($type == 'invalid')
	{
		$message = "is not one of ours";
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>Problem :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Problem</h1>
			<p>&nbsp;</p>
			<div class="error">
				<ul>
					<li>Oh... it looks like this panda <?=$message?>!</li>
				</ul>
			</div>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>