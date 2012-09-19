<?php
/**
 * Page templates for module Blog
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        25. June 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

if (wgSystem::isRequest('myblog')) wgSessions::setModuleValue('myblog', wgSystem::getRequestValue('myblog'));
$myblog = (int) wgSessions::getModuleValue('myblog');

$blogs = BlogModel::doSelect();
if (!(bool) $myblog && !empty($blogs)) {
	wgSessions::setModuleValue('myblog', $blogs[0]->getId());
	$myblog = (int) wgSessions::getModuleValue('myblog');
}
if (empty($blogs)) wgError::add('setupblogfirst');

$lista = array();
$lista['begin'] = '<div>
';
$lista['item'] = '<div class="post">
	<h2><a href="?article={%id}">{%Title}</a></h2>
	<p class="info"><strong>{%Date}</strong> - {%Author}</p>
	<div class="excerpt">{%Excerpt}<div>
</div>';
$lista['end'] = '</div>
{%PAGER}';
$lista['noitem'] = '<div>
	<p>There is no article in this category</p>
</div>';

// ----------- lists (Block: lists) start -----------
$block = 'lists';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);

wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, 1);
wgSystem::defPostValue(BlogTemplatesModel::COL_LIMIT, 10);
wgSystem::defPostValue(BlogTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(BlogTemplatesModel::COL_SEARCH, 0);
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, 'search');
wgSystem::defPostValue(BlogTemplatesModel::COL_SOMEID, 'cat');
wgSystem::defPostValue(BlogTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TBEGIN, $lista['begin']);
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, $lista['item']);
wgSystem::defPostValue(BlogTemplatesModel::COL_TEND, $lista['end']);
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, $lista['noitem']);
//wgSystem::defPostValue(BlogTemplatesModel::COL_TNOPERM, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_BLOG_CATS_ID, '');
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlists');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlists');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(0), array('id'=>'listsDSSB'));
$var['COLLIMIT'] = $item->getLimit();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1, array('id'=>'checkButtSearch'));
$var['COLVARIABLE'] = $item->getVariable();
$var['COLSOMEID'] = $item->getSomeid();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//$var['COLTNOPERM'] = $item->getTnoperm();
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array(), wgLang::get('allcategories'));


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('lists', wgLang::get('lists'), true, $tpl->getBlock($block));
// ----------- lists end -----------

// ----------- details (Block: details) start -----------
$block = 'details';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';
$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, 'article');
wgSystem::defPostValue(BlogTemplatesModel::COL_SOMEID, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_USEEDIT, 1);
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, '<h1>{%Title}</h1>
<p>Added: {%Date}</p>
<p>Last modified: {%Modified}</p>
<p>Author: {%Author}</p>
<div>{%Excerpt}</div>
<div>{%Content}</div>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, '<!-- this article does not exist -->');
///wgSystem::defPostValue(BlogTemplatesModel::COL_TNOPERM, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_BLOG_CATS_ID, '');
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 1);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdetails');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(1), array('id'=>'detailDSSB'));
$var['COLVARIABLE'] = $item->getVariable();
$var['COLSOMEID'] = $item->getSomeid();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1, array('id'=>'useFofCb'));
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//$var['COLTNOPERM'] = $item->getTnoperm();
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array(), 'anycategory');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('details', wgLang::get('details'), false, $tpl->getBlock($block));
// ----------- details end -----------

// ----------- files (Block: files) start -----------
$block = 'files';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';
$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);


wgSystem::clearDefPostValue();
wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, '2');
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, 'article');
wgSystem::defPostValue(BlogTemplatesModel::COL_TBEGIN, '<table class="files">
');
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, '<tr>
	<td>{%Name}</td>
	<td><a href="?download={%Id}">Download</a></td>
	<td><a href="?view={%Id}">View</a></td>
</tr>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TEND, '</table>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, '<!-- no files to display -->');
//wgSystem::defPostValue(BlogTemplatesModel::COL_TNOPERM, '');
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 7);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listfiles');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listfiles');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(7), array('id'=>'filesDSSB'));
$var['COLLIMIT'] = $item->getLimit();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1);
$var['COLVARIABLE'] = $item->getVariable();
$var['COLSOMEID'] = $item->getSomeid();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//$var['COLTNOPERM'] = $item->getTnoperm();
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array());


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('files', wgLang::get('files'), false, $tpl->getBlock($block));
// ----------- files end -----------

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';
$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);


wgSystem::clearDefPostValue();
wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_LIMIT, 20);
wgSystem::defPostValue(BlogTemplatesModel::COL_PAGER, 0);
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, 'cat');
wgSystem::defPostValue(BlogTemplatesModel::COL_SOMEID, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, '<li><a href="?cat={%Id}&amp;identifier={%Identifier}">{%Name}</a></li>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TEND, '</ul>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, '<!-- there is no category -->');
wgSystem::defPostValue(BlogTemplatesModel::COL_BLOG_CATS_ID, 0);
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 2);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(2), array('id'=>'catlistDSSB'));
$var['COLLIMIT'] = $item->getLimit();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1);
$var['COLVARIABLE'] = $item->getVariable();
$var['COLSOMEID'] = $item->getSomeid();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//$var['COLTNOPERM'] = $item->getTnoperm();
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array(), wgLang::get('homecat'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categorieslist'), false, $tpl->getBlock($block));
// ----------- categories end -----------

// ----------- catdetails (Block: catdetails) start -----------
$block = 'catdetails';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, 1);
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, 'cat');
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, '<h1>{%Name}</h1>
<p>Identifier: {%Identifier}</p>
<p>Articles: {%Articles}</p>
<div>{%Head}</div>
<div>{%Description}</div>');
wgSystem::defPostValue(BlogTemplatesModel::COL_USEEDIT, 1);
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, '<!-- this category does not exist -->');
wgSystem::defPostValue(BlogTemplatesModel::COL_BLOG_CATS_ID, '');
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 5);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcatdetails');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcatdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(5), array('id'=>'catdetDSSB'));
$var['COLLIMIT'] = $item->getLimit();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1);
$var['COLVARIABLE'] = $item->getVariable();
$var['COLSOMEID'] = $item->getSomeid();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1, array('id'=>'useFofCd'));
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//$var['COLTNOPERM'] = $item->getTnoperm();
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('catdetails', wgLang::get('catdetails'), false, $tpl->getBlock($block));
// ----------- catdetails end -----------


// ----------- archives (Block: archives) start -----------
$block = 'archives';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, 1);
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, '%Y %M');
wgSystem::defPostValue(BlogTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, '<li><a href="?date={%ArchiveSortDate}">{%ArchiveDate} ({%ArchiveTotal})</a></li>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TEND, '</ul>');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, '<!-- There is no post in the blog -->');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOPERM, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_BLOG_CATS_ID, '');
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 3);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listarchives');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listarchives');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(3));
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//print $var['COLTBEGIN'];
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('archives', wgLang::get('archives'), false, $tpl->getBlock($block));
// ----------- archives end -----------

// ----------- editforms (Block: editforms) start -----------

/*
$block = 'editforms';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(BlogTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_LIMIT, 20);
wgSystem::defPostValue(BlogTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_SEARCH, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_SOMEID, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TBEGIN, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TITEM, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TEND, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOITEM, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_TNOPERM, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_BLOG_CATS_ID, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_SYSTEM_WEBSITES_ID, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_ERROR1, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_ERROR2, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_ERROR3, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_ERROR4, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_ERROR5, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_ERROR6, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_REDIRECT1, '');
wgSystem::defPostValue(BlogTemplatesModel::COL_REDIRECT2, '');
$lv = array();
$item = new BlogTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = BlogTemplatesModel::getPagerByType(pager::getPage($block), 4);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listeditforms');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listeditforms');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), BlogTemplatesModel::getSelectDatasourceForType(0));
$var['COLLIMIT'] = $item->getLimit();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1);
$var['COLVARIABLE'] = $item->getVariable();
$var['COLSOMEID'] = $item->getSomeid();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());
//$var['COLTNOPERM'] = $item->getTnoperm();
$var['FULLCATEGORIES'] = formsHelper::getSelectBox('blog_cats_id', $item->getBlogCatsId(), BlogCategoriesModel::getCategoriesForBlog($myblog), array());

$var['COLERRORA'] = $item->getError1();
$var['COLERRORB'] = $item->getError2();
$var['COLERRORC'] = $item->getError3();
$var['COLERRORD'] = $item->getError4();
$var['COLERRORE'] = $item->getError5();
$var['COLERRORF'] = $item->getError6();
$var['COLREDIRECTA'] = $item->getRedirect1();
$var['COLREDIRECTB'] = $item->getRedirect2();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('editforms', wgLang::get('editforms'), false, $tpl->getBlock($block));
// ----------- editforms end -----------
//*/



$var = array();
$system['parse']['content'] = $tab->getAll();
?>