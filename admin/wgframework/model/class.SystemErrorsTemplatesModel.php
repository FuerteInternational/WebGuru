<?php
/**
 * Database class for table system_errors_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_errors_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        21. July 2009 17:47:50
 */

class SystemErrorsTemplatesModel extends BaseSystemErrorsTemplatesModel {
	
	public static function getTemplate($identifier) {
		$identifier = valid::safeText($identifier);
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else return false;
	}
	
	public static function getSelfData() {
		$id = (int) $idPromotion;
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($id) {
		$id = (int) $id;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($ret[0]) && !empty($ret[0])) return $ret[0];
		else return new SystemErrorsTemplatesModel();
	}
		
}
?>