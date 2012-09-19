<?php
/**
 * Basic class for actions
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      25. November 2008
 */

abstract class BaseActions  {
	
	/**
	 * Action is ok
	 *
	 * @var bool
	 */
	protected static $_ok = false;
	
	/**
	 * On save parameters
	 *
	 * @var string
	 */
	protected static $_onSaveParam = NULL;
	
	/**
	 * On apply parameters
	 *
	 * @var string
	 */
	protected static $_onApplyParam = NULL;
	
	/**
	 * On delete parameters
	 *
	 * @var string
	 */
	protected static $_onDeleteParam = NULL;
	
	public function __construct() {
		
	}
	
	/**
	 * Returns state of the action (if the save or something is done)
	 *
	 * @return string
	 */
	public function isOk() {
		return (bool) self::$_ok;
	}
	
	/**
	 * Can return parameters which will be added to the url after redirection
	 *
	 * @return string
	 */
	public function getDeleteParams() {
		return self::$_onDeleteParam;
	}
	
	/**
	 * Can return parameters which will be added to the url after redirection
	 *
	 * @return string
	 */
	public function getSaveParams() {
		return self::$_onSaveParam;
	}
	
	/**
	 * Can return parameters which will be added to the url after redirection
	 *
	 * @return string
	 */
	public function getApplyParams() {
		return self::$_onApplyParam;
	}
}
?>