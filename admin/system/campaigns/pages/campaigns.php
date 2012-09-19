<?php
/**
 * Page campaigns for module Campaigns
 * 
 * @package      WebGuru3
 * @subpackage   modules/campaigns/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        28. July 2009
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

$var['ACTIONNAME'] = 'campaignscampaigns';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(CampaignsModel::COL_NAME, '');
wgSystem::defPostValue(CampaignsModel::COL_IDENTIFIER, '');
$lv = array();
$item = new CampaignsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CampaignsModel::doPager(array(), pager::getPage($block));
// CampaignsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcampaigns');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LCHANGED'] = wgSystem::formatDate($val->getChanged());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcampaigns');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('campaigns', wgLang::get('campaigns'), true, $tpl->getBlock($block));
// ----------- campaigns end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>