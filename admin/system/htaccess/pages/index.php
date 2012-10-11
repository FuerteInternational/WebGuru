<?php
/**
 * Page index for module Htaccess
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

$system['parse']['head'] = '<script type="text/javascript">
$("#web").click(function() {
	
});
</script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- rewrites (Block: rewrites) start -----------
$block = 'rewrites';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexrewrites';


wgSessions::setPageValueDefault('web', wgSystem::getCurrentWebsite());
wgSessions::changePageValueFromPost('web');

wgSystem::defPostValue(HtaccessRowsModel::COL_ID, '');
wgSystem::defPostValue(HtaccessRowsModel::COL_NAME, 'Rule '.HtaccessRowsModel::getLastId());
wgSystem::defPostValue(HtaccessRowsModel::COL_RULE, '');
wgSystem::defPostValue(HtaccessRowsModel::COL_TYPE, 1);
wgSystem::defPostValue(HtaccessRowsModel::COL_SORT, 0);
wgSystem::defPostValue(HtaccessRowsModel::COL_SYSTEM_MODULES_ID, 0);
wgSystem::defPostValue(HtaccessRowsModel::COL_SYSTEM_WEBSITES_ID, wgSystem::getCurrentWebsite());

$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLWEBSELECT'] = formsHelper::getSelectBox('web', wgSessions::getPageValue('web'), SystemWebsitesModel::doSelect(), $params, wgLang::get('allwebs'));
$lv = array();
$item = new HtaccessRowsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexrewrites') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();

$arr = HtaccessRowsModel::getRowsPagerByWebAndSort(pager::getPage($block), wgSessions::getPageValue('web'));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listrewrites');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LRULE'] = $val->getRule();
	$lv['LTYPE'] = wgLang::get(HtaccessRowsModel::getRowTypeName($val->getType()));
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LSYSTEMMODULESID'] = $val->getSystemModulesId();
	$lv['LSYSTEMWEBSITESID'] = SystemWebsitesModel::getWebNameByPK($val->getSystemWebsitesId());
	$lv['LSORT'] = $val->getSort();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexrewrites'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexrewrites'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listrewrites');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexrewrites') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLRULE'] = eregi_replace('\$', '&#36;', $item->getRule());
$params = array();
//$params['baseclass'] = 'SystemUsersModel';
$var['COLTYPE'] = formsHelper::getSelectBox('type', $item->getType(), HtaccessRowsModel::getRowsTypes(), $params);
//$var['COLTYPE'] = $item->getType();
$params = array();
$params['baseclass'] = 'SystemUsersModel';
$var['FULLCOLSYSTEMUSERSID'] = formsHelper::getSelectBox('system_users_id', $item->getSystemUsersId(), SystemUsersModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemModulesModel';
$var['FULLCOLSYSTEMMODULESID'] = formsHelper::getSelectBox('system_modules_id', $item->getSystemModulesId(), SystemModulesModel::doSelect(), $params, wgLang::get('nomodule'));
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$var['COLSORT'] = $item->getSort();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('rewrites', wgLang::get('rewrites'), true, $tpl->getBlock($block));
// ----------- rewrites end -----------


$var = array();
$system['parse']['content'] = $tab->getAll();
?>