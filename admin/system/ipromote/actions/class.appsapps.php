<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/ipromote/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. August 2009
 */
final class appsappsActionsIpromote extends BaseActions {
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
			if (!(bool) wgPost::getValue('name')) { 
				wgError::add('noname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('link')) { 
				wgError::add('nolink');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveIpromoteApps();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteIpromoteApps(wgGet::getValue('delete'));
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
	 * Save/Update function for table "ipromote_apps"
	 *
	 * @return bool Success
	 */
	private static function doSaveIpromoteApps() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['ipromote_campaigns_id'] = (int) wgSessions::getModuleValue('mypromo');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['link'] = wgPost::getValue('link');
		$save['head'] = wgPost::getValue('head');
		$save['description'] = wgPost::getValue('description');
		$save['sort'] = (int) wgPost::getValue('sort');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			$ok = (bool) IpromoteAppsModel::doUpdate($save);
		}
		else {
			$id = (int) IpromoteAppsModel::doInsert($save);
			self::$_par['edit'] = $id;
			$ok = (bool) $id;
		}
		if ((bool) $ok) {
			if (isset($_FILES['smallico']['name'])) {
				$filename = wgIo::getUserfilesFilename('ipromote', 'app', $id, 'small', 'empty.png');
				wgIo::uploadFile($filename, $_FILES['smallico']['tmp_name'], wgPaths::getUserfilesPath());
			}
			if (isset($_FILES['bigico']['name'])) {
				$filename = wgIo::getUserfilesFilename('ipromote', 'app', $id, 'big', 'empty.png');
				wgIo::uploadFile($filename, $_FILES['bigico']['tmp_name'], wgPaths::getUserfilesPath());
			}
		}
		return $ok;
	}

	/**
	 * Delete function for table "ipromote_apps"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteIpromoteApps($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) IpromoteAppsModel::doDelete($id);
	}
	
}

?>