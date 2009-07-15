<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>Watch Post :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Watch Post</h1>
			<p><img src="<?=base_url()?>public/images/pandas/p4.png" alt="Waving Panda" class="left">
			Welcome to the Watch Post. This is where you can view the total amount of people who have found the 
			panda you are hiding on <?=$site?></p>
			<p>So far the panda on your site has been found <?=$count?></p><div class="clear">&nbsp;</div>
			<h2>Select your panda - png</h2>
			<p>NOTE: these pandas are only avalible in 100px x 100px</p>
			<table border="0" cellspacing="5" cellpadding="5">
				<tr><td><img src="<?=base_url()?>public/images/pandas/p1.png" alt="Running Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/png/run" alt="Running Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/p4.png" alt="Waving Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/png/wave" alt="Waving Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/p2.png" alt="Face Plant Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/png/faceplant" alt="Face Plant Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/p3.png" alt="zzzZZZ Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/png/sleep" alt="zzzZZZ Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/explorer.png" alt="Exploration Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/png/explorer" alt="Exploration Panda" border="0"/></a></textarea></div></td></tr>
			</table>
			<h2>Select your panda - svg</h2>
			<p><strong>NOTE:</strong> these pandas will need you to specify their size.</p>
			<table border="0" cellspacing="5" cellpadding="5">
				<tr><td><img src="<?=base_url()?>public/images/pandas/p1.png" alt="Running Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/svg/run" alt="Running Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/p4.png" alt="Waving Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/svg/wave" alt="Waving Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/p2.png" alt="Face Plant Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/svg/faceplant" alt="Face Plant Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/p3.png" alt="zzzZZZ Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/svg/sleep" alt="zzzZZZ Panda" border="0"/></a></textarea></div></td></tr>
				<tr><td><img src="<?=base_url()?>public/images/pandas/explorer.png" alt="Exploration Panda"></td><td><div><textarea rows="4" cols="40"><a href="http://www.mozhunt.com/hunter/found/<?=$id?>"><img src="<?=base_url()?>pandas/svg/explorer" alt="Exploration Panda" border="0"/></a></textarea></div></td></tr>
			</table>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>