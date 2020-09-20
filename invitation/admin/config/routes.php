<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']        = 'authentication';
$route['404_override']              = '';
$route['translate_uri_dashes']      = FALSE;

//admin authentication
$route['login'] 				= 'authentication/index'; 			//login view
$route['can-login'] 			= 'authentication/form_validation'; //check credential exist
$route['dashboard'] 			= 'authentication/enter'; 			//open dashboard
$route['logout'] 				= 'authentication/logout'; 			//logout
//forgot password
$route['forgot-password'] 		= 'authentication/forgot_password'; 	//forgot password email check
$route['set-password/(:any)'] 	= 'authentication/add_pass/$1'; 		//forgot password email click
$route['update-password']   	= 'authentication/update_pass'; 		//forgot password email click
//change password
$route['change-password']   	= 'account/index'; 						//forgot password email click
$route['password/change']   	= 'account/password_validation'; 		//forgot password email click
//account settings
$route['profile']   			= 'account/accntsttngs'; 	
$route['profile/update']   		= 'account/updateacnt'; 

// ******* category
$route['category/manage']   	= 'category/manage_category'; 
$route['category/add']   		= 'category/index'; 
$route['category/insert']   	= 'category/insert_category';
$route['category/edit/(:any)']  = 'category/single_category/$1';
$route['category/update']   	= 'category/update_category'; 
$route['category/delete/(:any)'] = 'category/delete/$1';

//sub category
$route['category/sub-category']   		= 'category/sub_category'; 
$route['category/sub-category-add']   	= 'category/sub_category_add'; 
$route['category/sub-category-edit']   	= 'category/sub_category_edit'; 
$route['category/sub-category-delete/(:any)']	= 'category/sub_category_edit/$1'; 

// products
$route['product/manage']   		= 'product/index';
$route['product/insert']   		= 'product/insert';
$route['product/edit/(:any)']   = 'product/edit/$1';
$route['product/delete/(:any)']   = 'product/delete/$1';

//banner
$route['banner/manage']   		= 'banner/index'; 	
$route['banner/add']   			= 'banner/add'; 	
$route['banner/insert']   		= 'banner/insert';


