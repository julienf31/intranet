<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = 'admin/error404';
$route['maintenance'] = 'admin/maintenance';


##### AFFICHAGE TV #####
$route['news'] = 'tv/news';
$route['news/(:any)'] = 'tv/news/$1';
$route['bde'] = 'tv/bde';
$route['bde/(:any)'] = 'tv/bde/$1';
$route['meteo'] = 'tv/meteo';
$route['photos'] = 'tv/photos';

##### LOGIN #####
$route['login/reset_password/(:any)'] = 'login/reset_password/token/$1';

##### ACCEUIL ET CONF #####
$route['logout'] = 'admin/logout';
$route['meteo_config'] = 'admin/meteo_config';
$route['config'] = 'admin/config';
$route['config/(:any)'] = 'admin/tv_config/$1';
$route['update/config_tv/(:any)'] = 'data/update_config_tv/$1';
$route['changelog'] = 'admin/changelog';
##### ADMINISTRATION #####
$route['admin'] = 'admin/index';
####### Gestion des listes 
$route['liste/(:any)'] = 'admin/liste/$1';
$route['liste/(:any)/([0-9]+)'] = 'admin/liste/$1/$2';
$route['album'] = 'admin/album';
####### Ajout d'éléments
$route['add/(:any)'] = 'admin/add/$1';
$route['add/(:any)/(:any)'] = 'admin/add/$1/$2';
$route['preview/(:any)'] = 'data/insert/$1';
###### Mise a jour d'éléments
$route['edit/(:any)/([0-9]+)'] = 'admin/edit/$1/$2';
$route['edit/(:any)/([0-9]+)/(:any)'] = 'admin/edit/$1/$2/$3';


######## GESTION DATAS #####
$route['insert/(:any)'] = 'data/insert/$1';
$route['insert/(:any)/(:any)'] = 'data/insert/$1/$2';
$route['update/(:any)/([0-9]+)'] = 'data/update/$1/$2';
$route['update/(:any)/([0-9]+)/(:any)'] = 'data/update/$1/$2/$3';
$route['update_state/(:any)/([0-9]+)/([0-9]+)'] = 'data/update_state/$1/$2/$3';
$route['update_state/(:any)/([0-9]+)/([0-9]+)/([0-9]+)'] = 'data/update_state/$1/$2/$3/$4';
$route['delete/(:any)/([0-9]+)'] = 'data/delete/$1/$2';
$route['delete/(:any)/([0-9]+)/([0-9]+)'] = 'data/delete/$1/$2/$3';



