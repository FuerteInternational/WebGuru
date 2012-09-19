<?php
/**
 * Page settings for module Twitter
 * 
 * @package      WebGuru3
 * @subpackage   modules/twitter/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. June 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- accounts (Block: accounts) start -----------
$block = 'accounts';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settingsaccounts';


wgSystem::defPostValue(TwitterAccountsModel::COL_ID, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_NAME, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_PASSWORD, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_ADDED, time());
wgSystem::defPostValue(TwitterAccountsModel::COL_USERS_ID, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_SYSTEM_USERS_ID, '');
$lv = array();
$item = new TwitterAccountsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = TwitterAccountsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listaccounts');
	$lv['LNAME'] = $val->getName();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listaccounts');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'settingsaccounts') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLPASSWORD'] = $item->getPassword();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('accounts', wgLang::get('accounts'), true, $tpl->getBlock($block));
// ----------- accounts end -----------

// ----------- settings (Block: settings) start -----------
$block = 'settings';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settingssettings';


wgSystem::defPostValue(TwitterAccountsModel::COL_ID, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_NAME, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_PASSWORD, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_ADDED, time());
wgSystem::defPostValue(TwitterAccountsModel::COL_USERS_ID, '');
wgSystem::defPostValue(TwitterAccountsModel::COL_SYSTEM_USERS_ID, '');
$lv = array();
$item = new TwitterAccountsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = TwitterAccountsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsettings');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LPASSWORD'] = $val->getPassword();
	$lv['LADDED'] = $val->getAdded();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsettings');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'settingssettings') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLPASSWORD'] = $item->getPassword();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['COLUSERSID'] = $item->getUsersId();
$var['COLSYSTEMUSERSID'] = $item->getSystemUsersId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('settings', wgLang::get('settings'), false, $tpl->getBlock($block));
// ----------- settings end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>