<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/mobileapps/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. September 2012
 */
 
require_once('Archive/Zip.php');
require_once('PlistReader/CFPropertyList.php');

 
final class appsmobileappsActionsMobileapps extends BaseActions {
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
			if (!(bool) wgPost::getValue('name')) {
				//wgError::add('noname');
				//$mand = false;
			}
		if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveMobileapps();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteMobileapps(wgGet::getValue('delete'));
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
	
	public function saveTempFile() {
		$name = $_FILES['file']['name'];
		$filename = valid::safeText($name).'.zip';
		$fileTmp = $_FILES['file']['tmp_name'];
		
		$dest = wgPaths::getTempPath().valid::safeText(microtime()).'-'.wgUsers::getId().'/';
		wgIo::mkdir($dest);
		
		$arr = array('destination'=>$dest, 'filename'=>$filename);
		
		$icon = $_FILES['icon']['name'];
		if ($icon) {
			$iconTmp = $_FILES['icon']['tmp_name'];
			$iconname = valid::safeText($name).'.png';
			wgIo::uploadFile($iconname, $iconTmp, $dest);
			if (!imagecreatefrompng($dest.$iconname)) {
				$arr['iconname'] = $iconname;
			}
			else {
				wgError::add('novalidpng');
			}
		}
		
		wgIo::uploadFile($filename, $fileTmp, $dest);
		
		$currentPath = getcwd();
		chdir($dest);
		$zip = new Archive_Zip('./'.$filename);
		$zip->extract();
		$zip = NULL;
		chdir('../../');
		$systemTempPath = getcwd().'/';
		chdir($currentPath);
		$appPath = $dest.'Payload/';
		if (!is_dir($appPath)) return $arr;
		$files = wgIo::getFolders($appPath);
		$appPath .= $files[0].'/';
		$plistFile = $appPath.'Info.plist';
		if (file_exists($plistFile)) {						
			$plist = new CFPropertyList();
			
			// Miluju Kacenku!!!
			
			$plist->parseBinary(file_get_contents($plistFile));
			$data =  $plist->toArray();
			$arr['version'] = $data['CFBundleShortVersionString'];
			$arr['minOsVersion'] = $data['MinimumOSVersion'];
			$arr['bundleIdentifier'] = $data['CFBundleIdentifier'];
			$arr['name'] = $data['CFBundleDisplayName'];
			$icons = $data['CFBundleIcons']['CFBundlePrimaryIcon']['CFBundleIconFiles'];
//			if (is_array($icons)) {
//				foreach ($icons as $k=>$v) {
//					$iconPath = $appPath.$v;
//					$size = getimagesize($iconPath);
//					echo '<pre>';
//					print_r($size);
//					echo '</pre>';
//				}
//				$arr['icons'] = $icons;
//			}
		}
//		echo '<pre>';
//		print_r($arr);
//		print_r($data);
//		echo '</pre>';
		return $arr;
	}
	
	public function saveFile($id, $data) {
		$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/';
		wgIo::mkdir($mobileAppsFolder.'ipa/');
		wgIo::mkdir($mobileAppsFolder.'img/');
		print $mobileAppsFolder.'<br />';
		//wgIo::move($data['destination'].$data['filename'], $mobileAppsFolder.$id.'-'.$data['filename']);
		wgIo::move($data['destination'].$data['filename'], $mobileAppsFolder.'ipa/'.$id.'.ipa');
		if (isset($data['iconname'])) {
			wgIo::move($data['destination'].$data['iconname'], $mobileAppsFolder.'img/'.$id.'.png');
		}
		print_r($data);
	}

	/**
	 * Save/Update function for table "mobileapps"
	 *
	 * @return bool Success
	 */
	private static function doSaveMobileapps() {
		$ok = false;
		$id = 0;
		$data = array();
		$save = array();
		$save['companies_id'] = (int)wgPost::getValue('companies_id');
		$save['apptype'] = 1;
		$save['icon'] = 0;
		$save['sort'] = (int)wgPost::getValue('sort');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		
		$file = $_FILES['file']['name'];
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			if ($file) {
				$data = self::saveTempFile();
				$save['name'] = $data['name'];
				$save['identifier'] = valid::safeText($data['name']);
				$save['version'] = $data['version'];
			}
			$ok = (bool) MobileappsModel::doUpdate($save);
		}
		else {
			if (!$file) {
				wgError::add('nofileattached');
			}
			else {
				$data = self::saveTempFile();
				if (isset($data['name'])) {
					$save['name'] = $data['name'];
					$save['identifier'] = valid::safeText($data['name']);
					$save['version'] = $data['version'];
					$id = (int) MobileappsModel::doInsert($save);
					self::$_par['edit'] = $id;
					$ok = (bool) $id;
				}
				else {
					$ok = false;;	
				}
			}
		}
		if ($id && !empty($data)) self::saveFile($id, $data);
		//if (isset($data['destination'])) wgIo::delete($data['destination']);
		print $ok;
		return $ok;
	}

	/**
	 * Delete function for table "mobileapps"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteMobileapps($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/ipa/'.$id.'.ipa';
		if (file_exists($mobileAppsFolder)) wgIo::delete($mobileAppsFolder);
		$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/img/'.$id.'.png';
		if (file_exists($mobileAppsFolder)) wgIo::delete($mobileAppsFolder);
		return (bool) MobileappsModel::doDelete($id);
	}
	
}

?>