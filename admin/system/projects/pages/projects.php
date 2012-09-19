<?php
/**
 * Page projects for module Projects
 * 
 * @package      WebGuru3
 * @subpackage   modules/projects/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        13. June 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- projects (Block: projects) start -----------
$block = 'projects';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

if (wgSystem::isRequest('mycat')) wgSessions::setPageValue('mycat', wgSystem::getRequestValue('mycat'));
$mycat = (int) wgSessions::getPageValue('mycat');

$var['FULLMYCAT'] = formsHelper::getSelectBox('mycat', $mycat, ProjectsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('allprojects'));

$var['BREADCRUMBS'] = ProjectsCategoriesModel::getBreadcrumbs($mycat, ' &raquo; ');

$var['ACTION'] = wgPaths::makePageLink('editproject', 'cat='.$mycat);

$var['ACTIONNAME'] = 'projectsprojects';


$lv = array();
$item = new ProjectsItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = ProjectsItemsModel::getProjectsPager(pager::getPage($block), $mycat);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listprojects');
	$lv['LNAME'] = $val->getName();
	$lv['LVIEWS'] = $val->getViews();
	$lv['LDATE'] = wgSystem::formatDate($val->getDate());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME'], 'editproject'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listprojects');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'projectsprojects') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('projects', wgLang::get('projects'), true, $tpl->getBlock($block));
// ----------- projects end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>