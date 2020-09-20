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
$route['cache']   				= 'account/cachedetail'; 		//forgot password email click


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
$route['vendors/manage/(:any)']	=	'vendors/manage_vendors/$1'; //manage vendors table
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

//vendors approval
$route['vendor/approval']			        =	'vendors_approval/index';
$route['vendor/approval/(:any)']			=	'vendors_approval/index/$1';
$route['vendor/reject/(:any)']				=	'vendors_approval/reject/$1';


//enquiry
$route['enquiries']			        =	'enquiries/index'; //add vendor
$route['enquiries/view/(:any)']	    =	'enquiries/view/$1'; //add vendor
$route['enquiries/delete/(:any)']	=	'enquiries/delete/$1'; //add vendor
$route['free-quote']			    =	'enquiries/freequote'; //add vendor
$route['free-quote/view/(:any)']	=	'enquiries/quoteview/$1'; //add vendor
$route['free-quote/delete/(:any)']	=	'enquiries/quotedelete/$1'; //add vendor



$route['newsletter-subcribers']	    =	'enquiries/newsletter'; //add vendor
$route['newsletter/delete/(:any)']	=	'enquiries/newsdelete/$1'; //add vendor

$route['testimonial']	            =	'enquiries/testimonial'; 
$route['testimonial/(:any)']	    =	'enquiries/testimonial/$1'; 
$route['testimonial-status/(:any)']	=	'enquiries/testimonial_status/$1'; 
$route['feedback']	                =	'enquiries/feedback'; 
$route['feedback/(:any)']	        =	'enquiries/feedback/$1';

$route['career']	                =	'career'; 
$route['career/add']	            =	'career/add'; 
$route['career/edit/(:any)']	    =	'career/edit/$1'; 
$route['career/detail/(:any)']	    =	'career/detail/$1'; 
$route['career/delete/(:any)']	    =	'career/delete/$1'; 
$route['career/status/(:any)']	    =	'career/status/$1'; 
$route['career/applications']	    =	'career/applications';
//vendor enquiry
$route['vendor-enquiry']			    =	'vendorenquiry/index'; 
$route['vendor-enquiry/view/(:any)']	=	'vendorenquiry/detail/$1'; 
$route['vendor-package']			    =	'vendorenquiry/packageGet'; 
$route['vendor-package/view/(:any)']    =	'vendorenquiry/viewPackage/$1';



//employee
$route['employees']			        =	'Adminusers/index'; 
$route['employees/add']			    =	'Adminusers/add'; 
$route['employees/insert']			=	'Adminusers/insert';
$route['employees/edit/(:any)']		=	'Adminusers/edit/$1';
$route['employees/update']			=	'Adminusers/update';
$route['employees/delete/(:any)']	=	'Adminusers/delete/$1';
$route['employees/verify']			=	'Employe_auth/verify';
$route['employees/add-password/(:any)/(:any)']	=	'Employe_auth/add_pass/$1/$2';
$route['employees/update-password']	=	'Employe_auth/update_pass';

$route['employees/types']			=	'Adminusers/empTypes'; 
$route['employees/types-insert']	=	'Adminusers/typeInsert'; 
$route['employees/delete-types/(:any)']	=	'Adminusers/typeDelete/$1'; 






//vendor discount request
$route['vendors-discount']					=	'vendor_discount/index'; 
$route['vendors-discount/approve/(:any)']	=	'vendor_discount/approve/$1'; 
$route['vendors-discount/reject/(:any)']	=	'vendor_discount/reject/$1';

$route['invoice-data']						=	'vendor_discount/invoiceData'; 
$route['invoice-generate']					=	'vendor_discount/invoicePending'; 

$route['vendors/delete-proposal/(:any)']	=	'vendor_discount/deleteProposal/$1';






//banner package
$route['banner-package']			        =	'Banner_pacakge/index';
$route['banner-package/add']			    =	'Banner_pacakge/add';
$route['banner-package/insert']			    =	'Banner_pacakge/insert';
$route['banner-package/edit/(:any)']		=	'Banner_pacakge/edit/$1';
$route['banner-package/update']			    =	'Banner_pacakge/update';
$route['banner-package/delete/(:any)']		=	'Banner_pacakge/delete/$1';
//leads management
$route['leads/add']			        		=	'Leads/index';
$route['leads']			            		=	'Leads/manage';
$route['leads/delete/(:any)']				=	'Leads/delete/$1'; 

// vendors renewel - upgrade to paid
$route['vendors/my-vendors']			    =	'vendors_upgrade/index';
$route['vendors/upgrade/(:any)']			=	'vendors_upgrade/upgrade/$1';
$route['vendors/upgrade-submit']			=	'vendors_upgrade/insertUpgrade';
$route['vendors/new-proposal']			    =	'vendors_upgrade/newProposal';
$route['vendors/view-proposal/(:any)']		=	'vendors_upgrade/view_proposal/$1';
$route['vendors/approved-proposal']			=	'vendors_upgrade/approvedProposal';
$route['vendors/rejected-proposal']			=	'vendors_upgrade/rejectedProposal';
$route['vendors/all-proposal']				=	'vendors_upgrade/allProposal';
$route['vendors/cleared-proposal']			=	'vendors_upgrade/clearedProposal';
$route['vendors/live-proposal']				=	'vendors_upgrade/liveProposal';
$route['vendors/proposal-detail/(:any)']	=	'vendors_upgrade/viewProps/$1';
$route['vendors-proposal/download/(:any)']	=	'vendors_upgrade/downloads/$1';
$route['vendors/edit-proposal/(:any)']		=	'vendors_upgrade/editProposal/$1';
$route['vendors/upgrade-update']			=	'vendors_upgrade/updateUpgrade';


//finance
$route['finance/new-proposal']			    =	'finance/newProposal';
$route['finance/view-proposal/(:any)']		=	'finance/view_proposal/$1';
$route['finance/approved-proposal']			=	'finance/approvedProposal';
$route['finance/rejected-proposal']			=	'finance/rejectedProposal';
$route['finance/all-proposal']				=	'finance/allProposal';
$route['finance/cleared-proposal']			=	'finance/clearedProposal';
$route['finance/live-proposal']				=	'finance/liveProposal';
$route['finance/make-live/(:any)']			=	'finance/makeLive/$1';
//real wedding
$route['real-wedding']			            =	'weding/index';
$route['real-wedding/add']			        =	'weding/add';
$route['real-wedding/view/(:any)']			=	'weding/view/$1';
$route['real-wedding/edit/(:any)']			=	'weding/editReal/$1';
//category banner
$route['category-banner/manage']			=	'category_banner/index'; //manage category
$route['category-banner/add']			    =	'category_banner/add'; //add category
$route['category-banner/insert']			=	'category_banner/insert'; 
$route['category-banner/edit/(:any)']		=	'category_banner/edit/$1'; 
$route['category-banner/view/(:any)']		=	'category_banner/view/$1';
$route['category-banner/update/(:any)']		=	'category_banner/update/$1'; 
//sale report
$route['sales-report']			            =	'report/index';
$route['leads-report']			            =	'report/leads';
$route['visitors-report']			        =	'report/visitors';
$route['employee-report']			        =	'report/employee';
$route['team-report']			       	 	=	'report/team';
$route['live-report']			       	 	=	'report/liveReport';

// seo data
$route['seo/manage']			            =	'seo/index';
$route['seo-enquiry']			            =	'seo/enquiry';



//content
$route['content/manage']			        =	'c_content/index';
$route['content/add']			            =	'c_content/add';
$route['content/edit/(:any)']			    =	'c_content/edit/$1';
$route['content/delete/(:any)']			    =	'c_content/delete/$1';

//footer category
$route['footer-category/manage']			        =	'f_category/index';
$route['footer-category/add']			            =	'f_category/add';
$route['footer-category/edit/(:any)/(:any)']		=	'f_category/edit/$1/$2';
$route['footer-category/delete/(:any)']			    =	'f_category/delete/$1';

//home banner
$route['home-banner/manage']			=	'h_banner/index'; //manage category
$route['home-banner/add']			    =	'h_banner/add'; //add category
$route['home-banner/insert']			=	'h_banner/insert'; 
$route['home-banner/edit/(:any)']		=	'h_banner/edit/$1'; 
$route['home-banner/view/(:any)']		=	'h_banner/view/$1';
$route['home-banner/update/(:any)']		=	'h_banner/update/$1'; 

$route['employee-target/delete/(:any)/(:any)']		=	'Adminusers/tardelete/$1/$2'; 

$route['e-invite']			=	'einvite/index'; //manage category










