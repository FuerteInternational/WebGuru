<?php
/**
 * Page apps for module Mobileapps
 * 
 * @package      WebGuru3
 * @subpackage   modules/mobileapps/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. September 2012
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- mobileapps (Block: mobileapps) start -----------
$block = 'mobileapps';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'appsmobileapps';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(MobileappsModel::COL_ID, '');
wgSystem::defPostValue(MobileappsModel::COL_NAME, '');
wgSystem::defPostValue(MobileappsModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(MobileappsModel::COL_APPTYPE, '');
wgSystem::defPostValue(MobileappsModel::COL_ICON, '');
wgSystem::defPostValue(MobileappsModel::COL_SORT, '0');
wgSystem::defPostValue(MobileappsModel::COL_ADDED, time());
wgSystem::defPostValue(MobileappsModel::COL_CHANGED, time());
wgSystem::defPostValue(MobileappsModel::COL_VERSION, '');
$lv = array();
$item = new MobileappsModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = MobileappsModel::getSelfPagerData(pager::getPage($block), 20);
$arr = MobileappsModel::doPager(array(), pager::getPage($block));
// MobileappsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmobileapps');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName().' <small>('.wgIo::getSize($val->getSize(), true).')</small>';
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LAPPTYPE'] =  wgPaths::getModulePath('url', 'mobileapps').'images/device-'.$val->getApptype().'.png';
	$icon = wgPaths::getModulePath('url', 'mobileapps').'images/icon.png';
	if ($val->getIcon()) $icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$val->getId().'.png';
	$lv['LICON'] = $icon;
	$lv['LSORT'] = $val->getSort();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = wgSystem::formatDate($val->getChanged());
	$lv['LVERSION'] = $val->getVersion();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmobileapps');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLAPPTYPE'] = $item->getApptype();
$var['COLDEVTYPE'] = $item->getDevtype();
if ($item->getIcon()) {
	$icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$item->getId().'@2x.png';
	$var['ICONFILEIFEXISTS'] = '</p><p><label>Delete icon</label><input name="deleteicon" id="deleteicon" type="checkbox" value="0" /></p>';
	$var['ICONPREVIEW'] = '<img src="'.$icon.'" alt="" style="float:right; margin-top:16px; margin-left:200px; border:solid 1px; padding:6px;" />';
}
$var['COLSORT'] = $item->getSort();
$var['COLAPPTYPEFULL'] = formsHelper::getSelectBox('apptype', $item->getApptype(), array(), array(), wgLang::get('iPhone'));
$var['COLDEVTYPEFULL'] = formsHelper::getSelectBox('apptype', $item->getDevtype(), array(wgLang::get('productionversion'), wgLang::get('betaversion')), array(), wgLang::get('developmentversion'));
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLVERSION'] = $item->getVersion();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('mobileapps', wgLang::get('mobileapps'), true, $tpl->getBlock($block));
// ----------- mobileapps end -----------

// ----------- installstats (Block: installstats) start -----------
$block = 'installstats';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'appsinstallstats';

wgSystem::clearDefPostValue();

$lv = array();
$item = new MobileappsModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = MobileappsModel::getSelfPagerData(pager::getPage($block), 20);
$arr = MobileappsModel::doPager(array(), pager::getPage($block));
// MobileappsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listinstallstats');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LAPPTYPE'] = $val->getApptype();
	$lv['LICON'] = $val->getIcon();
	$lv['LSORT'] = $val->getSort();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LCHANGED'] = wgSystem::formatDate($val->getChanged());
	$lv['LVERSION'] = $val->getVersion();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME'], 'index'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listinstallstats');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('installstats', wgLang::get('installstats'), false, $tpl->getBlock($block));
// ----------- installstats end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>