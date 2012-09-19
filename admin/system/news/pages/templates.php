<?php
/**
 * Page templates for module News
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. April 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- newslist (Block: newslist) start -----------
$block = 'newslist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesnewslist';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(NewsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(NewsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(NewsTemplatesModel::COL_ADDID, NULL);
wgSystem::defPostValue(NewsTemplatesModel::COL_DATASOURCE, 2);
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPBEGIN, '<div>');
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPITEM, '<p>
	<a href="?article={%Id}"><strong>{%Title}</strong></a><br />
	<em>{%Date}</em><br />
	{%Perex}
</p>');
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPEND, '</div>
{%PAGER}');
wgSystem::defPostValue(NewsTemplatesModel::COL_NOTEMP, '<h1>There is no article in this category</h1>');
$lv = array();
$item = new NewsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = NewsTemplatesModel::getTemplatesPagerByType(0, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listnewslist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listnewslist');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), NewsTemplatesModel::getSelectDataForType(0), array('id'=>'listDataSource'));
$var['FULLCATID'] = formsHelper::getSelectBox('addid', $item->getAddid(), NewsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());
$var['COLNOTEMP'] = wgParse::decode($item->getNotemp());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('newslist', wgLang::get('newslist'), true, $tpl->getBlock($block));
// ----------- newslist end -----------

// ----------- newsdetails (Block: newsdetails) start -----------
$block = 'newsdetails';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesnewslist';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(NewsTemplatesModel::COL_ADDID, '');
wgSystem::defPostValue(NewsTemplatesModel::COL_DATASOURCE, 3);
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPITEM, '<div>
	<h1>{%Title}</h1>
	<p><strong>{%Author}</strong> - <em>{%Date}</em></p>
	<div class="perex">{%Perex}</div>
	<div class="content">{%Content}</div>
</div>');
wgSystem::defPostValue(NewsTemplatesModel::COL_NOTEMP, '<h1>There is no article</h1>');
$lv = array();
$item = new NewsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = NewsTemplatesModel::getTemplatesPagerByType(1, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listnewsdetails');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listnewsdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), NewsTemplatesModel::getSelectDataForType(1), array('id'=>'detDataSource'));
$var['FULLCATID'] = formsHelper::getSelectBox('addid', $item->getAddid(), NewsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var['COLADDID'] = (int) $item->getAddid();
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLNOTEMP'] = wgParse::decode($item->getNotemp());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('newsdetails', wgLang::get('newsdetails'), false, $tpl->getBlock($block));
// ----------- newsdetails end -----------

// ----------- categorieslist (Block: categorieslist) start -----------
$block = 'categorieslist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesnewslist';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(NewsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(NewsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(NewsTemplatesModel::COL_ADDID, NULL);
wgSystem::defPostValue(NewsTemplatesModel::COL_DATASOURCE, 2);
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPBEGIN, '<ul>');
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPITEM, '
	<li><a href="?newscat={%Id}">{%Name}</a></li>');
wgSystem::defPostValue(NewsTemplatesModel::COL_TEMPEND, '
	<li class="goback"><a href="?newscat={%Parent}">{%ParentName}</a></li>
</ul>
{%PAGER}
');
wgSystem::defPostValue(NewsTemplatesModel::COL_NOTEMP, '<h1>There is no category</h1>');
$lv = array();
$item = new NewsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = NewsTemplatesModel::getTemplatesPagerByType(2, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategorieslist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME'], 'templates'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategorieslist');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), NewsTemplatesModel::getSelectDataForType(2), array('id'=>'catDataSource'));
$var['FULLCATID'] = formsHelper::getSelectBox('addid', $item->getAddid(), NewsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());
$var['COLNOTEMP'] = wgParse::decode($item->getNotemp());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categorieslist', wgLang::get('categorieslist'), false, $tpl->getBlock($block));
// ----------- categorieslist end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>