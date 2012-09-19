<?php
/**
 * Page companies for module Mobileapps
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

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- companiesedit (Block: companiesedit) start -----------
$block = 'companiesedit';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'companiescompaniesedit';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(CompaniesModel::COL_ID, '');
wgSystem::defPostValue(CompaniesModel::COL_NAME, '');
wgSystem::defPostValue(CompaniesModel::COL_IDENTIFIER, '');
$lv = array();
$item = new CompaniesModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = CompaniesModel::getSelfPagerData(pager::getPage($block), 20);
$arr = CompaniesModel::doPager(array(), pager::getPage($block));
// CompaniesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcompaniesedit');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcompaniesedit');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('companiesedit', wgLang::get('companiesedit'), true, $tpl->getBlock($block));
// ----------- companiesedit end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>