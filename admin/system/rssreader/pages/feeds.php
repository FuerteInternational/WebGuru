<?php
/**
 * Page feeds for module Rssreader
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
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- feeds (Block: feeds) start -----------
$block = 'feeds';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'feedsfeeds';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(RssreaderUrlsModel::COL_ID, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_NAME, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_URL, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_SYSTEM_WEBSITES_ID, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_NOTE, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_USERS_ID, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_SYSTEM_USERS_ID, '');
wgSystem::defPostValue(RssreaderUrlsModel::COL_GLOBAL, '');
$lv = array();
$item = new RssreaderUrlsModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = RssreaderUrlsModel::getSelfPagerData(pager::getPage($block), 20);
$arr = RssreaderUrlsModel::doPager(array(), pager::getPage($block));
// RssreaderUrlsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listfeeds');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LURL'] = $val->getUrl();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LNOTE'] = $val->getNote();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LGLOBAL'] = $val->getGlobal();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listfeeds');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLURL'] = $item->getUrl();
$var['COLSYSTEMWEBSITESID'] = $item->getSystemWebsitesId();
$var['COLNOTE'] = $item->getNote();
$var['COLUSERSID'] = $item->getUsersId();
$var['COLSYSTEMUSERSID'] = $item->getSystemUsersId();
$var['FULLCOLGLOBAL'] = formsHelper::getCheckBox('global', $item->getGlobal(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('feeds', wgLang::get('feeds'), true, $tpl->getBlock($block));
// ----------- feeds end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>