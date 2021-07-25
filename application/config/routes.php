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
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'Authentication';
$route['login'] = 'Authentication/Action';
$route['logout'] = 'Authentication/Logout';

$route['dashboard'] = 'Dashboard';
$route['customer'] = 'MasterData/Customers';
$route['store-customer/(:any)'] = 'MasterData/Customers/Write/$1';
$route['submit-customer'] = 'MasterData/Customers/Action';
$route['status-customer'] = 'MasterData/Customers/Activate';
$route['delete-customer/(:any)'] = 'MasterData/Customers/Remove/$1';
$route['destroy-customer/(:any)'] = 'MasterData/Customers/Destroy/$1';

$route['item'] = 'MasterData/Items';
$route['store-item/(:any)'] = 'MasterData/Items/Write/$1';
$route['submit-item'] = 'MasterData/Items/Action';
$route['status-item/(:any)'] = 'MasterData/Items/Activate/$1';
$route['delete-item/(:any)'] = 'MasterData/Items/Remove/$1';
$route['destroy-item/(:any)'] = 'MasterData/Items/Destroy/$1';

$route['category'] = 'MasterData/Categories';
$route['store-category/(:any)'] = 'MasterData/Categories/Write/$1';
$route['submit-category'] = 'MasterData/Categories/Action';
$route['status-category/(:any)'] = 'MasterData/Categories/Activate/$1';
$route['delete-category/(:any)'] = 'MasterData/Categories/Remove/$1';
$route['destroy-category/(:any)'] = 'MasterData/Categories/Destroy/$1';

$route['supplier'] = 'MasterData/Suppliers';
$route['store-supplier/(:any)'] = 'MasterData/Suppliers/Write/$1';
$route['submit-supplier'] = 'MasterData/Suppliers/Action';
$route['status-supplier'] = 'MasterData/Suppliers/Activate';
$route['delete-supplier/(:any)'] = 'MasterData/Suppliers/Remove/$1';
$route['destroy-supplier/(:any)'] = 'MasterData/Suppliers/Destroy/$1';

$route['report'] = 'Report/Reports';

$route['sales'] = 'Transaction/Sales';
$route['receiving'] = 'Transaction/Receivings';

$route['backoffice'] = 'BackOffice/Offices';
$route['employee'] = 'BackOffice/Employees';
$route['app-config'] = 'BackOffice/Configurations';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
