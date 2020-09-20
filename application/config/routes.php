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

//user registration
$route['register'] 		= 'authentication/index'; //load view page
$route['register/add'] 	= 'authentication/register_insert'; //add user details
$route['email-verification'] 	= 'authentication/email_verification'; //email verification
$route['resend-link'] 	= 'authentication/resend_link'; //email verification

//login
$route['login'] 		= 'authentication/login'; //load view page
$route['login/check'] 	= 'authentication/check_login'; //load view page
//logout
$route['logout'] 		= 'authentication/logout';

//forgot password
$route['forgot-password'] 				= 'authentication/forgot_password';
$route['forgot-password-set/(:any)'] 	= 'authentication/add_pass/$1';
$route['forgot-password/update'] 		= 'authentication/update_pass';

//account settings
$route['profile'] 						= 'account/index';
$route['profile/update'] 				= 'account/update_profile';

//change password
$route['change-password'] 			= 'account/changePassword';
$route['update-password'] 			= 'account/password_validation';

//shortlisted vendor
$route['profile/shortlisted-vendor'] 	= 'account/getShortist';
//enquired vendors
$route['profile/enquired-vendors']   	= 'account/enquireVendor';


// newsletter subscribe
$route['subscribe'] 		    		= 'home/subscribe';
//contact us
$route['contact-us']   					= 'home/contact';
$route['contact-us/insert']   			= 'home/insertcontact';

//search
$route['vendors']  						= 'search/index';
$route['vendors/(:any)']  				= 'search/index/$1/';
$route['vendors/(:any)/(:any)']  		= 'search/index/$1/$2';
$route['vendors/(:any)/(:any)/(:any)']  = 'search/index/$1/$2/$3';

//vendors detail
$route['(:any)/(:any)/(:any)/(:any)']   = 'vendors/detail/$1/$2/$3/$4';
$route['detail/gallery']   				= 'vendors/gallery';
$route['detail/full-gallery']   		= 'vendors/full_gallery';
$route['details/gallery-count']   		= 'vendors/galleryCount';

//vendor review
$route['review/submit']   				= 'vendors/review_submit';
$route['review/session-check']   		= 'vendors/reviewSession';

//make favourite vendor
$route['make-favourite']   				= 'vendors/makeFavourite';
$route['get-favourite']   				= 'vendors/getFavourite';

//enquire vendors
$route['enquire-vendor']   				= 'vendors/enquireVendor';
$route['enquire-phoneCheck']   			= 'vendors/phone_check';
//all category
$route['categories']   				    = 'vendors/allCategory';
$route['terms-conditions']   		    = 'home/terms_conditions';
$route['privacy-policy']   				= 'home/privacy_policy';
$route['about-us']   				    = 'home/about_us';
$route['site-map']   				    = 'home/site_map';
$route['wed-assistance']   				= 'home/wed_assistance';
$route['wedzmagazine']   				    = 'home/feedback';
$route['testimonial']   				= 'home/testimonial';
$route['testimonial-post']              = 'home/testimonial_post';
$route['feedback-post']                 = 'home/feedback_post';
$route['career']                        = 'home/career';
$route['career/(:any)']                 = 'home/career/$1';
$route['appaly/(:any)']                 = 'home/application/$1';
$route['einvite']   				    = 'home/e_invite';
$route['real-wedding']   				= 'home/real_wedding';
$route['real-wedding-detail']   		= 'home/real_wedding_detail';
//vendor register
$route['vendor-register'] 		        = 'authentication/vendorRegister';
$route['vendor-login'] 		            = 'authentication/vendorlogin';
$route['vendor-register/send'] 		    = 'authentication/vendorsend';


//vendor module
//authentication
$route['vendor/register'] 		    		= 'vendor/index';
$route['vendor/register-insert'] 			= 'vendor/register_insert';
//vendor login
$route['vendor/login'] 		        		= 'vendor/login';
$route['vendor/login-check'] 				= 'vendor/check_login';
$route['vendor/forgot-password'] 			= 'vendor/forgot_password';
$route['vendor/forgot-password-set/(:any)'] = 'vendor/add_pass/$1';
$route['vendor/password-update'] 			= 'vendor/update_pass';
//vendor detail
$route['vendor/profile'] 		    		= 'Vendor_detail/index';
//change password
$route['vendor/change-password'] 			= 'Vendor_detail/changePassword';
$route['vendor/update-password'] 			= 'Vendor_detail/password_validation';
//package
$route['vendor/package'] 					= 'Vendor_package/index';
$route['vendor/buy-package'] 				= 'Vendor_package/buyPackage';
//reviews
$route['vendor/reviews'] 	            	= 'Vendor_detail/reviews';
$route['vendor/reviews/(:any)'] 	        = 'Vendor_detail/reviews/$1';
$route['vendor/reviews/(:any)/(:any)'] 	    = 'Vendor_detail/reviews/$1/$2';
//leads
$route['vendor/leads'] 	            		= 'Vendor_detail/leads';
$route['vendor/leads/(:any)'] 	            = 'Vendor_detail/leads/$1';
//freequote
$route['free-quote'] 	            		= 'home/freeQuote';

//real wedding
$route['real-wedding']   					= 'real_wedding/real_wedding';
$route['real-wedding/(:any)']   			= 'real_wedding/real_wedding/$1';
$route['real-wedding/(:any)/(:any)']   		= 'real_wedding/real_wedding_detail/$1/$2';


// e-invite
$route['select-theme']   				    = 'einvite/index';
$route['bide-groom']   				    	= 'einvite/manage_user';
$route['bide-groom/insert']   				= 'einvite/insertBgdetail';
$route['invite-event']   				    = 'einvite/wedding_event';
$route['invite-event/insert']   			= 'einvite/eventInsert';
$route['family-member']   				    = 'einvite/family_member';
$route['wedding-photo']   				    = 'einvite/wedding_photo';
$route['wedding-photo/insert']   			= 'einvite/galleryInsert';
$route['wedding-information']   			= 'einvite/wedding_information';
$route['wedding-information/insert']   		= 'einvite/rsvpInsert';
$route['my-website']   						= 'einvite/myWebsite';
$route['my-website/(:any)']   				= 'einvite/myWebsite/$1';

$route['e-invite/preview']   				= 'einvite/preview';

// landing page
$route['wedding-enquiry']   					= 'home/landing_page';