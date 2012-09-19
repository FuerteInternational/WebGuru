<?php
/**
 * Database class for table payments_services
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/payments_services
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. March 2009 10:43:55
 */

class PaymentsServicesModel extends BasePaymentsServicesModel {
	
	public static function getPager($cat=0, $page=0, $limit=20) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		$conn->where(parent::COL_PAYMENTS_CATEGORIES_ID, $cat);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getAllServices() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	public static function getAllServicesWithPrices() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		$arr = parent::doSelect($conn);
		$new = array();
		foreach ($arr as $v) $new[$v->getId()] = $v->getName().' ('.$v->getPrice().')';
		return $new;
	}
	
	public static function getServiceName($id) {
		$id = (int) $id;
		if (!(bool) $id) return NULL;
		$service = parent::doSelectPKey($id);
		return $service->getName();
	}
	
	public static function getServiceNamePrice($id) {
		$id = (int) $id;
		if (!(bool) $id) return NULL;
		$service = parent::doSelectPKey($id);
		return $service->getName().' ('.$service->getPrice().')';
	}
	
	public static function getPeriods($id=false) {
		$arr = array();
		$arr[0] = 'daily';
		$arr[1] = 'weekly';
		$arr[2] = 'mothly';
		$arr[3] = 'quarterly';
		$arr[4] = 'halfyearly';
		$arr[5] = 'yearly';
		if ($id == false) return $arr;
		else return $arr[(int) $id];
	}
	
	
	
}
?>