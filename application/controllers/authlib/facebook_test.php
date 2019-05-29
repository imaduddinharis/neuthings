<?php
	class Facebook_test extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			
			// $this->load->add_package_path('/Users/elliot/github/codeigniter-facebook/application/');
			$this->load->library('facebook');
			$this->facebook->enable_debug(TRUE);
			$this->load->library('session');
		}
		
		function index()
		{
			// We can use the open graph place meta data in the head.
			// This meta data will be used to create a facebook page automatically
			// when we 'like' the page.
			// 
			// For more details see: http://developers.facebook.com/docs/opengraph
			
			$opengraph = 	array(
								'type'				=> 'website',
								'title'				=> 'Neuthings App',
								'url'				=> site_url(),
								'image'				=> '',
								'description'		=> 'Lorem ipsum dolor sit amet'
							);

			$this->load->vars('opengraph', $opengraph);
			$this->load->view('facebook_view');
			// redirect(base_url().'dashboard');	
		}
		
		function login()
		{
			// This is the easiest way to keep your code up-to-date. Use git to checkout the 
			// codeigniter-facebook repo to a location outside of your site directory.
			// 
			// Add the 'application' directory from the repo as a package path:
			// $this->load->add_package_path('/var/www/haughin.com/codeigniter-facebook/application/');
			// 
			// Then when you want to grab a fresh copy of the code, you can just run a git pull 
			// on your codeigniter-facebook directory.

			if ( !$this->facebook->logged_in() )
			{
				// From now on, when we call login() or login_url(), the auth
				// will redirect back to this url.

				$this->facebook->set_callback(site_url('authlib/facebook_test'));

				// Header redirection to auth.
				$this->facebook->login();

				$user = $this->facebook->user();
				$sessdata = array(
						'username'  => $user->name,
						'email'     => $user->email,
						'imagepro'     => facebook_picture('me'),
						'logged_in' => TRUE
				);

				$this->session->set_userdata($sessdata);

				// You can alternatively create links in your HTML using
				// $this->facebook->login_url(); as the href parameter.
			}
			else
			{
				redirect('dashboard');
			}
		}
		
		function logout()
		{
			$this->facebook->logout();
			redirect(base_url().'auth');
		}
	}