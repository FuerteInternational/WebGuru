<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/blogger/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        11. June 2009
 */
final class commentscommentsActionsBlogger extends BaseActions {
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
		
		self::$_par = array();
		self::$_par['edit'] = 0;
		
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
				$ok = (bool) self::doSaveBloggerAccounts();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteBloggerAccounts(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "blogger_accounts"
	 *
	 * @return bool Success
	 */
	private static function doSaveBloggerAccounts() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['password'] = wgPost::getValue('password');
		$save['blogid'] = wgPost::getValue('blogid');
		$save['note'] = wgPost::getValue('note');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) BloggerAccountsModel::doUpdate($save);
		}
		else {
			$id = (int) BloggerAccountsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "blogger_accounts"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteBloggerAccounts($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) BloggerAccountsModel::doDelete($id);
	}
	
}

?>