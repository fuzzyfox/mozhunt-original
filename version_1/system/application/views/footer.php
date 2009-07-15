		<div id="footer">
			<p>
				<?=anchor('', 'home')?> | 
				<?=anchor('about/rules', 'rules')?> | 
				<?=anchor('about/faq', 'faq')?> | 
				<? if((!$this->session->userdata('logged_in'))&&($this->uri->segment(1) != "hide")){ ?>
				<?=anchor('hunter/login', 'login')?> | 
				<?=anchor('hunter/signup', 'signup')?>
				<? }elseif($this->uri->segment(1) != "hide"){ ?>
				<?=anchor('about/leaders', 'leader board')?> | 
				<?=anchor('hunter/cage', 'the cage')?> | 
				<?=anchor('hunter/logout', 'logout')?>
				<? } ?>
				<? if((!$this->session->userdata('logged_in_hide'))&&($this->uri->segment(1) == "hide")){ ?>
				<?=anchor('hide/login', 'login')?> | 
				<?=anchor('hide/signup', 'signup')?>
				<? }elseif($this->uri->segment(1) == "hide"){ ?>
				<?=anchor('about/leaders', 'hunter leader board')?> | 
				<?=anchor('hide/watchpost', 'watch post')?> | 
				<?=anchor('hide/logout', 'logout')?>
				<? } ?>
			</p>
			<p>Copyright &copy; 2009 <a href="http://www.brinkhurstdesign.co.uk/">Brinkhurst Design</a> ~ <?=anchor('about/disclaimer', 'Disclaimer')?></p>
			<p><img src="<?=base_url()?>public/images/html_valid.png"><img src="<?=base_url()?>public/images/css_valid.png"></p>
		</div>