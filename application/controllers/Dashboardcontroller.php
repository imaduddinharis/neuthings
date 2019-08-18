<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardcontroller extends CI_Controller {
    var $API = 'http://pushadsdev.amandjaja.com/frog/oapi/';
    var $param = '?tcx_datetime=20181230235959';
    var $TYPE = 'FTC';
    var $APPID = 'neuthings.id';
    var $APPPASS = 'NTRiZGYxNjVmYzExY2RmMjFhMDIzMjJiZTc3NzE1NmZmNDhiMTVjNzphYmNkZTEyMzQ1YWJjZGU=';
    var $APPTOKEN = 'MWI4OTFlNmJmN2ZkNmZjMTEzMzdhMjNkZWIyYjliMmNmNmM2NmE0Ng==';
    var $imglink = 'http://pushadsdev.amandjaja.com/data/advertisement/image/';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if(!isset($_SESSION['loggedIn']))
        {
            redirect(base_url().'auth');
        }
        $this->load->model('Adspref');
        $this->load->model('Adscont');
        $this->load->model('Platforms');
        $this->load->model('Schedules');
        $this->load->model('Budgets');
        $this->load->model('Adsclicks');
        $this->load->model('Terms');
        $this->load->model('Payments');
        $this->load->model('Viewers');
        $this->load->model('Users');
        $this->load->model('Chats');
    }

	public function index()
	{
        
        $data['userData'] = $this->session->userdata('userData');
        $getAds = Adspref::where('email',$data['userData']['email'])->get();
        $click = 0;
        $totalads = 0;
        $impress = 0;
        foreach($getAds as $key=>$value){
            $getapi = json_decode($this->getAdsApi($value->id_ads_pref));
            $click += $getapi->data->_click;
            $impress += $getapi->data->_impression;
            $totalads += 1;
        }
        
        $data['clicks'] = $click;
        $data['impress'] = $impress;
        $data['ads'] = $totalads;
        $data['title'] = 'Neuthings | Dashboard';
        $data['imgpro'] = $this->session->userdata('imagepro');
        $data['username'] = $this->session->userdata('username');
        
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('dashboard/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function getAdsApi($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->API.'advertisement'.$this->param.'&id='.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "X-TCX-TYPE: ".$this->TYPE,
            "X-TCX-APP-ID: ".$this->APPID,
            "X-TCX-APP-PASS: ".$this->APPPASS,
            "X-TCX-TOKEN: ".$this->APPTOKEN
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return $err;
        } else {
        return $response;
        } 
    }
}
