<?php
/**
 * Page selects for module Developer
 * 
 * @package      WebGuru3
 * @subpackage   modules/developer/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        21. November 2008
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- dfgd (Block: dfgd) start -----------
$block = 'dfgd';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'actiondfgd';

wgSystem::defPostValue('pagedfgd', 'New module -> dfgd');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('dfgd', wgLang::get('dfgd'), true, $tpl->getBlock($block));
// ----------- dfgd end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>