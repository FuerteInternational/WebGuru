<?php
/**
 * Page crawler for module Crawler
 * 
 * @package      WebGuru3
 * @subpackage   modules/crawler/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        18. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- crawler (Block: crawler) start -----------
$block = 'crawler';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'crawlercrawler';

wgSessions::setPageValueDefault('cat', 0);
if (wgPost::isValue('cat')) wgSessions::setPageValue('cat', wgPost::getValue('cat'));

$lv = array();
$item = new CrawlerWebsitesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CrawlerWebsitesModel::getWebsitesPagerByCat(wgSessions::getPageValue('cat'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcrawler');
	if ($val->getCrawled() < strtotime('-1 day')) $selected = 1;
	else $selected = 0;
	$lv['CHECKBOX'] = formsHelper::getCheckBox('web['.$val->getId().']', $selected, 1, array('id'=>'web'.$val->getId()));
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LURL'] = $val->getUrl();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LCRAWLED'] = $val->getCrawled();
	$lv['LCACHED'] = $val->getCached();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=crawlercrawler', 'website'));
	$lv['CRAWLROW'] = wgIcons::getButton('advanced', $val->getName(), 'javascript: crawlWebsite();');
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcrawler');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'crawlercrawler') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['SWITCHCAT'] = formsHelper::getSelectBox('cat', (int) wgSessions::getPageValue('cat'), CrawlerCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('crawler', wgLang::get('crawler'), true, $tpl->getBlock($block));
// ----------- crawler end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>