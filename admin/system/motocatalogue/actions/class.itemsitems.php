<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/motocatalogue/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. May 2009
 */
final class itemsitemsActionsMotocatalogue extends BaseActions {
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
		wgModules::runModule('motocatalogue');
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveMotocatalogueItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			if (wgGet::getValue('type') == 'image') $ok = moduleMotocatalogue::deleteImages(wgGet::getValue('delete'));
			else $ok = (bool) self::doDeleteMotocatalogueItems(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		if ((bool) wgGet::getValue('edit')) parent::$_onDeleteParam = 'edit='.(int) wgGet::getValue('edit');     // After delete
		else parent::$_onDeleteParam = NULL;
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "motocatalogue_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveMotocatalogueItems() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['pretext'] = wgPost::getValue('pretext');
		$save['description'] = wgPost::getValue('description');
		$save['cubature'] = wgPost::getValue('cubature');
		$save['power'] = wgPost::getValue('power');
		$save['kilometers'] = (int) wgPost::getValue('kilometers');
		$save['price'] = (int) wgPost::getValue('price');
		$save['discounted_price'] = (int) wgPost::getValue('discounted_price');
		$save['vintage'] = wgPost::getValue('vintage').'-01-01';
		$save['technical_approve'] = wgPost::getValue('technical_approve');
		$save['origin'] = wgPost::getValue('origin');
		$save['leasing'] = wgPost::getValue('leasing');
		$save['tax'] = (int) wgPost::getValue('tax');
		$save['brand'] = wgPost::getValue('brand');
		$save['type'] = wgPost::getValue('type');
		$save['promo'] = (int) wgPost::getValue('promo');
		$save['state'] = wgPost::getValue('state');
		$save['avail'] = wgPost::getValue('avail');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			$ok = (bool) MotocatalogueItemsModel::doUpdate($save);
		}
		else {
			$id = (int) MotocatalogueItemsModel::doInsert($save);
			self::$_par['edit'] = $id;
			$ok = (bool) $id;
		}
		if ($ok) {
			//if (isset($_FILES['mainImage']['name'])) moduleMotocatalogue::resizeMainPicture($id, $_FILES['image']);
			//if ((bool) wgPost::getValue('deleteimg')) moduleMotocatalogue::dele($id);
			$startId = MotocatalogueImagesModel::getLastFreeId();
			$arr = backendHelper::saveMultipleFiles('motocatalogue', 'images-original', $id, 'image', backendHelper::$IMAGES_EXTENSIONS, $startId);
			if (!empty($arr) && is_array($arr)) {
				foreach ($arr as $file=>$v) {
					$info = moduleMotocatalogue::resizePicture($file);
					$info['original'] = $v['original'];
					$info['size'] = $v['size'];
					$info['mime'] = $v['mime'];
					$iid = MotocatalogueImagesModel::insertNewImageFromFile($info, 0);
				}
			}
		}
		return $ok;
	}
	
	/**
	 * Delete function for table "motocatalogue_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteMotocatalogueItems($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) MotocatalogueItemsModel::doDelete($id);
	}
	
}

?>