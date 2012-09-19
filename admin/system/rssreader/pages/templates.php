<?php
/**
 * Page templates for module Rssreader
 * 
 * @package      WebGuru3
 * @subpackage   modules/rssreader/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        18. August 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- listurls (Block: listurls) start -----------
$block = 'listurls';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslisturls';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(RssreaderTemplatesModel::COL_RSSREADER_URLS_ID, '');
wgSystem::defPostValue(RssreaderTemplatesModel::COL_LIMIT, 5);
wgSystem::defPostValue(RssreaderTemplatesModel::COL_ASCENDING, 1);
wgSystem::defPostValue(RssreaderTemplatesModel::COL_CACHE, 1);
wgSystem::defPostValue(RssreaderTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(RssreaderTemplatesModel::COL_TDETAIL, '<li><a href="{%Link}">{%Name}</a></li>');
wgSystem::defPostValue(RssreaderTemplatesModel::COL_TEND, '</ul>');
wgSystem::defPostValue(RssreaderTemplatesModel::COL_TNOITEM, '<!-- there is no feed in the database -->');
$lv = array();
$item = new RssreaderTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = RssreaderTemplatesModel::getSelfPagerData(pager::getPage($block), 20);
$arr = RssreaderTemplatesModel::doPager(array(), pager::getPage($block));
// RssreaderTemplatesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlisturls');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlisturls');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLRSSREADERURLSID'] = $item->getRssreaderUrlsId();
$var['COLLIMIT'] = $item->getLimit();
$var['FULLCOLASCENDING'] = formsHelper::getCheckBox('ascending', $item->getAscending(), 1);
$var['FULLCOLCACHE'] = formsHelper::getCheckBox('cache', $item->getCache(), 1);
$var['COLTBEGIN'] = $item->getTbegin();
$var['COLTDETAIL'] = $item->getTdetail();
$var['COLTEND'] = $item->getTend();
$var['COLTNOITEM'] = $item->getTnoitem();
$var['COLSYSTEMWEBSITESID'] = $item->getSystemWebsitesId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('listurls', wgLang::get('listurls'), true, $tpl->getBlock($block));
// ----------- listurls end -----------

// ----------- listfeeds (Block: listfeeds) start -----------
$block = 'listfeeds';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslistfeeds';

wgSystem::clearDefPostValue();

$lv = array();
$item = new RssreaderTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = RssreaderTemplatesModel::getSelfPagerData(pager::getPage($block), 20);
$arr = RssreaderTemplatesModel::doPager(array(), pager::getPage($block));
// RssreaderTemplatesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlistfeeds');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LRSSREADERURLSID'] = $val->getRssreaderUrlsId();
	$lv['LLIMIT'] = $val->getLimit();
	$lv['LASCENDING'] = $val->getAscending();
	$lv['LCACHE'] = $val->getCache();
	$lv['LTBEGIN'] = $val->getTbegin();
	$lv['LTDETAIL'] = $val->getTdetail();
	$lv['LTEND'] = $val->getTend();
	$lv['LTNOITEM'] = $val->getTnoitem();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME'], 'templates'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlistfeeds');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('listfeeds', wgLang::get('listfeeds'), false, $tpl->getBlock($block));
// ----------- listfeeds end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>