<?php
/**
 * Database class for table rating_points_groups
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/rating_points_groups
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        21. May 2009 12:09:51
 */

class RatingPointsGroupsModel extends BaseRatingPointsGroupsModel {
	
	public static function getByIdentifier($identifier) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, wgText::safeText($identifier));
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new RatingPointsGroupsModel();
	}
	
	
}
?>