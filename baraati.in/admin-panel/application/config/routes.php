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
$route['default_controller'] 	= 'authentication';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;

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

//users
$route['users/manage']			=	'user/index'; 				//manage users table
$route['users/delete/(:any)']	=	'user/delete_user/$1'; 	//delete user
$route['users/view/(:any)']		=	'user/view_user/$1'; //view user
$route['users/block/(:any)']	=	'user/block_user/$1'; //view user
$route['users/unblock/(:any)']	=	'user/unblock_user/$1'; //view user

// cities
$route['cities/add']			=	'cities/index'; //add cities
$route['cities/insert']			=	'cities/insert_city'; //insert cities
$route['cities/manage']			=	'cities/manage_cities'; //manage cities table
$route['cities/delete/(:any)']	=	'cities/delete_city/$1'; //delete cities
$route['cities/edit/(:any)']	=	'cities/single_city/$1'; //edit cities
$route['cities/update']			=	'cities/update_city'; //update cities

//category
$route['category/add']			=	'category/index'; //add category
$route['category/insert']		=	'category/insert_category'; //insert category
$route['category/manage']		=	'category/manage_category'; //manage category table
$route['category/delete/(:any)']=	'category/delete_category/$1'; //delete category
$route['category/edit/(:any)']	=	'category/single_category/$1'; //edit category
$route['category/update']		=	'category/update_category'; //update category

//vendors
$route['vendors/add']			=	'vendors/index'; //add vendor
$route['vendors/insert']		=	'vendors/insert_vendors'; //insert vendors
$route['vendors/manage']		=	'vendors/manage_vendors'; //manage vendors table
$route['vendors/view/(:any)']	=	'vendors/detail/$1'; //vendor detail
$route['vendors/edit/(:any)']	=	'vendors/edit/$1'; //vendor edit
$route['vendors/delete/(:any)']	=	'vendors/delete/$1'; //vendor edit
$route['vendors/new-service']	=	'vendors/new_service'; //vendor information and services
$route['vendors/service']		=	'vendors/service'; //vendor information and services
$route['vendors/add-video']		=	'vendors/add_video'; //vendor edit
$route['vendor-review/update']  = 	'vendors/reviewupdate';
$route['vendor-review/delete/(:any)/(:any)']  = 	'vendors/reviewdelete/$1/$2';
$route['vendors/gallery_delete/(:any)/(:any)']  = 	'vendors/gallery_delete/$1/$2';
$route['vendors/video_delete/(:any)/(:any)']  = 	'vendors/video_delete/$1/$2';



//enquiry
$route['enquiries']			        =	'enquiries/index'; //add vendor
$route['enquiries/view/(:any)']	    =	'enquiries/view/$1'; //add vendor
$route['enquiries/delete/(:any)']	=	'enquiries/delete/$1'; //add vendor
$route['free-quote']			    =	'enquiries/freequote'; //add vendor
$route['free-quote/view/(:any)']	=	'enquiries/quoteview/$1'; //add vendor
$route['newsletter-subcribers']	    =	'enquiries/newsletter'; //add vendor

$route['testimonial']	            =	'enquiries/testimonial'; 
$route['testimonial/(:any)']	    =	'enquiries/testimonial/$1'; 
$route['testimonial-status/(:any)']	=	'enquiries/testimonial_status/$1'; 
$route['feedback']	                =	'enquiries/feedback'; 
$route['feedback/(:any)']	        =	'enquiries/feedback/$1'; 




//vendor enquiry
$route['vendor-enquiry']			=	'vendorenquiry/index'; //add vendor


