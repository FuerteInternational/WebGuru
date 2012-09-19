<?php
/**
 * Page editor for module Htaccess
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

// ----------- codeblocks (Block: codeblocks) start -----------
$block = 'codeblocks';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'editorcodeblocks';


wgSystem::defPostValue(HtaccessCodeModel::COL_ID, '');
wgSystem::defPostValue(HtaccessCodeModel::COL_NAME, '');
wgSystem::defPostValue(HtaccessCodeModel::COL_CODE, '');
wgSystem::defPostValue(HtaccessCodeModel::COL_ENABLED, '');
$lv = array();
$item = new HtaccessCodeModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'editorcodeblocks') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = HtaccessCodeModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcodeblocks');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LCODE'] = $val->getCode();
	$lv['LENABLED'] = $val->getEnabled();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=editorcodeblocks'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink('act=editorcodeblocks&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcodeblocks');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'editorcodeblocks') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLCODE'] = $item->getCode();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$params = array();
$params['baseclass'] = 'SystemUsersModel';
$var['FULLCOLSYSTEMUSERSID'] = formsHelper::getSelectBox('system_users_id', $item->getSystemUsersId(), SystemUsersModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('codeblocks', wgLang::get('codeblocks'), true, $tpl->getBlock($block));
// ----------- codeblocks end -----------

// ----------- previews (Block: previews) start -----------
$block = 'previews';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'editorpreviews';


wgSystem::defPostValue(HtaccessRowsModel::COL_ID, '');
wgSystem::defPostValue(HtaccessRowsModel::COL_NAME, '');
wgSystem::defPostValue(HtaccessRowsModel::COL_RULE, '');
wgSystem::defPostValue(HtaccessRowsModel::COL_TYPE, '');
wgSystem::defPostValue(HtaccessRowsModel::COL_SORT, '');
$lv = array();
$item = new HtaccessRowsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'editorpreviews') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = HtaccessRowsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpreviews');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LRULE'] = $val->getRule();
	$lv['LTYPE'] = $val->getType();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LSYSTEMMODULESID'] = $val->getSystemModulesId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSORT'] = $val->getSort();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=editorpreviews'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink('act=editorpreviews&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpreviews');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'editorpreviews') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLRULE'] = $item->getRule();
$var['COLTYPE'] = $item->getType();
$params = array();
$params['baseclass'] = 'SystemUsersModel';
$var['FULLCOLSYSTEMUSERSID'] = formsHelper::getSelectBox('system_users_id', $item->getSystemUsersId(), SystemUsersModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemModulesModel';
$var['FULLCOLSYSTEMMODULESID'] = formsHelper::getSelectBox('system_modules_id', $item->getSystemModulesId(), SystemModulesModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$var['COLSORT'] = $item->getSort();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('previews', wgLang::get('previews'), false, $tpl->getBlock($block));
// ----------- previews end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>