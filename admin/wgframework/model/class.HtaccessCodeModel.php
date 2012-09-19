<?php
/**
 * Database class for table htaccess_code
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/htaccess_code
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        17. February 2009 11:25:42
 */

class HtaccessCodeModel extends BaseHtaccessCodeModel {
	
	public static function getCodes() {
		$data = parent::doSelect();
		return $data;
	}
	
	
}
?>