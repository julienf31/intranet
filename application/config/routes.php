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
$route['default_controller'] = 'login';
$route['404_override'] = '';


##### AFFICHAGE TV #####
$route['news'] = 'home/news';
$route['bde'] = 'home/bde';
$route['meteo'] = 'home/index';


##### ACCEUIL ET CONF #####
$route['logout'] = 'admin/logout';
$route['meteo_config'] = 'admin/meteo_config';
$route['config'] = 'admin/config';
$route['changelog'] = 'admin/changelog';
##### ADMINISTRATION #####
$route['admin'] = 'admin/index';
####### Gestion des listes 
$route['liste/(:any)'] = 'admin/liste/$1';
####### Ajout d'éléments
$route['add/(:any)'] = 'admin/add/$1';
###### Mise a jour d'éléments
$route['edit/(:any)/([0-9]+)'] = 'admin/edit/$1/$2';


######## GESTION DATAS #####
$route['insert/(:any)'] = 'data/insert/$1';
$route['update/(:any)/([0-9]+)'] = 'data/update/$1/$2';
$route['update_state/(:any)/([0-9]+)/([0-9]+)'] = 'data/update_state/$1/$2/$3';
$route['delete/(:any)/([0-9]+)'] = 'data/delete/$1/$2';



