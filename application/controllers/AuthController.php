<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('login/index');
    }
    
    public function logingoogle()
    {
        redirect(base_url().'dashboard');
    }
    
    public function loginfacebook()
    {

    }

    public function logout()
    {
        redirect(base_url().'auth');
    }
}
