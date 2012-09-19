<?php
/**
 * Page index for module Comments
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/pages/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexgroups';

wgSystem::defPostValue(CommentsGroupsModel::COL_NAME, '');
wgSystem::defPostValue(CommentsGroupsModel::COL_REGISTERED, 0);
wgSystem::defPostValue(CommentsGroupsModel::COL_PARAMETER, 'par');
$lv = array();
$item = new CommentsGroupsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CommentsGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LREGISTERED'] = ((bool) $val->getRegistered()) ? wgLang::get('yes') : wgLang::get('no');
	$lv['LRCLASS'] = ((bool) $val->getRegistered()) ? 'red' : 'green';
	$lv['LPARAMETER'] = $val->getParameter();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexgroups'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexgroups'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['FULLCOLREGISTERED'] = formsHelper::getCheckBox('registered', $item->getRegistered(), 1);
$var['COLPARAMETER'] = $item->getParameter();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), true, $tpl->getBlock($block));
// ----------- groups end -----------

$var = array();
$system['parse']['content'] = $tab->getAll();
?>