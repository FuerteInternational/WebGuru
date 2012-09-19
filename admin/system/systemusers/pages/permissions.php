<?php
/**
 * Page permissions for module Systemusers
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        3. March 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- pages (Block: pages) start -----------
$block = 'pages';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'permissionspages';


wgSystem::defPostValue(PagesPermissionsModel::COL_ID, '');
wgSystem::defPostValue(PagesPermissionsModel::COL_PERMISSIONS, '');
$lv = array();
$item = new PagesPermissionsModel();
$item->setDefaultResults(wgSystem::getPost());

//$var['NEWACTIONNAME'] = makeTableEditLink($val->getId(), 'show=permissionspages');

// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'permissionspages') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = PagesPermissionsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpages');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMTEAMSID'] = $val->getSystemTeamsId();
	$lv['LPAGESID'] = $val->getPagesId();
	$lv['LPERMISSIONS'] = $val->getPermissions();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=permissionspages'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=permissionspages'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpages');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'permissionspages') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'SystemTeamsModel';
$var['FULLCOLSYSTEMTEAMSID'] = formsHelper::getSelectBox('system_teams_id', $item->getSystemTeamsId(), SystemTeamsModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'PagesModel';
$var['FULLCOLPAGESID'] = formsHelper::getSelectBox('pages_id', $item->getPagesId(), PagesModel::doSelect(), $params);
$var['FULLCOLPERMISSIONS'] = formsHelper::getCheckBox('permissions', $item->getPermissions(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('pages', wgLang::get('pages'), true, $tpl->getBlock($block));
// ----------- pages end -----------

// ----------- websites (Block: websites) start -----------
$block = 'websites';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'permissionswebsites';


wgSystem::defPostValue(SystemWebsitesPermissionsModel::COL_ID, '');
wgSystem::defPostValue(SystemWebsitesPermissionsModel::COL_PERMISSIONS, '');
$lv = array();
$item = new SystemWebsitesPermissionsModel();
$item->setDefaultResults(wgSystem::getPost());

//$var['NEWACTIONNAME'] = makeTableEditLink($val->getId(), 'show=permissionswebsites');

// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'permissionswebsites') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = SystemWebsitesPermissionsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listwebsites');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LPERMISSIONS'] = $val->getPermissions();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=permissionswebsites'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=permissionswebsites'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listwebsites');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'permissionswebsites') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemUsersModel';
$var['FULLCOLSYSTEMUSERSID'] = formsHelper::getSelectBox('system_users_id', $item->getSystemUsersId(), SystemUsersModel::doSelect(), $params);
$var['FULLCOLPERMISSIONS'] = formsHelper::getCheckBox('permissions', $item->getPermissions(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('websites', wgLang::get('websites'), false, $tpl->getBlock($block));
// ----------- websites end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>