<?php
/**
 * Database class for table system_validations
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_validations
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class SystemValidationsModel extends BaseSystemValidationsModel {
	
	private static $_validations = array();
	
	public static function getValidationTypes() {
		$conn = new wgConnector();
		$conn->order(parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function getFullValidation($id, $var) {
		$val = self::_getValidations();
		if (!isset($val[$id])) return 'false';
		else {
			$data = NULL;
			if ((bool) $val[$id]->getRevert()) $data .= '!';
			if ((bool) $val[$id]->getRegex()) $data .= 'preg_match(\''.$val[$id]->getRegex().'\', '.$var.')';
			else if ((bool) $val[$id]->getFunction()) $data .= $val[$id]->getFunction().'('.$var.')';
			return $data;
		}
	}
	
	private static function _getValidations() {
		if (!empty(self::$_validations)) return self::$_validations;
		$arr = self::getValidationTypes();
		foreach ($arr as $v) self::$_validations[$v->getId()] = $v;
		return self::$_validations;
	}
	
	
}
?>