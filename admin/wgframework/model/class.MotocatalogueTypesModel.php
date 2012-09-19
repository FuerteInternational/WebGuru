<?php
/**
 * Database class for table motocatalogue_types
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/motocatalogue_types
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. May 2009 17:55:49
 */

class MotocatalogueTypesModel extends BaseMotocatalogueTypesModel {
	
	public static function getTypes() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		$arr = parent::doSelect($conn);
		$new = array();
		foreach ($arr as $type) $new[$type->getName()] = $type->getName();
		return $new; 
	}
	
}
?>