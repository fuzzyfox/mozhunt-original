<?php

	/* Copyright (c) 2009 Brinkhurst Design
	 * 
	 * This file handles all hunter functions,
	 * e.g. adding treasure, showing loging in 
	 * and out, joining the hunt
	 */

	class Hunter extends Controller
	{
		function Hunter()
		{
			parent::Controller();
		}
		
		function index()
		{
			redirect('hunter/login');
		}
		
		//user login
		function login()
		{
			if($this->session->userdata('logged_in'))
			{
				redirect('hunter/cage');
			}
			//has the user submitted the form?
			if($this->input->post('process'))
			{
				//submitted details
				$details = array(
					'username' => strtolower($this->input->post('username')),
					'password' => md5($this->input->post('password'))
				);
				//check the database for user with matching details
				$users = $this->db->get_where('users', $details);
				if($users->num_rows() == 1)
				{
					//get user details from database
					$details = $users->row();
					//put useful details in cookie
					$data = array(
						'id' => $details->id,
						'logged_in' => true
					);
					$this->session->set_userdata($data);
					redirect('hunter/cage');
				}
				else
				{
					//invalid user load login form with error
					$this->load->view('hunter/login');
				}
			}
			else
			{
				//user not tried to log in yet, show form
				$this->load->view('hunter/login');
			}
		}
		
		function logout()
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect('hunter/login');
			}
			//clear cookie information
			$data = array(
				'id'     => '',
				'logged_in' => '',
               );
			$this->session->unset_userdata($data);
			
			//take user to homepage
			redirect('');
		}
		
		function found()
		{
			if($this->agent->is_referral())
			{
				//get the domain only
				$url = strtolower($this->agent->referrer());
				$url = preg_replace('~http://|www\.~i', '', $url);
				$url = explode('/', $url, 2);
				
				$details = array(
					'domain' => $url[0],
					'id' => $this->uri->segment(3)
				);
				
				//check that user does not have the current treasure id
				$users = $this->db->get_where('users', array('id' => $this->session->userdata('id')));
				$user = $users->row();
				$current = explode(',', $user->found);
				$safe = true; //to tell if it is safe to do the next step without errors or dupe treasures
				foreach($current as $check)
				{
					if($check == $details['id'])
					{
						$safe = false;
					}
				}
				
				if($safe)
				{
					//check that the domain is in the db
					$hidden = $this->db->get_where('locations', $details);
					if(($hidden->num_rows() == 1)||($details['domain'] == "planet.mozilla.org"))
					{
						$found = array(
							'found' => $user->found . $details['id'] . ", ",
							'total' => $user->total + 1,
						);
						$this->db->update('users', $found, array('id'=>$user->id));
						header('Location: '.$this->agent->referrer());
					}
					else
					{
						$this->load->view('hunter/found', array('type'=>'invalid'));
					}
				}
				else
				{
					$this->load->view('hunter/found', array('type'=>'got'));
				}
			}
			else
			{
				$this->load->view('hunter/found', array('type'=>'invalid'));
			}
		}
		
		function cage()
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect('hunter/login');
			}
			//get the domains of all the users found treasure
			$user = $this->db->get_where('users', array('id' => $this->session->userdata('id')));
			$user = $user->row();
			$found = explode(', ', $user->found);
			foreach($found as $id)
			{
				$location = $this->db->get_where('locations', array('id' => $id));
				if(($location->num_rows() == 1)&&($x != 1))
				{
					$location = $location->row();
					$found[$id] = $location->domain;
				}
			}
			
			//collect data to be passed on
			$locations = $this->db->get('locations');
			$data = array(
				'total' => $user->total,
				'hidden' => $locations->num_rows(),
				'found' => $found
			);
			
			//show users stats
			$this->load->view('hunter/cage', $data);
		}
		
		function signup()
		{
			if($this->session->userdata('logged_in'))
			{
				redirect('hunter/cage');
			}
			if($this->input->post('process'))
			{
				//master error check status
				$error = array(
						'check' => false,
						'email' => false,
						'emails' => false,
						'email_used' => false,
						'validate' => false,
						'valid' => false,
						'username' => false,
						'username_used' => false,
						'password' => false,
						'passwords' => false,
						'confirm' => false,
						'name' => false,
						'tos' => false,
						'data' => array(
									'name' => $this->input->post('name'),
									'email' => $this->input->post('email'),
									'validate' => $this->input->post('validate'),
									'username' => $this->input->post('username')
						)
				);
				
				//start email checks
				if($this->input->post('email') == false)
				{
					$error['email'] = true;
					$error['check'] = true;
				}
				else
				{
					if($this->input->post('validate') == false)
					{
						$error['validate'] = true;
						$error['check'] = true;
					}
					else
					{
						if($this->input->post('email') != $this->input->post('validate'))
						{
							$error['emails'] = true;
							$error['check'] = true;
						}
						else
						{
							if(!valid_email($this->input->post('email')))
							{
								$error['valid'] = true;
								$error['check'] = true;
							}
							else
							{
								$email = strtolower($this->input->post('email'));
								$db_check = $this->db->get_where('users', array('email' => $email));
								if($db_check->num_rows() != 0)
								{
									$error['email_used'] = true;
									$error['check'] = true;
								}
							}
						}
					}
				}
				//end email checks
				
				//start username checks
				if($this->input->post('username') == false)
				{
					$error['username'] = true;
					$error['check'] = true;
				}
				else
				{
					$username = strtolower($this->input->post('username'));
					$db_check = $this->db->get_where('users', array('username' => $username));
					if($db_check->num_rows() != 0)
					{
						$error['username_used'] = true;
						$error['check'] = true;
					}
				}
				//end username checks
				
				//start password checks
				if($this->input->post('password') == false)
				{
					$error['password'] = true;
					$error['check'] = true;
				}
				else
				{
					if($this->input->post('confirm') == false)
					{
						$error['confirm'] = true;
						$error['check'] = true;
					}
					else
					{
						if($this->input->post('password') != $this->input->post('confirm'))
						{
							$error['passwords'] = true;
							$error['check'] = true;
						}
					}
				}
				//end password checks
				
				//start name checks
				if($this->input->post('name') == false)
				{
					$error['name'] = true;
					$error['check'] = true;
				}
				//end name checks
				
				//check terms
				if($this->input->post('tos') == false)
				{
					$error['tos'] = true;
					$error['check'] = true;
				}
				
				//check master status
				if(!$error['check'])
				{
					//add hunter to the database
					$data = array(
							'username' => strtolower($this->input->post('username')),
							'password' => md5($this->input->post('password')),
							'email' => strtolower($this->input->post('email')),
							'total' => 0,
							'name' => $this->input->post('name')
					);
					$this->db->insert('users', $data);
					
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$message_html = "<html>
										<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0' bgcolor='#3771c8'>
											<style type='text/css'>
												h1 {
													color: #444;
													background-color: transparent;
													border-bottom: 1px solid #D0D0D0;
													border-top: 1px solid #D0D0D0;
													font-size: 16px;
													font-weight: bold;
													margin: 54px 0 2px 0;
													padding: 6px 0 6px 0;
												}
												#content {
													width : 500px;
													margin : 0 auto;
													padding : 40px;
													padding-top : 40px;
													background : #ffffff url(http://www.mozhunt.com/public/images/mozhunt.png) top center no-repeat;
													font-family: Lucida Grande, Verdana, Sans-serif;
													font-size: 14px;
													color: #4F5155;
												}
												a {
													color: #3771c8;
													text-decoration : none;
												}
												a:hover {
													text-decoration : underline;
												}
											</style>
											<div id='content'>
												<h1>Welcome to MozHunt!</h1>
												<p>Congratulations! You MozHunt account has been created. We ask that you keep this email for future reference 
												as it contains your username and password. If you need to reset your password at anytime you will be unable to 
												change it to a more personal one, and you will recieve a randomised password.<br><br></p>
												<p>Your account details are as follows:</p>
												<ul>
													<li>Username: ".$data['username']."</li>
													<li>Password: ".$this->input->post('email')."</li>
												</ul>
												<p><br><br>Good luck with the hunt!<br></p>
												<p>The MozHunt Team</p>
											</div>
										</body>
									</html>";
					$message_text = "Welcome to MozHunt\r\n\r\n
									Congratulations! You MozHunt account has been created. We ask that you keep this email for future reference 
									as it contains your username and password. If you need to reset your password at anytime you will be unable to 
									change it to a more personal one, and you will recieve a randomised password.\r\n\r\n
									Your account details are as follows:\r\n
									* Username : ".$data['username']."\r\n
									* Password : ".$this->input->post('email')."\r\n\r\n
									Good luck with the hunt!\r\n
									The MozHunt Team";
					
					$this->email->from('pandas@mozhunt.com', 'The MozHunt Team');
					$this->email->to($data['email']);
					$this->email->subject('Welcome to MozHunt');
					$this->email->message($message_html);
					$this->email->set_alt_message($message_txt);
					$this->email->send();
					redirect('hunter/login');
				}
				else
				{
					//return page with errors
					$this->load->view('hunter/signup', $error);
				}
			}
			else
			{
				//master error check status
				$error = array(
						'check' => false,
						'email' => false,
						'emails' => false,
						'email_used' => false,
						'validate' => false,
						'valid' => false,
						'username' => false,
						'username_used' => false,
						'password' => false,
						'passwords' => false,
						'confirm' => false,
						'name' => false,
						'tos' => false,
						'data' => array(
									'name' => '',
									'email' => '',
									'validate' => '',
									'username' => ''
						)
				);
				$this->load->view('hunter/signup', $error);
			}
		}
		
		function forgot()
		{
			if($this->session->userdata('logged_in'))
			{
				redirect('hunter/cage');
			}
			$error = array(
					'empty' => false,
					'invalid' => false,
					'check' => false,
					'sent' => false
				);
			if($this->input->post('process'))
			{
				if($this->input->post('email') == false)
				{
					$error['empty'] = true;
					$error['check'] = true;
				}
				else
				{
					$users = $this->db->get_where('users', array('email' => strtolower($this->input->post('email'))));
					if($users->num_rows() == 1)
					{
						$user = $users->row();
						$newpass = random_string('alnum', 16);
						$this->db->update('users', array('password' => md5($newpass)), array('id' => $user->id));
						
						//send email
						$this->email->from('noreply@brinkhurstdesign.co.uk', 'MozHunt');
						$this->email->to(strtolower($this->input->post('email')));
						$this->email->subject('MozHunt: Password Reset');
						$this->email->message("Dear ".$user->name.", \r\n\r\nYour new password is: $newpass\r\n\r\nPlease keep this email for future reference as you will be unable to change this password. This is due to site security.");
						$this->email->send();
						$error['sent'] = true;
					}
					else
					{
						$error['invalid'] = true;
						$error['check'] = true;
					}
				}
				$this->load->view('hunter/forgot', $error);
			}
			else
			{
				$this->load->view('hunter/forgot', $error);
			}
		}
	}

?>