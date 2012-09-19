<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        25. June 2009
 */
final class templateslistsActionsBlog extends BaseActions {
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
			if ((bool) wgPost::getValue('search') && !(bool) wgPost::getValue('variable')) { wgError::add('novariable');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveBlogTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteBlogTemplates(wgGet::getValue('delete'));
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
	 * Save/Update function for table "blog_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveBlogTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['temptype'] = wgPost::getValue('temptype');
		$save['datasource'] = wgPost::getValue('datasource');
		$save['limit'] = wgPost::getValue('limit');
		$save['pager'] = wgPost::getValue('pager');
		$save['search'] = wgPost::getValue('search');
		$save['variable'] = wgPost::getValue('variable');
		$save['someid'] = wgPost::getValue('someid');
		$save['useedit'] = wgPost::getValue('useedit');
		$save['tbegin'] = wgPost::getValue('tbegin');
		$save['titem'] = wgPost::getValue('titem');
		$save['tend'] = wgPost::getValue('tend');
		$save['tnoitem'] = wgPost::getValue('tnoitem');
		$save['tnoperm'] = wgPost::getValue('tnoperm');
		$save['blog_cats_id'] = wgPost::getValue('blog_cats_id');
		$save['blog_id'] = wgPost::getValue('myblog');
		$save['system_websites_id'] = wgPost::getValue('system_websites_id');
		$save['error1'] = wgPost::getValue('error1');
		$save['error2'] = wgPost::getValue('error2');
		$save['error3'] = wgPost::getValue('error3');
		$save['error4'] = wgPost::getValue('error4');
		$save['error5'] = wgPost::getValue('error5');
		$save['error6'] = wgPost::getValue('error6');
		$save['redirect1'] = wgPost::getValue('redirect1');
		$save['redirect2'] = wgPost::getValue('redirect2');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) BlogTemplatesModel::doUpdate($save);
		}
		else {
			$id = (int) BlogTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "blog_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteBlogTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) BlogTemplatesModel::doDelete($id);
	}
	
}

?>