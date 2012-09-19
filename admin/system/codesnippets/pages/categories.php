<?php
/**
 * Page categories for module Codesnippets
 * 
 * @package      WebGuru3
 * @subpackage   modules/codesnippets/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        6. August 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'categoriescategories';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(CsnippetsCategoriesModel::COL_ID, '');
wgSystem::defPostValue(CsnippetsCategoriesModel::COL_NAME, '');
wgSystem::defPostValue(CsnippetsCategoriesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(CsnippetsCategoriesModel::COL_DESCRIPTION, '');
$lv = array();
$item = new CsnippetsCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = CsnippetsCategoriesModel::getCsnippetsCategoriesModelPagerData(pager::getPage($block), 20);
$arr = CsnippetsCategoriesModel::doPager(array(), pager::getPage($block));
// CsnippetsCategoriesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLDESCRIPTION'] = $item->getDescription();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), true, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>