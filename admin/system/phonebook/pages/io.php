<?php
/**
 * Page index for module Phonebook
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- people (Block: people) start -----------
$block = 'people';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexpeople';


wgSystem::defPostValue(JoshtrayPeopleModel::COL_ID, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_FIRSTNAME, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_LASTNAME, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_LINE, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_PHONE, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_MOBILE, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_NOTE, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_ONLINE, time());
wgSystem::defPostValue(JoshtrayPeopleModel::COL_LASTLOGIN, time());
wgSystem::defPostValue(JoshtrayPeopleModel::COL_MAIL, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_TITLE, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_PASSWORD, '');
wgSystem::defPostValue(JoshtrayPeopleModel::COL_INITIALS, '');
$lv = array();
$item = new JoshtrayPeopleModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexpeople') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = JoshtrayPeopleModel::doPager($params, pager::getPage($block));
//print_r($arr);
//exit();
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpeople');
	$lv['LID'] = $val->getId();
	$lv['LFIRSTNAME'] = $val->getFirstname();
	$lv['LLASTNAME'] = $val->getLastname();
	$lv['LLINE'] = $val->getLine();
	$lv['LPHONE'] = $val->getPhone();
	$lv['LMOBILE'] = $val->getMobile();
	$lv['LNOTE'] = $val->getNote();
	$lv['LONLINE'] = $val->getOnline();
	$lv['LLASTLOGIN'] = $val->getLastlogin();
	$lv['LMAIL'] = $val->getMail();
	$lv['LTITLE'] = $val->getTitle();
	$lv['LPASSWORD'] = $val->getPassword();
	$lv['LINITIALS'] = $val->getInitials();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeSelfLink('show=indexpeople&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeSelfLink('act=indexpeople&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpeople');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexpeople') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLFIRSTNAME'] = $item->getFirstname();
$var['COLLASTNAME'] = $item->getLastname();
$var['COLLINE'] = $item->getLine();
$var['COLPHONE'] = $item->getPhone();
$var['IMAGE'] = modulePhonebook::getImage($item->getId());
$var['COLMOBILE'] = $item->getMobile();
$var['COLNOTE'] = $item->getNote();
$var['FULLCOLONLINE'] = formsHelper::getDateTimeBox('online', $item->getOnline());
$var['FULLCOLLASTLOGIN'] = formsHelper::getDateTimeBox('lastlogin', $item->getLastlogin());
$var['COLMAIL'] = $item->getMail();
$var['COLTITLE'] = $item->getTitle();
$var['COLPASSWORD'] = $item->getPassword();
$var['COLINITIALS'] = $item->getInitials();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('people', wgLang::get('people'), true, $tpl->getBlock($block));
// ----------- people end -----------

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexgroups';


wgSystem::defPostValue(JoshtrayGroupsModel::COL_ID, '');
wgSystem::defPostValue(JoshtrayGroupsModel::COL_NAME, '');
$lv = array();
$item = new JoshtrayGroupsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexgroups') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = JoshtrayGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=indexgroups&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=indexgroups&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), false, $tpl->getBlock($block));
// ----------- groups end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>