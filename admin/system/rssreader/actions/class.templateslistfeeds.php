<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/rssreader/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        18. August 2009
 */
final class templateslistfeedsActionsRssreader extends BaseActions {
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
		
		self::$_par = array();
		self::$_par['edit'] = 0;
		
		// init the process
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool Success
	 */
	private function _init() {
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
		if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveRssreaderTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteRssreaderTemplates(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "rssreader_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveRssreaderTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['temptype'] = wgPost::getValue('temptype');
		$save['rssreader_urls'] = wgPost::getValue('rssreader_urls');
		$save['limit'] = wgPost::getValue('limit');
		$save['ascending'] = wgPost::getValue('ascending');
		$save['cache'] = wgPost::getValue('cache');
		$save['tbegin'] = wgPost::getValue('tbegin');
		$save['tdetail'] = wgPost::getValue('tdetail');
		$save['tend'] = wgPost::getValue('tend');
		$save['tnoitem'] = wgPost::getValue('tnoitem');
		$save['system_websites_id'] = wgPost::getValue('system_websites_id');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) RssreaderTemplatesModel::doUpdate($save);
		}
		else {
			$id = (int) RssreaderTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "rssreader_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteRssreaderTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) RssreaderTemplatesModel::doDelete($id);
	}
	
}

?>