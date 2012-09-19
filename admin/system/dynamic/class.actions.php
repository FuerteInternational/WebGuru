<?php
/**
 * Action class for module Dynamic
 * 
 * @package      WebGuru3
 * @subpackage   modules/dynamic/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        26. February 2009
 */

class actionsDynamic extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['doeditmodjob'] = array('doEditmodJob', 'editmod');
		$func['dosettingsjob'] = array('doSettingsJob', 'settings');
		$func['doaaaajob'] = array('doAaaaJob', 'aaaa');
		$func['dobbbbjob'] = array('doBbbbJob', 'bbbb');
		$func['doccccjob'] = array('doCcccJob', 'cccc');
		$func['doddddjob'] = array('doDdddJob', 'dddd');
		
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
		$class = new dynamicActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doEditmodJob function description
	 *
	 * @name _doEditmodJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doEditmodJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.editmod.php');
		$class = new dynamicActionsEditmod();
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
		$class = new dynamicActionsSettings();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doAaaaJob function description
	 *
	 * @name _doAaaaJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doAaaaJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.aaaa.php');
		$class = new dynamicActionsAaaa();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doBbbbJob function description
	 *
	 * @name _doBbbbJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doBbbbJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.bbbb.php');
		$class = new dynamicActionsBbbb();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCcccJob function description
	 *
	 * @name _doCcccJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCcccJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.cccc.php');
		$class = new dynamicActionsCccc();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doDdddJob function description
	 *
	 * @name _doDdddJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doDdddJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.dddd.php');
		$class = new dynamicActionsDddd();
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