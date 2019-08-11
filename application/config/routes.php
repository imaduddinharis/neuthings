<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'landingpagecontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'landingpagecontroller';
$route['auth'] = 'authcontroller';
$route['auth/login-google'] = 'authcontroller/logingoogle';
$route['auth/login-facebook'] = 'authcontroller/loginfacebook';
$route['auth/logout'] = 'authcontroller/logout';
$route['auth/logoutgoogle'] = 'authcontroller/logoutgoogle';
$route['auth-facebook'] = 'authlib/facebook_test/login';

$route['dashboard'] = 'dashboardcontroller';

$route['ads'] = 'adsmanagementcontroller';
$route['ads/list'] = 'adsmanagementcontroller';
$route['ads/create'] = 'adsmanagementcontroller/create';
$route['ads/detail/(:any)'] = 'adsmanagementcontroller/detail/$1';
$route['ads/monitoring/(:any)'] = 'adsmanagementcontroller/monitoring/$1';
$route['ads/invoice/(:any)'] = 'adsmanagementcontroller/invoice/$1';
$route['ads/invoice/detail/(:any)/(:any)'] = 'adsmanagementcontroller/invoice_detail/$1/$2';
$route['ads/update'] = 'adsmanagementcontroller/update';
$route['ads/post'] = 'adsmanagementcontroller/post';
$route['ads/put'] = 'adsmanagementcontroller/put';

$route['viewers-get/(:any)/(:any)'] = 'adsmanagementcontroller/viewers_get/$1/$2';

$route['pay'] = 'vtweb/vtweb_checkout';
$route['finish'] = 'adsmanagementcontroller/payfinish';

$route['about/kebijakan-privasi'] = 'dashboard';
$route['about/ketentuan-layanan'] = 'dashboard';

