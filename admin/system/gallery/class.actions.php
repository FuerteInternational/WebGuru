<?php
/**
 * Action class for module Gallery
 * 
 * @package      WebGuru3
 * @subpackage   modules/gallery/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        1. June 2009
 */

class actionsGallery extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['docategoriesjob'] = array('doCategoriesJob', 'categories');
		$func['dophotosjob'] = array('doPhotosJob', 'photos');
		$func['dodetailsjob'] = array('doDetailsJob', 'details');
		$func['dotemplatesjob'] = array('doTemplatesJob', 'templates');
		$func['dosettingsjob'] = array('doSettingsJob', 'settings');
		
		// END: functions-list ----------------------------------------------------------------
		$funcname = parent::_init($func, $parameters);
		$ok = false;
		if ((bool) $funcname && method_exists($this, $funcname)) $ok = $this->$funcname($parameters);
		else parent::_reportError($funcname, __FILE__);
		wgPaths::moduleRedirect(NULL, !$ok);
	}
	
	// SYSTEM: functions ----------------------------------------------------------------------

	/**
	 * This is the _doIndexJob function description
	 *
	 * @name _doIndexJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doIndexJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.index.php');
		$class = new galleryActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCategoriesJob function description
	 *
	 * @name _doCategoriesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCategoriesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.categories.php');
		$class = new galleryActionsCategories();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doPhotosJob function description
	 *
	 * @name _doPhotosJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doPhotosJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.photos.php');
		$class = new galleryActionsPhotos();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doDetailsJob function description
	 *
	 * @name _doDetailsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doDetailsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.details.php');
		$class = new galleryActionsDetails();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doTemplatesJob function description
	 *
	 * @name _doTemplatesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doTemplatesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.templates.php');
		$class = new galleryActionsTemplates();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doSettingsJob function description
	 *
	 * @name _doSettingsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doSettingsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.settings.php');
		$class = new galleryActionsSettings();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	
	
	// END: functions ----------------------------------------------------------------------
	
}
		
?>