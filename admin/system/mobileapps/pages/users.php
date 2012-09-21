<?php
/**
 * Page users for module Mobileapps
 * 
 * @package      WebGuru3
 * @subpackage   modules/mobileapps/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. September 2012
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- userssettings (Block: userssettings) start -----------
$block = 'userssettings';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'usersuserssettings';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(UsersModel::COL_ID, '');
wgSystem::defPostValue(UsersModel::COL_USERS_GROUPS_ID, '');
wgSystem::defPostValue(UsersModel::COL_NICKNAME, '');
wgSystem::defPostValue(UsersModel::COL_MAIL, '');
wgSystem::defPostValue(UsersModel::COL_PASSWORD, '');
wgSystem::defPostValue(UsersModel::COL_QUESTION, '');
wgSystem::defPostValue(UsersModel::COL_ANSVER, '');
wgSystem::defPostValue(UsersModel::COL_ADDED, time());
wgSystem::defPostValue(UsersModel::COL_ONLINE, time());
wgSystem::defPostValue(UsersModel::COL_CHANGED, time());
wgSystem::defPostValue(UsersModel::COL_TIMEVER, '');
wgSystem::defPostValue(UsersModel::COL_CODEVER, '');
wgSystem::defPostValue(UsersModel::COL_ACTIVE, '');
wgSystem::defPostValue(UsersModel::COL_LASTLOGIN, time());
wgSystem::defPostValue(UsersModel::COL_GENDER, '');
wgSystem::defPostValue(UsersModel::COL_LASTIP, '');
wgSystem::defPostValue(UsersModel::COL_FIRSTNAME, '');
wgSystem::defPostValue(UsersModel::COL_LASTNAME, '');
wgSystem::defPostValue(UsersModel::COL_SYSTEM_COUNTRIES_ID, '');
wgSystem::defPostValue(UsersModel::COL_VISITS, '');
wgSystem::defPostValue(UsersModel::COL_DOWNLOADS, '');
wgSystem::defPostValue(UsersModel::COL_XDATA, '');
$lv = array();
$item = new UsersModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = UsersModel::getSelfPagerData(pager::getPage($block), 20);
$arr = UsersModel::doPager(array(), pager::getPage($block));
// UsersModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listuserssettings');
	$lv['LID'] = $val->getId();
	$lv['LUSERSGROUPSID'] = $val->getUsersGroupsId();
	$lv['LNICKNAME'] = $val->getNickname();
	$lv['LMAIL'] = $val->getMail();
	$lv['LPASSWORD'] = $val->getPassword();
	$lv['LQUESTION'] = $val->getQuestion();
	$lv['LANSVER'] = $val->getAnsver();
	$lv['LADDED'] = $val->getAdded();
	$lv['LONLINE'] = $val->getOnline();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LTIMEVER'] = $val->getTimever();
	$lv['LCODEVER'] = $val->getCodever();
	$lv['LACTIVE'] = $val->getActive();
	$lv['LLASTLOGIN'] = $val->getLastlogin();
	$lv['LGENDER'] = $val->getGender();
	$lv['LLASTIP'] = $val->getLastip();
	$lv['LFIRSTNAME'] = $val->getFirstname();
	$lv['LLASTNAME'] = $val->getLastname();
	$lv['LSYSTEMCOUNTRIESID'] = $val->getSystemCountriesId();
	$lv['LVISITS'] = $val->getVisits();
	$lv['LDOWNLOADS'] = $val->getDownloads();
	$lv['LXDATA'] = $val->getXdata();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listuserssettings');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLUSERSGROUPSID'] = $item->getUsersGroupsId();
$var['COLNICKNAME'] = $item->getNickname();
$var['COLMAIL'] = $item->getMail();
$var['COLPASSWORD'] = $item->getPassword();
$var['COLQUESTION'] = $item->getQuestion();
$var['COLANSVER'] = $item->getAnsver();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLONLINE'] = formsHelper::getDateTimeBox('online', $item->getOnline());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLTIMEVER'] = $item->getTimever();
$var['COLCODEVER'] = $item->getCodever();
$var['FULLCOLACTIVE'] = formsHelper::getCheckBox('active', $item->getActive(), 1);
$var['FULLCOLLASTLOGIN'] = wgSystem::formatDate($item->getLastlogin());
$var['COLGENDER'] = $item->getGender();
$var['COLLASTIP'] = $item->getLastip();
$var['COLFIRSTNAME'] = $item->getFirstname();
$var['COLLASTNAME'] = $item->getLastname();
$var['COLSYSTEMCOUNTRIESID'] = $item->getSystemCountriesId();
$var['COLVISITS'] = $item->getVisits();
$var['COLDOWNLOADS'] = $item->getDownloads();
$var['COLXDATA'] = $item->getXdata();

$companies = CompaniesModel::getSelfDataForUser($item->getId());
if (!empty($companies) && is_array($companies)) foreach ($companies as $val) {
	$tpl->setCurrentBlock('listusercompanies');
	$lv['COMPANYNAME'] = $val->getName();
	$lv['COMPANYIDENTIFIER'] = $val->getIdentifier();
	$tpl->setVariable($lv);
	$tpl->parseBlock('listusercompanies');
}

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('userssettings', wgLang::get('userssettings'), true, $tpl->getBlock($block));
// ----------- userssettings end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>