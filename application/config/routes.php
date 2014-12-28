<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "zh_TW";
$route['404_override'] = '';

$route['zh_TW/(:any)'] = "zh_TW/$1";
$route['en/(:any)'] = "en/$1";
$route['en'] = "en/index";
$route['(:any)'] = "zh_TW/$1";