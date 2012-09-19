<?php
/**
 * Page Index in the 3M Catalogue module
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/pages/
 * @author       Ondrej Rafaj (FiftyFootSquid)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */

final class indexActions3mcatalogue extends BaseActions {
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
	public function init() { wgError::add("You have run the test action in 3mcatalogueActionsIndex class (".__LINE__."=>".__FILE__.")", 1);
		return true;
	}
	
}	
?>