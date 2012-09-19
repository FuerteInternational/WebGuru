<?php
/**
 * Database class for table payments_fundings
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/payments_fundings
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. March 2009 10:43:55
 */

class PaymentsFundingsModel extends BasePaymentsFundingsModel {
	
	public static function getUsedPercentage($service) {
		$id = (int) $service;
		$conn = new wgConnector();
		$conn->where(parent::COL_PAYMENTS_SERVICES_ID, $id);
		$res = parent::doSelect($conn);
		$total = 0;
		foreach ($res as $v) $total += $v->getPercent();
		return $total;
	}
	
	public static function getPercentage($id) {
		$id = (int) $id;
		$res = parent::doSelectPKey($id);
		return $res->getPercent();
	}
	
	
}
?>