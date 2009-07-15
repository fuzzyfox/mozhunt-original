<?php

	class Promote extends Controller
	{
		function Promote()
		{
			parent::Controller();
		}
		
		function index()
		{
			echo "No pandas here!";
		}
		
		function svg()
		{
			$name = $this->uri->segment(3);
			header('Content-Type: image/svg+xml');
			echo read_file("public/images/pandas/$name.badge.svg");
		}
		
		function png()
		{
			$name = $this->uri->segment(3);
			//$size = $this->uri->segment(4);
			header('Content-Type: image/png');
			echo read_file("public/images/pandas/$name.badge.png");
		}
	}

?>