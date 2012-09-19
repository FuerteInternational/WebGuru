<?php
/**
 * Page firmy for module Databazedluzniku
 * 
 * @package      WebGuru3
 * @subpackage   modules/databazedluzniku/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. May 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- firmy (Block: firmy) start -----------
$block = 'firmy';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'firmyfirmy';

wgSystem::defPostValue(DdaFirmyModel::COL_NAME, '');
wgSystem::defPostValue(DdaFirmyModel::COL_IC, '');
wgSystem::defPostValue(DdaFirmyModel::COL_DIC, '');
wgSystem::defPostValue(DdaFirmyModel::COL_ZALOZENA, time());
wgSystem::defPostValue(DdaFirmyModel::COL_KAPITAL, '0');
wgSystem::defPostValue(DdaFirmyModel::COL_TYP, 'S.R.O.');
$lv = array();
$item = new DdaFirmyModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DdaFirmyModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listfirmy');
	$lv['LNAME'] = $val->getName();
	$lv['LIC'] = $val->getIc();
	$lv['LTYP'] = $val->getTyp();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listfirmy');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'firmyfirmy') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIC'] = $item->getIc();
$var['COLDIC'] = $item->getDic();
$var['FULLCOLZALOZENA'] = formsHelper::getDateTimeBox('zalozena', $item->getZalozena());
$var['COLKAPITAL'] = $item->getKapital();
$var['FULLCOLTYP'] = formsHelper::getSelectBox('typ', $item->getTyp(), DdaFirmyModel::getTypesOfCompanies());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('firmy', wgLang::get('firmy'), true, $tpl->getBlock($block));
// ----------- firmy end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>