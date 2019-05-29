<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adsmanagementcontroller extends CI_Controller {

    var $path = '';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
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
    }

	public function index()
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])->get();
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function detail($id)
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])
                                    ->where('id_ads_pref',$id)
                                    ->get();
        $data['Adscont'] = Adscont::where('id_ads_pref',$id)
                                    ->get();
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/detail',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }
    public function monitoring($id)
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])
                                    ->where('id_ads_pref',$id)
                                    ->get();
        $data['Adscont'] = Adscont::where('id_ads_pref',$id)
                                    ->get();
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/monitoring',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }
    public function invoice($id)
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])
                                    ->where('id_ads_pref',$id)
                                    ->get();
        $data['Adscont'] = Adscont::where('id_ads_pref',$id)
                                    ->get();
        $data['payments'] = Payments::where('id_ads_pref', $id)
                                    ->get();
        $data['unpaid'] = Payments::where('id_ads_pref', $id)
                                    ->where('status', '0')
                                    ->count();    
        $data['paid'] = Payments::where('id_ads_pref', $id)
                                    ->where('status', '1')
                                    ->count();
        $data['expired'] = Payments::where('id_ads_pref', $id)
                                    ->where('status', '2')
                                    ->count();    
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/invoice',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function invoice_detail($id,$idpayments)
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])
                                    ->where('id_ads_pref',$id)
                                    ->get();
        $data['Adscont'] = Adscont::where('id_ads_pref',$id)
                                    ->get();
        $data['payments'] = Payments::where('id_ads_pref', $id)
                                    ->where('id_payments', $idpayments)
                                    ->get();
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('invoice/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function create()
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/create',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function update()
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('maintenance/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function post()
    {
        $adsPref = array(
            'languages'     => $this->input->post('languages'),
            'email'         => $this->session->userdata('userData')['email'],
            'city'          => $this->input->post('city'),
            'state'         => $this->input->post('state'),
            'country'       => $this->input->post('country'),
            'budget'        => $this->input->post('budget'),
            'price'         => $this->input->post('price'),
            'scheduling'    => $this->input->post('scheduling'),
            'platform'      => $this->input->post('platform')
        );
        $adsCont = array(
            'title'         => $this->input->post('title'),
            'photo'         => $_FILES['photo']['name'],
            'adsclick'      => $this->input->post('adsclick'),
        );
        
        $datas = array_merge($adsPref,$adsCont);
        // var_dump($this->uploading());
        // var_dump($datas);
        // var_dump($this->validation($datas));
        // return false;
        if($this->validation($datas))
        {
            
            $uploaded = $this->uploading();
            $createPref = Adspref::create($adsPref);
            $id = array('photo'         => $this->path,
                        'id_ads_pref'   => $createPref->id);
            $adsCont = array_merge($adsCont,$id);
            $createCont = Adscont::create($adsCont);
            $adsPayment = array(
                'id_ads_pref'   => $createPref->id,
                'price'         => $this->input->post('price'),
                'status'        => 0,
            );
            Payments::create($adsPayment);
            if($this->input->post('adsclick') == 1){
                $getTerms = $this->getTerms($this->input->post('terms'),$createPref->id);
                // var_dump($getTerms);
                // return false;
                $postAdsClick = Terms::insert($getTerms);

                
            }else if($this->input->post('adsclick') == 2){

            }else if($this->input->post('adsclick') == 3){

            }
            // $upload = $this->uploading();
            // $create = false;
            // var_dump($uploaded);
            //     return false;
            if($createPref && $createCont && $uploaded && $postAdsClick)
            {
                redirect(base_url().'ads/list');
            }else
            {
                $data['userData'] = $this->session->userdata('userData');
                $data['formValue'] = $datas;
                $data['title'] = 'Neuthings | Dashboard';
                $data['header']=$this->load->view('templates/header',$data, true);
                $data['content']=$this->load->view('ads/create-fail',$data, true);
                $data['footer']=$this->load->view('templates/footer',$data, true);
                $this->load->view('index',$data);
            }
        }
    }

    public function put()
    {
        
    }

    public function validation($data)
    {
        if($data['languages']!='' &&
            $data['email']!='' &&
            $data['city']!='' &&
            $data['state']!='' &&
            $data['country']!='' &&
            $data['budget']!='' &&
            $data['price']!='' &&
            $data['scheduling']!='' &&
            $data['platform']!='' &&
            $data['title']!='' &&
            $data['photo']!='' &&
            $data['adsclick']!='')
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function getTerms($terms,$id)
    {
        $termsCount = count($terms);
        $dataTerms = array();
        for($i=0;$i<$termsCount;$i++)
        {
            array_push($dataTerms,
                array(
                    'id_ads_pref' => $id,
                    'terms' => $terms[$i]
                )
            );
        }
        return $dataTerms;
    }

    public function uploading(){
        $uploaded;
		$config['upload_path']          = './adsfolder/content';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 50000000;
		$config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['file_name']            = date('dmyhis').$_FILES['photo']['name'];
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('photo')){
            // $this->path = base_url().'ads/content/'.$config['file_name'];
            $uploaded = false;
            // $data = array(
            //     'path'  => base_url().'ads/content/'.$config['file_name'],
            //     'uploaded'  => false
            // );
		}else{
            $this->path = base_url().'adsfolder/content/'.$config['file_name'];
            // return true;
            $uploaded = true;
            // $data = array(
            //     'path'  => base_url().'ads/content/'.$config['file_name'],
            //     'uploaded'  => true
            // );
        }
        return $uploaded;
    }
    
    public function viewers_get($budget,$price)
    {
        $dataEstimation = Viewers::where('budget',$budget)->get();
        foreach($dataEstimation as $key=>$value)
        {
            if($price == 0 || $price == ''){
                $viewers = '0';
            }
            else if($price >= $value->price_start && $price < $value->price_max
            )
            {
                $viewers = $value->estimation;
            }else if($price >= $value->price_start && $price >= $value->price_max)
            {
                $viewers = 'more than '.$value->estimation;
            }
        }
        $data = '<p class="text-default"> with that package and price, you can reach <span class="text-primary"> '.$viewers.' </span> viewer(s). </p>';
        echo $data;
    }
}
