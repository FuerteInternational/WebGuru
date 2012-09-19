<?php
/**
 * Page index for module News
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        19. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- articles (Block: articles) start -----------
$block = 'articles';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSessions::setPageValueDefault('cat', 0);
if (wgPost::isValue('cat')) wgSessions::setPageValue('cat', wgPost::getValue('cat'));

$var['ACTION'] = wgPaths::makePageLink('edit', 'parent='.wgSessions::getPageValue('cat'));

$lv = array();
$item = new NewsItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = NewsItemsModel::getItemsPagerByCat(wgSessions::getPageValue('cat'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listarticles');
	$lv['LID'] = $val->getId();
	$lv['LNEWSCATEGORIESID'] = $val->getNewsCategoriesId();
	$lv['LNAME'] = $val->getName();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	if ($val->getDisplayto() < time() || $val->getDisplayfrom() > time()) $class = 'red';
	else $class = 'green';
	$lv['LCLASS'] = $class;
	$lv['LDATEFOR'] = wgSystem::formatDate($val->getDatefor());
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexarticles', 'edit'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexarticles'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listarticles');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexarticles') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['SWITCHCAT'] = formsHelper::getSelectBox('cat', (int) wgSessions::getPageValue('cat'), NewsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('articles', wgLang::get('articles'), true, $tpl->getBlock($block));
// ----------- articles end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexcategories';
$var['ACTION'] = wgPaths::makeSelfLink();

wgSystem::defPostValue(NewsCategoriesModel::COL_PARENT, 0);
wgSystem::defPostValue(NewsCategoriesModel::COL_NAME, '');
$lv = array();
$item = new NewsCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = NewsCategoriesModel::getSubcatsPager(wgGet::getValue('parent'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LPARENT'] = $val->getParent();
	if (NewsCategoriesModel::countSubCat($val->getId())) {
		$lv['LNAME'] = wgIcons::getIcon('folder_page_white', $val->getName()).' '.$val->getName();
	}
	else $lv['LNAME'] = wgIcons::getIcon('folder', $val->getName()).' '.$val->getName();
	$lv['LNAME'] = '<a href="'.wgPaths::makeSelfLink('parent='.$val->getId()).'">'.$lv['LNAME'].'</a>';
	$lv['LSYSTEMUSERSID'] = $val->getSystemUsersId();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexcategories&amp;parent='.wgGet::getValue('parent')));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexcategories&amp;parent='.wgGet::getValue('parent')), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexcategories') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
if ((bool) wgGet::getValue('parent')) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('parent='.CrawlerCategoriesModel::getParentId(wgGet::getValue('parent'))).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';
$lv = array();

$var['COLID'] = $item->getId();
if ((bool) $item->getId()) $selected = $item->getParent();
else $selected = wgGet::getValue('parent');
$var['FULLPARENT'] = formsHelper::getSelectBox('parent', $selected, NewsCategoriesModel::getSelectBoxTree(0, $item->getId()), array(), wgLang::get('homecat'));
$var['COLNAME'] = $item->getName();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), false, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>