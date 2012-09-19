<?php
/**
 * Page fields for module Imenu
 * 
 * @package      WebGuru3
 * @subpackage   modules/imenu/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. August 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- items (Block: items) start -----------
$block = 'items';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'fieldsitems';
$mymenu = (int) wgSessions::handleModuleValue('mymenu');
$var['FULLMENU'] = formsHelper::getSelectBox('mymenu', $mymenu, ImenuMenusModel::getSelfData(), array(), wgLang::get('allmenus'));
$var['CHCAC'] = wgPaths::makeSelfLink('mymenu='.$mymenu);

wgSystem::clearDefPostValue();

wgSystem::defPostValue(ImenuItemsModel::COL_TYPE, 'web');
wgSystem::defPostValue(ImenuItemsModel::COL_IMAGE, '');
wgSystem::defPostValue(ImenuItemsModel::COL_IMAGETYPE, 0);
wgSystem::defPostValue(ImenuItemsModel::COL_VARIABLE1, '');
wgSystem::defPostValue(ImenuItemsModel::COL_VARIABLE2, '');
wgSystem::defPostValue(ImenuItemsModel::COL_VARIABLE3, '');
wgSystem::defPostValue(ImenuItemsModel::COL_SORT, 0);
$lv = array();
$item = new ImenuItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ImenuItemsModel::getSelfPagerData(pager::getPage($block), 20);
//$arr = ImenuItemsModel::doPager(array(), pager::getPage($block));
// ImenuItemsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listitems');
	$lv['LNAME'] = $val->getName();
	$lv['LTYPE'] = wgLang::get('itype'.$val->getType());
	$lv['LIMAGE'] = '<img src="'.$val->getImage().'" alt="'.$val->getName().'" style="margin:2px;" />';
	$lv['LIMAGETYPE'] = $val->getImagetype();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listitems');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLTYPE'] = formsHelper::getSelectBox('type', $item->getType(), moduleImenu::getTranslatedTypes());
$var['COLIMAGE'] = $item->getImage();
$var['FULLCOLIMAGETYPE'] = formsHelper::getCheckBox('imagetype', $item->getImagetype(), 1);
$var['COLVARIABLEA'] = $item->getVariable1();
$var['COLVARIABLEB'] = $item->getVariable2();
$var['COLVARIABLEC'] = $item->getVariable3();
$var['COLSORT'] = $item->getSort();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('items', wgLang::get('items'), true, $tpl->getBlock($block));
// ----------- items end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>