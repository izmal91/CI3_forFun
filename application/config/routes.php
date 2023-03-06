<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//api
$route['house/add-new'] 	= 'House_con/create_info';
$route['house/save-info'] 	= 'House_con/save_info';
$route['house/delete'] 		= 'House_con/delete_house_info';


//view
$route['test/template'] = 'Test_con/index';