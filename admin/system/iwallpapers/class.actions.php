<?php
/**
 * Action class for module iWallpapers
 * 
 * @package      WebGuru3
 * @subpackage   modules/iwallpapers/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        26. January 2010
 */

class actionsIwallpapers extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['docategoriesjob'] = array('doCategoriesJob', 'categories');
		$func['dowallpapersjob'] = array('doWallpapersJob', 'wallpapers');
		$func['dosettingsjob'] = array('doSettingsJob', 'settings');
		$func['dotemplatesjob'] = array('doTemplatesJob', 'templates');
		
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
		$class = new iwallpapersActionsIndex();
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
		$class = new iwallpapersActionsCategories();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doWallpapersJob function description
	 *
	 * @name _doWallpapersJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doWallpapersJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.wallpapers.php');
		$class = new iwallpapersActionsWallpapers();
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
		$class = new iwallpapersActionsSettings();
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
		$class = new iwallpapersActionsTemplates();
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