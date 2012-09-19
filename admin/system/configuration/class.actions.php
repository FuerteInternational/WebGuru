<?php
/**
 * Action class for module Configuration
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

class actionsConfiguration extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['doconfigfilesjob'] = array('doConfigfilesJob', 'configfiles');
		$func['dowebsitesjob'] = array('doWebsitesJob', 'websites');
		$func['dolanguagesjob'] = array('doLanguagesJob', 'languages');
		$func['doupdatesjob'] = array('doUpdatesJob', 'updates');
		$func['docustomizationjob'] = array('doCustomizationJob', 'customization');
		
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
		$class = new configurationActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doConfigfilesJob function description
	 *
	 * @name _doConfigfilesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doConfigfilesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.configfiles.php');
		$class = new configurationActionsConfigfiles();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doWebsitesJob function description
	 *
	 * @name _doWebsitesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doWebsitesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.websites.php');
		$class = new configurationActionsWebsites();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doLanguagesJob function description
	 *
	 * @name _doLanguagesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doLanguagesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.languages.php');
		$class = new configurationActionsLanguages();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doUpdatesJob function description
	 *
	 * @name _doUpdatesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doUpdatesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.updates.php');
		$class = new configurationActionsUpdates();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCustomizationJob function description
	 *
	 * @name _doCustomizationJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCustomizationJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.customization.php');
		$class = new configurationActionsCustomization();
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