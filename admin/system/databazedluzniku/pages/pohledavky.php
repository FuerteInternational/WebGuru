<?php
/**
 * Page pohledavky for module Databazedluzniku
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

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- pohledavky (Block: pohledavky) start -----------
$block = 'pohledavky';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'pohledavkypohledavky';


wgSystem::defPostValue(DdaPohledavkyModel::COL_CASTKA, 0);
wgSystem::defPostValue(DdaPohledavkyModel::COL_STATUS, 0);
$lv = array();
$item = new DdaPohledavkyModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DdaPohledavkyModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpohledavky');
	$lv['LID'] = $val->getId();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LDDAFIRMY'] = DdaFirmyModel::getJmenoFirmyById($val->getDdaFirmyId());
	$lv['LDDAFIRMYDLUZNIKID'] = $val->getDdaFirmyDluznikId();
	$lv['LCASTKA'] = $val->getCastka();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LSTATUS'] = (bool) $val->getStatus() ? 'bold green' : 'bold red';
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpohledavky');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'pohledavkypohledavky') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'UsersModel';
$var['FULLCOLUSERSID'] = formsHelper::getSelectBox('users_id', $item->getUsersId(), UsersModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'DdaFirmyModel';
$var['FULLCOLDDAFIRMYID'] = formsHelper::getSelectBox('dda_firmy_id', $item->getDdaFirmyId(), DdaFirmyModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'UsersModel';
$var['FULLCOLDDAFIRMYDLUZNIKID'] = formsHelper::getSelectBox('dda_firmy_dluznik_id', $item->getDdaFirmyDluznikId(), UsersModel::doSelect(), $params);
$var['COLCASTKA'] = $item->getCastka();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLSTATUS'] = formsHelper::getCheckBox('status', $item->getStatus(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('pohledavky', wgLang::get('pohledavky'), true, $tpl->getBlock($block));
// ----------- pohledavky end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>