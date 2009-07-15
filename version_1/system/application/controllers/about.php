<?php

class About extends Controller {

	function About()
	{
		parent::Controller();	
	}
	
	function index()
	{
		//get latest status update from mozillaca.com\\
		$url = "http://mozillaca.com/api/statuses/user_timeline/mozhunt.atom";
		$xml = simplexml_load_file($url);
		if($xml)
		{
			$updates = $xml->entry;
			$x = 0; //counter for the array of updates
			foreach($updates as $update)
			{
				$x++;
				//clean up the published time and date
				$published = explode(" ", str_replace("+00:00", "", str_replace("T", " ", $update->published)));
				$published[1] = explode(":", $published[1]);
				$published[1] = $published[1][0] . ":" . $published[1][1];
				$time = $published[1];
				$date = explode('-', $published[0]);
				$date = $date[2].'/'.$date[1].'/'.$date[0];
				
				//add information to an array for later use
				$status['status'][$x] = array(
					'status' => html_entity_decode($update->content),
					'time' => $time,
					'date' => $date
				);
				$status['avatar'] = 'http://mozillaca.com/'.$update->author->name.'/avatar/48';
			}
		}
		
		//load site homepage
		$this->load->view('about/home', $status);
	}
	
	function faq()
	{
		$this->load->view('about/faq');
	}
	
	function promote()
	{
		$this->load->view('about/press');
	}
	
	function rules()
	{
		$this->load->view('about/rules');
	}
	
	function terms()
	{
		$this->load->view('about/terms');
	}
	
	function disclaimer()
	{
		$this->load->view('about/legal');
	}
	
	function leaders()
	{
		$this->db->order_by("total", "desc");
		$data['leaders'] = $this->db->get('users', 10);
		//get latest status update from mozillaca.com\\
		$url = "http://mozillaca.com/api/statuses/user_timeline/mozhunt.atom";
		$xml = simplexml_load_file($url);
		if($xml)
		{
			$updates = $xml->entry;
			$x = 0; //counter for the array of updates
			foreach($updates as $update)
			{
				$x++;
				//clean up the published time and date
				$published = explode(" ", str_replace("+00:00", "", str_replace("T", " ", $update->published)));
				$published[1] = explode(":", $published[1]);
				$published[1] = $published[1][0] . ":" . $published[1][1];
				$time = $published[1];
				$date = explode('-', $published[0]);
				$date = $date[2].'/'.$date[1].'/'.$date[0];
				
				//add information to an array for later use
				$data['status'][$x] = array(
					'status' => html_entity_decode($update->content),
					'time' => $time,
					'date' => $date
				);
				$data['avatar'] = 'http://mozillaca.com/'.$update->author->name.'/avatar/48';
			}
		}
		$this->load->view('about/leaders', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */