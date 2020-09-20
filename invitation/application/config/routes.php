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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//home page
$route['home'] 					= 'home/index';
// page
$route['search-sg']             = 'search/index';
$route['search/(:any)']         = 'search/search/$1';
$route['search']                = 'search/search';
$route['product/(:any)']        = 'search/product_detail/$1';
$route['category/(:any)']       =  'search/category/$1';
//user authentication
$route['register']             	= 'auth/index';
$route['register/submit']     	= 'auth/register_insert';
$route['email-verification']    = 'auth/email_verification';
$route['login']     			= 'auth/login';
$route['login/validate']     	= 'auth/check_login';
$route['logout']     			= 'auth/logout';
// account
$route['profile']       		= 'account';
$route['change-psw']            = 'account/change_psw';
$route['shipping-address']      = 'account/shipping_address';
$route['shipping-address-edit/(:any)'] 	= 'account/shipping_address_edit/$1';
$route['save-shipping-update']  		= 'account/shipping_address_update';
$route['delte-shipping/(:any)/(:any)'] 	= 'account/delte_shipping/$1/$2';

//cart
$route['add-cart/(:any)']       = 'cart/index/$1';
$route['get-cart']              = 'cart/get_cart';
$route['delete-cart/(:any)']    = 'cart/deleteCart/$1';
$route['cart']                  = 'cart/cartitem';
$route['update-qty']            = 'cart/update_qty';
$route['checkout']              = 'cart/checkout';
$route['save-shipping']         = 'cart/save_shipping'; 
$route['shipping-change']       = 'cart/shipping_change';
$route['place-order']           = 'cart/place_order'; 
$route['change-brand']          = 'cart/change_brand';



