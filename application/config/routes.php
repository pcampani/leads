<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'leads';
$route["leads/search/(:any)"] = "leads/search/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
