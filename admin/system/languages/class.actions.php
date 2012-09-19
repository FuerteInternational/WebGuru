<?php
/**
 * Action class for module Languages
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */

class actionsLanguages extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['dodashboardjob'] = array('doDashboardJob', 'dashboard');
		$func['dolanguagesjob'] = array('doLanguagesJob', 'languages');
		$func['dodefinitionsjob'] = array('doDefinitionsJob', 'definitions');
		$func['doedittranslationsjob'] = array('doEdittranslationsJob', 'edittranslations');
		$func['dooutputtemplatesjob'] = array('doOutputtemplatesJob', 'outputtemplates');
		
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
		$class = new languagesActionsIndex();
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
		$class = new languagesActionsDashboard();
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
		$class = new languagesActionsLanguages();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doDefinitionsJob function description
	 *
	 * @name _doDefinitionsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doDefinitionsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.definitions.php');
		$class = new languagesActionsDefinitions();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doEdittranslationsJob function description
	 *
	 * @name _doEdittranslationsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doEdittranslationsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.edittranslations.php');
		$class = new languagesActionsEdittranslations();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doOutputtemplatesJob function description
	 *
	 * @name _doOutputtemplatesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doOutputtemplatesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.outputtemplates.php');
		$class = new languagesActionsOutputtemplates();
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