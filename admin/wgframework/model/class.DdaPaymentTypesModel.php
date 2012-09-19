<?php
/**
 * Database class for table dda_payment_types
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/dda_payment_types
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. May 2009 10:03:21
 */

class DdaPaymentTypesModel extends BaseDdaPaymentTypesModel {
	
	public static function getTypesBySort() {
		$conn = new wgConnector();
		$conn->order(parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
}
?>