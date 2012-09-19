<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'editarticleblogposts';

$myblog = (int) wgSessions::getModuleValue('myblog');
if (!(bool) $myblog) {
	$blogs = BlogModel::doSelect();
	$count = count($blogs);
	if ($count > 1) { wgError::add('selectblogfirst');
		wgPaths::redirect(wgPaths::makePageLink('categories'));
	}
	elseif ($count == 1) {
		$myblog = $blogs[0]->getId();
		wgSessions::setModuleValue('myblog', $myblog);
	}
	else { wgError::add('setupblogfirst');
		wgPaths::redirect(wgPaths::makePageLink('settings'));
	}
}
$mycat = (int) wgSessions::getModuleValue('mycat');

// set default values for columns here
wgSystem::defPostValue(BlogPostsModel::COL_BLOG_ID, $myblog);
wgSystem::defPostValue(BlogPostsModel::COL_EXCERPT, '');
wgSystem::defPostValue(BlogPostsModel::COL_CONTENT_FILTERED, '');
wgSystem::defPostValue(BlogPostsModel::COL_PARENT, '');
wgSystem::defPostValue(BlogPostsModel::COL_MENU_ORDER, '');
wgSystem::defPostValue(BlogPostsModel::COL_POST_TYPE, '');
wgSystem::defPostValue(BlogPostsModel::COL_BLOG_GROUPS_ID, '');
wgSystem::defPostValue(BlogPostsModel::COL_CATEGORY, '');
wgSystem::defPostValue(BlogPostsModel::COL_BLOG_CATEGORIES_ID, $mycat);
wgSystem::defPostValue(BlogPostsModel::COL_STATUS, '');

if (!(bool) wgGet::getValue('edit')) {
	$item = new BlogPostsModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = BlogPostsModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting post (blogpostsa) -----------------------------
$block = 'blogpostsa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['FULLBLOGGROUPSID'] = formsHelper::getSelectBox('blog_groups_id', $item->getBlogGroupsId(), BlogGroupsModel::getGroupsForBlog($myblog), array(), wgLang::get('nogroup'));
$var['COLEXCERPT'] = wgParse::decode($item->getExcerpt());
$var['COLCONTENT'] = wgParse::decode($item->getContent());
$var['COLTITLE'] = wgParse::decode($item->getTitle());
$carr = BlogCategoriesModel::getCategoriesForBlog($myblog);
if (empty($carr)) { wgError::add('setupcatsfirst');
	wgPaths::redirect(wgPaths::makePageLink('categories'));
}
$var['FULLCATEGORY'] = formsHelper::getSelectBox('blog_categories_id', $item->getBlogCategoriesId(), $carr);
$var['FULLCOLSTATUS'] = formsHelper::getCheckBox('status', $item->getStatus(), 1);
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('post'), true, $tpl->getBlock($block));

// ----------------------------- starting settings (blogpostsb) -----------------------------
$block = 'blogpostsb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['COLID'] = $item->getId();
$var['FULLBLOGID'] = formsHelper::getSelectBox('blog_id', $item->getBlogId(), BlogModel::doSelect());
$var['COLPASSWORD'] = $item->getPassword();
$var['COLNAME'] = $item->getName();
$var['COLCONTENTFILTERED'] = $item->getContentFiltered();
$var['COLPARENT'] = $item->getParent();
$var['COLMENUORDER'] = $item->getMenuOrder();
$var['FULLFEATURED'] = formsHelper::getCheckBox('featured', $item->getFeatured(), 1);
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('postsettings'), false, $tpl->getBlock($block));

// --------------------------------- files content -----------------------------------

$block = 'projectsitemsd';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLUPLOAD'] = backendHelper::getMultipleFileHtml(wgLang::get('file'), 5, 'blogFiles');
$var = wgSystem::getFormCallback($var);

$arr = BlogFilesModel::getFilesForPost($item->getId());
if (!empty($arr)) foreach ($arr as $v) {
	$tpl->setCurrentBlock('fileslist');
	//$v = new ProjectsImagesModel();
	$vl = array();
	$vl['THUMB'] = wgIcons::getFileIco($v->getName(), $v->getName());
	$vl['NAME'] = $v->getName();
	$vl['VIEWS'] = $v->getViews();
	$vl['DOWNLOADS'] = $v->getDownloads();
	$vl['DOWNLOAD'] = wgIcons::getButton('filesave', $v->getName(), '#');
	$vl['DELETEROW'] = wgIcons::getButton('delete', $v->getName(), wgPaths::makeTableDeleteLink($v->getId(), 'edit='.$item->getId().'&amp;type=file&amp;act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($vl);
	$tpl->parseBlock('fileslist');
}


$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('files'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'pagetabscontainer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['EDIT'] = $item->getPrimaryKey();
// inserting tabs into the main template
$var['PAGETABSCONTENT'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>