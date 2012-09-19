<?php
/**
 * Page groups for module Blog
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. June 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'groupsgroups';

if (wgSystem::isRequest('myblog')) wgSessions::setModuleValue('myblog', wgSystem::getRequestValue('myblog'));
$myblog = (int) wgSessions::getModuleValue('myblog');

$blogs = BlogModel::doSelect();
if (!(bool) $myblog && !empty($blogs)) {
	wgSessions::setModuleValue('myblog', $blogs[0]->getId());
	$myblog = (int) wgSessions::getModuleValue('myblog');
}
if (empty($blogs)) wgError::add('setupblogfirst');

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);

wgSystem::defPostValue(BlogGroupsModel::COL_BLOG_CATEGORIES_ID, (int) wgSessions::getModuleValue('mycat'));
wgSystem::defPostValue(BlogGroupsModel::COL_BLOG_ID, $myblog);
$lv = array();
$item = new BlogGroupsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = BlogGroupsModel::getGroupsPagerForBlog(pager::getPage($block), $myblog, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'groupsgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLBLOGCATEGORIESID'] = $item->getBlogCategoriesId();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLHEAD'] = $item->getHead();
$var['COLDESCRIPTION'] = $item->getDescription();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), true, $tpl->getBlock($block));
// ----------- groups end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>