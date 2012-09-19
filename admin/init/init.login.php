<?php
/**
 * Parsing login page
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      22. October 2008
 */

$pageblock = 'login';

$var = array();
wgLang::addFile(wgPaths::getAdminPath().'/languages/'.LANGUAGE.'/login.txt');

if (isset($_COOKIE['user']['name'])) $var['USERNAME'] = $_COOKIE['user']['name'];
//if (isset($_SESSION['user']['name'])) $var['PASSWORD'] = $_SESSION['user']['pass'];



//$var['CHECKED'] = ' checked="checked"';


$var['TEMPLATE'] = wgPaths::getTemplatePath('url');
$var['FROM'] = '?'.http_build_query(array('from'=>wgGet::getValue('from')));

include('inc.errors.php');

// parse main teplate for the page
$path = wgPaths::getTemplatePath().'/templates/';
$temp = $pageblock.'.html';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($pageblock);

// setting variable
$tpl->setVariable($var);

// cleaning
$system['parse'] = NULL;
$var = array();
$temp = NULL;
// display page
$tpl->parseBlock($pageblock);
$tpl->showBlock($pageblock);

?>