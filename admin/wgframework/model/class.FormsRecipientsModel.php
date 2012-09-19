<?php
/**
 * Database class for table forms_recipients
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/forms_recipients
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. March 2009 16:55:47
 */

class FormsRecipientsModel extends BaseFormsRecipientsModel {
	
	public static function deleteRecipients($form) {
		$id = (int) $form;
		$db = new wgConnector();
		$db->where(parent::COL_FORMS_ITEMS_ID, $id);
		return parent::doDelete($db);
	}
	
	public static function getRecipientsForForm($form) {
		$id = (int) $form;
		$db = new wgConnector();
		$db->where(parent::COL_FORMS_ITEMS_ID, $id);
		$db->order(parent::COL_MAIL);
		return parent::doSelect($db);
	}
	
}
?>