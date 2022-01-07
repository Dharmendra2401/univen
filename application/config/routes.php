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
$route['default_controller'] = 'home';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Registration Routings */
$route['registration'] = 'Frontendcontrollers/registration';
$route['aspmobile'] = 'Frontendcontrollers/registration/aspmobile';
$route['empmobile'] = 'Frontendcontrollers/registration/empmobile';
$route['adduserasp'] = 'Frontendcontrollers/registration/adduserasp';
$route['adduseremp'] = 'Frontendcontrollers/registration/adduseremp';
$route['getprofiles'] = 'Frontendcontrollers/registration/getprofiles';
$route['ugetprofiles'] = 'Frontendcontrollers/registration/ugetprofiles';
$route['commingsoon'] = 'CommingSoon/commingsoon';
$route['getcity'] = 'Frontendcontrollers/registration/getcity';
$route['getcitytwo'] = 'Frontendcontrollers/registration/getcitytwo';



/*Login Routings */
$route['login'] = 'Frontendcontrollers/login';
$route['loginasp'] = 'Frontendcontrollers/login/loginasp';
$route['loginemp'] = 'Frontendcontrollers/login/loginemp';



/*Seprate Pages Routings */
$route['categories'] = 'Frontendcontrollers/categories';
$route['category/(:any)/(:any)'] = 'Frontendcontrollers/categories/category/$1/$2';
$route['category/(:any)/(:any)/(:any)'] = 'Frontendcontrollers/categories/pro/$1/$2/$3';

/*Aspirant Pages Routings */
//$route['dashboard/(:num)'] = 'aspirant/$1';

$route['dashboard'] = 'aspirant';