<?php
/**
 * Action class for module Companies
 * 
 * @package      WebGuru3
 * @subpackage   modules/companies/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. September 2012
 */

class actionsCompanies extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['docompanieseditjob'] = array('doCompanieseditJob', 'companiesedit');
		
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
		$class = new companiesActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCompanieseditJob function description
	 *
	 * @name _doCompanieseditJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCompanieseditJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.companiesedit.php');
		$class = new companiesActionsCompaniesedit();
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