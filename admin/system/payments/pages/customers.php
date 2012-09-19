<?php
/**
 * Page customers for module Payments
 * 
 * @package      WebGuru3
 * @subpackage   modules/payments/pages/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        2. March 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- custlist (Block: custlist) start -----------
$block = 'custlist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'customerscustlist';


wgSystem::defPostValue(PaymentsCustomersModel::COL_PAID_UNTIL, time());
wgSystem::defPostValue(PaymentsCustomersModel::COL_CREDIT, 0);
wgSystem::defPostValue(PaymentsCustomersModel::COL_REMINDERS, 1);
$lv = array();
$item = new PaymentsCustomersModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = PaymentsCustomersModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcustlist');
	$lv['LID'] = $val->getId();
	$lv['LUSERSID'] = UsersModel::getFullName($val->getUsersId());
	$lv['LSERVICE'] = PaymentsServicesModel::getServiceNamePrice($val->getPaymentsServicesId());
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LPAIDUNTIL'] = wgSystem::formatDate($val->getPaidUntil());
	$lv['COLOR'] = (($val->getPaidUntil() < time()) ? 'bold red' : 'green');
	$lv['LCREDIT'] = $val->getCredit();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=customerscustlist'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=customerscustlist'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcustlist');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'customerscustlist') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'UsersModel';
$var['FULLCOLUSERSID'] = formsHelper::getSelectBox('users_id', $item->getUsersId(), UsersModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'PaymentsServicesModel';
$var['FULLCOLPAYMENTSSERVICESID'] = formsHelper::getSelectBox('payments_services_id', $item->getPaymentsServicesId(), PaymentsServicesModel::getAllServicesWithPrices(), $params);
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['FULLCOLPAIDUNTIL'] = formsHelper::getDateTimeBox('paid_until', $item->getPaidUntil());
$var['COLCREDIT'] = $item->getCredit();
$var['FULLREMINDERS'] = formsHelper::getCheckBox('reminders', $item->getReminders(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('custlist', wgLang::get('custlist'), true, $tpl->getBlock($block));
// ----------- custlist end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>