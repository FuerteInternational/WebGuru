<?php
/**
 * Page settings for module Databazedluzniku
 * 
 * @package      WebGuru3
 * @subpackage   modules/databazedluzniku/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        10. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- ptypes (Block: ptypes) start -----------
$block = 'ptypes';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settingsptypes';


wgSystem::defPostValue(DdaPaymentTypesModel::COL_NAME, '');
wgSystem::defPostValue(DdaPaymentTypesModel::COL_COST, 0);
wgSystem::defPostValue(DdaPaymentTypesModel::COL_SORT, 0);
wgSystem::defPostValue(DdaPaymentTypesModel::COL_DEFAULT, 0);
$lv = array();
$item = new DdaPaymentTypesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DdaPaymentTypesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listptypes');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LCOST'] = $val->getCost();
	$lv['LDEFAULT'] = (bool) $val->getDefault() ? 'bold green' : 'bold red';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listptypes');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'settingsptypes') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLCOST'] = $item->getCost();
$var['COLSORT'] = $item->getSort();
$var['FULLCOLDEFAULT'] = formsHelper::getCheckBox('default', $item->getDefault(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('ptypes', wgLang::get('ptypes'), true, $tpl->getBlock($block));
// ----------- ptypes end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>