<?php
/**
 * Database class for table nato3mcat_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/nato3mcat_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        29. September 2009 11:28:50
 */

class Nato3mcatTemplatesModel extends BaseNato3mcatTemplatesModel {
	
	
	// --------------------- Predefined functions for Nato3mcatTemplates ---------------------

	public static function getTemplateByIdentifierAndType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, wgText::safeText($identifier));
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new Nato3mcatTemplatesModel();
	}

	public static function getSelfData($templateType=0) {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_TEMPTYPE, (int) $templateType);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20, $templateType=0) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_TEMPTYPE, (int) $templateType);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idNato3mcatTemplates) {
		$id = (int) $idNato3mcatTemplates;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new Nato3mcatTemplatesModel();
	}
	
}
?>