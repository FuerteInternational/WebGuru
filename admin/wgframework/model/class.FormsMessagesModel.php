<?php
/**
 * Database class for table forms_messages
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/forms_messages
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class FormsMessagesModel extends BaseFormsMessagesModel {
	
	private static $_cache = array();
	
	public static function getMessagesPagerForGroup($group, $page=0) {
		$conn = new wgConnector();
		$conn->where(parent::COL_FORMS_MESSAGES_GROUPS_ID, $group);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page);
	}
	
	public static function addMessage($form, $data) {
		$id = (int) $form;
		if (!(bool) $id) return false;
		$form = FormsItemsModel::doSelectPKey($id);
		$xml = xml::arrayToXml($data);
		$save = array();
		$save['forms_items_id'] = $id;
		$save['forms_messages_groups_id'] = $form->getFormsMessagesGroupId();
		$save['data'] = $xml;
		$save['added'] = 'NOW()';
		return (int) parent::doInsert($save);
	}
	
	
}
?>