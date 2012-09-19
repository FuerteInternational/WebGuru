<?php
/**
 * WebGuru3 administration
 * 
 * Support: http://www.webgurucms.com/ 
 *
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @wgversion  3.0.0.0
 * @since      16. October 2008
 */
//echo '<h2>:-)</h2><div class="box">:-)</div>';
chdir('../');
require('./init/init.basic.php');
require('./init/init.admin.php');

//print_r(wgSystem::getValue('page'));

//require('init/init.page.php');

$pageblock = 'main';

// parsing content for actual page
$system['parse'] = NULL;
$system['parse']['content'] = NULL;
$var = array();
$block = wgSystem::getPage();
$path = wgPaths::getAdminPath().wgSystem::getPart().'/'.wgSystem::getModule().'/';
wgLang::addFile($path.'/languages/'.LANGUAGE.'/global.'.wgSystem::getModule().'.txt');
wgLang::addFile($path.'/languages/'.LANGUAGE.'/'.wgSystem::getPage().'.txt');
$path .= 'templates/';
$temp = ''.$block.'.html';
$module = wgModules::runModule(wgSystem::getModule());
$var['ACTION'] = wgPaths::makeSelfLink(NULL, false);
$var['ADDR'] = wgPaths::getAdminPath('url');
$var['WGSSID'] = wgSystem::getValue('wgssid');
$var['AJAX'] = wgPaths::getAdminPath('url').'js/ajax/scripts/';
$var['MODULE'] = wgPaths::getModulePath('url');
require('class.tabs.php');
include(wgSystem::makeIncludePage());
//echo '<h2>Page name</h2><div class="box">';
echo $system['parse']['content'];
//echo '</div>';
$db = NULL;
?>