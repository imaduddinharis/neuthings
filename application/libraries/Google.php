<?php 
require_once('Google/autoload.php');

class Google {
	protected $CI;

	public function __construct(){
		$this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->config->load('google');
        $this->client = new Google_Client();
		$this->client->setClientId($this->CI->config->item('google_client_id'));
		$this->client->setClientSecret($this->CI->config->item('google_client_secret'));
		$this->client->setRedirectUri($this->CI->config->item('google_redirect_url'));
		$this->client->setScopes(array(
			"https://www.googleapis.com/auth/plus.login",
			"https://www.googleapis.com/auth/plus.me",
			"https://www.googleapis.com/auth/userinfo.email",
			"https://www.googleapis.com/auth/userinfo.profile"
			)
		);
  

	}

	public function get_login_url(){
		return  $this->client->createAuthUrl();

    }
    
    public function get_url_logout(){
        $logoutLink = 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue='.base_url().'auth/logout';
        return $logoutLink;
    }

	public function validate(){		
		if (isset($_GET['code'])) {
		  $this->client->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $this->client->getAccessToken();

		}
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $this->client->setAccessToken($_SESSION['access_token']);
		  $plus = new Google_Service_Plus($this->client);
			$person = $plus->people->get('me', array('fields' => 'id,gender,name,image,placesLived,emails'));
			$info['id']=$person['id'];
            $info['email']=$person['emails'][0]['value'];
            $info['gender']=$person->getGender;
            $info['given_name']=$person['name']['givenName'];
            $info['family_name']=$person['name']['familyName'];
			$info['link']='https://profiles.google.com/115063121183536852887'.$person['id'];
			$info['profile_pic']=$person['image']['url'];

		   return  $info;
		}


	}

}