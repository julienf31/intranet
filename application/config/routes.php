<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'login';
$route['404_override'] = '';

##### AFFICHAGE TV #####
$route['news'] = 'home/news';
$route['bde'] = 'home/bde';

##### ADMINISTRATION #####
$route['admin'] = 'admin/index';
####### Gestion des listes 
$route['liste_news'] = 'admin/liste_news';
$route['liste_bde'] = 'admin/liste_bde';
####### Ajout déléments
$route['add_news'] = 'admin/add_news';
$route['add_bde'] = 'admin/add_bde';