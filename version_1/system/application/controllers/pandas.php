<?php

	class Pandas extends Controller
	{
		function Pandas()
		{
			parent::Controller();
		}
		
		function index()
		{
			echo "No pandas here!";
		}
		
		function svg()
		{
			if(date('dm') >= 3206)
			{
				$name = $this->uri->segment(3);
				header('Content-Type: image/svg+xml');
				echo read_file("public/images/pandas/$name.svg");
			}
			else
			{
				header('Content-Type: image/png');
				echo read_file("public/images/pandas/timelock.png");
			}
		}
		
		function png()
		{
			if(date('dm') >= 3206)
			{
				$name = $this->uri->segment(3);
				header('Content-Type: image/png');
				echo read_file("public/images/pandas/$name.png");
			}
			else
			{
				header('Content-Type: image/png');
				echo read_file("public/images/pandas/timelock.png");
			}
		}
	}

?>