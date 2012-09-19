<?php
/**
 * Database class for table dda_firmy
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/dda_firmy
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. May 2009 17:14:09
 */

class DdaFirmyModel extends BaseDdaFirmyModel {
	
	public static function getTypesOfCompanies() {
		$arr = array();
		$arr['S.R.O.'] = 'S.R.O.';
		$arr['A.S.'] = 'A.S.';
		$arr['Zivnostnik'] = 'Zivnostnik';
		return $arr;
	}
	
	public static function getFirmyByName() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getJmenoFirmyById($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		$ret = parent::doSelect($conn);
		return $ret[0]->getName();
	}
	
}
?>