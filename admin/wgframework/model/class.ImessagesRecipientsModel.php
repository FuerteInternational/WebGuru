<?php
/**
 * Database class for table imessages_recipients
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/imessages_recipients
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        1. February 2010 13:10:57
 */

class ImessagesRecipientsModel extends BaseImessagesRecipientsModel {
	
	
	// --------------------- Predefined functions for ImessagesRecipients ---------------------

	public static function getSelfData($formId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IMESSAGES_FORMS_ID, (int) $formId);
		$conn->order(parent::COL_MAIL, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function deleteMailsForForm($formId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IMESSAGES_FORMS_ID, (int) $formId);
		return (int) parent::doDelete($conn);
	}
	
	public static function saveMailsForForm($formId, $mail) {
		$save = array();
		$save['mail'] = $mail;
		$save['imessages_forms_id'] = (int) $formId;
		return (int) parent::doInsert($save);
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
	
	/*
	public static function getOneSelfData($idImessagesRecipients) {
		$id = (int) $idImessagesRecipients;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new ImessagesRecipientsModel();
	}
	//*/
	
}
?>