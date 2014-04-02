<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['logout']="accounts/logout";
$route['signup']="accounts/create_account";
$route['login']="accounts/login";
$route['discussion_forum']="welcome/discussion";
$route['research_center']="welcome/research";
$route['article/(:num)']='welcome/view_article/$1';
$route['questions/(:num)']='discussion/view_question/$1';
$route['profile']='accounts/account_settings';
$route['category/infrustructure']='welcome/index/Infrustructure';
$route['category/climate']='welcome/index/Climate';
$route['category/marketing']='welcome/index/Marketing';
$route['category/pestsanddiseases']='welcome/index/Pests and Diseases';
$route['category/technology']='welcome/index/Technology';



/* End of file routes.php */
/* Location: ./application/config/routes.php */