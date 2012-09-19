<?php
/**
 * Page groups for module Ratings
 * 
 * @package      WebGuru3
 * @subpackage   modules/ratings/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'groupsgroups';


wgSystem::defPostValue(RatingPointsGroupsModel::COL_ID, '');
wgSystem::defPostValue(RatingPointsGroupsModel::COL_NAME, '');
wgSystem::defPostValue(RatingPointsGroupsModel::COL_VARIABLE, 'variable');
wgSystem::defPostValue(RatingPointsGroupsModel::COL_TYPE, '');
wgSystem::defPostValue(RatingPointsGroupsModel::COL_NOTE, '');
$lv = array();
$item = new RatingPointsGroupsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = RatingPointsGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = wgText::safeText($val->getName());
	$lv['LVARIABLE'] = $val->getVariable();
	$lv['LTYPE'] = $val->getType();
	$lv['LNOTE'] = $val->getNote();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'groupsgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLTYPE'] = formsHelper::getCheckBox('type', $item->getType(), 1);
$var['COLNOTE'] = $item->getNote();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), true, $tpl->getBlock($block));
// ----------- groups end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>