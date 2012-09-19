<?php
/**
 * Page apps for module Ipromote
 * 
 * @package      WebGuru3
 * @subpackage   modules/ipromote/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. August 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- apps (Block: apps) start -----------
$block = 'apps';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$mypromo = (int) wgSessions::handleModuleValue('mypromo', 0);
if ($mypromo == 0) {
	wgError::add('nopromoselected');
	wgPaths::moduleRedirect('promotions');
}

$var['ACTIONNAME'] = 'appsapps';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(IpromoteAppsModel::COL_LINK, '');
wgSystem::defPostValue(IpromoteAppsModel::COL_HEAD, '');
wgSystem::defPostValue(IpromoteAppsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(IpromoteAppsModel::COL_SORT, 0);
$lv = array();
$item = new IpromoteAppsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = IpromoteAppsModel::getSelfPagerData($mypromo, pager::getPage($block), 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listapps');
	$lv['LNAME'] = $val->getName();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['ICON'] = moduleIpromote::getAppPicture($val->getId(), 'small', $val->getName());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listapps');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIPROMOTECAMPAIGNSID'] = $item->getIpromoteCampaignsId();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['COLLINK'] = $item->getLink();
$var['SMALLICO'] = moduleIpromote::getAppPicture($item->getId(), 'small', $item->getName());
$var['BIGICO'] = moduleIpromote::getAppPicture($item->getId(), 'big', $item->getName());
$var['COLHEAD'] = $item->getHead();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLSORT'] = $item->getSort();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('apps', wgLang::get('apps'), true, $tpl->getBlock($block));
// ----------- apps end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>