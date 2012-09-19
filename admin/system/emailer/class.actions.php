<?php
/**
 * Action class for module Emailer
 * 
 * @package      WebGuru3
 * @subpackage   modules/emailer/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. January 2009
 */

class actionsEmailer extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['dogroupsjob'] = array('doGroupsJob', 'groups');
		$func['doeditmailjob'] = array('doEditmailJob', 'editmail');
		$func['dosubscibtionsjob'] = array('doSubscibtionsJob', 'subscibtions');
		$func['dounsubscriptionsjob'] = array('doUnsubscriptionsJob', 'unsubscriptions');
		
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
		$class = new emailerActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doGroupsJob function description
	 *
	 * @name _doGroupsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doGroupsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.groups.php');
		$class = new emailerActionsGroups();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doEditmailJob function description
	 *
	 * @name _doEditmailJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doEditmailJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.editmail.php');
		$class = new emailerActionsEditmail();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doSubscibtionsJob function description
	 *
	 * @name _doSubscibtionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doSubscibtionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.subscibtions.php');
		$class = new emailerActionsSubscibtions();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doUnsubscriptionsJob function description
	 *
	 * @name _doUnsubscriptionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doUnsubscriptionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.unsubscriptions.php');
		$class = new emailerActionsUnsubscriptions();
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