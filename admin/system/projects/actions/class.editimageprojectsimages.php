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
 * @since        10. July 2009
 */
final class editimageprojectsimagesActionsProjects extends BaseActions {
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
				$ok = (bool) self::doSaveProjectsImages();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteProjectsImages(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = array('page'=>'editproject', 'edit'=>wgPost::getValue('item'));       // After save
		parent::$_onApplyParam = array('edit'=>self::$_par['edit'], 'item'=>wgPost::getValue('item'));      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "projects_images"
	 *
	 * @return bool Success
	 */
	private static function doSaveProjectsImages() {
		$save = array();
		//$save['smallid'] = wgPost::getValue('smallid');
		//$save['projects_items_id'] = wgPost::getValue('projects_items_id');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		//$save['filename'] = wgPost::getValue('filename');
		//$save['type'] = wgPost::getValue('type');
		$save['h1'] = wgPost::getValue('h1');
		$save['title'] = wgPost::getValue('title');
		$save['mdescription'] = wgPost::getValue('mdescription');
		$save['mkeywords'] = wgPost::getValue('mkeywords');
		$save['h2'] = wgPost::getValue('h2');
		$save['h3'] = wgPost::getValue('h3');
		$save['text1'] = wgPost::getValue('text1');
		$save['text2'] = wgPost::getValue('text2');
		$save['text3'] = wgPost::getValue('text3');
		$save['text4'] = wgPost::getValue('text4');
		//$save['views'] = wgPost::getValue('views');
		//$save['downloads'] = wgPost::getValue('downloads');
		//$save['size'] = wgPost::getValue('size');
		//$save['itemtype'] = wgPost::getValue('itemtype');
		$save['sort'] = wgPost::getValue('sort');
		$save['variable1'] = wgPost::getValue('variable1');
		$save['variable2'] = wgPost::getValue('variable2');
		$save['variable3'] = wgPost::getValue('variable3');
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) ProjectsImagesModel::doUpdate($save);
		}
		else {
			$id = (int) ProjectsImagesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "projects_images"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteProjectsImages($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) ProjectsImagesModel::doDelete($id);
	}
	
}

?>