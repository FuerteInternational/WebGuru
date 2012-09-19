<?php
/**
 * Action class for module System users
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

class actionsSystemusers extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['doteamsjob'] = array('doTeamsJob', 'teams');
		$func['dopagespermissionsjob'] = array('doPagespermissionsJob', 'pagespermissions');
		$func['domodulespermissionsjob'] = array('doModulespermissionsJob', 'modulespermissions');
		$func['dowebpermissionsjob'] = array('doWebpermissionsJob', 'webpermissions');
		
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
		$class = new systemusersActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doTeamsJob function description
	 *
	 * @name _doTeamsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doTeamsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.teams.php');
		$class = new systemusersActionsTeams();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doPagespermissionsJob function description
	 *
	 * @name _doPagespermissionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doPagespermissionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.pagespermissions.php');
		$class = new systemusersActionsPagespermissions();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doModulespermissionsJob function description
	 *
	 * @name _doModulespermissionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doModulespermissionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.modulespermissions.php');
		$class = new systemusersActionsModulespermissions();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doWebpermissionsJob function description
	 *
	 * @name _doWebpermissionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doWebpermissionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.webpermissions.php');
		$class = new systemusersActionsWebpermissions();
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