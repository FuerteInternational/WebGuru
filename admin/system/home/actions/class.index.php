<?php
/**
 * Page Index in the Home module
 * 
 * @package      WebGuru3
 * @subpackage   modules/home/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

final class homeActionsIndex {
	/**
	 * All variables neccessary for module
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function __construct() {
		
	}
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function init() { wgError::add("You have run the test action in homeActionsIndex class (".__LINE__."=>".__FILE__.")", 1);
		return true;
	}
	
}	
?>