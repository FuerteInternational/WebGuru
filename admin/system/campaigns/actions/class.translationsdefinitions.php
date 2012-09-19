<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/campaigns/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. November 2009
 */
final class translationsdefinitionsActionsCampaigns extends BaseActions {
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
		
			if ($mand) {
				$ok = (bool) self::doSaveCampaignDefinitions();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCampaignDefinitions(wgGet::getValue('delete'));
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
	 * Save/Update function for table "campaign_definitions"
	 *
	 * @return bool Success
	 */
	private static function doSaveCampaignDefinitions() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['minchar'] = (int) wgPost::getValue('minchar');
		$save['maxchar'] = (int) wgPost::getValue('maxchar');
		$deflen = strlen(wgPost::getValue('default_text'));
		if ($save['maxchar'] < $deflen) $save['maxchar'] = $deflen;
		$save['campaign_pages_id'] = (int) wgPost::getValue('campaign_pages_id');
		$save['isglobal'] = (int) wgPost::getValue('isglobal');
		$save['enabled'] = (int) wgPost::getValue('enabled');
		$save['default_campaign_languages_id'] = (int) wgPost::getValue('default_campaign_languages_id');
		$save['default_text'] = wgPost::getValue('default_text');
		$save['allowhtml'] = (int) wgPost::getValue('allowhtml');
		$save['previewfrom'] = (int) wgPost::getValue('previewfrom');
		$save['previewto'] = (int) wgPost::getValue('previewto');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) CampaignDefinitionsModel::doUpdate($save);
		}
		else {
			$id = (int) CampaignDefinitionsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "campaign_definitions"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCampaignDefinitions($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) CampaignDefinitionsModel::doDelete($id);
	}
	
}

?>