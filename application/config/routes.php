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

$route['dealers_ctrl']="dealers_ctrl";
$route['dealers_ctrl/load_dealer_view']="dealers_ctrl/load_dealer_view";
$route['insertFavourite']="favourite_ctrl/insert_into_favourite";
$route['fetchVehicleDetails'] = "ajax/index";
$route['changeStatus']="saved_search_ctrl/change_status";
$route['compare_ctrl/get_compare_details']="compare_ctrl/get_compare_details";
$route['admin_table_ctrl']="admin_table_ctrl";
$route['header_ctrl']="header_ctrl";
$route['all_ads_ctrl']="all_ads_ctrl";
$route['advanced_ctrl']="advanced_ctrl";
$route['search']="search";
$route['saved_search_ctrl']="saved_search_ctrl";
$route['admin_feedback_ctrl']="admin_feedback_ctrl";
$route['demo_ctrl']="demo_ctrl";
$route['edit_ad_ctrl']="edit_ad_ctrl";
//$route['adpreview_ctrl/get_ad_preview']="adpreview_ctrl/get_ad_preview";
$route['New_Password']="New_Password";
$route['New_Password/newp']="New_Password/newp";
$route['Reset_Password']="Reset_Password";
$route['Login/log']="Login/log";
$route['Register']="Register";
$route['Logout/out']="Logout/out";
$route['notify_ctrl']="notify_ctrl";
//$route['adpreview_ctrl/getad_preview/(:num)']="adpreview_ctrl/getad_preview/$1";
$route['(:any)'] = "pages/view/$1";
$route['default_controller'] = "pages/view";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



