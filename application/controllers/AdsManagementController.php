<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdsManagementController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('maintenance/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function create()
	{
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('maintenance/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function update()
	{
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('maintenance/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }
}
