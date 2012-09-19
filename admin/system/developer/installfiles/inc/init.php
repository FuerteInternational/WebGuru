<?php
session_start();
if(substr(PHP_VERSION, 0, strpos(PHP_VERSION,'.')) < 5) die('You are using old PHP version '.PHP_VERSION.'. If you want to install. WebGuru Publisher CMS needs PHP 5 or higher');
set_include_path('./'.PATH_SEPARATOR.'./inc/'.PATH_SEPARATOR.'./libs/');
//error_reporting(E_ALL);
require('PEAR.php');
require('class.error.php');
require('class.fileupload.php');
require('class.xml.php');
require('class.zip.php');
function active($step) {
	$add = NULL;
	if ($step >= $_SESSION['step']) $add = ' deactivate';
	if ($_SESSION['step'] == $step) return 'active'.$add;
	else return 'passive'.$add;
}

function getPhpSetting($val) {
	$ret =  (ini_get($val) == '1' ? 1 : 0);
	return $ret ? 'ON' : 'OFF';
}

function checked($data) {
	if ((bool) $data) return ' checked="checked"';
	else return NULL;
}

?>