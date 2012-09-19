<?php
/**
 * Action class for module Innovations Portal
 * 
 * @package      WebGuru3
 * @subpackage   modules/innoportal/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. May 2009
 */

class actionsInnoportal extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['dodashboardjob'] = array('doDashboardJob', 'dashboard');
		$func['doideasjob'] = array('doIdeasJob', 'ideas');
		$func['doratingjob'] = array('doRatingJob', 'rating');
		$func['doeditjob'] = array('doEditJob', 'edit');
		$func['dosettingsjob'] = array('doSettingsJob', 'settings');
		$func['dotemplatejob'] = array('doTemplateJob', 'template');
		
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
		$class = new innoportalActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doDashboardJob function description
	 *
	 * @name _doDashboardJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doDashboardJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.dashboard.php');
		$class = new innoportalActionsDashboard();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doIdeasJob function description
	 *
	 * @name _doIdeasJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doIdeasJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.ideas.php');
		$class = new innoportalActionsIdeas();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doRatingJob function description
	 *
	 * @name _doRatingJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doRatingJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.rating.php');
		$class = new innoportalActionsRating();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doEditJob function description
	 *
	 * @name _doEditJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doEditJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.edit.php');
		$class = new innoportalActionsEdit();
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
		$class = new innoportalActionsSettings();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doTemplateJob function description
	 *
	 * @name _doTemplateJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doTemplateJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.template.php');
		$class = new innoportalActionsTemplate();
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