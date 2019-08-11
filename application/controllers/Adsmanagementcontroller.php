<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adsmanagementcontroller extends CI_Controller {

    var $path = '';
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

        // $getAds = json_decode($this->getAdsApi(50));
        // var_dump($data['Adspref']);
        // return false;

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
        $data['ads']     = json_decode($this->getAdsApi($id));
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
        $postApi = json_decode($this->postAdsApi($this->input->post('title'),01,$this->input->post('budget'),1000));
        
        $adsPref = array(
            'id_ads_pref'   => $postApi->data->id,
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
            
            // $uploaded = $this->uploading();
            $upload = json_decode($this->postAdsImageAPI($postApi->data->id));
            // var_dump($upload);
            // return false;
            $createPref = Adspref::create($adsPref);
            $id = array('photo'         => $this->imglink.$upload->data->link,
                        'id_ads_pref'   => $postApi->data->id);
            $adsCont = array_merge($adsCont,$id);
            $createCont = Adscont::create($adsCont);
            $adsPayment = array(
                'id_ads_pref'   => $postApi->data->id,
                'price'         => $this->input->post('price'),
                'status'        => 0,
            );
            Payments::create($adsPayment);
            if($this->input->post('adsclick') == 1){
                $getTerms = $this->getTerms($this->input->post('terms'),$postApi->data->id);
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
            if($createPref && $createCont && $upload->status_code == 'SSSSSS' && $postAdsClick)
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

    public function postAdsImageAPI($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->API."advertisement/image".$this->param,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('advertisement_id' => $id,
                                    'image_size_id' => '15',
                                    'image'=> new CURLFILE($_FILES['photo']['tmp_name'])),
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

    public function uploading(){
        $uploaded;
		$config['upload_path']          = $this->imglink;
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

    public function postAdsApi($name,$type,$budget,$target)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->API.'advertisement'.$this->param,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('group_id' => '20',
                                    'name' => $name,
                                    'type' => $type,
                                    '_start' => '2019-07-18',
                                    '_end' => '2019-07-30',
                                    'budget' => $budget,
                                    'price' => $budget,
                                    'target' => $target),
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

    public function payfinish()
    {
        $order_id = $this->input->get('order_id');
        $ex = explode('-',$order_id);
        redirect(base_url().'ads/invoice/detail/'.$ex[1].'/'.$ex[2]);
    }
}
