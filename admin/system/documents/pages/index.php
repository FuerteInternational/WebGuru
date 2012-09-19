<?php
/**
 * Page index for module Documents
 * 
 * @package      WebGuru3
 * @subpackage   modules/documents/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- documents (Block: documents) start -----------
$block = 'documents';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexdocuments';

wgSessions::setPageValueDefault('cat', 0);
if (wgSystem::isRequest('cat')) wgSessions::setPageValue('cat', wgSystem::getRequestValue('cat'));

$parent = (int) wgSessions::getPageValue('cat');

$var['BREADCRUMBS'] = DocumentsCategoriesModel::getBreadcrumbs($parent, ' &raquo; ');

wgSystem::defPostValue(DocumentsItemsModel::COL_DOCUMENTS_CATEGORIES_ID, 0);
wgSystem::defPostValue(DocumentsItemsModel::COL_NAME, '');
wgSystem::defPostValue(DocumentsItemsModel::COL_FILE, '');
wgSystem::defPostValue(DocumentsItemsModel::COL_ENABLED, 1);
wgSystem::defPostValue(DocumentsItemsModel::COL_SIZE, 0);
wgSystem::defPostValue(DocumentsItemsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(DocumentsItemsModel::COL_ADDED, time());
wgSystem::defPostValue(DocumentsItemsModel::COL_CHANGED, time());
$lv = array();
$item = new DocumentsItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DocumentsItemsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdocuments');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LFILE'] = $val->getFile();
	$lv['CLASS'] = (((bool) $val->getEnabled()) ? 'green' : 'red');
	$lv['LSIZE'] = $val->getSize();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = wgSystem::formatDate($val->getChanged());
	$lv['DOWNLOADROW'] = wgIcons::getButton('disk', $val->getName(), wgPaths::makeSelfLink('act=indexdocuments&amp;download='.$val->getId()));
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexdocuments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexdocuments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdocuments');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexdocuments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['SWITCHCAT'] = formsHelper::getSelectBox('cat', (int) wgSessions::getPageValue('cat'), DocumentsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var['COLID'] = $item->getId();
if ((bool) $item->getId()) $selected = $item->getDocumentsCategoriesId();
else $selected = (int) $parent;
$var['FULLDOCUMENTSCATEGORIES'] = formsHelper::getSelectBox('documents_categories_id', $selected, DocumentsCategoriesModel::getSelectBoxTree(0, $item->getId()), array(), wgLang::get('homecat'));
$var['COLNAME'] = $item->getName();
$var['COLFILE'] = $item->getFile();
$var['FULLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$var['COLSIZE'] = DocumentsItemsModel::getStringFileSize($item->getSize());
$var['COLDESCRIPTION'] = $item->getDescription();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('documents', wgLang::get('documents'), true, $tpl->getBlock($block));
// ----------- documents end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexcategories';

$parent = (int) wgGet::getValue('parent');

$var['BREADCRUMBS'] = DocumentsCategoriesModel::getBreadcrumbs($parent, ' &raquo; ');

wgSystem::defPostValue(DocumentsCategoriesModel::COL_PARENT, 0);
wgSystem::defPostValue(DocumentsCategoriesModel::COL_NAME, '');
wgSystem::defPostValue(DocumentsCategoriesModel::COL_DESC, '');
$lv = array();
$item = new DocumentsCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DocumentsCategoriesModel::getSubcatsPager($parent, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LPARENT'] = $val->getParent();
	if (DocumentsCategoriesModel::countSubCat($val->getId())) {
		$lv['LNAME'] = wgIcons::getIcon('folder_page_white', $val->getName()).' '.$val->getName();
	}
	else $lv['LNAME'] = wgIcons::getIcon('folder', $val->getName()).' '.$val->getName();
	$lv['LNAME'] = '<a href="'.wgPaths::makeSelfLink('parent='.$val->getId()).'">'.$lv['LNAME'].'</a>';
	$lv['LDESC'] = $val->getDesc();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexcategories&amp;parent='.$parent));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexcategories&amp;parent='.$parent), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexcategories') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();
if ((bool) wgGet::getValue('parent')) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('parent='.DocumentsCategoriesModel::getParentId(wgGet::getValue('parent'))).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';

$var['COLID'] = $item->getId();
if ((bool) $item->getId()) $selected = $item->getParent();
else $selected = (int) wgGet::getValue('parent');
$var['FULLPARENT'] = formsHelper::getSelectBox('parent', $selected, DocumentsCategoriesModel::getSelectBoxTree(0, $item->getId()), array(), wgLang::get('homecat'));
$var['COLNAME'] = $item->getName();
$var['COLDESC'] = $item->getDesc();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), false, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>