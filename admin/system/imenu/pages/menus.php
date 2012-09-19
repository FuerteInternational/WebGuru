<?php
/**
 * Page menus for module Imenu
 * 
 * @package      WebGuru3
 * @subpackage   modules/imenu/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. August 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- menus (Block: menus) start -----------
$block = 'menus';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'menusmenus';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(ImenuMenusModel::COL_REWRITEURL, '');
$lv = array();
$item = new ImenuMenusModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ImenuMenusModel::getSelfPagerData(pager::getPage($block), 20);
//$arr = ImenuMenusModel::doPager(array(), pager::getPage($block));

if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmenus');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LREWRITEURL'] = $val->getRewriteurl();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmenus');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}

$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$params = array();
$params['baseclass'] = 'Model';
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLREWRITEURL'] = $item->getRewriteurl();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('menus', wgLang::get('menus'), true, $tpl->getBlock($block));
// ----------- menus end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>