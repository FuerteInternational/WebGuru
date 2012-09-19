<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/actions
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */
final class templatescommentsActionsComments extends BaseActions {
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
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
			if (!(bool) wgPost::getValue('perpage')) {
				if (wgPost::getValue('temptype') != 1) wgError::add('perpagezero', 1);
			}
			if ($mand) {
				$ok = (bool) self::doSaveCommentsTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCommentsTemplates(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "comments_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveCommentsTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['temptype'] = (int) wgPost::getValue('temptype');
		$save['pager'] = (int) wgPost::getValue('pager');
		$save['comments_groups_id'] = (int) wgPost::getValue('comments_groups_id');
		$perpage = (int) wgPost::getValue('perpage');
		if (!(bool) $perpage) $perpage = 1;
		$save['perpage'] = $perpage;
		$save['variable'] = wgPost::getValue('variable');
		$save['datasource'] = (int) wgPost::getValue('datasource');
		$save['noidsyserror'] = wgPost::getValue('noidsyserror');
		$save['emptyauthor'] = wgPost::getValue('emptyauthor');
		$save['emptyemail'] = wgPost::getValue('emptyemail');
		$save['emptycomment'] = wgPost::getValue('emptycomment');
		$save['tempbegin'] = wgPost::getValue('tempbegin');
		$save['tempitem'] = wgPost::getValue('tempitem');
		$save['tempend'] = wgPost::getValue('tempend');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) CommentsTemplatesModel::doUpdate($save);
		}
		else return (bool) CommentsTemplatesModel::doInsert($save);
	}

	/**
	 * Delete function for table "comments_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCommentsTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) CommentsTemplatesModel::doDelete($id);
	}
	
}

?>