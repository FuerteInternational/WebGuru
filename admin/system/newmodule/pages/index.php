<?php
/**
 * Page index for module Newmodule
 * 
 * @package      WebGuru3
 * @subpackage   modules/newmodule/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        9. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexgroups';


wgSystem::defPostValue(EmailsGroupsModel::COL_ID, '');
wgSystem::defPostValue(EmailsGroupsModel::COL_NAME, '');
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
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexgroups'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink('act=indexgroups&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexgroups') $item = $val;
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

// ----------- hits (Block: hits) start -----------
$block = 'hits';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexhits';


$lv = array();
$item = new ClicktrackHitsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexhits') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = ClicktrackHitsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listhits');
	$lv['LID'] = $val->getId();
	$lv['LCAMPAIGNID'] = $val->getCampaignId();
	$lv['LADDED'] = $val->getAdded();
	$lv['LTOP'] = $val->getTop();
	$lv['LLEFT'] = $val->getLeft();
	$lv['LUSRX'] = $val->getUsrx();
	$lv['LUSRY'] = $val->getUsry();
	$lv['LURL'] = $val->getUrl();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=indexhits', 'index'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink('act=indexhits&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listhits');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexhits') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('hits', wgLang::get('hits'), false, $tpl->getBlock($block));
// ----------- hits end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>