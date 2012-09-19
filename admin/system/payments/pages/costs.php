<?php
/**
 * Page costs for module Payments
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

// ----------- payments (Block: payments) start -----------
$block = 'payments';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'costspayments';


wgSystem::defPostValue(PaymentsPaymentsModel::COL_AMMOUNT, 0);
$lv = array();
$item = new PaymentsPaymentsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = PaymentsPaymentsModel::getPager(0, pager::getPage($block), 30);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpayments');
	$lv['LID'] = $val->getId();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LCHANGED'] = wgSystem::formatDate($val->getChanged());
	$lv['LAMMOUNT'] = $val->getAmmount();
	$lv['LUSERSID'] = UsersModel::getFullName($val->getUsersId());
	$lv['LSERVICE'] = PaymentsServicesModel::getServiceName($val->getPaymentsServicesId());
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=costspayments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=costspayments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpayments');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'costspayments') $item = $val;
}
$var['COLOR'] = 'green';
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLAMMOUNT'] = $item->getAmmount();
$params = array();
$params['baseclass'] = 'UsersModel';
$var['FULLCOLUSERSID'] = formsHelper::getSelectBox('users_id', $item->getUsersId(), UsersModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'PaymentsServicesModel';
$var['FULLCOLPAYMENTSSERVICESID'] = formsHelper::getSelectBox('payments_services_id', $item->getPaymentsServicesId(), PaymentsServicesModel::doSelect(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('payments', wgLang::get('payments'), true, $tpl->getBlock($block));
// ----------- payments end -----------

// ----------- costs (Block: costs) start -----------
$block = 'costs';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'costscosts';


wgSystem::defPostValue(PaymentsCostsModel::COL_NAME, '');
wgSystem::defPostValue(PaymentsCostsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(PaymentsCostsModel::COL_COSTS, 0);
$lv = array();
$item = new PaymentsCostsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$total = 0;
$arr = PaymentsCostsModel::getAllCosts();
if (!empty($arr) && is_array($arr)) foreach ($arr as $val) {
	$tpl->setCurrentBlock('listcosts');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LCOSTS'] = $val->getCosts();
	$total += $val->getCosts();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=costscosts'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=costscosts'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcosts');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'costscosts') $item = $val;
}
$var['TOTALCOSTS'] = $total;
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLCOSTS'] = $item->getCosts();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('costs', wgLang::get('costs'), false, $tpl->getBlock($block));
// ----------- costs end -----------

// ----------- funding (Block: funding) start -----------
$block = 'funding';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'costsfunding';


wgSystem::defPostValue(PaymentsFundingsModel::COL_PAYMENTS_SERVICES_ID, '');
wgSystem::defPostValue(PaymentsFundingsModel::COL_PERCENT, 100);
$lv = array();
$item = new PaymentsFundingsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$total = 0;
$arr = PaymentsFundingsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listfunding');
	$lv['LID'] = $val->getId();
	$lv['LPAYMENTSSERVICE'] = PaymentsServicesModel::getServiceName($val->getPaymentsServicesId());
	$lv['LPERCENT'] = $val->getPercent();
	$lv['LINCOME'] = PaymentsPaymentsModel::getPaymentsSumForService($val->getPaymentsServicesId(), $val->getPercent());
	$total += $lv['LINCOME'];
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=costsfunding'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=costsfunding'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listfunding');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'costsfunding') $item = $val;
}
$var['TOTALINCOME'] = $total;
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['FULLSERVICES'] = formsHelper::getSelectBox('payments_services_id', $item->getPaymentsServicesId(), PaymentsServicesModel::getAllServices());
$var['COLPERCENT'] = $item->getPercent();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('funding', wgLang::get('funding'), false, $tpl->getBlock($block));
// ----------- funding end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>