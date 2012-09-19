<?php
/**
 * Database class for table twitter_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/twitter_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. June 2009 17:10:11
 */

class TwitterTemplatesModel extends BaseTwitterTemplatesModel {
	
	public static function getPagerByType($page, $type, $limit=20) {
		$page = (int) $page;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, (int) $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getTemplateByIdentifierType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return array();
	}
	
	
	
}
?>