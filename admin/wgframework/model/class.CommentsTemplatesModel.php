<?php
/**
 * Database class for table comments_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/comments_templates
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        27. February 2009 12:39:28
 */

class CommentsTemplatesModel extends BaseCommentsTemplatesModel {
	
	public static function getTemplatesByType($type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
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
	
	public static function getPagerByType($page=0, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page);
	}
		
}
?>