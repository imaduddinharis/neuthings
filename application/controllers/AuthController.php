<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('facebook');
        $this->load->library('google');
        
        //Load user model
        $this->load->model('users');
        //Load user model
        $this->load->model('user');
        if(isset($_SESSION['loggedIn']))
        {
            redirect(base_url().'dashboard');
        }
    }

	public function index()
	{
        $data['authFb'] = $this->facebook->login_url();
        $data['authGoogle'] = $this->google->get_login_url();
		$this->load->view('login/index',$data);
    }
    
    public function logingoogle()
    {
        $google_data = $this->google->validate();

        $userData['oauth_provider'] = 'google';
        $userData['oauth_uid']    = $google_data['id'];
        $userData['first_name']    = $google_data['given_name'];
        $userData['last_name']    = $google_data['family_name'];
        $userData['email']        = $google_data['email'];
        $userData['gender']        = $google_data['gender'];
        $userData['picture']    = $google_data['profile_pic'];
        $userData['link']        = $google_data['link'];
        
        // var_dump($userData);
        // return false;

        $userID = $this->user->checkUser($userData);
        $userData['authLogout']        =  $this->google->get_url_logout();
        // Store the status and user profile info into session
        $this->session->set_userdata('loggedIn', true);
        $this->session->set_userdata('userData', $userData);
        
		// $session_data=array(
		// 		'name'=>$google_data['name'],
		// 		'email'=>$google_data['email'],
		// 		'source'=>'google',
		// 		'profile_pic'=>$google_data['profile_pic'],
		// 		'link'=>$google_data['link'],
		// 		'sess_logged_in'=>1
		// 		);
		// 	$this->session->set_userdata($session_data);
        redirect(base_url().'dashboard');
    }
    
    public function loginfacebook()
    {
        $userData = array();
        
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';;
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:'';
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'';
            
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            
            // Check user data insert or update status
            $userData['authLogout']        =  $this->facebook->logout_url();
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('loggedIn', true);
                $this->session->set_userdata('userData', $userData);
            }else{
               $data['userData'] = array();
            }
            
            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        }else{
            // Get login URL
            $data['authURL'] =  $this->facebook->login_url();
            // $data['authURL'] = 'https://www.facebook.com/login.php?skip_api_login=1&api_key=340354959998168&kid_directed_site=0&app_id=340354959998168&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv3.3%2Fdialog%2Foauth%3Fapp_id%3D340354959998168%26auth_type%26channel_url%3Dhttps%253A%252F%252Fstaticxx.facebook.com%252Fconnect%252Fxd_arbiter%252Fr%252Fd_vbiawPdxB.js%253Fversion%253D44%2523cb%253Df16650c20bac36c%2526domain%253Dlocalhost%2526origin%253Dhttp%25253A%25252F%25252Flocalhost%25252Ff634a83802dc18%2526relation%253Dopener%26client_id%3D340354959998168%26display%3Dpopup%26domain%3Dlocalhost%26e2e%3D%257B%257D%26fallback_redirect_uri%3D66206fe5-0c10-048c-e6fa-d88bdf62b56b%26locale%3Den_US%26logger_id%3D66206fe5-0c10-048c-e6fa-d88bdf62b56b%26origin%3D1%26redirect_uri%3Dhttps%253A%252F%252Fstaticxx.facebook.com%252Fconnect%252Fxd_arbiter%252Fr%252Fd_vbiawPdxB.js%253Fversion%253D44%2523cb%253Df1f33146496b28%2526domain%253Dlocalhost%2526origin%253Dhttp%25253A%25252F%25252Flocalhost%25252Ff634a83802dc18%2526relation%253Dopener%2526frame%253Df7cb5fcdf9efe8%26ref%3DLoginButton%26response_type%3Dnone%252Ctoken%252Csigned_request%26scope%26sdk%3Djoey%26version%3Dv3.3%26ret%3Dlogin&cancel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df1f33146496b28%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff634a83802dc18%26relation%3Dopener%26frame%3Df7cb5fcdf9efe8%26error%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied&display=popup&locale=en_GB';
        }
        
        // Load login & profile view
        $data['title'] = 'Neuthings | Dashboard';
        
        $data['header']=$this->load->view('templates/header',$data, true);
        $data['content']=$this->load->view('dashboard/index',$data, true);
        $data['footer']=$this->load->view('templates/footer',$data, true);
		$this->load->view('index',$data);
    }

    public function logout()
    {
        // $this->facebook->logout();
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // $this->google->revokeToken();
        // Remove user data from session
        $this->session->unset_userdata('loggedIn');
        $this->session->unset_userdata('userData');
        // Redirect to login page
        $this->session->sess_destroy();
        redirect(base_url().'auth');
    }
}
