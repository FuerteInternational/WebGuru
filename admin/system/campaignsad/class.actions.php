<?php
/**
 * Action class for module Campaigns Administration
 * 
 * @package      WebGuru3
 * @subpackage   modules/campaignsad/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        1. June 2009
 */

class actionsCampaignsad extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['docampaignsjob'] = array('doCampaignsJob', 'campaigns');
		$func['docodesjob'] = array('doCodesJob', 'codes');
		$func['doautodefinitionsjob'] = array('doAutodefinitionsJob', 'autodefinitions');
		$func['dotemplatesjob'] = array('doTemplatesJob', 'templates');
		$func['dopagesjob'] = array('doPagesJob', 'pages');
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
		$class = new campaignsadActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCampaignsJob function description
	 *
	 * @name _doCampaignsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCampaignsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.campaigns.php');
		$class = new campaignsadActionsCampaigns();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCodesJob function description
	 *
	 * @name _doCodesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCodesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.codes.php');
		$class = new campaignsadActionsCodes();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doAutodefinitionsJob function description
	 *
	 * @name _doAutodefinitionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doAutodefinitionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.autodefinitions.php');
		$class = new campaignsadActionsAutodefinitions();
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
		$class = new campaignsadActionsTemplates();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doPagesJob function description
	 *
	 * @name _doPagesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doPagesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.pages.php');
		$class = new campaignsadActionsPages();
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
		$class = new campaignsadActionsSettings();
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