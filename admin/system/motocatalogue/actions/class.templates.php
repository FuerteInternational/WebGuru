<?php
/**
 * Page Templates in the MotoCatalogue module
 * 
 * @package      WebGuru3
 * @subpackage   modules/motocatalogue/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. May 2009
 */

final class templatesActionsMotocatalogue extends BaseActions {
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
	public function init() { wgError::add("You have run the test action in motocatalogueActionsTemplates class (".__LINE__."=>".__FILE__.")", 1);
		return true;
	}
	
}	
?>