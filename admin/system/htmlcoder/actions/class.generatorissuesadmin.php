<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/htmlcoder/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        22. January 2009
 */
final class generatorissuesadminActionsHtmlcoder extends BaseActions {
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
		global $mod;
		$mod->runModule('htmlcoder');
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveIssue();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteIssue(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function
	 *
	 * @return bool Success
	 */
	private static function doSaveIssue() {
		$name = valid::safeText(wgPost::getValue('name'));
		$path = wgPaths::getPath().'issues/';
		$edit = wgPost::getValue('edit');
		if ($edit == $name) return true;
		else {
			if (empty($edit)) return self::createBasicIssue($name);
			else return moduleHtmlcoder::moveIssue($edit, $name);
		}
	}

	/**
	 * Delete function
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteIssue($name) {
		return moduleHtmlcoder::deleteIssue($name);
	}
	
	private static function createBasicIssue($name) {
		$path = wgPaths::getPath().'issues/';
		wgIo::mkdir($path.$name.'/');
		wgIo::mkdir($path.$name.'/css/');
		wgIo::mkdir($path.$name.'/img/');
		return wgIo::mkdir($path.$name.'/js/');
	}
	
}

?>