<?php
/**
 * Page kontakty for module Databazedluzniku
 * 
 * @package      WebGuru3
 * @subpackage   modules/databazedluzniku/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- kontakty (Block: kontakty) start -----------
$block = 'kontakty';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'kontaktykontakty';

wgSessions::setPageValueDefault('firma', 0);
if (wgSystem::isRequest('firma')) wgSessions::setPageValue('firma', wgSystem::getRequestValue('firma'));
$firma = wgSessions::getPageValue('firma');

$var['FULLFIRMA'] = formsHelper::getSelectBox('firma', $firma, DdaFirmyModel::getFirmyByName(), array('onchange'=>'zmenitFirmu();'));


wgSystem::defPostValue(DdaKontaktyModel::COL_FUNKCE, '');
wgSystem::defPostValue(DdaKontaktyModel::COL_MAIL, '@');
wgSystem::defPostValue(DdaKontaktyModel::COL_TELEFON, '+420');
wgSystem::defPostValue(DdaKontaktyModel::COL_MOBIL, '+420');
wgSystem::defPostValue(DdaKontaktyModel::COL_DDA_FIRMY_ID, $firma);

$lv = array();
$item = new DdaKontaktyModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = DdaKontaktyModel::getKontaktyPagerByPrijmeni(pager::getPage($block), $firma);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listkontakty');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LPRIJMENI'] = $val->getPrijmeni();
	$lv['LFUNKCE'] = $val->getFunkce();
	$lv['LMAIL'] = $val->getMail();
	$lv['LTELEFON'] = $val->getTelefon();
	$lv['LMOBIL'] = $val->getMobil();
	$lv['LDDAFIRMYID'] = $val->getDdaFirmyId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listkontakty');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'kontaktykontakty') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLPRIJMENI'] = $item->getPrijmeni();
$var['COLFUNKCE'] = $item->getFunkce();
$var['COLMAIL'] = $item->getMail();
$var['COLTELEFON'] = $item->getTelefon();
$var['COLMOBIL'] = $item->getMobil();
$var['FULLDDAFIRMYID'] = formsHelper::getSelectBox('dda_firmy_id', $item->getDdaFirmyId(), DdaFirmyModel::getFirmyByName());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('kontakty', wgLang::get('kontakty'), true, $tpl->getBlock($block));
// ----------- kontakty end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>