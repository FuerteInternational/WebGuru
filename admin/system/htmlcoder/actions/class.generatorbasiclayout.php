<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/htmlcoder/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        22. January 2009
 */
final class generatorbasiclayoutActionsHtmlcoder extends BaseActions {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct() {
		parent::__construct();
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = NULL;      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		
		// filling parameters with data
		self::$_par = array();
		//Array
		
		// init the process
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool Success
	 */
	private function _init() {
		global $mod;
		$mod->runModule('htmlcoder');
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('issue')) { wgError::add('noissue');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveBasicLayout();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "emails_groups"
	 *
	 * @return bool Success
	 */
	private static function doSaveBasicLayout() {
		$data = array();
		$issue = wgPost::getValue('issue');
		moduleHtmlcoder::backupIssue($issue);
		moduleHtmlcoder::generateCssFiles($issue, $data);
		moduleHtmlcoder::generateHtmlFiles($issue, $data);
		moduleHtmlcoder::generateJsFiles($issue, $data);
		moduleHtmlcoder::generateImgFiles($issue, $data);
		return true;
	}

}

?>