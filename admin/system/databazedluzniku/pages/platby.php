<?php
/**
 * Page platby for module Databazedluzniku
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

// ----------- platby (Block: platby) start -----------
$block = 'platby';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'platbyplatby';


wgSystem::defPostValue(DdaPlatbyModel::COL_ADDED, time());
wgSystem::defPostValue(DdaPlatbyModel::COL_AMMOUNT, 0);
wgSystem::defPostValue(DdaPlatbyModel::COL_DDA_PAYMENT_TYPES_ID, 2);
$lv = array();
$item = new DdaPlatbyModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DdaPlatbyModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listplatby');
	$lv['LID'] = $val->getId();
	$lv['LUSER'] = UsersModel::getFullName($val->getUsersId());
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LAMMOUNT'] = $val->getAmmount();
	$lv['LDDAPAYMENTTYPESID'] = $val->getDdaPaymentTypesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listplatby');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'platbyplatby') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'UsersModel';
$var['FULLCOLUSERSID'] = formsHelper::getSelectBox('users_id', $item->getUsersId(), UsersModel::doSelect(), $params);
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['COLAMMOUNT'] = $item->getAmmount();
$var['FULLPTYPE'] = formsHelper::getSelectBox('dda_payment_types_id', $item->getDdaPaymentTypesId(), DdaPaymentTypesModel::getTypesBySort());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('platby', wgLang::get('platby'), true, $tpl->getBlock($block));
// ----------- platby end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>