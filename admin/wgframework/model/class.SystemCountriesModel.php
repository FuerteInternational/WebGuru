<?php
/**
 * Database class for table system_countries
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_countries
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class SystemCountriesModel extends BaseSystemCountriesModel {
	
	public static function getCountries() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	
}
?>