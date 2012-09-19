<?php
/**
 * Database class for table motocatalogue_brands
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/motocatalogue_brands
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. May 2009 17:55:49
 */

class MotocatalogueBrandsModel extends BaseMotocatalogueBrandsModel {
	
	public static function getBrands() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		$arr = parent::doSelect($conn);
		$new = array();
		foreach ($arr as $brand) $new[$brand->getName()] = $brand->getName();
		return $new;
	}
	
	
}
?>