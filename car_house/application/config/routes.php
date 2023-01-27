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
$route['default_controller'] = 'Pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['success-flash'] = 'MyFlashController/success';
$route['error-flash'] = 'MyFlashController/error';
$route['warning-flash'] = 'MyFlashController/warning';
$route['info-flash'] = 'MyFlashController/info';

/* visitor route */

$route['Home'] = 'Pages/index';
$route['Login'] = 'Pages/login';
$route['Aboutcarhouse'] = 'Pages/aboutcarhouse';
$route['ContactUs'] = 'Pages/contactus';
$route['Feedback'] = 'Pages/feedback';
$route['TermsandCondition'] = 'Pages/termsandcondition';
$route['Privacy-Policy'] = 'Pages/privacy';
$route['Carmela-Policy'] = 'Pages/carmelaprivacy';
$route['FAQs'] = 'Pages/FAQs';
$route['Carmela-Detail/(:num)'] = 'Pages/carmeladetail/$2';
$route['All-Car'] = 'Pages/allcar';
$route['All-Car/(:any)/(:any)'] = 'Pages/allcar/$2/$3';
$route['List-View-All-Car'] = 'Pages/listview';
$route['Compare/(:num)/(:num)'] = 'Pages/compare/$2/$3';
$route['Car-Detail'] = 'Pages/cardetail';
$route['Car-Service-1'] = 'Pages/service';
$route['Car-Service-2'] = 'Pages/service2';
$route['Car-Service-3'] = 'Pages/service3';
$route['Service-Exit'] = 'Pages/exitser';
$route['Car-Service-Confirm'] = 'Member/serco';
$route['Search-Car/(:any)/(:any)'] = 'Pages/searchcar/$2/$3';
$route['Car-Detail/(:num)'] = 'Pages/cardetail/$2';

/* admin route */

$route['Admin'] = 'Authorize/index';
$route['Admin/(:any)'] = 'Authorize/index/$2';
$route['Admin-Home'] = 'Authorize/dashbord';
$route['Manage-Contact'] = 'Authorize/contactus';
$route['Manage-Feedback'] = 'Authorize/feedback';
$route['Manage-Email-Subscriber'] = 'Authorize/email';
$route['Manage-Banner'] = 'Authorize/banner';
$route['Manage-Member'] = 'Authorize/member';
$route['Manage-Carmela'] = 'Authorize/carmela';
$route['Manage-State'] = 'Authorize/state';
$route['Manage-City'] = 'Authorize/city';
$route['Manage-Area'] = 'Authorize/area';
$route['Manage-Landmark'] = 'Authorize/landmark';
$route['Manage-Car-Type'] = 'Authorize/cartype';
$route['Manage-Car-Company'] = 'Authorize/carcompany';
$route['Manage-Car-Model'] = 'Authorize/carmodel';
$route['Manage-Car-Submodel'] = 'Authorize/carsubmodel';
$route['Manage-Specification-Set'] = 'Authorize/specificationset';
$route['Manage-Specification'] = 'Authorize/specification';
$route['Manage-Car-Detail'] = 'Authorize/cardetail';
$route['Manage-Car-Review'] = 'Authorize/carreview';
$route['Manage-Carmela-Review'] = 'Authorize/carmelareview';
$route['Manage-Car-Service'] = 'Authorize/addservice';
$route['Manage-Car-Position'] = 'Authorize/servicepos';
$route['Service-Status'] = 'Authorize/pcr';
$route['Manage-Offer'] = 'Authorize/offer';
$route['Setting'] = 'Authorize/setting';
$route['Logout'] = 'Authorize/logout';
$route['Manage-Service'] = 'Authorize/manageser';
$route['Manage-Bill'] = 'Authorize/bill';
$route['Lost-Password'] = 'Authorize/lostpassword';
$route['Manage-Chat'] = 'Authorize/chat';

/* User */

$route['User-Home'] = 'Member/index';
$route['User-Profile'] = 'Member/profile';
$route['User-Logout'] = 'Member/logout';
$route['User-Update-Profile'] = 'Member/uprofile';
$route['User-Change-Password'] = 'Member/changepass';
$route['My-Wishlist'] = 'Member/wishlist';
$route['My-Review'] = 'Member/review';
$route['Carmela-Review'] = 'Member/carmelareview';
$route['User-Test-Drive'] = 'Member/testdrive';
$route['User-Bill/(:num)'] = 'Member/bill/$2';
$route['Payment/(:num)'] = 'Member/payment/$2';
$route['Payment-Success'] = 'Member/psuccess';
$route['View-Bill'] = 'Member/viewbill';
$route['Car-Service-Check/(:num)'] = 'Member/serstatus/$2';

/* carmela */

$route['Carmela-Registration-1'] = 'Carmela/index';
$route['Carmela-Registration-2'] = 'Carmela/carmelareg';
$route['Carmela-Registration-3'] = 'Carmela/carmelareg3';
$route['Carmela-Home'] = 'Carmela/sellerhome';
$route['My-Profile'] = 'Carmela/profile';
$route['Update-Profile'] = 'Carmela/uprofile';
$route['Change-Password'] = 'Carmela/cpassword';
$route['My-Gallery'] = 'Carmela/gallery';
$route['Add-Car'] = 'Carmela/addcar';
$route['Add-Car-Image'] = 'Carmela/addcarimage';
$route['View-All-Car'] = 'Carmela/car';
$route['View-Car-Detail/(:any)'] = 'Carmela/cardetail/$2';
$route['My-Car-Review'] = 'Carmela/carreview';
$route['My-Carmela-Review'] = 'Carmela/carmelareview';
$route['Carmela-Logout'] = 'Carmela/logout';
$route['My-Car-Testdrive'] = 'Carmela/testdrive';
$route['Follower'] = 'Carmela/follower';
$route['Carmela-Offer'] = 'Carmela/carmelaoffer';

/* Delete */

$route['Delete/(:any)/(:any)'] = 'Authorize/del/$2/$3';
$route['Del/(:any)/(:any)'] = 'Member/userdel/$2/$3';
$route['CDelete/(:any)/(:any)'] = 'Carmela/delete/$2/$3';

/* Update */

$route['Update/(:any)'] = 'Edit/state/$2';
$route['Update-Car-Type/(:any)'] = 'Edit/type/$2';
$route['Update-City/(:any)'] = 'Edit/city/$2';
$route['Update-Car-Company/(:any)'] ='Edit/company/$2';
$route['Update-Area/(:any)'] ='Edit/area/$2';
$route['Update-Landmark/(:any)'] ='Edit/landmark/$2';
$route['Update-Car-Model/(:any)'] ='Edit/carmodel/$2';
$route['Update-Sub-Model/(:any)'] ='Edit/submodel/$2';
$route['Update-Specification-Set/(:any)'] ='Edit/specificationset/$2';
$route['Update-Specification/(:any)'] ='Edit/specification/$2';
$route['Update-Carmela'] ='Carmela/uprofile';
$route['Update-Car/(:any)'] = 'Carmela/ucar/$2';
$route['Update-Service/(:any)'] = 'Edit/uservice/$2';
$route['Update-Car-Position/(:any)'] = 'Edit/upposition/$2';
$route['Update-Car-Position/(:any)'] = 'Edit/upposition/$2';
$route['Update-Offer/(:any)'] = 'Edit/offer/$2';