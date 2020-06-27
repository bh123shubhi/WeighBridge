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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//login
$route['login']='login/LoginController/viewlogin';
$route['save_login']='login/LoginController/save_login';
$route['logout']='login/LoginController/logout';

//AdminMaster
$route['master/(:any)/(:any)'] = "master/HomeController/View/$1/$2";
$route['master/(:any)/(:any)/(:any)'] = "master/HomeController/View/$1/$2/$3";
$route['master/(:any)/(:any)/(:any)/(:any)'] = "master/HomeController/View/$1/$2/$3/$4";
//$route['master/(:any)/(:any)/(:any)/(:any)/(:any)'] = "master/HomeController/View/$1/$2/$3/$4/$5";
//check username
$route['check_user_name']='master/HomeController/check_user_name';
$route['vehicle/vehicle_entry']='vehicle/EntryVehicleController/vehicle_entry';
$route['vehicle/show_vehicle_detail']='vehicle/EntryVehicleController/show_vehicle_detail';
$route['vehicle/save_vehicle_entryin']='vehicle/EntryVehicleController/save_vehicle_entryin';
//vehicle exit
$route['vehicle/vehicle_exit']='vehicle/ExitVehicleController/vehicle_exit';
$route['vehicle/save_vehicle_exit']='vehicle/ExitVehicleController/save_vehicle_exit';

//vehicle register
$route['vehicle/vehicle_register']='vehicle/ListVehicleController/vehicle_register';
$route['vehicle/view_vehicle/(:any)/(:any)']='vehicle/ListVehicleController/view_vehicle/$1/$2';
$route['dashboard'] = "dashboard/DashboardController/dashboardview";

//reports
$route['report/zone_wise_report']='report/ReportController/zone_wise_report';
$route['report/zone_wise_list']='report/ReportController/zone_wise_list';
$route['report/garbage_wise_report']='report/ReportController/garbage_wise_report';
$route['report/garbage_wise_list']='report/ReportController/garbage_wise_list';
$route['report/fleet_operator_wise_report']='report/ReportController/fleet_operator_wise_report';
$route['report/fleet_operator_wise_list']='report/ReportController/fleet_operator_wise_list';
$route['report/agency_wise_report']='report/ReportController/agency_wise_report';
$route['report/agency_wise_list']='report/ReportController/agency_wise_list';
$route['report/vehicle_wise_report']='report/ReportController/vehicle_wise_report';
$route['report/vehicle_wise_list']='report/ReportController/vehicle_wise_list';

//profile
$route['profile']='profile/ProfileController/viewProfile';
$route['save_profile']='profile/ProfileController/save_profile';
$route['account_setting']='profile/ProfileController/account_setting';
$route['save_account_setting']='profile/ProfileController/save_account_setting';