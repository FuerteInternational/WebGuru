<?php
/**
 * Action class for module Widget Sprite
 * 
 * @package      WebGuru3
 * @subpackage   modules/wsprite/
 * @author       Ondrej Rafaj (FiftyFootSquid.com)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        7. September 2009
 */

class actionsWsprite extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['dowidgetsjob'] = array('doWidgetsJob', 'widgets');
		$func['doitemsjob'] = array('doItemsJob', 'items');
		$func['dotemplatesjob'] = array('doTemplatesJob', 'templates');
		
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
	 * @author Ondrej Rafaj (FiftyFootSquid.com)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doIndexJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.index.php');
		$class = new wspriteActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doWidgetsJob function description
	 *
	 * @name _doWidgetsJob
	 * @author Ondrej Rafaj (FiftyFootSquid.com)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doWidgetsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.widgets.php');
		$class = new wspriteActionsWidgets();
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
	 * @author Ondrej Rafaj (FiftyFootSquid.com)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doItemsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.items.php');
		$class = new wspriteActionsItems();
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
	 * @author Ondrej Rafaj (FiftyFootSquid.com)
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doTemplatesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.templates.php');
		$class = new wspriteActionsTemplates();
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