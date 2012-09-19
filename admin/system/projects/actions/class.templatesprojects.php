<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/projects/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. July 2009
 */
final class templatesprojectsActionsProjects extends BaseActions {
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
		if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveProjectsTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteProjectsTemplates(wgGet::getValue('delete'));
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
	 * Save/Update function for table "projects_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveProjectsTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['pager'] = (int) wgPost::getValue('pager');
		$save['perpage'] = (int) wgPost::getValue('perpage');
		$save['search'] = (int) wgPost::getValue('search');
		$save['variable1'] = wgPost::getValue('variable1');
		$save['variable2'] = wgPost::getValue('variable2');
		$save['dateformat'] = wgPost::getValue('dateformat');
		$save['linkformat'] = wgPost::getValue('linkformat');
		$save['seo'] = (int) wgPost::getValue('seo');
		$save['datasource'] = (int) wgPost::getValue('datasource');
		$save['projects_categories_id'] = (int) wgPost::getValue('projects_categories_id');
		$save['sorting'] = wgPost::getValue('sorting');
		$save['tbegin'] = wgPost::getValue('tbegin');
		$save['titem1'] = wgPost::getValue('titem1');
		$save['titem2'] = wgPost::getValue('titem2');
		$save['titem3'] = wgPost::getValue('titem3');
		$save['titem4'] = wgPost::getValue('titem4');
		$save['titem5'] = wgPost::getValue('titem5');
		$save['tend'] = wgPost::getValue('tend');
		$save['tnoitem'] = wgPost::getValue('tnoitem');
		$save['temptype'] = (int) wgPost::getValue('temptype');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) ProjectsTemplatesModel::doUpdate($save);
		}
		else {
			$id = (int) ProjectsTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "projects_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteProjectsTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) ProjectsTemplatesModel::doDelete($id);
	}
	
}

?>