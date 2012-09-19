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
final class customerscustlistActionsPayments extends BaseActions {
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
			
			if ($mand) {
				$ok = (bool) self::doSavePaymentsCustomers();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeletePaymentsCustomers(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "payments_customers"
	 *
	 * @return bool Success
	 */
	private static function doSavePaymentsCustomers() {
		$save = array();
		$save['users_id'] = (int) wgPost::getValue('users_id');
		$save['payments_services_id'] = (int) wgPost::getValue('payments_services_id');
		$save['reminders'] = wgPost::getValue('reminders');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$save['paid_until'] = wgPost::getValue('paid_until');
		$save['credit'] = wgPost::getValue('credit');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) PaymentsCustomersModel::doUpdate($save);
		}
		else return (bool) PaymentsCustomersModel::doInsert($save);
	}

	/**
	 * Delete function for table "payments_customers"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeletePaymentsCustomers($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(PaymentsCustomersModel::PRIMARY_KEY, $id);
		//return (bool) PaymentsCustomersModel::doDelete($conn);
		return (bool) PaymentsCustomersModel::doDelete($id);
	}
	
}

?>