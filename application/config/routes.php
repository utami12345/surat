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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'surat';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['surat/create'] = 'surat/create';
$route['surat/store'] = 'surat/store'; 
$route['surat'] = 'surat/index';
$route['surat/(:num)'] = 'surat/index/$1';
$route['surat/surat_edit/(:num)'] = 'surat/surat_edit/$1'; 
$route['surat/update'] = 'surat/update';
$route['surat/hapus/(:num)'] = 'surat/hapus/$1'; // Route untuk menghapus surat
$route['surat/search'] = 'surat/search';
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['auth/login_process'] = 'auth/login_process';
$route['auth/register'] = 'auth/register';
$route['surat/dashboard'] = 'surat/dashboard';
$route['surat/suratm_create'] = 'surat/suratm_create';
$route['surat/suratm_store'] = 'surat/suratm_store'; // URL for storing a new surat
$route['surat/suratm_index'] = 'suratm/index';
$route['surat/suratm_index/(:num)'] = 'suratm/index/$1';
$route['surat/suratm_tambah'] = 'suratm/create';
$route['surat/suratm_edit/(:num)'] = 'suratm/surat_edit/$1';
$route['surat/suratm_update'] = 'surat/suratm_update';
$route['surat/delete_surat/(:num)'] = 'suratm/delete_surat/$1';
$route['surat/suratm_search'] = 'surat/suratm_search';
// User management
$route['user'] = 'auth/user/'; 
$route['user/(:num)'] = 'auth/user/$1'; // View a single user
$route['user/create'] = 'user/create'; // Create a new user
$route['user/edit/(:num)'] = 'user/edit/$1'; // Edit a user
$route['user/delete/(:num)'] = 'user/delete/$1'; // Delete a user
