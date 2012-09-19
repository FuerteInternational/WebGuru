<?php
/**
 * Page Eximport in the 3M Catalogue module
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

final class eximportActions3mcatalogue extends BaseActions {
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
		$ok = Nato3mcatItemsModel::importData($_FILES['file']['tmp_name']);
		if ($ok) wgError::add('importedok', 2);
		else wgError::add('cantimport');
	}
	
}	
?>