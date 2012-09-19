<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */
final class indexpeopleActionsPhonebook extends BaseActions {
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
			if (!(bool) wgPost::getValue('firstname')) {
				$mand = false; wgError::add('nofirstname');
			}
			if (!(bool) wgPost::getValue('lastname')) {
				$mand = false; wgError::add('nolastname');
			}
			if ($mand) {
				$ok = (bool) self::doSaveJoshtrayPeople();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteJoshtrayPeople(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "joshtray_people"
	 *
	 * @return bool Success
	 */
	private static function doSaveJoshtrayPeople() {
		$save = array();
		$save['firstname'] = wgPost::getValue('firstname');
		$save['lastname'] = wgPost::getValue('lastname');
		$save['line'] = wgPost::getValue('line');
		$save['phone'] = wgPost::getValue('phone');
		$save['mobile'] = wgPost::getValue('mobile');
		$save['note'] = wgPost::getValue('note');
		//$save['online'] = wgPost::getValue('online');
		//$save['lastlogin'] = wgPost::getValue('lastlogin');
		$save['mail'] = wgPost::getValue('mail');
		$save['title'] = wgPost::getValue('title');
		//$save['password'] = wgPost::getValue('password');
		$save['initials'] = wgPost::getValue('initials');
		if ((bool) wgPost::getValue('edit')) {
			$save['changed'] = 'NOW()';
			$save['where'] = (int) wgPost::getValue('edit');
			$ok = (bool) JoshtrayPeopleModel::doUpdate($save);
			$id = (int) wgPost::getValue('edit');
		}
		else {
			$save['added'] = 'NOW()';
			$id = (int) JoshtrayPeopleModel::doInsert($save);
			$ok = (bool) $id;
		}
		if ($ok && (bool) $_FILES['file']['name']) {
			global $mod;
			$mod->runModule('phonebook');
			$conf = modulePhonebook::getConfig();
			$path = wgPaths::getUserfilesPath().'phonebook-people-%s-%s.jpg';
			$img = new wgImages($_FILES['file'], 'upload');
			$img->setQuality($conf['images']['quality']);
			$img->save(sprintf($path, $id, 'orig'));
			$img->resize($conf['images']['xsmall'][0], $conf['images']['xsmall'][1]);
			$img->save(sprintf($path, $id, 'xsml'));
			$img->resize($conf['images']['small'][0], $conf['images']['small'][1]);
			$img->save(sprintf($path, $id, 'sml'));
			$img->resize($conf['images']['medium'][0], $conf['images']['medium'][1]);
			$img->save(sprintf($path, $id, 'med'));
			$img->resize($conf['images']['large'][0], $conf['images']['large'][1]);
			$img->save(sprintf($path, $id, 'lrg'));
			$img->clear();
		}
		return $ok;
	}

	/**
	 * Delete function for table "joshtray_people"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteJoshtrayPeople($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(JoshtrayPeopleModel::PRIMARY_KEY, $id);
		//return (bool) JoshtrayPeopleModel::doDelete($conn);
		return (bool) JoshtrayPeopleModel::doDelete($id);
	}
	
}

?>