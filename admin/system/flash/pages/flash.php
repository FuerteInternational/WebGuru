<?php
/**
 * Page index for module Flash
 * 
 * @package      WebGuru3
 * @subpackage   modules/flash/pages/
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

// ----------- flashobjects (Block: flashobjects) start -----------
$block = 'flashobjects';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexflashobjects';


wgSystem::defPostValue(FlashItemsModel::COL_ID, '');
wgSystem::defPostValue(FlashItemsModel::COL_FLASH_CATEGORIES_ID, '');
wgSystem::defPostValue(FlashItemsModel::COL_NAME, '');
wgSystem::defPostValue(FlashItemsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(FlashItemsModel::COL_URL, '');
wgSystem::defPostValue(FlashItemsModel::COL_FILE, '');
wgSystem::defPostValue(FlashItemsModel::COL_WIDTH, '');
wgSystem::defPostValue(FlashItemsModel::COL_LENGHT, '');
$lv = array();
$item = new FlashItemsModel();
$item->setDefaultResults(wgSystem::getPost());

//$var['NEWACTIONNAME'] = makeTableEditLink($val->getId(), 'show=indexflashobjects');

// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexflashobjects') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = FlashItemsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listflashobjects');
	$lv['LID'] = $val->getId();
	$lv['LFLASHCATEGORIESID'] = $val->getFlashCategoriesId();
	$lv['LNAME'] = $val->getName();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LURL'] = $val->getUrl();
	$lv['LFILE'] = $val->getFile();
	$lv['LWIDTH'] = $val->getWidth();
	$lv['LLENGHT'] = $val->getLenght();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexflashobjects'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexflashobjects'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listflashobjects');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexflashobjects') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLFLASHCATEGORIESID'] = $item->getFlashCategoriesId();
$var['COLNAME'] = $item->getName();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLURL'] = $item->getUrl();
$var['COLFILE'] = $item->getFile();
$var['COLWIDTH'] = $item->getWidth();
$var['COLLENGHT'] = $item->getLenght();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('flashobjects', wgLang::get('flashobjects'), true, $tpl->getBlock($block));
// ----------- flashobjects end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexcategories';


wgSystem::defPostValue(FlashCategoriesModel::COL_ID, '');
wgSystem::defPostValue(FlashCategoriesModel::COL_PARENT, '');
wgSystem::defPostValue(FlashCategoriesModel::COL_NAME, '');
wgSystem::defPostValue(FlashCategoriesModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(FlashCategoriesModel::COL_ADDED, time());
wgSystem::defPostValue(FlashCategoriesModel::COL_CHANGED, time());
$lv = array();
$item = new FlashCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

//$var['NEWACTIONNAME'] = makeTableEditLink($val->getId(), 'show=indexcategories');

// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexcategories') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = FlashCategoriesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LPARENT'] = $val->getParent();
	$lv['LNAME'] = $val->getName();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexcategories'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexcategories'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexcategories') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLPARENT'] = $item->getParent();
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