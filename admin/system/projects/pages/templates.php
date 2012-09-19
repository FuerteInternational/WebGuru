<?php
/**
 * Page templates for module Projects
 * 
 * @package      WebGuru3
 * @subpackage   modules/projects/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. July 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- projects (Block: projects) start -----------
$block = 'projects';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesprojects';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(ProjectsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(ProjectsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SEARCH, 0);
wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE1, 'cat');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE2, 'search');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATEFORMAT, 'Y-m-d');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_LINKFORMAT, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SORTING, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM1, '<li>
	<p><strong>{%Name}</strong></p>
</li>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TEND, '</ul>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TNOITEM, '<div>
	<p>There is no project in this category</p>
</div>');
$lv = array();
$item = new ProjectsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ProjectsTemplatesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listprojects');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listprojects');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1, array('id'=>'listSearchChBox'));
$var['COLVARIABLEA'] = $item->getVariable1();
$var['COLVARIABLEB'] = $item->getVariable2();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLLINKFORMAT'] = $item->getLinkformat();
$var['FULLCOLSEO'] = formsHelper::getCheckBox('seo', $item->getSeo(), 1);
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), ProjectsTemplatesModel::getTempDatasource(0), array('id'=>'listDS'));
$var['FULLCATS'] = formsHelper::getSelectBox('projects_categories_id', $item->getProjectsCategoriesId(), ProjectsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var['FULLSORTING'] = formsHelper::getSelectBox('sorting', $item->getSorting(), ProjectsTemplatesModel::getTempSorting(0));
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEMA'] = wgParse::decode($item->getTitem1());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('projects', wgLang::get('projectstemps'), true, $tpl->getBlock($block));
// ----------- projects end -----------

// ----------- details (Block: details) start -----------
$block = 'details';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(ProjectsTemplatesModel::COL_PAGER, 1); // use four o' four
wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE1, 'project');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATEFORMAT, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SEO, 1);
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SORTING, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM1, '<p>Project name: <strong>{%Name}</strong></p>
<p>Project identifier: <strong>{%Identifier}</strong></p>
<p>Project client: <strong>{%Client}</strong></p>
<p>Project link: <strong>{%Link}</strong></p>
<p>Project small info: <strong>{%Info}</strong></p>
<p>Project views: <strong>{%Views}</strong></p>
<p>Project date: <strong>{%Date}</strong></p>
<p>Project date added: <strong>{%Added}</strong></p>
<p>Project date changed: <strong>{%Changed}</strong></p>
<p>Project text 1: <strong>{%Text1}</strong></p>
<p>Project text 2: <strong>{%Text2}</strong></p>
<p>Project text 3: <strong>{%Text3}</strong></p>
<p>Project text 4: <strong>{%Text4}</strong></p>
<p>Project title: <strong>{%Title}</strong></p>
<p>Project meta keywords: <strong>{%Keywords}</strong></p>
<p>Project meta description: <strong>{%Description}</strong></p>
');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TNOITEM, '<div>
	<p>Project does not exists</p>
</div>');
$lv = array();
$item = new ProjectsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ProjectsTemplatesModel::getPagerData(pager::getPage($block), 1, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdetails');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1, array('id'=>'detailNoItemChBox')); // use four o' four
$var['COLPERPAGE'] = $item->getPerpage();
$var['COLVARIABLEA'] = $item->getVariable1();
$var['COLVARIABLEB'] = $item->getVariable2();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLLINKFORMAT'] = $item->getLinkformat();
$var['FULLCOLSEO'] = formsHelper::getCheckBox('seo', $item->getSeo(), 1);
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), ProjectsTemplatesModel::getTempDatasource(1), array('id'=>'detailDS'));
$var['FULLCATS'] = formsHelper::getSelectBox('projects_categories_id', $item->getProjectsCategoriesId(), ProjectsCategoriesModel::getSelectBoxTree());
$var['FULLSORTING'] = formsHelper::getSelectBox('sorting', $item->getSorting(), ProjectsTemplatesModel::getTempSorting(1));
$var['COLTITEMA'] = wgParse::decode($item->getTitem1());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('details', wgLang::get('details'), false, $tpl->getBlock($block));
// ----------- details end -----------

// ----------- projectitems (Block: projectitems) start -----------
$block = 'projectitems';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::clearDefPostValue();
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_PAGER, '');
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_PERPAGE, '');
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_SEARCH, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE1, 'project');
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE2, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATEFORMAT, '');
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_LINKFORMAT, '');
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_SEO, '');
//wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SORTING, 0);
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM1, '<li>
	<p><strong>{%Name}</strong></p>
</li>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM2, '<li>
	<p><strong>{%Name}</strong></p>
</li>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM3, '<li>
	<p><strong>{%Name}</strong></p>
</li>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM4, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM5, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TEND, '</ul>');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TNOITEM, '<div>
	<p>There are no attachments for this project</p>
</div>');
$lv = array();
$item = new ProjectsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ProjectsTemplatesModel::getPagerData(pager::getPage($block), 2, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listprojectitems');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listprojectitems');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1);
$var['COLVARIABLEA'] = $item->getVariable1();
$var['COLVARIABLEB'] = $item->getVariable2();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLLINKFORMAT'] = $item->getLinkformat();
$var['FULLCOLSEO'] = formsHelper::getCheckBox('seo', $item->getSeo(), 1);
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), ProjectsTemplatesModel::getTempDatasource(2));
$var['FULLSORTING'] = formsHelper::getSelectBox('sorting', $item->getSorting(), ProjectsTemplatesModel::getTempSorting(2));
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEMA'] = wgParse::decode($item->getTitem1());
$var['COLTITEMB'] = wgParse::decode($item->getTitem2());
$var['COLTITEMC'] = wgParse::decode($item->getTitem3());
$var['COLTITEMD'] = wgParse::decode($item->getTitem4());
$var['COLTITEME'] = wgParse::decode($item->getTitem5());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('projectitems', wgLang::get('projectitems'), false, $tpl->getBlock($block));
// ----------- projectitems end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(ProjectsTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_PERPAGE, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SEARCH, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE1, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_VARIABLE2, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATEFORMAT, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_LINKFORMAT, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SEO, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_SORTING, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TBEGIN, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TITEM1, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TEND, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TNOITEM, '');
wgSystem::defPostValue(ProjectsTemplatesModel::COL_TEMPTYPE, '');
$lv = array();
$item = new ProjectsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ProjectsTemplatesModel::getPagerData(pager::getPage($block), 3, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
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
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1);
$var['COLVARIABLEA'] = $item->getVariable1();
$var['COLVARIABLEB'] = $item->getVariable2();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLLINKFORMAT'] = $item->getLinkformat();
$var['FULLCOLSEO'] = formsHelper::getCheckBox('seo', $item->getSeo(), 1);
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), ProjectsTemplatesModel::getTempDatasource(3));
$var['FULLSORTING'] = formsHelper::getSelectBox('sorting', $item->getSorting(), ProjectsTemplatesModel::getTempSorting(3));
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEMA'] = wgParse::decode($item->getTitem1());
$var['COLTITEMB'] = wgParse::decode($item->getTitem2());
$var['COLTITEMC'] = wgParse::decode($item->getTitem3());
$var['COLTITEMD'] = wgParse::decode($item->getTitem4());
$var['COLTITEME'] = wgParse::decode($item->getTitem5());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), false, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>