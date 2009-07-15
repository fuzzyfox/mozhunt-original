<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
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
		<title>Leader Board :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Leader Board</h1>
			<p>The following hunters are currently in the lead and have found the most pandas so far.</p>
			<? if($this->input->post('process')){ echo "<div class=\"error\" colspan=\"2\"><ul><li>Username or Password was incorrect</li><li>".anchor('hunter/forgot', 'Forgotten your login?')."</li></ul></div>"; } ?>
			<ol>
				<?php
				$x = 1;
				foreach($leaders->result() as $user)
				{
					switch($x)
					{
						case 1:
						?>
							<li style="list-style-image:url(<?=base_url()?>public/images/gold.png);"><strong><?=$user->username?></strong> with <strong><?=$user->total?></strong> pandas</li>
						<?
						break;
						case 2:
						?>
							<li style="list-style-image:url(<?=base_url()?>public/images/silver.png);"><strong><?=$user->username?></strong> with <strong><?=$user->total?></strong> pandas</li>
						<?
						break;
						case 3:
						?>
							<li style="list-style-image:url(<?=base_url()?>public/images/bronse.png);"><strong><?=$user->username?></strong> with <strong><?=$user->total?></strong> pandas</li>
						<?
						break;
						default:
						?>
							<li><strong><?=$user->username?></strong> with <strong><?=$user->total?></strong> pandas</li>
						<?
						break;
					}
					$x++;
				}
				?>
			</ol>
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
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>