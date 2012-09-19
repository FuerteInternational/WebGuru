<?php
/**
 * Database class for table joshtray_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/joshtray_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        25. February 2009 17:17:44
 */

class JoshtrayTemplatesModel extends BaseJoshtrayTemplatesModel {

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
	
	public static function getSelectDataForType($type=0) {
		$arr = self::getDatasourcesForType($type);
		$new = array();
		foreach ($arr as $k=>$d) $new[$k] = $d[1];
		return $new;
	}
	
	public static function getOneDatasource($type, $id, $a='',$b='', $c='') {
		$arr = self::getDatasourcesForType($type);
		return array(sprintf($arr[$id][2], $a, $b ,$c), $arr[$id][0]);
	}
	
	public static function getDatasourcesForType($type=0) {
		$type = (int) $type;
		$arr = array();
		if ($type == 1) {
			$arr[0] = array(0, 'URL var (?person=X)', 'JoshtrayPeopleModel::doSelectPKey((int) %s)');
			$arr[1] = array(0, wgLang::get('latest'), 'JoshtrayPeopleModel::getLatestPerson()');
			$arr[2] = array(0, wgLang::get('random'), 'JoshtrayPeopleModel::getRandomPerson()');
		}
		return $arr;
	}
	
	public static function getTemplatesPagerByType($type=0, $page=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page);
	}
	
}
?>