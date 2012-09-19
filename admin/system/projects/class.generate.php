<?php
/**
 * Generate class for module Projects
 * 
 * @package      WebGuru3
 * @subpackage   modules/projects/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        13. June 2009
 */

		
class generateProjects {
		
	public function __construct() {
		
	}
	
	public function generateDetail($p) {
		$temp = ProjectsTemplatesModel::getTemplateByIdentifierType($p[3], 1);
		//$temp = new ProjectsTemplatesModel();
		if (empty($temp)) return NULL;
		
		$item = wgParse::parseFrontendTemplate($temp->getTitem1(), new ProjectsItemsModel());
		$nonetemp = wgParse::parseFrontendTemplate($temp->getTnoitem(), new ProjectsItemsModel());
		
		if (!(bool) $temp->getPager()) {
			$none = NULL;
			$nonetemp = '?>'.$nonetemp.'<?php';
		}
		else {
			$none = 'if (!(bool) $v->getId()) header(\'HTTP/1.0 404 Not Found\');';
			$nonetemp = NULL;
		}

		$ds = (int) $temp->getDatasource();
		$cat = (int) $temp->getProjectsCategoriesId();
		
		$order = $temp->getSorting();
		
		if ($ds == 0) $ds = '$id = (int) isset($_GET[\''.$temp->getVariable1().'\']) ? $_GET[\''.$temp->getVariable1().'\'] : 0;
$v = ProjectsItemsModel::doSelectPKey($id);';
		elseif ($ds == 1 || $ds == 2) $ds = '$v = ProjectsItemsModel::getLatestOne('.$cat.', \''.$order.'\');';
		elseif ($ds == 3 || $ds == 4) $ds = '$v = ProjectsItemsModel::getRandomOne('.$cat.');';
		
		$seo = NULL;
		if ($temp->getSeo()) $seo = '$system[\'seo\'][\'title\'] = $v->getTitle();
$system[\'seo\'][\'h1\'] = $v->getH1();
$system[\'seo\'][\'h2\'] = $v->getH2();
$system[\'seo\'][\'h3\'] = $v->getH3();
$system[\'seo\'][\'description\'] = wgText::doFilter($v->getMdescription());
$system[\'seo\'][\'keywords\'] = wgText::doFilter($v->getMkeywords());
		'; 
		
		$data = array();
		$data['modules'][] = 'projects';
		$data['pretext'] = ''.$ds.'
$system[\'data\'][\'projects\'][\'detail\'][\''.$p[3].'\'] = $v;'.$seo.'
'.$none;
		
		$data['content'] = '<?php
$v = &$system[\'data\'][\'projects\'][\'detail\'][\''.$p[3].'\'];
if (!empty($v) && (bool) $v->getId()) {
	?>'.$item.'<?php
}
else { '.$nonetemp.' }
$v = array();		
?>';
		return $data;
	}
	
	public function generateDetailaaaaaa($p) {
		$temp = ProjectsTemplatesModel::getTemplateByIdentifierType($p[3], 1);
		//$temp = new ProjectsTemplatesModel();
		if (empty($temp)) return NULL;
		
		$item = wgParse::parseFrontendTemplate($temp->getTitem1(), new ProjectsItemsModel());
		$nonetemp = wgParse::parseFrontendTemplate($temp->getTnoitem(), new ProjectsItemsModel());
		
		if (!(bool) $temp->getPager()) {
			$none = NULL;
			$nonetemp = '?>'.$nonetemp.'<?php';
		}
		else {
			$none = 'if (!(bool) $v->getId()) header(\'HTTP/1.0 404 Not Found\');';
			$nonetemp = NULL;
		}

		$ds = (int) $temp->getDatasource();
		$cat = (int) $temp->getProjectsCategoriesId();
		
		if ($ds == 0) $ds = '$id = (int) isset($_GET[\''.$temp->getVariable1().'\']) ? $_GET[\''.$temp->getVariable1().'\'] : 0;
$v = ProjectsItemsModel::doSelectPKey($id);';
		elseif ($ds == 1 || $ds == 2) $ds = '$v = ProjectsItemsModel::getLatestOne('.$cat.');';
		elseif ($ds == 3 || $ds == 4) $ds = '$v = ProjectsItemsModel::getRandomOne('.$cat.');';
		
		$seo = NULL;
		if ($temp->getSeo()) $seo = '$system[\'seo\'][\'title\'] = $v->getTitle();
$system[\'seo\'][\'h1\'] = $v->getH1();
$system[\'seo\'][\'h2\'] = $v->getH2();
$system[\'seo\'][\'h3\'] = $v->getH3();
$system[\'seo\'][\'description\'] = wgText::doFilter($v->getMdescription());
$system[\'seo\'][\'keywords\'] = wgText::doFilter($v->getMkeywords());
		'; 
		
		$data = array();
		$data['modules'][] = 'projects';
		$data['pretext'] = ''.$ds.'
$system[\'data\'][\'projects\'][\'detail\'][\''.$p[3].'\'] = $v;'.$seo.'
'.$none;
		
		$data['content'] = '<?php
$v = &$system[\'data\'][\'projects\'][\'detail\'][\''.$p[3].'\'];
if (!empty($v) && (bool) $v->getId()) {
	?>'.$item.'<?php
}
else { '.$nonetemp.' }
$v = array();		
?>';
		return $data;
	}
	
	public function generateList($p) {
		$temp = ProjectsTemplatesModel::getTemplateByIdentifierType($p[3], 0);
		if (empty($temp)) return NULL;
		//$temp = new ProjectsTemplatesModel();
		
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new ProjectsItemsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem1(), new ProjectsItemsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new ProjectsItemsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new ProjectsItemsModel());
		
		$ds = (int) $temp->getDatasource();
		
		$pg = NULL;
		$pager = NULL;
		$page = NULL;
		$order = $temp->getSorting();
		$limit = (int) $temp->getPerpage();
		if (!(bool) $limit) $limit = 10;
		if ((bool) $temp->getPager()) {
			$pg = "['data']";
			$pager = 'Pager';
			$page = '0, ';
		}
		$id = NULL;
		if ($ds == 2) {
			$cat = '$id';
			$id = '$id = (int) (isset($_GET[\''.$temp->getSomeid().'\']) ? $_GET[\''.$temp->getSomeid().'\'] : 0);'.NL;
		}
		else $cat = (int) $temp->getProjectsCategoriesId();
		if ((bool) $temp->getSearch()) {
			$ds = $id.'if (isset($_GET[\''.$temp->getVariable2().'\'])) $arr = ProjectsItemsModel::getFrontendProjectsSearch'.$pager.'($_GET[\''.$temp->getVariable2().'\'], '.$page.$cat.', \''.$order.'\', '.$limit.', $date);
else $arr = array();';
		}
		else $ds = $id.'$arr = ProjectsItemsModel::getFrontendProjects'.$pager.'('.$page.$cat.', \''.$order.'\', '.$limit.', $date)';
		
		$data = array();
		$data['modules'][] = 'projects';
		$data['pretext'] = '';
		$data['content'] = '<?php
$id = 0;
$date = NULL;
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
$v = NULL;
?>';
		return $data;
		
		
	}
	
}
?>