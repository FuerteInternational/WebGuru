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
 * @since        28. July 2009
 */
final class pagespagesActionsCampaigns extends BaseActions {
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
				$ok = (bool) self::doSaveCampaignPages();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCampaignPages(wgGet::getValue('delete'));
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
	 * Save/Update function for table "campaign_pages"
	 *
	 * @return bool Success
	 */
	private static function doSaveCampaignPages() {
		$save = array();
		$save['campaign_id'] = wgPost::getValue('campaign_id');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['title'] = wgPost::getValue('title');
		$save['heading1'] = wgPost::getValue('heading1');
		$save['heading2'] = wgPost::getValue('heading2');
		$save['heading3'] = wgPost::getValue('heading3');
		$save['rewrite'] = wgPost::getValue('rewrite');
		$save['keywords'] = wgPost::getValue('keywords');
		$save['description'] = wgPost::getValue('description');
		$save['addtext1'] = wgPost::getValue('addtext1');
		$save['addtext2'] = wgPost::getValue('addtext2');
		$save['enabled'] = wgPost::getValue('enabled');
		$save['parentid'] = wgPost::getValue('parentid');
		$save['home'] = wgPost::getValue('home');
		$save['sort'] = wgPost::getValue('sort');
		$save['head'] = wgPost::getValue('head');
		$save['page'] = wgPost::getValue('page');
		$save['note'] = wgPost::getValue('note');
		$save['redirect1'] = wgPost::getValue('redirect1');
		$save['redirect2'] = wgPost::getValue('redirect2');
		$save['redirect3'] = wgPost::getValue('redirect3');
		$save['redirect4'] = wgPost::getValue('redirect4');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) CampaignPagesModel::doUpdate($save);
		}
		else {
			$id = (int) CampaignPagesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "campaign_pages"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCampaignPages($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) CampaignPagesModel::doDelete($id);
	}
	
}

?>