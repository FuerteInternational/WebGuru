<?php
/**
 * Generate class for module Blog
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. June 2009
 */

		
class generateBlog {
		
	public function __construct() {
		
	}
	
	public function generateCatlist($p) {
		$temp = BlogTemplatesModel::getTemplateByIdentifierType($p[3], 2);
		//$temp = new BlogTemplatesModel();
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new BlogPostsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new BlogPostsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new BlogPostsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new BlogPostsModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = '$id = '.(int) $temp->getBlogCatsId().';
$order = \'ASC\';';
		elseif ($ds == 1) $ds = '$id = '.(int) $temp->getBlogCatsId().';
$order = \'DESC\';';
		elseif ($ds == 2) $ds = 'if (isset($_GET[\''.$temp->getVariable().'\'])) $id = (int) $_GET[\''.$temp->getVariable().'\'];
$order = \'ASC\';';
		elseif ($ds == 3) $ds = 'if (isset($_GET[\''.$temp->getVariable().'\'])) $id = (int) $_GET[\''.$temp->getVariable().'\'];
$order = \'DESC\';';
		elseif ($ds == 4) $ds = '$id = (int) $temp->getId();
$order = \'ASC\';';
		elseif ($ds == 5) $ds = '$id = (int) $temp->getId();
$order = \'DESC\';';

		$data = array();
		$data['modules'][] = 'blog';
		$data['pretext'] = '';
		$data['content'] = '<?php
if (isset($v)) $temp = $v;
$id = 0;
'.$ds.';
$cats = BlogCategoriesModel::getSubCategoriesForBlog($id, '.$temp->getBlogId().', $order);
if (!empty($cats) && is_array($cats)) {
	?>'.$begin.'<?php
	foreach ($cats as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
$cats = array();
$v = NULL;
if (isset($temp)) {
	$v = $temp;
	$temp = NULL;
}
?>';
		return $data;
	}
	
	public function generateList($p) {
		$temp = BlogTemplatesModel::getTemplateByIdentifierType($p[3], 0);
		//$temp = new BlogTemplatesModel();
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new BlogPostsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new BlogPostsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new BlogPostsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new BlogPostsModel());
		$ds = (int) $temp->getDatasource();
		if ($ds == 1 || $ds == 3) $order = 'DESC';
		else $order = 'ASC';
		$pager = NULL;
		$pg = NULL;
		$page = NULL;
		if ((bool) $temp->getPager()) {
			$pager = 'Pager';
			$pg = '[\'data\']';
			$page = 'wgGet::getValue(\'from\'), ';
		}
		$id = NULL;
		if ($ds == 2 || $ds == 3) {
			$cat = '$id';
			$id = '$id = (int) (isset($_GET[\''.$temp->getSomeid().'\']) ? $_GET[\''.$temp->getSomeid().'\'] : 0);'.NL;
		}
		else $cat = (int) $temp->getBlogCatsId();
		$limit = (int) $temp->getLimit();
		if (!(bool) $limit) $limit = 30;
		if ((bool) $temp->getSearch()) {
			$ds = $id.'if (isset($_GET[\''.$temp->getVariable().'\'])) $arr = BlogPostsModel::getFrontendArticlesSearch'.$pager.'($_GET[\''.$temp->getVariable().'\'], '.$page.$cat.', \''.$order.'\', '.$limit.', $date);
else $arr = array();';
		}
		else {
			$ds = $id.'$arr = BlogPostsModel::getFrontendArticles'.$pager.'('.$page.$cat.', \''.$order.'\', '.$limit.', $date)';
		}
		$data = array();
		$data['modules'][] = 'blog';
		$data['pretext'] = '';
		
		$data['content'] = '<?php
$date = isset($_GET[\'date\']) ? $_GET[\'date\'] : NULL;
'.$ds.';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
$arr = array();		
?>';
		return $data;
	}
	
	public function generateFiles($p) {
		$temp = BlogTemplatesModel::getTemplateByIdentifierType($p[3], 7);
		if (!(bool) $temp) return false;
		
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new BlogFilesModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new BlogFilesModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new BlogFilesModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new BlogFilesModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = 'if (isset($_GET[\''.$temp->getVariable().'\'])) $id = (int) $_GET[\''.$temp->getVariable().'\'];
$order = \'ASC\';';
		elseif ($ds == 1) $ds = 'if (isset($_GET[\''.$temp->getVariable().'\'])) $id = (int) $_GET[\''.$temp->getVariable().'\'];
$order = \'DESC\';';
		elseif ($ds == 2) $ds = '$id = (int) $temp->getId();
$order = \'ASC\';';
		elseif ($ds == 3) $ds = '$id = (int) $temp->getId();
$order = \'DESC\';';
		
		$data = array();
		$data['modules'][] = 'blog';
		$data['pretext'] = 'if ((bool) wgGet::getValue(\'download\')) moduleBlog::downloadFile(wgGet::getValue(\'download\'));
if ((bool) wgGet::getValue(\'view\')) moduleBlog::viewFile(wgGet::getValue(\'view\'));';
		
		$data['content'] = '<?php
if (isset($v)) $temp = $v;
$id = 0;
'.$ds.';
$files = BlogFilesModel::getFilesForPost($id, $order);
if (!empty($files) && is_array($files)) {
	?>'.$begin.'<?php
	foreach ($files as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
$files = array();
$v = NULL;
if (isset($temp)) {
	$v = $temp;
	$temp = NULL;
}
?>';
		return $data;
	}
	
	public function generateArchive($p) {
		$temp = BlogTemplatesModel::getTemplateByIdentifierType($p[3], 3);
		if (!(bool) $temp) return false;
		
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new BlogPostsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new BlogPostsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new BlogPostsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new BlogPostsModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = '$order = \'ASC\';';
		elseif ($ds == 1) $ds = '$order = \'DESC\';';
		
		$data = array();
		$data['modules'][] = 'blog';
		$data['pretext'] = '';
		
		$data['content'] = '<?php
'.$ds.';
$arr = BlogPostsModel::getArchives(NULL, $order, \''.$temp->getVariable().'\');
if (!empty($arr) && is_array($arr)) {
	?>'.$begin.'<?php
	foreach ($arr as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
$arr = array();
$v = NULL;
?>';
		return $data;
	}
	
	public function generateDetail($p) {
		$temp = BlogTemplatesModel::getTemplateByIdentifierType($p[3], 1);
		//$temp = new BlogTemplatesModel();
		if (!(bool) $temp) return false;
		
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new BlogPostsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new BlogPostsModel());
		
		$nonetemp = NULL;
		$none = NULL;
		/*
		if (!(bool) $temp->getUseedit()) $nonetemp = '?>'.$none.'<?php';
		else $none = 'if (!(bool) $v->getId()) header(\'HTTP/1.0 404 Not Found\');';
		//*/
		$ds = (int) $temp->getDatasource();
		$cat = (int) $temp->getBlogCatsId();
		
		if ($ds == 0) $ds = '$id = (int) isset($_GET[\''.$temp->getVariable().'\']) ? $_GET[\''.$temp->getVariable().'\'] : 0;
$v = BlogPostsModel::doSelectPKey($id);';
		elseif ($ds == 1) $ds = '$id = (int) isset($'.$temp->getVariable().') ? $'.$temp->getVariable().' : 0;
$v = BlogPostsModel::doSelectPKey($id);';
		elseif ($ds == 2) $ds = '$v = BlogPostsModel::getLatestOne('.$cat.');';
		elseif ($ds == 3) $ds = '$v = BlogPostsModel::getRandomOne('.$cat.');';
		
		$data = array();
		$data['modules'][] = 'blog';
		$data['pretext'] = ''.$ds.'
$system[\'data\'][\'blog\'][\'detail\'][\''.$p[3].'\'] = $v;
$system[\'data\'][\'blog\'][\'cat\'][\''.$p[3].'\'] = $v;
$system[\'seo\'][\'title\'] = $v->getTitle();
$system[\'seo\'][\'h1\'] = $v->getTitle();
$system[\'seo\'][\'description\'] = wgText::doFilter($v->getExcerpt());
'.$none;
		
		$data['content'] = '<?php
$v = &$system[\'data\'][\'blog\'][\'detail\'][\''.$p[3].'\'];
if (!empty($v) && (bool) $v->getId()) {
	?>'.$item.'<?php
}
else { ?>'.$nonetemp.'<?php }
$v = array();		
?>';
		return $data;
	}
	
	public function generateCatdetail($p) {
		$temp = BlogTemplatesModel::getTemplateByIdentifierType($p[3], 5);
		//$temp = new BlogTemplatesModel();
		if (!(bool) $temp) return false;
		
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new BlogCategoriesModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new BlogCategoriesModel());
		
		$nonetemp = NULL;
		$none = NULL;
		
		/*
		if (!(bool) $temp->getUseedit()) $nonetemp = '?>'.$none.'<?php';
		else $none = 'if (!(bool) $v->getId()) header(\'HTTP/1.0 404 Not Found\');';
		//*/
		$ds = (int) $temp->getDatasource();
		$cat = (int) $temp->getBlogCatsId();
		
		if ($ds == 0) $ds = '$id = (int) isset($_GET[\''.$temp->getVariable().'\']) ? $_GET[\''.$temp->getVariable().'\'] : 0;
$v = BlogCategoriesModel::doSelectPKey($id);';
		elseif ($ds == 1) $ds = '$id = (int) isset($_GET[\''.$temp->getVariable().'\']) ? $_GET[\''.$temp->getVariable().'\'] : 0;
$v = BlogCategoriesModel::doSelectPKey($id);';
		elseif ($ds == 2) $ds = '$v = BlogCategoriesModel::doSelectPKey('.$cat.');';
		
		$data = array();
		
		$data['modules'][] = 'blog';
		
		$data['pretext'] = ''.$ds.'
$system[\'data\'][\'blog\'][\'cat\'][\''.$p[3].'\'] = $v;
$system[\'seo\'][\'title\'] = $v->getName();
$system[\'seo\'][\'h1\'] = $v->getName();
$system[\'seo\'][\'description\'] = wgText::doFilter($v->getHead());
'.$none;
		
		$data['content'] = '<?php
$v = &$system[\'data\'][\'blog\'][\'cat\'][\''.$p[3].'\'];
if (!empty($v) && (bool) $v->getId()) {
	?>'.$item.'<?php
}
else { ?>'.$nonetemp.'<?php }
$v = array();		
?>';
		return $data;
	}
	
	
}
?>