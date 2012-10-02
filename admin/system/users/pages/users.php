<?php
/**
 * Page index for module Users
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/pages/
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

// ----------- users (Block: users) start -----------
$block = 'users';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexusers';

wgSessions::setModuleValueDefault('mygroup', 0);
if (wgSystem::isRequest('mygroup')) wgSessions::setModuleValue('mygroup', (int) wgSystem::getRequestValue('mygroup'));
$group = (int) wgSessions::getModuleValue('mygroup');

wgSystem::defPostValue(UsersModel::COL_MAIL, '');
wgSystem::defPostValue(UsersModel::COL_QUESTION, '');
wgSystem::defPostValue(UsersModel::COL_GENDER, 'm');
$lv = array();
$item = new UsersModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersModel::getUsersPager(pager::getPage($block), $group);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listusers');
	$lv['LID'] = $val->getId();
	$lv['LNICKNAME'] = $val->getNickname();
	$lv['LMAIL'] = $val->getMail();
	$lv['LFIRSTNAME'] = $val->getFirstname();
	$lv['LLASTNAME'] = $val->getLastname();
	$lv['LSYSTEMCOUNTRIESID'] = $val->getSystemCountriesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=indexusers'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=indexusers'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listusers');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexusers') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'UsersGroupsModel';
$var['FULLCOLUSERSGROUPSID'] = formsHelper::getSelectBox('users_groups_id', $item->getUsersGroupsId(), UsersGroupsModel::doSelect(), $params);
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
$var['FULLCOLLASTLOGIN'] = formsHelper::getDateTimeBox('lastlogin', $item->getLastlogin());
$var['COLGENDER'] = $item->getGender();
$var['COLLASTIP'] = $item->getLastip();
$var['COLFIRSTNAME'] = $item->getFirstname();
$var['COLLASTNAME'] = $item->getLastname();
$params = array();
$params['baseclass'] = 'SystemCountriesModel';
$var['FULLCOLSYSTEMCOUNTRIESID'] = formsHelper::getSelectBox('system_countries_id', $item->getSystemCountriesId(), SystemCountriesModel::doSelect(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('users', wgLang::get('users'), true, $tpl->getBlock($block));
// ----------- users end -----------

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexgroups';


wgSystem::defPostValue(UsersGroupsModel::COL_NAME, '');
$lv = array();
$item = new UsersGroupsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = UsersGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LEMAILSTEMPLATESID'] = $val->getEmailsTemplatesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexgroups'));
	if ($val->getId() != 1) {
		$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexgroups'), true);
	}
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemLanguageModel';
$var['FULLCOLSYSTEMLANGUAGEID'] = formsHelper::getSelectBox('system_language_id', $item->getSystemLanguageId(), SystemLanguageModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'EmailsTemplatesModel';
$var['FULLCOLEMAILSTEMPLATESID'] = formsHelper::getSelectBox('emails_templates_id', $item->getEmailsTemplatesId(), EmailsTemplatesModel::doSelect(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), false, $tpl->getBlock($block));
// ----------- groups end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
//print $system['parse']['content'];
?>