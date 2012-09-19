<?php
/**
 * Database class for table forms_fields
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/forms_fields
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class FormsFieldsModel extends BaseFormsFieldsModel {
	
	public static function deleteFieldsForForm($form) {
		$id = (int) $form;
		if (!(bool) $form) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_FORMS_ITEMS_ID, $id);
		parent::doDelete($conn);
		return true;
	}
	
	public static function getFieldsForForm($form) {
		$id = (int) $form;
		if (!(bool) $form) return array();
		$conn = new wgConnector();
		$conn->where(parent::COL_FORMS_ITEMS_ID, $id);
		$conn->order(parent::COL_SORT, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function getFFTypes() {
		$data = array();
		$data['text'] = wgLang::get('text');
		$data['password'] = wgLang::get('password');
		$data['number'] = wgLang::get('number');
		$data['checkbox'] = wgLang::get('checkbox');
		$data['radio'] = wgLang::get('radio');
		$data['file'] = wgLang::get('file');
		$data['captcha'] = wgLang::get('captcha');
		return $data;
	}
	
	public static function getFValidationTypes() {
		$data = array();
		$data[1] = wgLang::get('empty');
		$data[2] = wgLang::get('mail');
		return $data;
	}
	
	public static function getFErrorTypes() {
		$data = array();
		$data[1] = wgLang::get('error');
		$data[2] = wgLang::get('alert');
		return $data;
	}
	
	
}
?>