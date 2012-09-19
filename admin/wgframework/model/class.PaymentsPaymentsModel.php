<?php
/**
 * Database class for table payments_payments
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/payments_payments
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. March 2009 10:43:55
 */

class PaymentsPaymentsModel extends BasePaymentsPaymentsModel {
	
	public static function getPaymentsSumForService($service=0, $percent=100) {
		$id = (int) $service;
		$percent = (int) $percent;
		if (!(bool) $percent) return 0;
		if ($percent > 100) $percent = 100;
		$conn = new wgConnector();
		$conn->where(parent::COL_PAYMENTS_SERVICES_ID, $id);
		$arr = parent::doSelect($conn);
		$total = 0;
		foreach ($arr as $v) $total += $v->getAmmount();
		if ($percent != 100) $total = ($total * ($percent*0.01));
		return round($total, 3);
	}
	
	public static function getPayments() {
		$conn = new wgConnector();
		$conn->order(parent::COL_CHANGED, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function getPager($service=0, $page=0, $limit=30) {
		$id = (int) $service;
		$page = (int) $page;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->order(parent::COL_CHANGED, 'DESC');
		if ((bool) $id) $conn->where(parent::COL_PAYMENTS_SERVICES_ID, $id);
		return parent::doPager($conn, $page, $limit);
	}
	
	
}
?>