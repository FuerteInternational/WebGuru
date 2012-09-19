<?php
/**
 * Action class for module Payments
 * 
 * @package      WebGuru3
 * @subpackage   modules/payments/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        2. March 2009
 */

class actionsPayments extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['docustomersjob'] = array('doCustomersJob', 'customers');
		$func['docostsjob'] = array('doCostsJob', 'costs');
		$func['dooutstandingjob'] = array('doOutstandingJob', 'outstanding');
		$func['dopermissionsjob'] = array('doPermissionsJob', 'permissions');
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
	 * @author Ondra Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doIndexJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.index.php');
		$class = new paymentsActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCustomersJob function description
	 *
	 * @name _doCustomersJob
	 * @author Ondra Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCustomersJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.customers.php');
		$class = new paymentsActionsCustomers();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCostsJob function description
	 *
	 * @name _doCostsJob
	 * @author Ondra Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCostsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.costs.php');
		$class = new paymentsActionsCosts();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doOutstandingJob function description
	 *
	 * @name _doOutstandingJob
	 * @author Ondra Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doOutstandingJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.outstanding.php');
		$class = new paymentsActionsOutstanding();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doPermissionsJob function description
	 *
	 * @name _doPermissionsJob
	 * @author Ondra Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doPermissionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.permissions.php');
		$class = new paymentsActionsPermissions();
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
	 * @author Ondra Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doSettingsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.settings.php');
		$class = new paymentsActionsSettings();
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