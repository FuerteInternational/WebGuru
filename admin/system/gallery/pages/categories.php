<?php
/**
 * Page categories for module Gallery
 * 
 * @package      WebGuru3
 * @subpackage   modules/gallery/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        15. June 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

if (wgSystem::isRequest('mycat')) wgSessions::setPageValue('mycat', wgSystem::getRequestValue('mycat'));
$mycat = (int) wgSessions::getPageValue('mycat');

$var['FULLMYCAT'] = formsHelper::getSelectBox('mycat', $mycat, GalleryCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var['BREADCRUMBS'] = GalleryCategoriesModel::getBreadcrumbs($mycat, ' &raquo; ');

$var['ACTIONNAME'] = 'categoriescategories';


wgSystem::defPostValue(GalleryCategoriesModel::COL_PARENT, $mycat);
wgSystem::defPostValue(GalleryCategoriesModel::COL_MAIN_THUMB_ID, 0);
wgSystem::defPostValue(GalleryCategoriesModel::COL_DATE, time());
wgSystem::defPostValue(GalleryCategoriesModel::COL_NOTE, '');
$lv = array();
$item = new GalleryCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = GalleryCategoriesModel::getCatsPager($mycat, pager::getPage($block), 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LINK'] = wgPaths::makeSelfLink('mycat='.$val->getId());
	$lv['ICO'] = wgIcons::getButton(((bool) GalleryCategoriesModel::countSubCats($val->getId()) ? 'folder_page_white' : 'filenew'), $val->getName(), $lv['LINK']);
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'categoriescategories') $item = $val;
}

if ((bool) $mycat) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('mycat='.GalleryCategoriesModel::getParentCatId($mycat)).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';

$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['FULLPARENT'] = formsHelper::getSelectBox('parent', $item->getParent(), GalleryCategoriesModel::getSelectBoxTree(0, (int) $item->getId()), array(), wgLang::get('homecat'));
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['FULLMAINTHUMBID'] = formsHelper::getSelectBox('', $item->getMainThumbId(), array(), array(), wgLang::get('defaultpic'));
$var['FULLCOLDATE'] = formsHelper::getDateTimeBox('date', $item->getDate());
$var['COLHEAD'] = $item->getHead();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLNOTE'] = $item->getNote();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), true, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>