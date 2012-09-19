<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/youtube/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        3. March 2009
 */
final class templateslistsActionsYoutube extends BaseActions {
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
		self::$_par['edit'] = 0;
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
		self::$_par['edit'] = 0;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
			if ($mand) {
				$ok = (bool) self::doSaveSystemTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteSystemTemplates(wgGet::getValue('delete'));
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
	 * Save/Update function for table "system_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveSystemTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['module'] = 'youtube';
		$save['pager'] = wgPost::getValue('pager');
		$save['limit'] = wgPost::getValue('limit');
		$save['temptype'] = wgPost::getValue('temptype');
		$save['datasource'] = wgPost::getValue('datasource');
		$save['group1'] = wgPost::getValue('group1');
		$save['group2'] = wgPost::getValue('group2');
		$save['group3'] = wgPost::getValue('group3');
		$save['var1'] = wgPost::getValue('var1');
		$save['var2'] = wgPost::getValue('var2');
		$save['var3'] = wgPost::getValue('var3');
		$save['begin1'] = wgPost::getValue('begin1');
		$save['item1'] = wgPost::getValue('item1');
		$save['end1'] = wgPost::getValue('end1');
		$save['notemp1'] = wgPost::getValue('notemp1');
		$save['begin2'] = wgPost::getValue('begin2');
		$save['item2'] = wgPost::getValue('item2');
		$save['end2'] = wgPost::getValue('end2');
		$save['notemp2'] = wgPost::getValue('notemp2');
		$save['int1'] = wgPost::getValue('int1');
		$save['int2'] = wgPost::getValue('int2');
		$save['int3'] = wgPost::getValue('int3');
		$save['tint1'] = wgPost::getValue('tint1');
		$save['tint2'] = wgPost::getValue('tint2');
		$save['tint3'] = wgPost::getValue('tint3');
		$save['changed'] = 'NOW()';
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) SystemTemplatesModel::doUpdate($save);
		}
		else {
			$save['added'] = 'NOW()';
			$id = (int) SystemTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "system_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteSystemTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) SystemTemplatesModel::doDelete($id);
	}
	
}

?>