<?php

	class Hide extends Controller
	{
		function Hide()
		{
			parent::Controller();
		}
		
		function index()
		{
			$this->load->view('hide/home');
		}
		
		function rules()
		{
			$this->load->view('hide/rules');
		}
		
		function logout()
		{
			if(!$this->session->userdata('logged_in_hide'))
			{
				redirect('hide/login');
			}
			//clear cookie information
			$data = array(
				'id_hide'     => '',
				'logged_in_hide' => '',
               );
			$this->session->unset_userdata($data);
			
			//take user to homepage
			redirect('hide');
		}
		
		function signup()
		{
			if($this->session->userdata('logged_in_hide'))
			{
				redirect('hide');
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
						'domain' => false,
						'passcode' => false,
						'password' => false,
						'passwords' => false,
						'confirm' => false,
						'name' => false,
						'tos' => false,
						'data' => array(
									'name' => $this->input->post('name'),
									'email' => $this->input->post('email'),
									'validate' => $this->input->post('validate'),
									'domain' => $this->input->post('domain')
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
								$db_check = $this->db->get_where('locations', array('email' => $email));
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
				if($this->input->post('domain') == false)
				{
					$error['domain'] = true;
					$error['check'] = true;
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
				
				//start passcode checks
				if($this->input->post('passcode') != "398htboINKon")
				{
					$error['passcode'] = true;
					$error['check'] = true;
				}
				//end name checks
				
				//check terms
				if(!$this->input->post('tos'))
				{
					$error['tos'] = true;
					$error['check'] = true;
				}
				
				//check master status
				if(!$error['check'])
				{
					//clean domain
					$url = strtolower($this->input->post('domain'));
					$url = preg_replace('~http://|www\.~i', '', $url);
					$url = explode('/', $url, 2);
					$domain = $url[0];
					
					//add hider to the database
					$data = array(
							'domain' => $domain,
							'password' => md5($this->input->post('password')),
							'email' => strtolower($this->input->post('email')),
							'count' => 0,
							'name' => $this->input->post('name')
					);
					$this->db->insert('locations', $data);
					redirect('hide/login');
				}
				else
				{
					//return page with errors
					$this->load->view('hide/collect', $error);
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
						'domain' => false,
						'passcode' => false,
						'password' => false,
						'passwords' => false,
						'confirm' => false,
						'name' => false,
						'tos' => false,
						'data' => array(
									'name' => '',
									'email' => '',
									'validate' => '',
									'domain' => ''
						)
				);
				$this->load->view('hide/collect', $error);
			}
		}
				
		function watchpost()
		{
			if(!$this->session->userdata('logged_in_hide'))
			{
				redirect('hide/login');
			}
			$details['id'] = $this->session->userdata('id_hide');
			$user = $this->db->get_where('locations', $details);
			$user = $user->row();
			$details['count'] = $user->count;
			$details['id'] = $user->id;
			$details['site'] = $user->domain;
			$this->load->view('hide/watchpost', $details);
		}
		
		function login()
		{
			if($this->session->userdata('logged_in_hide'))
			{
				redirect('hide/watchpost');
			}
			//has the user submitted the form?
			if($this->input->post('process'))
			{
				//submitted details
				$details = array(
					'email' => strtolower($this->input->post('email')),
					'password' => md5($this->input->post('password'))
				);
				//check the database for user with matching details
				$users = $this->db->get_where('locations', $details);
				if($users->num_rows() == 1)
				{
					//get user details from database
					$details = $users->row();
					//put useful details in cookie
					$data = array(
						'id_hide' => $details->id,
						'logged_in_hide' => true
					);
					$this->session->set_userdata($data);
					redirect('hide/watchpost');
				}
				else
				{
					//invalid user load login form with error
					$this->load->view('hide/login');
				}
			}
			else
			{
				//user not tried to log in yet, show form
				$this->load->view('hide/login');
			}
		}
	}

?>