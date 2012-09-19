<?php
/**
 * Page htpasswd for module Htaccess
 * 
 * @package      WebGuru3
 * @subpackage   modules/htaccess/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        17. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- htpasswd (Block: htpasswd) start -----------
$block = 'htpasswd';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'htpasswdhtpasswd';


wgSystem::defPostValue(HtaccessHtpasswdModel::COL_ID, '');
wgSystem::defPostValue(HtaccessHtpasswdModel::COL_NAME, '');
wgSystem::defPostValue(HtaccessHtpasswdModel::COL_PASSWORD, '');
wgSystem::defPostValue(HtaccessHtpasswdModel::COL_LOCATION, '');
wgSystem::defPostValue(HtaccessHtpasswdModel::COL_ENABLED, '');
$lv = array();
$item = new HtaccessHtpasswdModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'htpasswdhtpasswd') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = HtaccessHtpasswdModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listhtpasswd');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LPASSWORD'] = $val->getPassword();
	$lv['LLOCATION'] = $val->getLocation();
	$lv['LENABLED'] = $val->getEnabled();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=htpasswdhtpasswd'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=htpasswdhtpasswd'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listhtpasswd');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'htpasswdhtpasswd') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLPASSWORD'] = $item->getPassword();
$var['COLLOCATION'] = $item->getLocation();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('htpasswd', wgLang::get('htpasswd'), true, $tpl->getBlock($block));
// ----------- htpasswd end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>