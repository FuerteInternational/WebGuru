<?php
/**
 * Page configfiles for module Configuration
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- settings (Block: settings) start -----------
$block = 'settings';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = $block;

$arr = modulePhonebook::getConfig();
$var['CONFIG'] = wgConfig::generateConfigAdmin($arr);
$arr = NULL;

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), true, $tpl->getBlock($block));
// ----------- settings end -----------

// ----------- defpic (Block: defpic) start -----------
$block = 'defpic';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settings';

$file = 'phonebook-people-def-xsml.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['XSML'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'phonebook-people-def-sml.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['SML'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'phonebook-people-def-med.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['MED'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'phonebook-people-def-lrg.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['LRG'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), false, $tpl->getBlock($block));
// ----------- defpic end -----------

$var = array();
$system['parse']['content'] = $tab->getAll();
?>