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
	
	public static function normalizePng($filepath) {
		print $filepath;
		if (!is_readable($filepath)) {
			//print_r('File does not exists or is not readable!');
		}
		$data = shell_exec('python '.escapeshellcmd(wgPaths::getPath('ftp')).'bin/normalize -f ' . escapeshellcmd($filepath) . ' 2>/dev/null');
		print_r($data);
		$data = shell_exec('vi '.escapeshellcmd(wgPaths::getPath('ftp')).'bin/normalize');
		print_r($data);
		if (empty($data)) {
			print_r('Invalid PNG file or already normalized one.');
			//$data = file_get_contents($filepath);
		}
		return $data;
	}
	
	public static function saveTempFile() {
		$name = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
		$filename = valid::safeText($name).'.zip';
		$dest = wgPaths::getTempPath().valid::safeText(microtime()).'-'.wgUsers::getId().'/';
		wgIo::mkdir($dest);
		
		$arr = array('destination'=>$dest, 'filename'=>$filename, 'icon'=>0);
		
		if (!empty($name)) {
			$fileTmp = $_FILES['file']['tmp_name'];
			wgIo::uploadFile($filename, $fileTmp, $dest);
			$arr['size'] = filesize($dest.$filename);
			
			$output = shell_exec('unzip '.$dest.$filename.' -d '.$dest.'');
			
			$appPath = $dest.'Payload/';
			if (!is_dir($appPath)) return $arr;
			$files = wgIo::getFolders($appPath);
			$appPath .= $files[0].'/';
			
			$plistFile = $appPath.'Info.plist';
			if (file_exists($plistFile)) {
				$plist = new CFPropertyList();
				$plist->parseBinary(file_get_contents($plistFile));
				$data =  $plist->toArray();
				wgIo::writeFile($dest.'Info.plist', $plist->toXML(true));
				$arr['version'] = isset($data['CFBundleShortVersionString']) ? $data['CFBundleShortVersionString'] : '';
				$arr['minOsVersion'] = isset($data['MinimumOSVersion']) ? $data['MinimumOSVersion'] : '';
				$arr['bundleIdentifier'] = isset($data['CFBundleIdentifier']) ? $data['CFBundleIdentifier'] : '';
				$arr['name'] = isset($data['CFBundleDisplayName']) ? $data['CFBundleDisplayName'] : '';
				$icons = isset($data['CFBundleIcons']['CFBundlePrimaryIcon']['CFBundleIconFiles']) ? $data['CFBundleIcons']['CFBundlePrimaryIcon']['CFBundleIconFiles'] : array();
				if (is_array($icons)) {
					foreach ($icons as $k=>$v) {
						$iconPath = $appPath.$v;
						$size = getimagesize($iconPath);
					}
					$arr['icons'] = $icons;
				}
			}
			
			$icons = array();
			if (isset($arr['icons'])) {
				foreach ($arr['icons'] as $icon) {
					$iconFile = $appPath.$icon;
					if (file_exists($iconFile)) {
						wgIo::copy($iconFile, $dest.$icon);
						$icons[] = $dest.$icon;
					}
				}
				wgIo::delete($dest.'Payload/');
				$currentCwd = getcwd();
					
				wgIo::copy(wgPaths::getPath('ftp').'bin/normalize', $dest.'normalize');
				chdir($dest);
				$output = shell_exec('chmod -x ./normalize');
				$output = shell_exec('python ./normalize');
				chdir($currentCwd);
			}
			
			$biggestIcon = NULL;
			$biggestIconSize = 0;
			foreach ($icons as $icon) {
				$s = filesize($icon);
				if ($s > $biggestIconSize) {
					$biggestIconSize = $s;
					$biggestIcon = $icon;
				}
			}
			if ($biggestIcon) $arr['tempicon'] = $biggestIcon;
		}
		return $arr;
	}
	
	public static function saveFile($id, $data) {
		$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/';
		wgIo::mkdir($mobileAppsFolder.'ipa/');
		wgIo::mkdir($mobileAppsFolder.'img/');
		if (file_exists($data['destination'].$data['filename'])) {
			wgIo::move($data['destination'].$data['filename'], $mobileAppsFolder.'ipa/'.$id.'.ipa');
		}
		if (file_exists($data['destination'].'Info.plist')) {
			wgIo::move($data['destination'].'Info.plist', $mobileAppsFolder.'ipa/'.$id.'-Info.plist');
		}
		if (isset($data['tempicon'])) {
			// TODO: Resize image to the proper sizes
			wgIo::copy($data['tempicon'], $mobileAppsFolder.'img/'.$id.'.png');
//  			$img = new wgImages($mobileAppsFolder.'img/'.$id.'.png');
//  			$img->resize(57, 57);
//  			$img->save($mobileAppsFolder.'img/'.$id.'.png', 'png');
			
			wgIo::move($data['tempicon'], $mobileAppsFolder.'img/'.$id.'@2x.png');
// 			$img = new wgImages($mobileAppsFolder.'img/'.$id.'@2x.png');
// 			$img->resize(114, 114);
// 			$img->save($mobileAppsFolder.'img/'.$id.'.png', '@2xpng');
		}
	}

	/**
	 * Save/Update function for table "mobileapps"
	 *
	 * @return bool Success
	 */
	public static function doSaveMobileapps() {
		$data = self::saveTempFile();
		$ok = false;
		$id = 0;
		$save = array();
		$save['devtype'] = (int)wgPost::getValue('devtype');
		if (!(bool) wgPost::getValue('edit')) wgPost::setValue('edit', MobileappsModel::getIdOfAnExistingApp($save['devtype'], $data['bundleIdentifier']));
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
				if (isset($data['name'])) {
					$save['name'] = $data['name'];
					$save['identifier'] = $data['bundleIdentifier'];
					$save['version'] = $data['version'];
					$save['size'] = $data['size'];
					$mobileAppsFolder = wgPaths::getUserfilesPath().'mobileapps/';
					$save['icon'] = 1;
					$id = (int) MobileappsModel::doInsert($save);
					self::$_par['edit'] = $id;
					$ok = (bool) $id;
				}
				else {
					$ok = false;;	
				}
			}
		}
		if ($id && !empty($data)) {
			self::saveFile($id, $data);
			self::generatePlistFor($data, $id);
		}
		if (isset($data['destination'])) wgIo::delete($data['destination']);
		//wgError::add('Not deleting destination!!!');
		if ($ok) {
			wgPost::setValue('mobileAppId', $data['bundleIdentifier']);
		}
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
		if (!isset($data['bundleIdentifier']) || !$data['bundleIdentifier']) return false;
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