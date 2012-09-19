<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/twitter/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. June 2009
 */
final class templateslistmessagesActionsTwitter extends BaseActions {
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
				$ok = (bool) self::doSaveTwitterTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteTwitterTemplates(wgGet::getValue('delete'));
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
	 * Save/Update function for table "twitter_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveTwitterTemplates() {
		$save = array();
		$save['name']         			= wgPost::getValue('name');
		$save['identifier']   			= valid::safeText(wgPost::getValue('identifier'));
		$save['temptype']     			= (int) wgPost::getValue('temptype');
		$save['limit']      		    = (int) wgPost::getValue('limit');
		if ($save['limit'] > 20) $save['limit'] = 20;
		$save['datasource'] 		    = (int) wgPost::getValue('datasource');
		$save['dateformat']   			= wgPost::getValue('dateformat');
		$save['tempbegin']    			= wgPost::getValue('tempbegin');
		$save['tempitem']     			= wgPost::getValue('tempitem');
		$save['tempend']      			= wgPost::getValue('tempend');
		$save['twitter_accounts_id']    = (int) wgPost::getValue('twitter_accounts_id');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) TwitterTemplatesModel::doUpdate($save);
		}
		else {
			$id = (int) TwitterTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "twitter_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteTwitterTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) TwitterTemplatesModel::doDelete($id);
	}
	
}

?>