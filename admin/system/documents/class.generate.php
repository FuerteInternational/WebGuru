<?php
/**
 * Generate class for module Documents
 * 
 * @package      WebGuru3
 * @subpackage   modules/documents/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. February 2009
 */

		
class generateDocuments {
		
	public function __construct() {
		
	}
	
	public function generateCats($params) {
		$temp = DocumentsTemplatesModel::getTemplateByIdentifierType($params[3], 0);
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new DocumentsCategoriesModel());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new DocumentsCategoriesModel());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new DocumentsCategoriesModel());
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = DocumentsTemplatesModel::getOneDatasource(0, $ds, "wgGet::getValue('cat')", $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 1) $ds = DocumentsTemplatesModel::getOneDatasource(0, $ds, "wgGet::getValue('cat')", $temp->getPerpage());
		if ($ds == 2) $ds = DocumentsTemplatesModel::getOneDatasource(0, $ds, $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 3) $ds = DocumentsTemplatesModel::getOneDatasource(0, $ds, $temp->getPerpage());
		if ($ds == 4) $ds = DocumentsTemplatesModel::getOneDatasource(0, $ds, $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 5) $ds = DocumentsTemplatesModel::getOneDatasource(0, $ds, $temp->getPerpage());
		if ((bool) $ds[1]) $pg = "['data']";
		else $pg = NULL;
		$data['modules'][] = 'documents';
		$data['content'] = '<?php
$arr = '.$ds[0].';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateDocs($params) {
		$temp = DocumentsTemplatesModel::getTemplateByIdentifierType($params[3], 1);
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new DocumentsItemsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new DocumentsItemsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new DocumentsItemsModel());
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = DocumentsTemplatesModel::getOneDatasource(1, $ds, "wgGet::getValue('cat')", $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 1) $ds = DocumentsTemplatesModel::getOneDatasource(1, $ds, "wgGet::getValue('cat')", $temp->getPerpage());
		if ($ds == 2) $ds = DocumentsTemplatesModel::getOneDatasource(1, $ds, $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 3) $ds = DocumentsTemplatesModel::getOneDatasource(1, $ds, $temp->getPerpage());
		if ($ds == 4) $ds = DocumentsTemplatesModel::getOneDatasource(1, $ds, $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 5) $ds = DocumentsTemplatesModel::getOneDatasource(1, $ds, $temp->getPerpage());
		if ((bool) $ds[1]) $pg = "['data']";
		else $pg = NULL;
		$data['modules'][] = 'documents';
		$data['pretext'] = 'if ((bool) wgGet::getValue(\'download\')) moduleDocuments::downloadDocument(wgGet::getValue(\'download\'));
';
		$data['content'] = '<?php
$arr = '.$ds[0].';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateFavs($params) {
		$temp = DocumentsTemplatesModel::getTemplateByIdentifierType($params[3], 1);
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new DocumentsItemsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new DocumentsItemsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new DocumentsItemsModel());
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) $ds = DocumentsTemplatesModel::getOneDatasource(3, $ds, $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 1) $ds = DocumentsTemplatesModel::getOneDatasource(3, $ds, $temp->getPerpage());
		if ($ds == 2) $ds = DocumentsTemplatesModel::getOneDatasource(3, $ds, $temp->getId().$params[3], $temp->getPerpage());
		if ($ds == 3) $ds = DocumentsTemplatesModel::getOneDatasource(3, $ds, $temp->getPerpage());
		if ((bool) $ds[1]) $pg = "['data']";
		else $pg = NULL;
		$data['modules'][] = 'documents';
		$data['unique'][] = '';
		$data['pretext'] = 'if ((bool) wgGet::getValue(\'download\')) moduleDocuments::downloadDocument(wgGet::getValue(\'download\'));
';
		$data['content'] = '<?php
$arr = '.$ds[0].';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateDetail($params) {
		return 'Hurrrraaaaa :-) aaaaaaaaaaaaaaaaaaaaaaaaaa hu '.$params.'<br />';
	}
	
	
	
}
?>