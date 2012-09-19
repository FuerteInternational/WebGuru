<?php
/**
 * Page index for module Emailer
 * 
 * @package      WebGuru3
 * @subpackage   modules/emailer/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. January 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexgroups';


$lv = array();
$item = new EmailsGroupsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexgroups') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = EmailsGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makePageLink('editmail', 'show=indexgroups&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=indexgroups&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), true, $tpl->getBlock($block));
// ----------- groups end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>