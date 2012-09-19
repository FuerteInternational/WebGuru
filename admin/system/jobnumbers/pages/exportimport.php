<?php
/**
 * Page exportimport for module Jobnumbers
 * 
 * @package      WebGuru3
 * @subpackage   modules/jobnumbers/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. March 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- import (Block: import) start -----------
$block = 'import';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'exportimportimport';

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('import', wgLang::get('import'), true, $tpl->getBlock($block));
// ----------- import end -----------

// ----------- export (Block: export) start -----------
$block = 'export';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'exportimportexport';

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('export', wgLang::get('export'), false, $tpl->getBlock($block));
// ----------- export end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>