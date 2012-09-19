<?php
/**
 * Page promotions for module Ipromote
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

// ----------- campaigns (Block: campaigns) start -----------
$block = 'campaigns';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'promotionscampaigns';

wgSystem::clearDefPostValue();

$lv = array();
$item = new IpromoteCampaignsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = IpromoteCampaignsModel::getSelfPagerData(pager::getPage($block), 20);
//$arr = IpromoteCampaignsModel::doPager(array(), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcampaigns');
	$lv['LAPPS'] = IpromoteAppsModel::getCountData($val->getId());
	$lv['LINK'] = wgPaths::makePageLink('apps', 'mypromo='.$val->getId());
	if ($lv['LAPPS'] > 0) $lv['ICON'] = wgIcons::getButton('folder_brick', $val->getName(), $lv['LINK']);
	else $lv['ICON'] = wgIcons::getButton('filenew', $val->getName(), $lv['LINK']);
	$lv['LNAME'] = $val->getName();
	$lv['LUSER'] = $val->getUserName();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcampaigns');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
if (!(bool) $item->getId()) $var['HIDDEN'] = ' style="display:none;"';
$var['YOURURL'] = wgPaths::getPath('url').'ipromote-'.$item->getId().'-'.wgText::safeText($item->getName()).'.xml';
$var['COLNAME'] = $item->getName();
$var['COLUSERSID'] = $item->getUsersId();
$var['COLSYSTEMUSERSID'] = $item->getSystemUsersId();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('campaigns', wgLang::get('campaigns'), true, $tpl->getBlock($block));
// ----------- campaigns end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>