<?php
/**
 * Generate class for module News
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        19. February 2009
 */

		
class generateNews {
		
	public function __construct() {
		
	}
	
	public function generateList($p) {
		$identifier = valid::safeText($p[3]);
		$temp = NewsTemplatesModel::getTemplateByIdentifierType($identifier, 0);
		if (empty($temp)) return false;
		
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new NewsItemsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new NewsItemsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new NewsItemsModel());
		$notemp = wgParse::parseFrontendTemplate($temp->getNotemp(), new NewsItemsModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = NewsTemplatesModel::getOneDatasource(0, $ds, "wgGet::getValue('newscat')", $temp->getId().$p[3], $temp->getPerpage());
		if ($ds == 1) $ds = NewsTemplatesModel::getOneDatasource(0, $ds, "wgGet::getValue('newscat')", $temp->getPerpage());
		if ($ds == 2) $ds = NewsTemplatesModel::getOneDatasource(0, $ds, $temp->getAddid(), $temp->getId().$p[3], $temp->getPerpage());
		if ($ds == 3) $ds = NewsTemplatesModel::getOneDatasource(0, $ds, $temp->getAddid(), $temp->getPerpage());
		if ($ds == 4) $ds = NewsTemplatesModel::getOneDatasource(0, $ds, $temp->getId().$p[3], $temp->getPerpage());
		if ($ds == 5) $ds = NewsTemplatesModel::getOneDatasource(0, $ds, $temp->getPerpage());
		if ((bool) $ds[1]) $pg = "['data']";
		else $pg = NULL;
		
		$data = array();
		$data['modules'][] = 'news';
		$data['pretext'] = '';
		$data['content'] = '<?php
$arr = '.$ds[0].';
if (!empty($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) { ?>'.$item.'<?php }
	?>'.$end.'<?php
}
else { ?>'.$notemp.'<?php }
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateDetail($p) {
		$identifier = valid::safeText($p[3]);
		$temp = NewsTemplatesModel::getTemplateByIdentifierType($identifier, 1);
		if (empty($temp)) return false;
		
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new NewsItemsModel());
		$notemp = wgParse::parseFrontendTemplate($temp->getNotemp(), new NewsItemsModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = NewsTemplatesModel::getOneDatasource(1, $ds, "wgGet::getValue('article')");
		if ($ds == 1) $ds = NewsTemplatesModel::getOneDatasource(1, $ds, $temp->getAddid());
		if ($ds == 2) $ds = NewsTemplatesModel::getOneDatasource(1, $ds);
		if ($ds == 3) $ds = NewsTemplatesModel::getOneDatasource(1, $ds, $temp->getAddid());
		if ($ds == 4) $ds = NewsTemplatesModel::getOneDatasource(1, $ds);
		if ($ds == 5) $ds = NewsTemplatesModel::getOneDatasource(1, $ds, $temp->getAddid());
		
		$data = array();
		$data['modules'][] = 'news';
		$data['pretext'] = '';
		$data['content'] = '<?php
$v = '.$ds[0].';
if (!empty($v)) { ?>'.$item.'<?php }
else { ?>'.$notemp.'<?php }
$v = NULL;
?>';
		return $data;
	}
	
	public function generateCatlist($p) {
		$identifier = valid::safeText($p[3]);
		$temp = NewsTemplatesModel::getTemplateByIdentifierType($identifier, 2);
		if (empty($temp)) return false;
		
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new NewsCategoriesModel());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new NewsCategoriesModel());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new NewsCategoriesModel());
		$notemp = wgParse::parseFrontendTemplate($temp->getNotemp(), new NewsCategoriesModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = NewsTemplatesModel::getOneDatasource(2, $ds, "wgGet::getValue('newscat')", $temp->getId().$p[3], $temp->getPerpage());
		if ($ds == 1) $ds = NewsTemplatesModel::getOneDatasource(2, $ds, "wgGet::getValue('newscat')", $temp->getPerpage());
		if ($ds == 2) $ds = NewsTemplatesModel::getOneDatasource(2, $ds, $temp->getAddid(), $temp->getId().$p[3], $temp->getPerpage());
		if ($ds == 3) $ds = NewsTemplatesModel::getOneDatasource(2, $ds, $temp->getAddid(), $temp->getPerpage());
		if ($ds == 4) $ds = NewsTemplatesModel::getOneDatasource(2, $ds, $temp->getId().$p[3], $temp->getPerpage());
		if ($ds == 5) $ds = NewsTemplatesModel::getOneDatasource(2, $ds, $temp->getPerpage());
		if ((bool) $ds[1]) $pg = "['data']";
		else $pg = NULL;
		
		$data = array();
		$data['modules'][] = 'news';
		$data['pretext'] = '';
		$data['content'] = '<?php
$arr = '.$ds[0].';
if (!empty($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) { ?>'.$item.'<?php }
	?>'.$end.'<?php
}
else { ?>'.$notemp.'<?php }
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	
}
?>