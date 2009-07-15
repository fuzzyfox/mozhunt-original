<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>The Rules :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>MozHunt Rules</h1>
			<p><img src="<?=base_url()?>public/images/pandas/p3.png" alt="zzZZ Panda" class="right">
			Okay so we do have some rules. First of which is no guns. We would like our pandas back in one, 
			fully alive piece. This set of "Rules" is also a guide as to what you need to do to place pandas in 
			"the cage" where they can be kept safe.</p><div class="clear">&nbsp;</div>
			
			<h2>The Aim of the Game</h2>
			<p>Simple! Find the most pandas!</p>
			
			<h2>How to Collect Pandas</h2>
			<p>Whenever you see one of the following 5 pandas on other websites... click them!</p>
			<table style="width:100%;" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td><img src="<?=base_url()?>public/images/pandas/p1.png" alt="Running Panda"></td>
					<td><img src="<?=base_url()?>public/images/pandas/p3.png" alt="zzZZ Panda"></td>
					<td><img src="<?=base_url()?>public/images/pandas/p4.png" alt="Waving Panda"></td>
					<td><img src="<?=base_url()?>public/images/pandas/p2.png" alt="Face Plant Panda"></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:center;"><img src="<?=base_url()?>public/images/pandas/explorer.png" alt="Exploration Panda"></td>
				</tr>
			</table>
			
			<h2>The Rules</h2>
			<p>Okay so here are the actual rules of the game.</p>
			<ul>
				<li>Giving the locations of pandas away is prohibited as is trading panda locations</li>
				<li>You may not collect the same panda twice</li>
				<li>Those who may have taken pandas may not return them to count in their total</li>
				<li>Hunters may not share their login details</li>
				<li>Hunters <strong>MUST</strong> sleep and attend work/college/school/etc... as normal</li>
				<li>Hunters <strong>MUST</strong> eat and drink</li>
				<li>Hunters <strong>MUST NOT</strong> feed the pandas</li>
			</ul>
			
			<hr>
			
			<p>That is all there is too it really. Time to <?=anchor('hunter/signup', 'signup for the hunt')?>. That is, if you are still interested.</p>
			<!--
				<img src="<?=base_url()?>public/images/pandas/p1.png" alt="Waving Panda"/>
				<img src="<?=base_url()?>public/images/pandas/p3.png" alt="zzZZ Panda"/>
				<img src="<?=base_url()?>public/images/pandas/p4.png" alt="Waving Panda"/>
				<img src="<?=base_url()?>public/images/pandas/p2.png" alt="Face Plant Panda"/>
			-->
			
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>