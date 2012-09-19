<?php
/**
 * Page items for module 3mcatalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- items (Block: items) start -----------
$block = 'items';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'itemsitems';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(Nato3mcatItemsModel::COL_ID, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_MARKET, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_CLASIFICATION, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_ITEM_TYPE, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_COMMON_REF_NAME, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_COMMON_DESCRIPTION, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_NATO_ITEM_NAME, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_NATO_DESCRIPTION, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_LENGTH, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_LENGTH_UNIT, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_WIDTH, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_WIDTH_UNIT, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_HEIGHT, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_HEIGHT_UNIT, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_VOLUME_WEIGHT, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_VOLUME_WEIGHT_UNIT, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_DIAMETER, '');
wgSystem::defPostValue(Nato3mcatItemsModel::COL_DIAMETER_UNIT, '');
$lv = array();
$item = new Nato3mcatItemsModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = Nato3mcatItemsModel::getSelfPagerData(pager::getPage($block), 20);
$arr = Nato3mcatItemsModel::doPager(array(), pager::getPage($block));
// Nato3mcatItemsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listitems');
	$lv['LID'] = $val->getId();
	$lv['LNIIN'] = $val->getNiin();
	$lv['LMARKET'] = $val->getMarket();
	$lv['LCLASIFICATION'] = $val->getClasification();
	$lv['LITEMTYPE'] = $val->getItemType();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LCOMMONREFNAME'] = $val->getCommonRefName();
	$lv['LCOMMONDESCRIPTION'] = $val->getCommonDescription();
	$lv['LNATOITEMNAME'] = $val->getNatoItemName();
	$lv['LNATODESCRIPTION'] = $val->getNatoDescription();
	$lv['LLENGTH'] = $val->getLength();
	$lv['LLENGTHUNIT'] = $val->getLengthUnit();
	$lv['LWIDTH'] = $val->getWidth();
	$lv['LWIDTHUNIT'] = $val->getWidthUnit();
	$lv['LHEIGHT'] = $val->getHeight();
	$lv['LHEIGHTUNIT'] = $val->getHeightUnit();
	$lv['LVOLUMEWEIGHT'] = $val->getVolumeWeight();
	$lv['LVOLUMEWEIGHTUNIT'] = $val->getVolumeWeightUnit();
	$lv['LDIAMETER'] = $val->getDiameter();
	$lv['LDIAMETERUNIT'] = $val->getDiameterUnit();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listitems');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$var['COLNIIN'] = $item->getNiin();
$var['COLMARKET'] = $item->getMarket();
$var['COLBIGB'] = $item->getBigb();
$var['COLSMALLB'] = $item->getSmallb();
$var['COLCLASIFICATION'] = $item->getClasification();
$var['COLITEMTYPE'] = $item->getItemType();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLCOMMONREFNAME'] = $item->getCommonRefName();
$var['COLCOMMONDESCRIPTION'] = $item->getCommonDescription();
$var['COLNATOITEMNAME'] = $item->getNatoItemName();
$var['COLNATODESCRIPTION'] = $item->getNatoDescription();
$var['COLLENGTH'] = $item->getLength();
$var['COLLENGTHUNIT'] = $item->getLengthUnit();
$var['COLWIDTH'] = $item->getWidth();
$var['COLWIDTHUNIT'] = $item->getWidthUnit();
$var['COLHEIGHT'] = $item->getHeight();
$var['COLHEIGHTUNIT'] = $item->getHeightUnit();
$var['COLVOLUMEWEIGHT'] = $item->getVolumeWeight();
$var['COLVOLUMEWEIGHTUNIT'] = $item->getVolumeWeightUnit();
$var['COLDIAMETER'] = $item->getDiameter();
$var['COLDIAMETERUNIT'] = $item->getDiameterUnit();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('items', wgLang::get('items'), true, $tpl->getBlock($block));
// ----------- items end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>