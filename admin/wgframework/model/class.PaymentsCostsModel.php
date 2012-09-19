<?php
/**
 * Database class for table payments_costs
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/payments_costs
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. March 2009 10:43:55
 */

class PaymentsCostsModel extends BasePaymentsCostsModel {
	
	public static function getAllCosts() {
		$conn = new wgConnector();
		$conn->order(parent::COL_COSTS, 'DESC');
		return parent::doSelect($conn);
	}
	
	
}
?>