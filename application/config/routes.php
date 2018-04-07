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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//ADMINISTRATOR
$route['admin'] = 'akun/dashboard';
$route['admin/dashboard'] = 'akun/dashboard';
$route['admin/profile'] = 'akun/profile';
$route['admin/profile/update'] = 'akun/update_profile';
$route['admin/artikel'] = 'admin/artikel/index';
$route['admin/artikel/(:any)'] = 'admin/artikel/show/$1';
$route['admin/artikel/create'] = 'admin/artikel/create';
$route['admin/artikel/store'] = 'admin/artikel/store';
$route['admin/artikel/edit/(:any)'] = 'admin/artikel/edit/$1';
$route['admin/artikel/update'] = 'admin/artikel/update';
$route['admin/artikel/delete/(:any)'] = 'admin/artikel/destroy/$1';
$route['admin/user'] = 'admin/user/index';
$route['admin/user/create'] = 'admin/user/create';
$route['admin/user/store'] = 'admin/user/store';
$route['admin/user/edit/(:any)'] = 'admin/user/edit/$1';
$route['admin/user/update'] = 'admin/user/update';
$route['admin/user/delete/(:any)'] = 'admin/user/destroy/$1';
$route['admin/komoditi'] = 'admin/komoditi/index';
$route['admin/komoditi/create'] = 'admin/komoditi/create';
$route['admin/komoditi/store'] = 'admin/komoditi/store';
$route['admin/komoditi/edit/(:any)'] = 'admin/komoditi/edit/$1';
$route['admin/komoditi/update'] = 'admin/komoditi/update';
$route['admin/komoditi/delete/(:any)'] = 'admin/komoditi/destroy/$1';

//PENGELOLA
$route['pengelola'] = 'akun/dashboard';
$route['pengelola/dashboard'] = 'akun/dashboard';
$route['pengelola/profile'] = 'akun/profile';
$route['pengelola/profile/update'] = 'akun/update_profile';
$route['pengelola/gudang'] = 'pengelola/gudang/index';
$route['pengelola/gudang/create'] = 'pengelola/gudang/create';
$route['pengelola/gudang/store'] = 'pengelola/gudang/store';
$route['pengelola/gudang/edit/(:any)'] = 'pengelola/gudang/edit/$1';
$route['pengelola/gudang/detail/(:any)'] = 'pengelola/gudang/show/$1';
$route['pengelola/gudang/update'] = 'pengelola/gudang/update';
$route['pengelola/gudang/delete/(:any)'] = 'pengelola/gudang/destroy/$1';
$route['pengelola/pengajuan'] = 'pengelola/barang/index';
$route['pengelola/pengajuan/create'] = 'pengelola/barang/create';
$route['pengelola/pengajuan/store'] = 'pengelola/barang/store';
$route['pengelola/pengajuan/edit/(:any)'] = 'pengelola/barang/edit/$1';
$route['pengelola/pengajuan/update'] = 'pengelola/barang/update';
$route['pengelola/pengajuan/delete/(:any)'] = 'pengelola/barang/destroy/$1';
$route['pengelola/pengujian'] = 'pengelola/pengujian/index';
$route['pengelola/pengujian/create'] = 'pengelola/pengujian/create';
$route['pengelola/pengujian/store'] = 'pengelola/pengujian/store';
$route['pengelola/pengujian/edit/(:any)'] = 'pengelola/pengujian/edit/$1';
$route['pengelola/pengujian/detail/(:any)'] = 'pengelola/pengujian/show/$1';
$route['pengelola/pengujian/update'] = 'pengelola/pengujian/update';
$route['pengelola/pengujian/delete/(:any)'] = 'pengelola/pengujian/destroy/$1';
$route['pengelola/resi'] = 'pengelola/resi/index';
$route['pengelola/komoditi'] = 'pengelola/komoditi/index';
$route['pengelola/komoditi/create_harga'] = 'pengelola/komoditi/create_harga';
$route['pengelola/komoditi/store_harga'] = 'pengelola/komoditi/store_harga';
$route['pengelola/artikel'] = 'pengelola/artikel/index';
$route['pengelola/artikel/(:any)'] = 'pengelola/artikel/show/$1';

//AJAX API
$route['ajax/dataJagung'] = 'ajaxapi/getdatajagung';

//DINAS
$route['dinas'] = 'akun/dashboard';
$route['dinas/dashboard'] = 'akun/dashboard';
$route['dinas/profile'] = 'akun/profile';
$route['dinas/profile/update'] = 'akun/update_profile';

//BANK
$route['bank'] = 'akun/dashboard';
$route['bank/dashboard'] = 'akun/dashboard';
$route['bank/profile'] = 'akun/profile';
$route['bank/profile/update'] = 'akun/update_profile';

//PETANI
$route['petani'] = 'akun/dashboard';
$route['petani/dashboard'] = 'akun/dashboard';
$route['petani/profile'] = 'akun/profile';
$route['petani/profile/update'] = 'akun/update_profile';

// Auth
$route['login'] = 'Auth/login';
$route['logout'] = 'Auth/logout';
