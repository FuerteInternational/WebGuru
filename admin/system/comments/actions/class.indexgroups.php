<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/actions
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */
final class indexgroupsActionsComments extends BaseActions {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct() {
		parent::__construct();
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = NULL;      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		
		// filling parameters with data
		self::$_par = array();
		//Array
		
		// init the process
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool Success
	 */
	private function _init() {
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveCommentsGroups();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCommentsGroups(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "comments_groups"
	 *
	 * @return bool Success
	 */
	private static function doSaveCommentsGroups() {
		$save = array();
		$save['system_websites_id'] = (int) wgSystem::getCurrentWebsite();
		$save['system_language_id'] = (int) wgLang::getLanguageId();
		$save['name'] = wgPost::getValue('name');
		$save['registered'] = (int) wgPost::getValue('registered');
		$save['parameter'] = wgPost::getValue('parameter');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) CommentsGroupsModel::doUpdate($save);
		}
		else return (bool) CommentsGroupsModel::doInsert($save);
	}

	/**
	 * Delete function for table "comments_groups"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCommentsGroups($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) CommentsGroupsModel::doDelete($id);
	}
	
}

?>