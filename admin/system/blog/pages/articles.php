<?php
/**
 * Page articles for module Blog
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

// ----------- articles (Block: articles) start -----------
$block = 'articles';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = $block.'actionname';

$var['ACTION'] = wgPaths::makePageLink('editarticle');

if (wgSystem::isRequest('myblog')) wgSessions::setModuleValue('myblog', wgSystem::getRequestValue('myblog'));
$myblog = (int) wgSessions::getModuleValue('myblog');

$blogs = BlogModel::doSelect();
if (!(bool) $myblog && !empty($blogs)) {
	wgSessions::setModuleValue('myblog', $blogs[0]->getId());
	$myblog = (int) wgSessions::getModuleValue('myblog');
}
if (empty($blogs)) wgError::add('setupblogfirst');

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);


if (wgSystem::isRequest('mycat')) wgSessions::setModuleValue('mycat', wgSystem::getRequestValue('mycat'));
$mycat = (int) wgSessions::getModuleValue('mycat');

$cats = BlogCategoriesModel::getCategoriesForBlog($myblog);
if (!(bool) $mycat && !empty($cats)) {
	wgSessions::setModuleValue('mycat', $blogs[0]->getId());
	$mycat = (int) wgSessions::getModuleValue('mycat');
}
if (empty($cats)) { wgError::add('setupcatsfirst');
	wgSessions::setModuleValue('mycat', 0);
	$mycat = (int) wgSessions::getModuleValue('mycat');
}

$var['FULLMYCAT'] = formsHelper::getSelectBox('mycat', $mycat, $cats);


$lv = array();
$item = new BlogPostsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = BlogPostsModel::getArticlesPagerInCat(pager::getPage($block), $mycat, $myblog);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listarticles');
	$lv['LBLOGCATEGORIESID'] = $val->getBlogCategoriesId();
	$lv['LBLOGGROUPSID'] = $val->getBlogGroupsId();
	$lv['LTITLE'] = valid::cutText($val->getTitle(), 200);
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getTitle(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME'], 'editarticle'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getTitle(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listarticles');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'articlesarticles') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('articles', wgLang::get('articles'), true, $tpl->getBlock($block));
// ----------- articles end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>