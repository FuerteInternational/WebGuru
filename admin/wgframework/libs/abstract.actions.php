<?php
/**
 * Main class for backend actions
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */


abstract class actions {
	
	/**
	 * Class constructor
	 *
	 */
	function __construct() {
		
	}
	
	/**
	 * Sort out functions for actions
	 *
	 * @param array $func
	 * @param array $parameters
	 * @return string Name of the function or false
	 */
	protected static function _init($func, $parameters) {
		$action = wgPost::getValue('act');
		$function = false;
		if (isset($func[$action]) && !empty($func[$action])) {
			if (is_array($func[$action])) {
				$function = $func[$action][0];
				if ($func[$action][1] != wgSystem::getPage()) return false;
				else return '_'.$function;
			}
			else return '_'.$func[$action];
		}
		else return false;
	}
	
	/**
	 * Adds error if in developer mode
	 *
	 * @param string $action Name of the action function
	 * @param string $file (__FILE__)
	 */
	protected static function _reportError($action, $file) {
		if(DEVELOP == true) wgError::add(wgLang::get('problemactionfunc').': '.$action.' => '.$file);
	}
	
}

?>