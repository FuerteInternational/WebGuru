<?php
/**
 * Database class for table imessages_fields
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/imessages_fields
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        1. February 2010 13:10:55
 */

class ImessagesFieldsModel extends BaseImessagesFieldsModel {
	
	public static function getEmailFieldForForm($formId) {
		$arr = self::getSelfFormData($formId);
		foreach ($arr as $v) if ($v->getFieldtype() == 1) return $v->getFcode();
		return false;
	}
	
	public static function getFieldTypes($selected=0) {
		$out = NULL;
		$arr = array();
		$arr[0] = 'Text field';
		$arr[1] = 'Email field';
		$arr[2] = 'Subject';
		$arr[3] = 'URL';
		$arr[4] = 'Checkbox (1 or 0)';
		foreach ($arr as $k=>$v) {
			if ($k == $selected) $sel = ' selected="selected"';
			else $sel = NULL;
			$out .= '<option value="'.$k.'"'.$sel.'>'.$v.'</option>';
		}
		return $out;
	}
	
	public static function validateUserField($fieldId, $userId=NULL) {
		$field = self::getOneSelfData($fieldId);
		return (bool) ImessagesFormsModel::validateUserForm($field->getImessagesFormsId(), $userId);
	}
	
	public static function createBasicFields($formId) {
		$save = array();
		$save['imessages_forms_id'] = (int) $formId;
		$save['validation'] = 0;
		$save['mandatory'] = 0;
		
		$save['name'] = 'Name';
		$save['fcode'] = 'name';
		$save['fieldtype'] = 0;
		$save['sort'] = 500;
		parent::doInsert($save);
		
		$save['name'] = 'Email';
		$save['fcode'] = 'email';
		$save['fieldtype'] = 1;
		$save['sort'] = 400;
		parent::doInsert($save);
		
		$save['name'] = 'Subject';
		$save['fcode'] = 'subject';
		$save['fieldtype'] = 2;
		$save['sort'] = 300;
		parent::doInsert($save);
		
		$save['name'] = 'Message';
		$save['fcode'] = 'message';
		$save['fieldtype'] = 0;
		$save['sort'] = 200;
		return (bool) parent::doInsert($save);
	}
	
	public static function deleteFieldsForForm($formId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IMESSAGES_FORMS_ID, (int) $formId);
		return (int) parent::doDelete($conn);
	}
	
	public static function deleteField($fieldId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, (int) $fieldId);
		return (int) parent::doDelete($conn);
	}
	
	// --------------------- Predefined functions for ImessagesFields ---------------------

	public static function getSelfFormData($formId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IMESSAGES_FORMS_ID, (int) $formId);
		$conn->order(parent::COL_SORT, 'DESC');
		return parent::doSelect($conn);
	}
	
	/*
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	public static function getOneSelfData($idImessagesFields) {
		$id = (int) $idImessagesFields;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new ImessagesFieldsModel();
	}
	
}
?>