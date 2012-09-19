<?php
/**
 * Database class for table motocatalogue_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/motocatalogue_items
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. May 2009 17:55:49
 */

class MotocatalogueItemsModel extends BaseMotocatalogueItemsModel {
	
	public static function getYears() {
		$data = array();
		$data[] = 'neuvedeno';
		$data[] = 'př.n.l.';
		for ($i = (int) date('Y'); $i > 1920; $i--) $data[$i] = $i;
		return $data;
	}
	
	public static function getStates() {
		$arr = array();
		$arr[wgLang::get('motonew')] = wgLang::get('motonew');
		$arr[wgLang::get('motoused')] = wgLang::get('motoused');
		$arr[wgLang::get('motorefurbished')] = wgLang::get('motorefurbished');
		return $arr;
	}
	
	public static function getAvailability() {
		$arr = array();
		$arr['skladem'] = 'skladem';
		$arr['do 3 dnů'] = 'do 3 dnů';
		$arr['do týdne'] = 'do týdne';
		$arr['do 14ti dnů'] = 'do 14ti dnů';
		$arr['do měsíce'] = 'do měsíce';
		$arr['neuvedeno'] = 'neuvedeno';
		$arr['na dotaz'] = 'na dotaz';
		return $arr;
	}
	
	public static function getVehicles() {
		return parent::doSelect();
	}
	 
	
}
?>