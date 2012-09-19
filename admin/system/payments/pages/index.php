<?php
/**
 * Page index for module Payments
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

// ----------- services (Block: services) start -----------
$block = 'services';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexservices';

wgSessions::setPageValueDefault('cat', 0);
if (wgSystem::isRequest('cat')) wgSessions::setPageValue('cat', wgSystem::getRequestValue('cat'));

wgSystem::defPostValue(PaymentsServicesModel::COL_NAME, '');
wgSystem::defPostValue(PaymentsServicesModel::COL_PAYMENTS_CATEGORIES_ID, 0);
wgSystem::defPostValue(PaymentsServicesModel::COL_PRICE, 0);
wgSystem::defPostValue(PaymentsServicesModel::COL_HEAD, '');
wgSystem::defPostValue(PaymentsServicesModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(PaymentsServicesModel::COL_PERIOD, 2);
wgSystem::defPostValue(PaymentsServicesModel::COL_MINPERIODS, 6);
$lv = array();
$item = new PaymentsServicesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = PaymentsServicesModel::getPager(wgSessions::getPageValue('cat'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listservices');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LPAYMENTSCATEGORIESID'] = $val->getPaymentsCategoriesId();
	$lv['LPRICE'] = $val->getPrice();
	$lv['LPERIOD'] = $val->getPeriod();
	$lv['LMINPERIODS'] = $val->getMinperiods();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexservices'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexservices'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listservices');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexservices') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
if (!(bool) $item->getId()) $selected = wgSessions::getPageValue('cat');
else $selected = $item->getPaymentsCategoriesId();
$var['FULLCAT'] = formsHelper::getSelectBox('payments_categories_id', $selected, PaymentsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var['COLPRICE'] = $item->getPrice();
$var['COLHEAD'] = $item->getHead();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLPERIOD'] = formsHelper::getSelectBox('period', $item->getPeriod(), PaymentsServicesModel::getPeriods());
$var['COLMINPERIODS'] = $item->getMinperiods();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLSYSTEMUSERSID'] = $item->getSystemUsersId();

$var = wgSystem::getFormCallback($var);

$var['SWITCHCAT'] = formsHelper::getSelectBox('cat', (int) wgSessions::getPageValue('cat'), PaymentsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));


$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('services', wgLang::get('services'), true, $tpl->getBlock($block));
// ----------- services end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexcategories';

$parent = (int) wgGet::getValue('parent');

wgSystem::defPostValue(PaymentsCategoriesModel::COL_NAME, '');
wgSystem::defPostValue(PaymentsCategoriesModel::COL_PARENT, 0);
wgSystem::defPostValue(PaymentsCategoriesModel::COL_HEAD, '');
wgSystem::defPostValue(PaymentsCategoriesModel::COL_DESCRIPTION, '');
$lv = array();
$item = new PaymentsCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());
$parentcode = '&amp;parent='.$parent;
$arr = PaymentsCategoriesModel::getSubcatsPager(wgGet::getValue('parent'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	if (NewsCategoriesModel::countSubCat($val->getId())) {
		$lv['LNAME'] = wgIcons::getIcon('folder_page_white', $val->getName()).' '.$val->getName();
	}
	else $lv['LNAME'] = wgIcons::getIcon('folder', $val->getName()).' '.$val->getName();
	$lv['LNAME'] = '<a href="'.wgPaths::makeSelfLink('parent='.$val->getId()).'">'.$lv['LNAME'].'</a>';
	$lv['LPARENT'] = $val->getParent();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexcategories'.$parentcode));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexcategories'.$parentcode), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexcategories') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
if ((bool) wgGet::getValue('parent')) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('parent='.CrawlerCategoriesModel::getParentId(wgGet::getValue('parent'))).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
if (!(bool) $item->getId()) $selected = wgGet::getValue('parent');
else $selected = $item->getParent();
$var['FULLPARENT'] = formsHelper::getSelectBox('parent', $selected, PaymentsCategoriesModel::getSelectBoxTree(0, $item->getId()), array(), wgLang::get('homecat'));
$var['COLHEAD'] = $item->getHead();
$var['COLDESCRIPTION'] = $item->getDescription();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), false, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>