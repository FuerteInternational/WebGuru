<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/iwallpapers/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        26. January 2010
 */
final class wallpapersimagesActionsIwallpapers extends BaseActions {
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
		if (wgPost::isValue('import')) {
			$ok = (bool) self::importFiles();
			if ($ok) wgError::add('Folder has been successfully imported.', 2);
			else wgError::add('Can\'t import images.');
		}
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveIwallpapersImages();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteIwallpapersImages(wgGet::getValue('delete'));
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
	
	
	public static function importFiles() {
		wgModules::runModule('users');
		$path = wgPaths::getPath().'wallpapers/';
		set_time_limit(0);
		$arr = wgIo::getFiles($path);
		$x = 0;
		foreach ($arr as $file) {
			$save = array();
			$save['name'] = $file;
			$save['file'] = wgText::safeFile($file);
			$save['description'] = '';
			$save['keywords'] = '';
			$save['user_id'] = moduleUsers::getId();
			$save['added'] = 'NOW()';
			$save['ratingdata'] = '';
			$save['votes'] = 0;
			$save['rating'] = 0;
			$id = (int) IwallpapersImagesModel::doInsert($save);
			if ((bool) $id) {
				$ok = wgIo::copy($path.$file, wgPaths::getUserfilesPath('ftp', time()).$id.'-'.$save['file']);
				if ($ok) {
					wgIo::delete($path.$file);
					$x++;
				}
			}
		}
		return $x;
	}
	
	/**
	 * Save/Update function for table "iwallpapers_images"
	 *
	 * @return bool Success
	 */
	private static function doSaveIwallpapersImages() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		if (isset($_FILES['image']['name'])) $save['file'] = wgText::safeFile($_FILES['image']['name']);
		//$save['ratingdata'] = wgPost::getValue('ratingdata');
		//$save['votes'] = wgPost::getValue('votes');
		//$save['rating'] = wgPost::getValue('rating');
		$save['description'] = wgPost::getValue('description');
		$save['keywords'] = wgPost::getValue('keywords');
		$save['user_id'] = moduleUsers::getId();
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			$ok = (bool) IwallpapersImagesModel::doUpdate($save);
		}
		else {
			$save['ratingdata'] = '';
			$save['votes'] = 0;
			$save['rating'] = 0;
			$id = (int) IwallpapersImagesModel::doInsert($save);
			self::$_par['edit'] = $id;
			$ok = (bool) $id;
		}
		if ($ok && isset($_FILES['image']['name'])) {
			$path = wgPaths::getUserfilesPath('ftp', time());
			wgIo::mkdir($path);
			wgError::add('Uploading image: '.wgIo::uploadFile($id.'-'.wgText::safeFile($_FILES['image']['name']), $_FILES['image']['tmp_name'], $path), 2);
		}
		return $ok;
	}

	/**
	 * Delete function for table "iwallpapers_images"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteIwallpapersImages($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) IwallpapersImagesModel::doDelete($id);
	}
	
}

?>