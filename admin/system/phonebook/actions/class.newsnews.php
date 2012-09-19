<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */
final class newsnewsActionsPhonebook extends BaseActions {
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
				$ok = (bool) self::doSaveJoshtrayNews();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteJoshtrayNews(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "joshtray_news"
	 *
	 * @return bool Success
	 */
	private static function doSaveJoshtrayNews() {
		$save = array();
		$save['joshtray_people_id'] = wgUsers::getId();
		$save['joshtray_groups_id'] = wgPost::getValue('joshtray_groups_id');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$save['name'] = wgPost::getValue('name');
		$save['message'] = wgPost::getValue('message');
		$save['show'] = wgPost::getValue('show');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) JoshtrayNewsModel::doUpdate($save);
		}
		else return (bool) JoshtrayNewsModel::doInsert($save);
	}

	/**
	 * Delete function for table "joshtray_news"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteJoshtrayNews($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(JoshtrayNewsModel::PRIMARY_KEY, $id);
		//return (bool) JoshtrayNewsModel::doDelete($conn);
		return (bool) JoshtrayNewsModel::doDelete($id);
	}
	
}

?>