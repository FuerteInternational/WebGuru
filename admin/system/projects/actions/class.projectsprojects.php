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
 * @since        13. June 2009
 */
final class projectsprojectsActionsProjects extends BaseActions {
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
				$ok = (bool) self::doSaveProjectsItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteProjectsItems(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = 'page=project';       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "projects_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveProjectsItems() {
		$save = array();
		$save['projects_categories_id'] = wgPost::getValue('projects_categories_id');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['client'] = wgPost::getValue('client');
		$save['link'] = wgPost::getValue('link');
		$save['info'] = wgPost::getValue('info');
		$save['views'] = wgPost::getValue('views');
		$save['date'] = wgPost::getValue('date');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$save['h1'] = wgPost::getValue('h1');
		$save['title'] = wgPost::getValue('title');
		$save['mkeywords'] = wgPost::getValue('mkeywords');
		$save['mdescription'] = wgPost::getValue('mdescription');
		$save['h2'] = wgPost::getValue('h2');
		$save['h3'] = wgPost::getValue('h3');
		$save['text1'] = wgPost::getValue('text1');
		$save['text2'] = wgPost::getValue('text2');
		$save['text3'] = wgPost::getValue('text3');
		$save['text4'] = wgPost::getValue('text4');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) ProjectsItemsModel::doUpdate($save);
		}
		else {
			$id = (int) ProjectsItemsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "projects_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteProjectsItems($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) ProjectsItemsModel::doDelete($id);
	}
	
}

?>