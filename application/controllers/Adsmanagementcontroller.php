<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adsmanagementcontroller extends CI_Controller {

    var $path = '';
    var $API = 'https://api.pushads.amandjaja.com/frog/oapi/';
    var $APIStatistik = 'https://sa.pushads.amandjaja.com/fig/service/content/daily';
    var $param = '?tcx_datetime=20181230235959';
    var $TYPE = 'FTC';
    var $APPID = 'neuthings.id';
    var $APPPASS = 'N2IwOGNhNjMxMDUwYTdkODdmY2VjOGUwMzkwMjk3NDk4ZTc2OWZkMDphYmNkZTEyMzQ1YWJjZGU=';
    var $APPTOKEN = 'ODM2YmJjNWM1OGVmMzgwNjQ0ZDJmY2RmM2JiYmM2ZDJjZTY3ZTcwZg==';
    var $APPPASSSTAT = 'MjYzYzE1NWJmMzdhMjViYTdmMDIxZDhhMzkyNzUzOWYwMzY5YWY0ZDphYmNkZTEyMzQ1YWJjZGU=';
    var $APPTOKENSTAT = 'N2Y3M2E1M2MwZmNkYTMxMTgzMjVlMmIwMTZmYzY1NGJhMjJiOWY0Zg==';
    var $imglink = 'http://api.pushads.amandjaja.com/data/advertisement/image/';


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
        $this->load->model('Users');
        $this->load->model('Chats');
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
        $labelimp='';$datasetimp='';
        $labelview='';$datasetview='';
        $labelclick='';$datasetclick='';
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])
                                    ->where('id_ads_pref',$id)
                                    ->get();
        $data['Adscont'] = Adscont::where('id_ads_pref',$id)
                                    ->get();
        $data['ads']     = json_decode($this->getAdsApi($id));
        $impstat     = json_decode($this->getAdsPerDay($id,$data['ads']->data->_start,'impression'));
        foreach($impstat->data as $val){
            $date = date_create($val->_date);
            $dates = date_format($date,'F j, Y');
            $labelimp .= "'".$dates."'".",";
            $datasetimp .= $val->_impression.',';
        }
        $data['labelimp']=$labelimp;
        $data['datasetimp']=$datasetimp;
        $viewstat     = json_decode($this->getAdsPerDay($id,$data['ads']->data->_start,'view'));
        foreach($viewstat->data as $val){
            $date = date_create($val->_date);
            $dates = date_format($date,'F j, Y');
            $labelview .= "'".$dates."'".",";
            $datasetview .= $val->_view.',';
        }
        $data['labelview']=$labelview;
        $data['datasetview']=$datasetview;
        $clickstat     = json_decode($this->getAdsPerDay($id,$data['ads']->data->_start,'click'));
        foreach($clickstat->data as $val){
            $date = date_create($val->_date);
            $dates = date_format($date,'F j, Y');
            $labelclick .= "'".$dates."'".",";
            $datasetclick .= $val->_click.',';
        }
        $data['labelclick']=$labelclick;
        $data['datasetclick']=$datasetclick;
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
        $data['kotas']     = json_decode($this->getKotasApi());
        // var_dump($data['kotas']);
        // return false;
        $data['witels']     = json_decode($this->getWitelsApi());
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/create',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function update($id)
	{
        $data['userData'] = $this->session->userdata('userData');
        $data['Adspref'] = Adspref::where('email',$data['userData']['email'])
                                    ->where('id_ads_pref',$id)
                                    ->get();
        $data['Adscont'] = Adscont::where('id_ads_pref',$id)
                                    ->get();
        $data['kotas']     = json_decode($this->getKotasApi());
        // var_dump($data['kotas']);
        // return false;
        $data['witels']     = json_decode($this->getWitelsApi());
        $data['title'] = 'Neuthings | Dashboard';
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('ads/update',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function post()
    {
        if(@getimagesize($_FILES['photo']['tmp_name'])[0] == '640' && @getimagesize($_FILES['photo']['tmp_name'])[1] == '720')
        {
            
            $postApi = json_decode($this->postAdsApi($this->input->post('title'),'01',$this->input->post('price'),10,intVal($this->input->post('price')/10),$this->input->post('state')));
            
            $adsPref = array(
                'id_ads_pref'   => $postApi->data->id,
                'languages'     => 'Indonesian',
                'email'         => $this->session->userdata('userData')['email'],
                'city'          => $this->input->post('city'),
                'state'         => $this->input->post('state'),
                'country'       => 'Indonesia',
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
                $status_code = $upload->status_code;
                // var_dump(@getimagesize($_FILES['photo']['tmp_name'])[0]);
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
                if($createPref && $createCont && $status_code == 'SSSSSS' && $postAdsClick)
                {
                    redirect(base_url().'ads/list');
                }else
                {
                    $data['userData'] = $this->session->userdata('userData');
                    $data['formValue'] = $datas;
                    $data['kotas']     = json_decode($this->getKotasApi());
                    // var_dump($data['kotas']);
                    // return false;
                    $data['witels']     = json_decode($this->getWitelsApi());
                    $data['title'] = 'Neuthings | Dashboard';
                    $data['header']=$this->load->view('templates/header',$data, true);
                    $data['content']=$this->load->view('ads/create-fail',$data, true);
                    $data['footer']=$this->load->view('templates/footer',$data, true);
                    $this->load->view('index',$data);
                }
            }
        }else{
            $adsPref = array(
                'id_ads_pref'   => 0,
                'languages'     => 'Indonesian',
                'email'         => $this->session->userdata('userData')['email'],
                'city'          => $this->input->post('city'),
                'state'         => $this->input->post('state'),
                'country'       => 'Indonesia',
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
            $data['userData'] = $this->session->userdata('userData');
            $data['formValue'] = $datas;
            $data['kotas']     = json_decode($this->getKotasApi());
            // var_dump($data['kotas']);
            // return false;
            $data['witels']     = json_decode($this->getWitelsApi());
            $data['title'] = 'Neuthings | Dashboard';
            $data['header']=$this->load->view('templates/header',$data, true);
            $data['content']=$this->load->view('ads/create-fail',$data, true);
            $data['footer']=$this->load->view('templates/footer',$data, true);
            $this->load->view('index',$data);
        }
    }

    public function put()
    {
        $ads     = json_decode($this->getAdsApi($this->input->post('idads')));
        $putApi = json_decode($this->putAdsApi($this->input->post('title'),'01',$ads->data->budget,$ads->data->price,$ads->data->target,$ads->data->_start,$ads->data->_end,$ads->data->id,$this->input->post('state')));
        // var_dump($putApi);
        // return false;
        
        
        $adsPref = array(
            'city'          => $this->input->post('city'),
            'state'         => $this->input->post('state'),
            'scheduling'    => $this->input->post('scheduling'),
            'platform'      => $this->input->post('platform')
        );
        AdsPref::where('id_ads_pref',$this->input->post('idads'))->update($adsPref);
        if($_FILES['photo']['tmp_name']!=''){
        $upload = json_decode($this->putAdsImageAPI($this->input->post('idads')));    
            $adsCont = array(
            'title'         => $this->input->post('title'),
            'photo'         => $this->imglink.$upload->data->link
            );
        }else{
            $adsCont = array(
                'title'         => $this->input->post('title')
            );
        }
        Adscont::where('id_ads_pref',$this->input->post('idads'))->update($adsCont);
        redirect(base_url().'ads/detail/'.$this->input->post('idads'));
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
                                    'image_size_id' => 'REC_640_720',
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

    public function putAdsImageAPI($id){
        $idx = json_decode($this->getAdsImageAPI($id));    
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
                                    'image_size_id' => 'REC_640_720',
                                    'image'=> new CURLFILE($_FILES['photo']['tmp_name']),
                                    'id' => $idx->data[0]->id,
                                    '_method' => 'put'),
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
        // $dataEstimation = Viewers::where('budget',$budget)->get();
        // foreach($dataEstimation as $key=>$value)
        // {
        //     if($price == 0 || $price == ''){
        //         $viewers = '0';
        //     }
        //     else if($price >= $value->price_start && $price < $value->price_max
        //     )
        //     {
        //         $viewers = $value->estimation;
        //     }else if($price >= $value->price_start && $price >= $value->price_max)
        //     {
        //         $viewers = 'more than '.$value->estimation;
        //     }
        // }
        $viewers = $price/10;
        $data = '<p class="text-default"> with that package and price, your ads will appear<span class="text-primary"> '.intVal($viewers).' </span> times. </p>';
        echo $data;
    }

    public function postAdsApi($name,$type,$budget,$price,$target,$loc)
    {
        date_default_timezone_set("Asia/Bangkok");
        $start = date('Y-m-d');
        $end = date('Y-m-d', strtotime('+1 month', strtotime($start)));
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
        CURLOPT_POSTFIELDS => array('group_id' => '21',
                                    'name' => $name,
                                    'type' => $type,
                                    '_start' => $start,
                                    '_end' => $end,
                                    'budget' => $budget,
                                    'price' => $price,
                                    'target' => $target,
                                    'placement_id' => 1,
                                    'witels[0]' => $loc,
                                    'isSelected' => 1,
                                ),
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
    
    public function putAdsApi($name,$type,$budget,$price,$target,$start,$end,$id,$loc)
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
        CURLOPT_POSTFIELDS => array('group_id' => '21',
                                    'name' => $name,
                                    'type' => $type,
                                    '_start' => $start,
                                    '_end' => $end,
                                    'budget' => $budget,
                                    'price' => $price,
                                    'target' => $target,
                                    'id' => $id,
                                    '_method' => 'put',
                                    'witels[0]' => $loc,
                                    'isSelected' => 1,
                                    ),
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

    public function getAdsImageApi($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->API.'advertisement/image'.$this->param.'&advertisement_id='.$id,
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

    public function getKotasApi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->API.'telkomap/kota'.$this->param.'&limit=100',
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

    public function getAdsPerDay($id,$start,$action)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->APIStatistik,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('start_date' => $start,
                                    'end_date' => date('Y-m-d'),
                                    'action' => $action,
                                    'id' => $id),
        CURLOPT_HTTPHEADER => array(
            "X-TCX-TYPE: ".$this->TYPE,
            "X-TCX-APP-ID: ".$this->APPID,
            "X-TCX-APP-PASS: ".$this->APPPASSSTAT,
            "X-TCX-TOKEN: ".$this->APPTOKENSTAT
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

    public function getWitelsApi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->API.'telkomap/witel'.$this->param.'&limit=100',
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
    public function get()
    {
        $cust = $_GET['email'];
        $chat = Chats::where('cust',$cust)->get();
        $chatReturn = '';
        foreach($chat as $chats){
            if($chats->sender != $cust)
            {
                Chats::where('chat_id',$chats->chat_id)->update(['status'=>0]);
                $position = '<div class="row mb-4">
                <div class="col-md-3">
                  <img src="'.base_url().'assets/landing-page/img/495d50774a822d720190812031506.png" style="width:inherit"alt="" class=" rounded-circle">
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
                $user = Users::where('email',$cust)->where('oauth_provider',$this->session->userdata('userData')['oauth_provider'])->get();
                $pic = '';
                if($user[0]['picture']!=''){
                    $pic = $user[0]['picture'];
                }else{
                    $pic = 'http://pluspng.com/img-png/user-png-icon-png-ico-512.png';
                }
                $position = '<div class="row mb-4">
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-body">
                      <small>'.$chats->message.'</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <img src="'.$pic.'" alt="" style="width:inherit" class=" rounded-circle">
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
            'sender'    => $cust,
            'cust'      => $cust,
            'receiver'  => 'admin||neuthings'
        );
        Chats::create($dataChat);
    }
}
