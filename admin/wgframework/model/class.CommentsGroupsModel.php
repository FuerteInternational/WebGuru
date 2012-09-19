<?php
/**
 * Database class for table comments_groups
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/comments_groups
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class CommentsGroupsModel extends BaseCommentsGroupsModel {
	
	public static function getGroups() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_SYSTEM_LANGUAGE_ID, wgLang::getLanguageId());
		//$conn->where(parent::COL_SYSTEM_WEBSITES_ID, wgSystem::getCurrentWebsite());
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
}
?>