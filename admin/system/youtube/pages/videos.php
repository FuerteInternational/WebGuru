<?php
/**
 * Page index for module Youtube
 * 
 * @package      WebGuru3
 * @subpackage   modules/youtube/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        3. March 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- videos (Block: videos) start -----------
$block = 'videos';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexvideos';

wgSessions::setPageValueDefault('cat', 0);
if (wgSystem::isRequest('cat')) wgSessions::setPageValue('cat', wgSystem::getRequestValue('cat'));

$parent = (int) wgSessions::getPageValue('cat');

$var['BREADCRUMBS'] = YoutubeCategoriesModel::getBreadcrumbs($parent, ' &raquo; ');
$var['SWITCHCAT'] = formsHelper::getSelectBox('cat', (int) wgSessions::getPageValue('cat'), YoutubeCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));


wgSystem::defPostValue(YoutubeVideosModel::COL_NAME, '');
wgSystem::defPostValue(YoutubeVideosModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(YoutubeVideosModel::COL_CODE, '');
wgSystem::defPostValue(YoutubeVideosModel::COL_YOUTUBE_CATEGORIES_ID, 0);
$lv = array();
$item = new YoutubeVideosModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = YoutubeVideosModel::getItemsInCatPager($parent, pager::getPage($block), 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listvideos');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LCHANGED'] = wgSystem::formatDate($val->getChanged());
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LCODE'] = $val->getCode();
	$lv['LYOUTUBECATEGORIESID'] = $val->getYoutubeCategoriesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexvideos'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexvideos'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listvideos');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexvideos') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLCODE'] = $item->getCode();
if ((bool) $item->getId()) $selected = $item->getYoutubeCategoriesId();
else $selected = (int) $parent;
$var['FULLCATEGORY'] = formsHelper::getSelectBox('youtube_categories_id', $selected, YoutubeCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('videos', wgLang::get('videos'), true, $tpl->getBlock($block));
// ----------- videos end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexcategories';
$parent = (int) wgGet::getValue('parent');

$var['BREADCRUMBS'] = YoutubeCategoriesModel::getBreadcrumbs($parent, ' &raquo; ');

wgSystem::defPostValue(YoutubeCategoriesModel::COL_ID, '');
wgSystem::defPostValue(YoutubeCategoriesModel::COL_PARENT, '');
wgSystem::defPostValue(YoutubeCategoriesModel::COL_NAME, '');
wgSystem::defPostValue(YoutubeCategoriesModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(YoutubeCategoriesModel::COL_ADDED, time());
wgSystem::defPostValue(YoutubeCategoriesModel::COL_CHANGED, time());
$lv = array();
$item = new YoutubeCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = YoutubeCategoriesModel::getSubcatsPager($parent, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LPARENT'] = $val->getParent();
	if (YoutubeCategoriesModel::countSubCat($val->getId())) {
		$lv['LNAME'] = wgIcons::getIcon('folder_page_white', $val->getName()).' '.$val->getName();
	}
	else $lv['LNAME'] = wgIcons::getIcon('folder', $val->getName()).' '.$val->getName();
	$lv['LNAME'] = '<a href="'.wgPaths::makeSelfLink('parent='.$val->getId()).'">'.$lv['LNAME'].'</a>';
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexcategories&amp;parent='.$parent));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexcategories&amp;parent='.$parent), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexcategories') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
if ((bool) wgGet::getValue('parent')) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('parent='.YoutubeCategoriesModel::getParentId(wgGet::getValue('parent'))).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';
$lv = array();

$var['COLID'] = $item->getId();
if ((bool) $item->getId()) $selected = $item->getParent();
else $selected = (int) wgGet::getValue('parent');
$var['FULLPARENT'] = formsHelper::getSelectBox('parent', $selected, YoutubeCategoriesModel::getSelectBoxTree(0, $item->getId()), array(), wgLang::get('homecat'));
$var['COLNAME'] = $item->getName();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), false, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>