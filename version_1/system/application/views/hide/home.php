<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>public/styles/main.css" media="screen">
		<title>Hide :: MozHunt</title>
	</head>
	<body>
		<div id="content">
			<h1>Welcome to MozHunt - but in a different way</h1>
			<p>If you are here then it is safe to assume that you are interested in hiding a panda on your website /
			blog. There are some very simple rules to hiding a panda which can be found <?=anchor('hide/rules', 'here')?>.</p>
			<p>Once you have hidden a panda you will be able to <?=anchor('hide/login', 'login')?> to a watchpost and see how many people have 
			found the panda you are hiding.</p>
			<p>There are 4 pandas avaliable for hiding and they come in 2 styles. A 100 x 100 pixel png image and an svg 
			version for those who wish to choose their own size.</p>
			<p>For all pages related to hiding a panda see the navigation bar in the footer.</p>
			
		</div>
		<? $this->load->view('footer') ?>
	</body>
</html>