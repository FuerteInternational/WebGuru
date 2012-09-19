<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        25. November 2008
 */
final class templatestemplatesActionsPages extends BaseActions {
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
		self::$_par['modonepage'] = wgPost::getValue('modonepage');
		self::$_par['tabonename'] = wgPost::getValue('tabonename');
		
		parent::__construct();
		
		self::$_par = array();
		self::$_par['edit'] = 0;
		
		// init the process
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool
	 */
	private function _init() {
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
			if ($mand) {
				$ok = (bool) self::doSavePagesTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeletePagesTemplates(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		parent::$_onSaveParam = array('page'=>'templates');       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		parent::$_onDeleteParam = 'edit='.self::$_par['edit'];     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	private static function doSavePagesTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['master'] = (int) wgPost::getValue('master');
		$save['registered'] = (int) wgPost::getValue('registered');
		$save['system_language_id'] = wgPost::getValue('system_language_id');
		$save['pages_templates_groups_id'] = wgPost::getValue('pages_templates_groups_id');
		$save['template'] = wgPost::getValue('template');
		$save['note'] = wgPost::getValue('note');
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			self::$_par['edit'] = $save['where'];
			return (bool) PagesTemplatesModel::doUpdate($save);
		}
		else {
			self::$_par['edit'] = PagesTemplatesModel::doInsert($save);
			return (bool) self::$_par['edit'];
		}
	}

	private static function doDeletePagesTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(PagesTemplatesModel::PRIMARY_KEY, $id);
		//return (bool) PagesTemplatesModel::doDelete($conn);
		return (bool) PagesTemplatesModel::doDelete($id);
	}
	
}

?>