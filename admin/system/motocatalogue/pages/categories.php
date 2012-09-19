<?php
/**
 * Page categories for module Motocatalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/motocatalogue/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- brands (Block: brands) start -----------
$block = 'brands';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'categoriesbrands';


wgSystem::defPostValue(MotocatalogueBrandsModel::COL_ID, '');
wgSystem::defPostValue(MotocatalogueBrandsModel::COL_NAME, '');
wgSystem::defPostValue(MotocatalogueBrandsModel::COL_DESCRIPTION, '');
$lv = array();
$item = new MotocatalogueBrandsModel();
$item->setDefaultResults(wgSystem::getPost());

$conn = new wgConnector();
$conn->order(MotocatalogueBrandsModel::COL_NAME);
$arr = MotocatalogueBrandsModel::doPager($conn, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listbrands');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listbrands');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'categoriesbrands') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['LOGOIMG'] = '<p>'.moduleMotocatalogue::getLogo($item->getId(), $item->getName()).'</p>';
$var['COLDESCRIPTION'] = $item->getDescription();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('brands', wgLang::get('brands'), true, $tpl->getBlock($block));
// ----------- brands end -----------

// ----------- types (Block: types) start -----------
$block = 'types';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'categoriestypes';


wgSystem::defPostValue(MotocatalogueTypesModel::COL_ID, '');
wgSystem::defPostValue(MotocatalogueTypesModel::COL_NAME, '');
wgSystem::defPostValue(MotocatalogueTypesModel::COL_DESCRIPTION, '');
$lv = array();
$item = new MotocatalogueTypesModel();
$item->setDefaultResults(wgSystem::getPost());

$conn = new wgConnector();
$conn->order(MotocatalogueTypesModel::COL_NAME);
$arr = MotocatalogueTypesModel::doPager($conn, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtypes');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtypes');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'categoriestypes') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLDESCRIPTION'] = $item->getDescription();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('types', wgLang::get('types'), false, $tpl->getBlock($block));
// ----------- types end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>