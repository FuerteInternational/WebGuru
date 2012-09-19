<?php
/**
 * Page categories for module Blog
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

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'categoriescategories';

if (wgSystem::isRequest('myblog')) wgSessions::setModuleValue('myblog', wgSystem::getRequestValue('myblog'));
$myblog = (int) wgSessions::getModuleValue('myblog');

$blogs = BlogModel::doSelect();
if (!(bool) $myblog && !empty($blogs)) {
	wgSessions::setModuleValue('myblog', $blogs[0]->getId());
	$myblog = (int) wgSessions::getModuleValue('myblog');
}
if (empty($blogs)) wgError::add('setupblogfirst');

$var['FULLMYBLOG'] = formsHelper::getSelectBox('myblog', $myblog, $blogs);


wgSystem::defPostValue(BlogCategoriesModel::COL_BLOG_ID, $myblog);
$lv = array();
$item = new BlogCategoriesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = BlogCategoriesModel::getCategoriesPagerForBlog(pager::getPage($block), $myblog, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['ARTICLES'] = BlogPostsModel::getCountArticlesInCat($val->getId());
	$lv['GROUPS'] = BlogPostsModel::getCountArticlesInCat($val->getId());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLHEAD'] = $item->getHead();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLBLOGID'] = $item->getBlogId();
$pic = moduleBlog::getCategoryPicturePath($item->getId());
if ((bool) moduleBlog::isCategoryPicture($item->getId())) {
	$var['FULLDELETEIMG'] = formsHelper::getCheckBox('delthumb', 0);
	$var['HIDDEN'] = '';
}
else {
	//$var['HIDDEN'] = ' style="display:none;"';
	$var['HIDDEN'] = '';
}
$var['THUMB'] = '<img src="'.$pic.'" alt="" />';


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), true, $tpl->getBlock($block));
// ----------- categories end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>