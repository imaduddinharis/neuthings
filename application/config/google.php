<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google_client_id']="560918503921-0r239p52eo3vl2qne4qlcb45s5j2bsk7.apps.googleusercontent.com";
$config['google_client_secret']="owrhZ61oqlHmQeR52lKZ1vf1";
$config['google_redirect_url']=base_url().'auth/login-google';
$config['auth_url']=base_url().'auth';