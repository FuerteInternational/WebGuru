<?php
/**
 * Page lists for module Subscriptions
 * 
 * @package      WebGuru3
 * @subpackage   modules/subscriptions/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        3. July 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'listsgroups';


wgSystem::defPostValue(EmailsGroupsModel::COL_ID, '');
wgSystem::defPostValue(EmailsGroupsModel::COL_NAME, '');
$lv = array();
$item = new EmailsGroupsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = EmailsGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'listsgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), true, $tpl->getBlock($block));
// ----------- groups end -----------

// ----------- eximport (Block: eximport) start -----------
$block = 'eximport';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'listseximport';

wgSystem::defPostValue('pageeximport', 'New module -> eximport');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('eximport', wgLang::get('eximport'), false, $tpl->getBlock($block));
// ----------- eximport end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>