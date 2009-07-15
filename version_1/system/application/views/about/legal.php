<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>Disclaimer :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Disclaimer</h1>
			<p>Brinkhurst Design, and therefore MozHunt, is not partnered with, nor connected with, Mozilla in any way. All work on 
			this site that mentions Mozilla or any Mozilla products (such as Mozilla Firefox, Mozilla Fennec, 
			etc...) is all done as volunteer work as a part of the Mozilla Community.</p>
			<p><a href="http://www.mozilla.com/en-US/">Mozilla</a>&reg;, 
			<a href="http://www.mozilla.com/en-US/firefox/">Firefox</a>&reg;  Logos are registered trademarks of 
			the Mozilla Foundation. For licensing and usage guidelines, please see the 
			<a href="http://www.mozilla.org/foundation/licensing.html">Mozilla Trademark Policy</a></p>
		</div>
		<div id="footer">
			<p>
				<?=anchor('', 'home')?> | 
				<?=anchor('about/rules', 'rules')?> | 
				<? if(!$this->session->userdata('logged_in')){ ?>
				<?=anchor('hunter/login', 'login')?> | 
				<?=anchor('hunter/signup', 'signup')?>
				<? }else{ ?>
				<?=anchor('about/leaders', 'leader board')?> | 
				<?=anchor('hunter/logout', 'logout')?>
				<? } ?>
			</p>
			<p>Copyright &copy; 2009 <a href="http://www.brinkhurstdesign.co.uk/">Brinkhurst Design</a> ~ <?=anchor('about/disclaimer', 'Disclaimer')?></p>
			<p><img src="<?=base_url()?>public/images/html_valid.png"><img src="<?=base_url()?>public/images/css_valid.png"></p>
		</div>
	</body>
</html>