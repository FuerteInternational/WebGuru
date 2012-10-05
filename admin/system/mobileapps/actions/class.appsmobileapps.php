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
		
		$arr = array('destination'=>$dest, 'filename'=>$filename, 'icon'=>0);
		$icon = $_FILES['icon']['name'];
		if ($icon) {
			$iconTmp = $_FILES['icon']['tmp_name'];
			$iconname = valid::safeText($name).'.png';
			wgIo::uploadFile($iconname, $iconTmp, $dest);
			$size = getimagesize($dest.$iconname);
			$ok = true;
			if ($size[0] != $size[1]) {
				$ok = false;
				wgError::add('iconwrongratio');
			}
			elseif ($size < 57) {
				$ok = false;
				wgError::add('icontoosmall');
			}
			if ($size['mime'] != 'image/png') {
				$ok = false;
				wgError::add('novalidpng');
			}
			
			if ($ok) {
				$arr['icon'] = 1;
				$arr['iconname'] = $iconname;
				wgError::add('iconcorrect', 2);
			}
			else {
				wgError::add('unabletosaveicon', 1);
			}
		}
		wgIo::uploadFile($filename, $fileTmp, $dest);
		
		$arr['size'] = filesize($dest.$filename);
		
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
//				}
//				$arr['icons'] = $icons;
//			}
		}
		return $arr;
	}
	
	public function saveFile($id, $data) {
		$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/';
		wgIo::mkdir($mobileAppsFolder.'ipa/');
		wgIo::mkdir($mobileAppsFolder.'img/');
		if (file_exists($data['destination'].$data['filename'])) {
			wgIo::move($data['destination'].$data['filename'], $mobileAppsFolder.'ipa/'.$id.'.ipa');
		}
		if (isset($data['iconname'])) {
			wgIo::copy($data['destination'].$data['iconname'], $mobileAppsFolder.'img/'.$id.'.png');
			$img = new wgImages($mobileAppsFolder.'img/'.$id.'.png');
			$img->resize(57, 57);
			$img->save($mobileAppsFolder.'img/'.$id.'.png', 'png');
			
			wgIo::move($data['destination'].$data['iconname'], $mobileAppsFolder.'img/'.$id.'@2x.png');
			$img = new wgImages($mobileAppsFolder.'img/'.$id.'@2x.png');
			$img->resize(114, 114);
			$img->save($mobileAppsFolder.'img/'.$id.'.png', '@2xpng');
		}
	}

	/**
	 * Save/Update function for table "mobileapps"
	 *
	 * @return bool Success
	 */
	public static function doSaveMobileapps() {
		$ok = false;
		$id = 0;
		$data = array();
		$save = array();
		$save['devtype'] = (int)wgPost::getValue('devtype');
		$save['apptype'] = 0; // 0 - iPhone; 1 - Android
		$save['icon'] = 0;
		$save['sort'] = (int)wgPost::getValue('sort');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		
		$file = $_FILES['file']['name'];
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/';
			if (isset($_POST['deleteicon'])) {
				if (file_exists($mobileAppsFolder.'img/'.$id.'.png')) wgIo::delete($mobileAppsFolder.'img/'.$id.'.png');
				if (file_exists($mobileAppsFolder.'img/'.$id.'@2x.png')) wgIo::delete($mobileAppsFolder.'img/'.$id.'@2x.png');
				wgError::add('icondeleted', 2);
			}
			self::$_par['edit'] = $id;
			$data = self::saveTempFile();
			if ($file) {
				$save['name'] = $data['name'];
				$save['identifier'] = $data['bundleIdentifier'];
				$save['version'] = $data['version'];
				$save['size'] = $data['size'];
			}
			$save['icon'] = (int)file_exists($mobileAppsFolder.'img/'.$id.'.png');
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
					$save['identifier'] = $data['bundleIdentifier'];
					$save['version'] = $data['version'];
					$save['size'] = $data['size'];
					$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/';
					$save['icon'] = (int)file_exists($mobileAppsFolder.'img/'.$id.'.png');
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
		if (isset($data['destination'])) wgIo::delete($data['destination']);
		self::generatePlistFor($data, $id);
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
	
	private static function generatePlistFor($data, $id) {
		$temp = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>items</key>
	<array>
		<dict>
			<key>assets</key>
			<array>
				<dict>
					<key>kind</key>
					<string>software-package</string>
					<key>url</key>
					<string>'.wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$id.'.ipa</string>
				</dict>
			</array>
			<key>metadata</key>
			<dict>
				<key>bundle-identifier</key>
				<string>'.$data['bundleIdentifier'].'</string>
				<key>bundle-version</key>
				<string>'.$data['version'].'</string>
				<key>kind</key>
				<string>software</string>
				<key>title</key>
				<string>'.$data['name'].'</string>
			</dict>
		</dict>
	</array>
</dict>
</plist>';
		wgIo::writeFile(wgPaths::getUserfilesPath('ftp').'mobileapps/ipa/'.$id.'.plist', $temp);
				
	}
	
}

?>