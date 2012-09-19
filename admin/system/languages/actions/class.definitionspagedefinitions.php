<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */
final class definitionspagedefinitionsActionsLanguages extends BaseActions {
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
				$ok = (bool) self::doSaveLanguagesDefinitions();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteLanguagesDefinitions(wgGet::getValue('delete'));
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
	 * Save/Update function for table "languages_definitions"
	 *
	 * @return bool Success
	 */
	private static function doSaveLanguagesDefinitions() {
		$save = array();
		$save['name'] = (string) strtoupper(valid::safeText(wgPost::getValue('name')));
		$save['minchar'] = (int) wgPost::getValue('minchar');
		$save['maxchar'] = (int) wgPost::getValue('maxchar');
		$save['pages_id'] = (int) wgPost::getValue('pages_id');
		$save['isglobal'] = (int) wgPost::getValue('isglobal');
		$save['system_websites_id'] = (int) wgSystem::getCurrentWebsite();
		$save['enabled'] = (int) wgPost::getValue('enabled');
		$save['default_lang_id'] = (int) wgPost::getValue('default_lang_id');
		$save['default_text'] = (String) wgPost::getValue('default_text');
		$save['allowhtml'] = (int) wgPost::getValue('allowhtml');
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) LanguagesDefinitionsModel::doUpdate($save);
		}
		else {
			$id = (int) LanguagesDefinitionsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "languages_definitions"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteLanguagesDefinitions($id) {
		LanguagesDefinitionsModel::deleteDefinition($id);
	}
	
}

?>