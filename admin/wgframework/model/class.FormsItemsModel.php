<?php
/**
 * Database class for table forms_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/forms_items
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class FormsItemsModel extends BaseFormsItemsModel {
	
	private static $_cache = array();
	
	public static function getFormByIdFromCache($id) {
		if (!isset(self::$_cache['formscache'][$id])) {
			$form = FormsItemsModel::doSelectPKey($id);
			if (!(bool) $form) return false;
			self::$_cache['formscache'][$id] = $form;
		}
		return self::$_cache['formscache'][$id];
	}
	
	public static function getFormByIdentifier($identifier) {
		$identifier = valid::safeText($identifier);
		if (!(bool) $identifier) return array();
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else return array();
	}
	
	
}
?>