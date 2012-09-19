<?php
/**
 * Action class for module 3M Catalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/
 * @author       Ondrej Rafaj (FiftyFootSquid)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */

class actions3mcatalogue extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['doitemsjob'] = array('doItemsJob', 'items');
		$func['doeximportjob'] = array('doEximportJob', 'eximport');
		
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
	 * @author Ondrej Rafaj (FiftyFootSquid)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doIndexJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.index.php');
		$class = new 3mcatalogueActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doItemsJob function description
	 *
	 * @name _doItemsJob
	 * @author Ondrej Rafaj (FiftyFootSquid)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doItemsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.items.php');
		$class = new 3mcatalogueActionsItems();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doEximportJob function description
	 *
	 * @name _doEximportJob
	 * @author Ondrej Rafaj (FiftyFootSquid)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doEximportJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.eximport.php');
		$class = new 3mcatalogueActionsEximport();
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