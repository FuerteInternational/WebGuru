<?php
/**
 * Page dbmodel for module Developer
 * 
 * @package      WebGuru3
 * @subpackage   modules/developer/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        19. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- generate (Block: generate) start -----------
$block = 'generate';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'servicesgenerate';


$lv = array();

$tables = getDb::getTables();
$tpl->setCurrentBlock('grouplist');
$tpl->setVariable('LGROUPNAME', wgLang::get('dbmodel'));
foreach ($tables as $table) {
	$tpl->setCurrentBlock('valuelist');
	$tpl->setVariable('LVALUE', $table[0]);
	$tpl->setVariable('LVALUENAME', $table[0]);
	$tpl->parseBlock('valuelist');
}
$tpl->parseBlock('grouplist');


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('generateservices', wgLang::get('generateservices'), true, $tpl->getBlock($block));
// ----------- generate end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>