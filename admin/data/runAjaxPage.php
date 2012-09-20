<?php
/**
 * WebGuru3 administration
 * 
 * Support: http://www.webgurucms.com/ 
 *
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @version    1.0.0.1
 * @wgversion  3.0.0.0
 * @since      16. October 2008
 */

chdir('../');
require('./init/init.basic.php');
require('./init/init.admin.php');

$pageblock = 'main';

// parsing content for actual page
$system['parse'] = NULL;
$system['parse']['content'] = NULL;
$var = array();
$block = wgSystem::getPage();
$path = wgPaths::getAdminPath().wgSystem::getPart().'/'.wgSystem::getModule().'/';
$file = $path.'/languages/'.LANGUAGE.'/global.'.wgSystem::getModule().'.txt';
wgLang::addFile($file);
wgLang::addFile($path.'/languages/'.LANGUAGE.'/'.wgSystem::getPage().'.txt');
$path .= 'templates/';
$temp = ''.$block.'.html';
$module = wgModules::runModule(wgSystem::getModule());
$var['ACTION'] = wgPaths::makeSelfLink(NULL, false);
$var['ADDR'] = wgPaths::getAdminPath('url');
$var['WGSSID'] = wgGet::getValue('wgssid');
$var['AJAX'] = wgPaths::getAdminPath('url').'js/ajax/scripts/';
$var['MODULE'] = wgPaths::getModulePath('url');
require('class.tabs.php');
include(wgSystem::makeIncludePage());
echo $system['parse']['content'];
$db = NULL;
?>