<?php
/**
 * Parsing administration page
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */
define('DEVGENTOFOLDER', 'system/');

class actionsDeveloper extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['createmod'] = array('createModule', 'module');
		$func['createinst'] = array('createInstaller', 'dbinstaller');
		$func['createadmin'] = array('createAdminPage', 'admin');
		$func['createinstall'] = array('createSystemInstaller', 'installer');
		$func['createbackup'] = array('createSystemBackup', 'installer');
		$func['createmodinst'] = array('createSystemModInstallers', 'installer');
		
		// END: functions-list ----------------------------------------------------------------
		$funcname = parent::_init($func, $parameters);
		$ok = false;
		if ((bool) $funcname && method_exists($this, $funcname)) $ok = $this->$funcname($parameters);
		else parent::_reportError($funcname, __FILE__);
		wgPaths::moduleRedirect(NULL, !$ok);
	}
	
	// SYSTEM: functions ----------------------------------------------------------------------
	
	/**
	 * Creates module instalators
	 *
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _createSystemModInstallers($parameters) {
		require(wgPaths::getModulePath().'actions/class.installer.php');
		$class = new developerActionsInstaller();
		if ((bool) $class->modules()) { wgError::add('generated', 2);
			return true;
		}
		else { wgError::add('cantgenerate');
			return false;
		}
	}
	
	/**
	 * Creates system backup
	 *
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _createSystemBackup($parameters) {
		require(wgPaths::getModulePath().'actions/class.installer.php');
		$class = new developerActionsInstaller();
		if ((bool) $class->backup()) { wgError::add('generated', 2);
			return true;
		}
		else { wgError::add('cantgenerate');
			return false;
		}
	}
	
	/**
	 * Creates system installer
	 *
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _createSystemInstaller($parameters) {
		require(wgPaths::getModulePath().'actions/class.installer.php');
		$class = new developerActionsInstaller();
		if ((bool) $class->create()) { wgError::add('generated', 2);
			return true;
		}
		else { wgError::add('cantgenerate');
			return false;
		}
	}
	/**
	 * Creates admin page
	 *
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _createAdminPage($parameters) {
		require(wgPaths::getModulePath().'actions/class.admin.php');
		$class = new developerActionsAdmin();
		if ((bool) $class->init()) { wgError::add('generated', 2);
			return true;
		}
		else { wgError::add('cantgenerate');
			return false;
		}
	}
	
	/**
	 * Creates module
	 *
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _createModule($parameters) {
		require(wgPaths::getModulePath().'actions/class.module.php');
		$class = new developerActionsModule();
		if ((bool) $class->init()) { wgError::add('generated', 2);
			return true;
		}
		else { wgError::add('cantgenerate');
			return false;
		}
	}
	
	/**
	 * Creates installer
	 *
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _createInstaller($parameters) {
		require(wgPaths::getModulePath().'actions/class.dbinstaller.php');
		$class = new developerActionsDbinstaller();
		if ((bool) $class->init()) { wgError::add('generated', 2);
			return true;
		}
		else { wgError::add('cantgenerate');
			return false;
		}
	}
	
	
	
	// END: functions ----------------------------------------------------------------------
	
}

?>