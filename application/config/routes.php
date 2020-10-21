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

$route['login'] = 'admin/admin_login';
$route['category'] = 'admin/view_category';
$route['add_category'] = 'admin/add_category';
$route['edit_category/(:num)'] = 'admin/edit_category';
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['view_subcategory'] = 'admin/view_subcategory';
$route['edit_subcategory/(:num)'] = 'admin/edit_subcategory';
$route['delete_subcategory/(:any)'] = 'admin/delete_subcategory';

$route['view_banner'] = 'admin/view_banner';
$route['add_banner'] = 'admin/add_banner';
$route['inactive_banner/(:any)'] = 'admin/inactive_banner';
$route['active_banner/(:any)'] = 'admin/active_banner';
$route['edit_banner/(:any)'] = 'admin/edit_banner';

$route['view_country'] = 'admin/view_country';
$route['edit_country/(:any)'] = 'admin/edit_country';
$route['inactive_country/(:any)'] = 'admin/inactive_country';
$route['active_country/(:any)'] = 'admin/active_country';

$route['view_state'] = 'admin/view_state';
$route['edit_state/(:any)'] = 'admin/edit_state';
$route['inactive_state/(:any)'] = 'admin/inactive_state';
$route['active_state/(:any)'] = 'admin/active_state';

$route['view_employee'] = 'ajax/index';
$route['employee_list'] = 'ajax/employeeList';
$route['add_employee'] = 'ajax/add_employee';
$route['deleteEmployee'] = 'ajax/deleteEmployee';
$route['editEmployee'] = 'ajax/editEmployee';
$route['updateEmployee'] = 'ajax/updateEmployee';
