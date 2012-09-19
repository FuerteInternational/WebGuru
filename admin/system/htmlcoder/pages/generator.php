<?php
/**
 * Page generator for module Htmlcoder
 * 
 * @package      WebGuru3
 * @subpackage   modules/htmlcoder/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        22. January 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- issuesadmin (Block: issuesadmin) start -----------
$block = 'issuesadmin';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'generatorissuesadmin';
$item = NULL;
$params = array();
$arr = moduleHtmlcoder::getIssueFolders();
if (!empty($arr) && is_array($arr)) foreach ($arr as $val) {
	$tpl->setCurrentBlock('listissuesadmin');
	$lv['LNAME'] = $val;
	$lv['LPATH'] = wgPaths::getPath().'issues/'.$val;
	$lv['EDITROW'] = wgIcons::getButton('edit', $val, wgPaths::makeSelfLink('show=generatorissuesadmin&amp;edit='.$val));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val, wgPaths::makeSelfLink('act=generatorissuesadmin&amp;delete='.$val), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listissuesadmin');
	if (wgSystem::getRequestValue('edit') == $val && wgSystem::getRequestValue('show') == 'generatorissuesadmin') $item = $val;
}

$var['COLNAME'] = $item;
$var['EDIT'] = $item;

$var = wgSystem::getFormCallback($var);


$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('issuesadmin', wgLang::get('issuesadmin'), true, $tpl->getBlock($block));
// ----------- issuesadmin end -----------

// ----------- basiclayout (Block: basiclayout) start -----------
$block = 'basiclayout';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'generatorbasiclayout';


$params = array();
//$arr = EmailsGroupsModel::doPager($params, pager::getPage($block));
$var['ISSUESELECT'] = formsHelper::getSelectBox('issue', NULL, moduleHtmlcoder::getIssueFolders(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('basiclayout', wgLang::get('basiclayout'), false, $tpl->getBlock($block));
// ----------- basiclayout end -----------

// ----------- layoutselector (Block: layoutselector) start -----------
$block = 'layoutselector';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'generatorlayoutselector';


wgSystem::defPostValue(EmailsGroupsModel::COL_ID, '');
$params = array();
//$arr = EmailsGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr) && is_array($arr)) foreach ($arr as $val) {
	$tpl->setCurrentBlock('listlayoutselector');
	$lv['LID'] = $val;
	$lv['LNAME'] = $val;
	$lv['EDITROW'] = wgIcons::getButton('edit', $val, wgPaths::makeSelfLink('show=generatorlayoutselector&amp;edit='.$val));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val, wgPaths::makeSelfLink('act=generatorlayoutselector&amp;delete='.$val), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlayoutselector');
	if (wgSystem::getRequestValue('edit') == $val && wgSystem::getRequestValue('show') == 'generatorlayoutselector') $item = $val;
}
$lv = array();

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('layoutselector', wgLang::get('layoutselector'), false, $tpl->getBlock($block));
// ----------- layoutselector end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>