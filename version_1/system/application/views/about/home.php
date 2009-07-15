<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<link rel="shortcut icon" href="<?=base_url()?>public/images/pandas/run.png"> 
		<script src="<?=base_url()?>public/scripts/jquery.js" type="text/javascript"></script>
		<script type="text/javascript">
			function initMenu() {
			  $('#updates ul').hide();
			  $('#updates ul:first').show();
			  $('#updates li a').click(
			    function() {
			      var checkElement = $(this).next();
			      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			        return false;
			        }
			      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			        $('#updates ul:visible').slideUp('normal');
			        checkElement.slideDown('normal');
			        return false;
			        }
			      }
			    );
			  }
			$(document).ready(function() {initMenu();});
		</script>
		<title>Welcome :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<!-- hmmm... think I might visit whereswalden.com -->
			<h1>The online, cross-site, treasure hunt</h1>
			<p>MozHunt is a community run, community created game for... you guessed it... the community!</p>
			
			<p>We recently held the first ever MozHunt, however it was not widely known as MozHunt then. At the 
			time of the first MozHunt it was known merely as "the online Easter Egg Hunt that someone made".</p>
			
			<p><img src="<?=base_url()?>public/images/pandas/p1.png" alt="Exploration Panda" class="left">
			The unfortunate news is that we have lost our pandas. Poor little things. We need your help to 
			find them and bring them home. They don't do overly much, mainly sleep, run around, or fall on their 
			faces. Some however, just want to come home, while others, well... they just want to explore.</p>
			<div class="clear">&nbsp;</div>
			
			<p><img src="<?=base_url()?>public/images/pandas/p4.png" alt="Face Plant Panda" class="right">
			These close relatives to Firefox (a red panda) may not seem so obvious however both are protected, 
			both are pandas, and is it not something tiny like... 2% difference between us and chimps? Reach out 
			with your hearts and help us find our little friends.</p><div class="clear">&nbsp;</div>
			
			<p>If you are interested in helping us find our pandas then please, please join us, the person who finds 
			all or most of our pandas may be in for a reward. Now it is time to found out about <?=anchor('about/rules', 'the rules')?> of 
			the hunt.</p>
			
			<h2>Updates, hints, tips, and clues</h2>
			<ul id="updates">
				<? foreach($status as $update): ?>
				<li class="date"><a href="javascript:void(0)"><?=$update['date']?></a>
					<ul class="update">
						<li><?=$update['status']?></li>
						<li class="time">Posted at <?=$update['time']?></li>
					</ul>
				</li>
				<? endforeach; ?>
			</ul>
			
			<h2>MozHunt Howto!</h2>
			<p>Taking part in the hunt? or just thinking about joining? Then this is the quick start you need!</p>
			<ol>
				<li><a href="http://www.mozhunt.com/hunter/signup">Setup a mozhunt account!</a></li>
				<li>Start browsing the web and keep your eye out for our pandas.</li>
				<li><a href="http://www.mozhunt.com/about/rules">See a panda... click a panda!</a></li>
				<li>Visit <a href="http://www.mozhunt.com/hunter/cage">www.mozhunt.com/hunter/cage</a> to view your personal stats</li>
				<li>Visit <a href="http://www.mozhunt.com/about/leaders">www.mozhunt.com/about/leaders</a> to view the top 5 hunters out there</li>
				<li>Enjoy yourself and get <a href="http://www.firefox.com">Mozilla Firefox 3.5</a>!</li>
			</ol>
			
			<div class="error">
				<p style="margin:16px;">
					Got a mozilla related site? Got a blog syndicated by <a href="http://planet.mozilla.com">planet.mozilla.com</a>? Then please join the 
					mozhunt hider system (seperate logon required). Visit <a href="http://www.mozhunt.com/hide">www.mozhunt.com/hide</a> for  more information and <a href="www.mozhunt.com/hide/signup">www.mozhunt.com/hide/signup</a> to get 
					started!
				</p>
			</div>
			
			<!--
				<img src="<?=base_url()?>public/images/pandas/p3.png" alt="zzZZ Panda"/>
				<img src="<?=base_url()?>public/images/pandas/p4.png" alt="Waving Panda"/>
			-->
			
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>