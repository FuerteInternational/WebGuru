<?php
/**
 * Page items for module Motocatalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/motocatalogue/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. May 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- items (Block: items) start -----------
$block = 'items';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'itemsitems';


wgSystem::defPostValue(MotocatalogueItemsModel::COL_PRETEXT, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_CUBATURE, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_POWER, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_KILOMETERS, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_PRICE, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_VINTAGE, date('Y'));
wgSystem::defPostValue(MotocatalogueItemsModel::COL_TECHNICAL_APPROVE, 1);
wgSystem::defPostValue(MotocatalogueItemsModel::COL_ORIGIN, 56);
wgSystem::defPostValue(MotocatalogueItemsModel::COL_LEASING, 1);
wgSystem::defPostValue(MotocatalogueItemsModel::COL_TAX, 0);
wgSystem::defPostValue(MotocatalogueItemsModel::COL_BRAND, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_TYPE, '');
wgSystem::defPostValue(MotocatalogueItemsModel::COL_PROMO, 0);
wgSystem::defPostValue(MotocatalogueItemsModel::COL_STATE, '');
$lv = array();
$item = new MotocatalogueItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = MotocatalogueItemsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listitems');
	$lv['LNAME'] = $val->getName();
	$lv['LPRICE'] = $val->getPrice();
	$lv['LVINTAGE'] = date('Y', strtotime($val->getVintage()));
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listitems');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLPRETEXT'] = $item->getPretext();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLCUBATURE'] = $item->getCubature();
$var['COLPOWER'] = $item->getPower();
$var['COLKILOMETERS'] = $item->getKilometers();
$var['COLPRICE'] = (int) $item->getPrice();
$var['COLDISCOUNTEDPRICE'] = (int) $item->getDiscountedPrice();
$var['FULLVINTAGE'] = formsHelper::getSelectBox('vintage', $item->getVintage(), MotocatalogueItemsModel::getYears());
$var['FULLAVAIL'] = formsHelper::getSelectBox('avail', $item->getAvail(), MotocatalogueItemsModel::getAvailability());
$var['FULLCOLTECHNICALAPPROVE'] = formsHelper::getCheckBox('technical_approve', $item->getTechnicalApprove(), 1);
$var['FULLORIGIN'] = formsHelper::getSelectBox('origin', $item->getOrigin(), SystemCountriesModel::getCountries());
$var['FULLCOLLEASING'] = formsHelper::getCheckBox('leasing', $item->getLeasing(), 1);
$var['FULLCOLTAX'] = formsHelper::getCheckBox('tax', $item->getTax(), 1);
$var['FULLBRAND'] = formsHelper::getSelectBox('brand', $item->getBrand(), MotocatalogueBrandsModel::getBrands());
$var['FULLTYPE'] = formsHelper::getSelectBox('type', $item->getType(), MotocatalogueTypesModel::getTypes());
$var['FULLCOLPROMO'] = formsHelper::getCheckBox('promo', $item->getPromo(), 1);
$var['FULLSTATE'] = formsHelper::getSelectBox('state', $item->getState(), MotocatalogueItemsModel::getStates());
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());


$arr = MotocatalogueImagesModel::getImagesForProject($item->getId());
if (!empty($arr)) foreach ($arr as $v) {
	$tpl->setCurrentBlock('imageslist');
	//$v = new ProjectsImagesModel();
	$vl = array();
	$vl['NAME'] = $v->getName();
	$vl['THUMB'] = moduleMotocatalogue::getImage($item->getId(), $v->getSmallid(), 'xsmall', $v->getFilename());
	//wgError::add($v->getFilename());
	$vl['DOWNLOAD'] = wgIcons::getButton('filesave', $v->getName(), '#');
	$vl['EDITROW'] = wgIcons::getButton('edit', $v->getName(), wgPaths::makeTableEditLink($v->getId(), 'item='.$item->getId(), 'items'));
	$vl['DELETEROW'] = wgIcons::getButton('delete', $v->getName(), wgPaths::makeTableDeleteLink($v->getId(), 'edit='.$item->getId().'&amp;type=image&edit='.$item->getId().'&amp;act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($vl);
	$tpl->parseBlock('imageslist');
}


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('items', wgLang::get('items'), true, $tpl->getBlock($block));
// ----------- items end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>