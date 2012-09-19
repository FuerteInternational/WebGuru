<?php
/**
 * Generate class for module Phonebook
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. February 2009
 */

		
class generatePhonebook {
		
	public function __construct() {
		
	}
	
	/*public function generateCats($params) {
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
	}*/
	
	public function generatePeople($params) {
		$temp = JoshtrayTemplatesModel::getTemplateByIdentifierType($params[3], 0);
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new JoshtrayPeopleModel());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new JoshtrayPeopleModel());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new JoshtrayPeopleModel());
		if (!(bool) $temp->getSearch()) {
			$pg = "['data']";
			$ds = 'JoshtrayPeopleModel::getPeoplePager('.$temp->getPerpage().', pager::getPage(\'jtp1\'))';
		}
		else {
			$pg = NULL;
			$ds = 'JoshtrayPeopleModel::searchPeople(wgGet::getValue(\'search\'))';
		}
		$data['modules'][] = 'phonebook';
		$data['content'] = '<?php
$arr = '.$ds.';
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
	
	public function generateDetail($p) {
		$identifier = valid::safeText($p[3]);
		$temp = JoshtrayTemplatesModel::getTemplateByIdentifierType($identifier, 1);
		if (empty($temp)) return false;
		
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new JoshtrayPeopleModel());
		$notemp = wgParse::parseFrontendTemplate($temp->getTempend(), new JoshtrayPeopleModel());
		
		$ds = (int) $temp->getPerpage();
		if ($ds == 0) $ds = JoshtrayTemplatesModel::getOneDatasource(1, $ds, "wgGet::getValue('person')");
		if ($ds == 1) $ds = JoshtrayTemplatesModel::getOneDatasource(1, $ds);
		if ($ds == 2) $ds = JoshtrayTemplatesModel::getOneDatasource(1, $ds);
		
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
		
	
}
?>