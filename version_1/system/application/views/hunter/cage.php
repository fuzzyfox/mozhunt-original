<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>"The Cage" :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>"The Cage"</h1>
			<p><img src="<?=base_url()?>public/images/pandas/explorer.png" alt="Explorer Panda" class="left">
			Welcome to "the cage". We use this term loosely as it is more of a large panda enclosure full of the 
			pandas fav food, drink, toys, etc...</p>
			<p>So far you have found <?=$total?> of <?=$hidden?> pandas.</p>
			<p>You found the pandas at the following sites.</p><div class="clear">&nbsp;</div>
			<ol>
				<?php
					$x = 1;
					foreach($found as $domain)
					{
						if(($domain != "")&&($x != 1))
						{
						?>
				<li><?=$domain?></li>
						<?php
						}
						$x++;
					}
				?>
			</ol>
			<p class="right"><?=anchor('hunter/logout', 'logout')?></p>
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>