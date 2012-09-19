<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        11. December 2008
 */
final class edittemplatepagestemplatesActionsPages extends BaseActions {
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
		parent::$_onSaveParam = array('page'=>'templates');       // After save
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
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "pages_templates"
	 *
	 * @return bool Success
	 */
	private static function doSavePagesTemplates() {
		global $mod;
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(str_replace('_', '-', wgPost::getValue('identifier')));
		$save['master'] = wgPost::getValue('master');
		$save['registered'] = wgPost::getValue('registered');
		$save['system_language_id'] = wgPost::getValue('system_language_id');
		$save['pages_templates_groups_id'] = wgPost::getValue('pages_templates_groups_id');
		$save['template'] = wgPost::getValue('template');
		$save['note'] = wgPost::getValue('note');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$mPag = $mod->runModule('pages');
			$save['revision'] = (modulePages::getTemplateRevision($save['where']) + 1);
			$ok = (bool) PagesTemplatesModel::doUpdate($save);
			$id = $save['where'];
		}
		else {
			$save['revision'] = 1;
			$ok = (int) PagesTemplatesModel::doInsert($save);
			$id = $ok;
		}
		if (isset($save['where'])) unset($save['where']);
		$save['pages_templates_id'] = $id;
		$save['added'] = 'NOW()';
		PagesTemplatesRevisionsModel::doInsert($save);
		return (bool) $ok;
	}

	/**
	 * Delete function for table "pages_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
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