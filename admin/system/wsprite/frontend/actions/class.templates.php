<?php
/**
 * Page Templates in the Widget Sprite module
 * 
 * @package      WebGuru3
 * @subpackage   modules/wsprite/pages/
 * @author       Ondrej Rafaj (FiftyFootSquid.com)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        7. September 2009
 */

final class templatesActionsWsprite extends BaseActions {
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
	public function init() { wgError::add("You have run the test action in wspriteActionsTemplates class (".__LINE__."=>".__FILE__.")", 1);
		return true;
	}
	
}	
?>