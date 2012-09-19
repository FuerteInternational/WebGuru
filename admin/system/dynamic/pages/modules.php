<?php
/**
 * Page modules for module Dynamic
 * 
 * @package      WebGuru3
 * @subpackage   modules/dynamic/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        5. March 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- modules (Block: modules) start -----------
$block = 'modules';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'modulesmodules';


wgSystem::defPostValue(DynamicModulesModel::COL_NAME, '');
wgSystem::defPostValue(DynamicModulesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(DynamicModulesModel::COL_CATEGORIES, 1);
wgSystem::defPostValue(DynamicModulesModel::COL_ITEMS, 1);
wgSystem::defPostValue(DynamicModulesModel::COL_TEMPLATES, 1);
$lv = array();
$item = new DynamicModulesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DynamicModulesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmodules');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LLINK'] = wgPaths::makePageLink('editmod', 'mod='.$val->getId());
	//$lv['LICO'] = wgIcons::getIcon('arrow_right', $val->getName());
	$lv['SETTICO'] = wgIcons::getIcon('cog_edit', $val->getName());
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LCATEGORIES'] = $val->getCategories();
	$lv['LITEMS'] = $val->getItems();
	$lv['LTEMPLATES'] = $val->getTemplates();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=modulesmodules'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=modulesmodules'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmodules');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'modulesmodules') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLCATEGORIES'] = formsHelper::getCheckBox('categories', $item->getCategories(), 1);
$var['FULLCOLITEMS'] = formsHelper::getCheckBox('items', $item->getItems(), 1);
$var['FULLCOLTEMPLATES'] = formsHelper::getCheckBox('templates', $item->getTemplates(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('modules', wgLang::get('modules'), true, $tpl->getBlock($block));
// ----------- modules end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>