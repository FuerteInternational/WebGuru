<?php
/**
 * Page Settings in the WGCron module
 * 
 * @package      WebGuru3
 * @subpackage   modules/wgcron/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        14. April 2009
 */

final class settingsActionsWgcron extends BaseActions {
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
	public function init() { wgError::add("You have run the test action in wgcronActionsSettings class (".__LINE__."=>".__FILE__.")", 1);
		return true;
	}
	
}	
?>