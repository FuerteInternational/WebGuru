<?php
/**
 * Page index for module Crawler
 * 
 * @package      WebGuru3
 * @subpackage   modules/crawler/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        17. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- websites (Block: websites) start -----------
$block = 'websites';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSessions::setPageValueDefault('cat', 0);
if (wgPost::isValue('cat')) wgSessions::setPageValue('cat', wgPost::getValue('cat'));

$var['ACTIONNAME'] = 'indexwebsites';
$var['ACTION'] = wgPaths::makePageLink('website');

$lv = array();
$item = new CrawlerWebsitesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CrawlerWebsitesModel::getWebsitesPagerByCat(wgSessions::getPageValue('cat'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listwebsites');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LURL'] = valid::cutText($val->getUrl(), 50);
	$lv['FULLURL'] = $val->getUrl();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LCRAWLED'] = $val->getCrawled();
	$lv['LCACHED'] = $val->getCached();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexwebsites', 'website'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexwebsites'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listwebsites');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexwebsites') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['SWITCHCAT'] = formsHelper::getSelectBox('cat', (int) wgSessions::getPageValue('cat'), CrawlerCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('websites', wgLang::get('websites'), true, $tpl->getBlock($block));
// ----------- websites end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexcategories';

$var['ACTION'] = wgPaths::makeSelfLink('parent='.wgGet::getValue('parent'));

wgSystem::defPostValue(CrawlerCategoriesModel::COL_ID, '');
wgSystem::defPostValue(CrawlerCategoriesModel::COL_PARENT, '');
wgSystem::defPostValue(CrawlerCategoriesModel::COL_NAME, '');
wgSystem::defPostValue(CrawlerCategoriesModel::COL_CATDESCRIPTION, '');
wgSystem::defPostValue(CrawlerCategoriesModel::COL_ADDED, time());
wgSystem::defPostValue(CrawlerCategoriesModel::COL_CHANGED, time());
wgSystem::defPostValue(CrawlerCategoriesModel::COL_USERS_ID, '');
wgSystem::defPostValue(CrawlerCategoriesModel::COL_SYSTEM_USERS_ID, '');
$lv = array();
$item = new CrawlerCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CrawlerCategoriesModel::getSubcatsPager(wgGet::getValue('parent'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LPARENT'] = $val->getParent();
	if (CrawlerCategoriesModel::countSubCat($val->getId())) {
		$lv['LNAME'] = wgIcons::getIcon('folder', $val->getName()).' '.$val->getName();
	}
	else $lv['LNAME'] = wgIcons::getIcon('filenew', $val->getName()).' '.$val->getName();
	$lv['LNAME'] = '<a href="'.wgPaths::makeSelfLink('parent='.$val->getId()).'">'.$lv['LNAME'].'</a>';
	$lv['LCATDESCRIPTION'] = $val->getCatdescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexcategories&amp;parent='.wgGet::getValue('parent')));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexcategories&amp;parent='.wgGet::getValue('parent')), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexcategories') $item = $val;
}
if ((bool) wgGet::getValue('parent')) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('parent='.CrawlerCategoriesModel::getParentId(wgGet::getValue('parent'))).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLPARENT'] = $item->getParent();

$params = array();
$params['baseclass'] = 'SystemLanguageModel';
if ((bool) $item->getId()) $selected = $item->getParent();
else $selected = wgGet::getValue('parent');
$var['COLPARENT'] = formsHelper::getSelectBox('parent', $selected, CrawlerCategoriesModel::getSelectBoxTree(0, $item->getId()), $params, wgLang::get('maincat'));

$var['COLNAME'] = $item->getName();
$var['COLCATDESCRIPTION'] = $item->getCatdescription();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLUSERSID'] = $item->getUsersId();
$var['COLSYSTEMUSERSID'] = $item->getSystemUsersId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), false, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>