<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index()
	{
        
        $data['userData'] = $this->session->userdata('userData');
                
        $data['title'] = 'Neuthings | Dashboard';
        $data['imgpro'] = $this->session->userdata('imagepro');
        $data['username'] = $this->session->userdata('username');
        
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('dashboard/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }
}
