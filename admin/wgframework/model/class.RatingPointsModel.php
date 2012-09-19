<?php
/**
 * Database class for table rating_points
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/rating_points
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        21. May 2009 12:09:51
 */

class RatingPointsModel extends BaseRatingPointsModel {
	
	public static function getRating($id) {
		// SELECT total_votes, total_value, used_ips FROM $rating_dbname.$rating_tableName WHERE id='$id';
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, wgText::safeText($id));
		//$conn->where(parent::COL_RATING_POINTS_GROUPS_ID, (int) $group);
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new RatingPointsModel();
	}
	
	public static function createNewRating($id) {
		// INSERT INTO $rating_dbname.$rating_tableName (`id`, `total_votes`, `total_value`, `used_ips`) VALUES ('$id', '0', '0', '')
		$conn = new wgConnector();
		$conn->data(parent::COL_ID, wgText::safeText($id));
		$conn->data(parent::COL_TOTAL_VOTES, 0);
		$conn->data(parent::COL_TOTAL_VALUE, 0);
		$conn->data(parent::COL_USED_IPS, '');
		$conn->data(parent::COL_ADDED, 'NOW()');
		return (int) parent::doInsert($conn);
	}
	
	public static function verifyIp($id) {
		// SELECT used_ips FROM $rating_dbname.$rating_tableName WHERE used_ips LIKE '%".$ip."%' AND id='".$id."';
		$conn = new wgConnector();
		$conn->where(parent::COL_USED_IPS, '%'.wgIpTools::getUserIp().'%', 'LIKE');
		$conn->where(parent::COL_ID, wgText::safeText($id));
		return (bool) parent::doCount($conn);
	}
	
	
	
}
?>