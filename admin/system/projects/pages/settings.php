<?php
/**
 * Page Settings in the Projects module
 * 
 * @package      WebGuru3
 * @subpackage   modules/projects/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        13. June 2009
 */

$system['parse']['head'] = '
';
$system['parse']['editor'] = false;

$tab = new myTabs('myTabs');
// --------------------------------- start content ---------------------------------
$block = 'settings';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = $block;

$var['CONFIG'] = wgConfig::generateConfigAdmin(moduleProjects::getConfiguration());
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

$file = 'projects-items-def-xsmall.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['XSML'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'projects-items-def-small.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['SML'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'projects-items-def-medium.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['MED'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'projects-items-def-large.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['LRG'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get('picturesset'), false, $tpl->getBlock($block));
// --------------------------------- end content ---------------------------------
$var = array();
$system['parse']['content'] = $tab->getAll();
?>
