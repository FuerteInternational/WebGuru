<?php
/**
 * Page websites for module Configuration
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- websites (Block: websites) start -----------
$block = 'websites';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'websiteswebsites';


wgSystem::defPostValue(SystemWebsitesModel::COL_NAME, '');
wgSystem::defPostValue(SystemWebsitesModel::COL_CODE, '');
wgSystem::defPostValue(SystemWebsitesModel::COL_IMAGE, '');
wgSystem::defPostValue(SystemWebsitesModel::COL_DIRECTORY, '../');
wgSystem::defPostValue(SystemWebsitesModel::COL_SORT, 0);
wgSystem::defPostValue(SystemWebsitesModel::COL_ISDEFAULT, 0);
wgSystem::defPostValue(SystemWebsitesModel::COL_ALTERNATIVEPATH, '');
$lv = array();
$item = new SystemWebsitesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = SystemWebsitesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listwebsites');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LCODE'] = $val->getCode();
	$lv['LIMAGE'] = $val->getImage();
	$lv['LDIRECTORY'] = $val->getDirectory();
	$path = wgPaths::getWebPath($val->getId());
	$path = (empty($path)) ? './' : $path;
	if (eregi('\.\.\/', $val->getDirectory())) $path = wgPaths::getFullPath($val->getDirectory());
	$icon = ((bool) is_writable($path)) ? 'lock_open' : 'lock_delete';
	$lv['LWRITABLE'] = wgIcons::getIcon($icon, wgLang::get($icon));
	$lv['LSORT'] = $val->getSort();
	$lv['LCLASS'] = ((bool) $val->getIsdefault()) ? 'bold' : '';
	$lv['LALTERNATIVEPATH'] = $val->getAlternativepath();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=websiteswebsites&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=websiteswebsites&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listwebsites');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'websiteswebsites') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLCODE'] = $item->getCode();
$var['COLIMAGE'] = $item->getImage();
$var['COLDIRECTORY'] = $item->getDirectory();
$var['FULLPATH'] = wgPaths::getFullPath($item->getDirectory());
$var['COLSORT'] = $item->getSort();
$var['FULLCOLDEFAULT'] = formsHelper::getCheckBox('isdefault', $item->getIsdefault(), 1);
$var['COLALTERNATIVEPATH'] = $item->getAlternativepath();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('websites', wgLang::get('websites'), true, $tpl->getBlock($block));
// ----------- websites end -----------

// ----------- permissions (Block: permissions) start -----------
$block = 'permissions';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'websitespermissions';


wgSystem::defPostValue(SystemWebsitesPermissionsModel::COL_PERMISSIONS, '');
$lv = array();
$item = new SystemWebsitesPermissionsModel();
$item->setDefaultResults(wgSystem::getPost());
$params = array();
$arr = SystemWebsitesPermissionsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpermissions');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LPERMISSIONS'] = $val->getPermissions();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeSelfLink('show=websitespermissions&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeSelfLink('act=websitespermissions&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpermissions');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'websitespermissions') $item = $val;
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
//$tab->addTab('permissions', wgLang::get('permissions'), false, $tpl->getBlock($block));
// ----------- permissions end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>