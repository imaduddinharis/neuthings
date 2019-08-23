<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livechat extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library('session');
        // if(!isset($_SESSION['loggedIn']))
        // {
        //     redirect(base_url().'auth');
        // }
        $this->load->model('Adspref');
        $this->load->model('Adscont');
        $this->load->model('Platforms');
        $this->load->model('Schedules');
        $this->load->model('Budgets');
        $this->load->model('Adsclicks');
        $this->load->model('Terms');
        $this->load->model('Payments');
        $this->load->model('Chats');
        $this->load->model('Viewers');
        $this->load->model('Users');
    }

    public function index()
	{   
        $this->load->view('livechat/index');
    }
    public function getchat()
    {
        $chat = Chats::groupBy('cust')->get();
        $return = '';
        foreach($chat as $chats){
            $c = Chats::where('cust',$chats->cust)->sum('status');
            $customer = Users::where('email',$chats->cust)->get();
            $cust_id = $customer[0]['id'];
            $return .= '<input type="hidden" id="email'.$cust_id.'" value="'.$chats->cust.'">';
            $return .= '<button class="list-group-item list-group-item-action chatroom" id="'.$cust_id.'" onclick="openchat(this.id)">'.$chats->cust.' <span class="badge badge-primary">'.$c.'</span></button>';
        }
        echo $return;
    }
    public function get()
    {
        $cust = $_GET['email'];
        $chat = Chats::where('cust',$cust)->get();
        $chatReturn = '';
        foreach($chat as $chats){
            if($chats->sender == $cust)
            {
                Chats::where('chat_id',$chats->chat_id)->update(['status'=>0]);
                $user = Users::where('email',$cust)->get();
                $pic = '';
                if($user[0]['picture']!=''){
                    $pic = $user[0]['picture'];
                }else{
                    $pic = 'http://pluspng.com/img-png/user-png-icon-png-ico-512.png';
                }
                $position = '<div class="row mb-4">
                <div class="col-md-3">
                  <img src="'.$pic.'" alt="" style="width:inherit" class=" rounded-circle">
                </div>
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-body">
                      <small>'.$chats->message.'</small>
                    </div>
                  </div>
                </div>
              </div>
              ';
            }else{
                $position = '<div class="row mb-4">
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-body">
                      <small>'.$chats->message.'</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <img src="'.base_url().'assets/landing-page/img/495d50774a822d720190812031506.png" alt="" style="width:inherit" class=" rounded-circle">
                </div>
              </div>';
            }
        $chatReturn .= $position;
        
        }
        echo $chatReturn;
    }

    public function send()
	{
        $cust = $_GET['email'];
        $dataChat = array(
            'message'   => $this->input->post('message'),
            'sender'    => 'admin||neuthings',
            'cust'      => $cust,
            'receiver'  => $cust
        );
        Chats::create($dataChat);
    }
}
