<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/payments/actions
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        2. March 2009
 */
final class costsfundingActionsPayments extends BaseActions {
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
			if (!(bool) wgPost::getValue('payments_services_id')) { wgError::add('selectservice');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('percent')) { wgError::add('setpercent');
				$mand = false;
			}
			$id = (int) wgPost::getValue('edit');
			$used = PaymentsFundingsModel::getUsedPercentage(wgPost::getValue('payments_services_id'));
			if ((bool) $id) $used -= PaymentsFundingsModel::getPercentage($id);
			if (($used + wgPost::getValue('percent')) > 100) { wgError::add(wgLang::get('fundusedalreadyfrom').': '.$used.' %');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSavePaymentsFundings();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeletePaymentsFundings(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "payments_fundings"
	 *
	 * @return bool Success
	 */
	private static function doSavePaymentsFundings() {
		$save = array();
		$save['payments_services_id'] = (int) wgPost::getValue('payments_services_id');
		$save['percent'] = (int) wgPost::getValue('percent');
		if ($save['percent'] > 100) $save['percent'] = 100;
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) PaymentsFundingsModel::doUpdate($save);
		}
		else return (bool) PaymentsFundingsModel::doInsert($save);
	}

	/**
	 * Delete function for table "payments_fundings"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeletePaymentsFundings($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) PaymentsFundingsModel::doDelete($id);
	}
	
}

?>