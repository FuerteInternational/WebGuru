<?php
/**
 * Action class for module iBlog
 * 
 * @package      WebGuru3
 * @subpackage   modules/iblog/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        10. November 2009
 */

class actionsIblog extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['doblogsjob'] = array('doBlogsJob', 'blogs');
		$func['dopostsjob'] = array('doPostsJob', 'posts');
		$func['dogalleriesjob'] = array('doGalleriesJob', 'galleries');
		$func['dopicturesjob'] = array('doPicturesJob', 'pictures');
		$func['doprofilesjob'] = array('doProfilesJob', 'profiles');
		$func['dosettingsjob'] = array('doSettingsJob', 'settings');
		$func['dotemplatesjob'] = array('doTemplatesJob', 'templates');
		$func['dousersjob'] = array('doUsersJob', 'users');
		$func['dodevicesjob'] = array('doDevicesJob', 'devices');
		
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
		$class = new iblogActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doBlogsJob function description
	 *
	 * @name _doBlogsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doBlogsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.blogs.php');
		$class = new iblogActionsBlogs();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doPostsJob function description
	 *
	 * @name _doPostsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doPostsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.posts.php');
		$class = new iblogActionsPosts();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doGalleriesJob function description
	 *
	 * @name _doGalleriesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doGalleriesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.galleries.php');
		$class = new iblogActionsGalleries();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doPicturesJob function description
	 *
	 * @name _doPicturesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doPicturesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.pictures.php');
		$class = new iblogActionsPictures();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doProfilesJob function description
	 *
	 * @name _doProfilesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doProfilesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.profiles.php');
		$class = new iblogActionsProfiles();
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
		$class = new iblogActionsSettings();
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
		$class = new iblogActionsTemplates();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doUsersJob function description
	 *
	 * @name _doUsersJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doUsersJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.users.php');
		$class = new iblogActionsUsers();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doDevicesJob function description
	 *
	 * @name _doDevicesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doDevicesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.devices.php');
		$class = new iblogActionsDevices();
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