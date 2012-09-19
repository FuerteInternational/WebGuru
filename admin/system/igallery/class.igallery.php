<?php
/**
 * Main class for module iPhone gallery
 * 
 * @package      WebGuru3
 * @subpackage   modules/igallery/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        29. October 2009
 */

class moduleIgallery {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'iPhone gallery';
		$this->code    = 'igallery';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function getImage($id, $smallId, $date, $size='small', $altFullImage=NULL) {
		if ((bool) $altFullImage) {
			$ext = pathinfo($altFullImage);
			$ext = $ext['extension'];
		}
		else $ext = 'jpg';
		$filename = wgIo::getUserfilesFilename('igallery', 'images-'.$size, $id, $smallId, 'file.jpg');
		$path = wgPaths::getUserfilesPath('url', $date).$filename;
		//if (!file_exists(wgPaths::getUserfilesPath('ftp', $date).$filename)) $path = self::getDefaultPicture($size);
		if (!(bool) $altFullImage) return $path;
		else return '<img src="'.$path.'" alt="'.$altFullImage.'" />';
	}
	
	public static function uploadPicture($code, $name, $caption, $file) { 
		$id = IgalleryGalleriesModel::getGalleryIdByCode($code);
		if (!(bool) $id) $id = IgalleryGalleriesModel::setNewGalleryForCode($code);
		$lid = IgalleryItemsModel::getLastFreeId();
		$filename = 'igallery.'.$id.'.'.$lid.'.images-original.jpg';
		$time = time();
		$path = wgIo::uploadFile($filename, $file['tmp_name'], wgPaths::getUserfilesPath('ftp', $time));
		if (!(bool) $path) return false;
		$ok = (bool) self::resizePicture($filename, $time);
		if (!(bool) $ok) return false;
		$ofilename = $file['name'];
		$exif = exif_read_data($path);
		$exif = xml::arrayToXml($exif);
		return (int) IgalleryItemsModel::addNewPictureToGallery($id, $lid, $filename, $ofilename, $name, $caption, $exif, $time);
	}
	
	public static function resizePicture($pictureName, $time) {
		$path = wgPaths::getUserfilesPath('ftp', $time).$pictureName;
		$conf = self::getConfiguration();
		$c = &$conf['images'];
		$info = wgIo::parseUserfilesFilename($pictureName);
		$img = new wgImages($path);
		$img->setQuality($c['quality']);
		$path = wgPaths::getUserfilesPath('ftp', $time).wgIo::getUserfilesFilename('igallery', 'images-%s', $info['id'], $info['smallid'], $pictureName.'.jpg');
		$img->resize($c['xsmall'][0], $c['xsmall'][1]);
		$img->save(sprintf($path, 'xsmall'));
		if (!file_exists(sprintf($path, 'xsmall'))) {
			self::deleteImagesBySmallId($info['smallid']);
			return false;
		}
		$img->resize($c['large'][0], $c['large'][1]);
		$img->save(sprintf($path, 'large'));
		
		$img->resize($c['medium'][0], $c['medium'][1]);
		$img->save(sprintf($path, 'medium'));
		
		$img->resize($c['small'][0], $c['small'][1]);
		$img->save(sprintf($path, 'small'));
		$img->clear();
		return $info;
	}
	
	public static function deleteImagesBySmallId($id) {
		$id = IgalleryItemsModel::getIdFromSmallid($id);
		return self::deleteImages($id);
	}
	
	
	public static function deleteImages($id) {
		$imagesObject = IgalleryItemsModel::deleteImage($id);
		$ext = pathinfo($imagesObject->getFile());
		if (isset($ext['extension'])) $ext = $ext['extension'];
		$path = wgPaths::getUserfilesPath('ftp', $imagesObject->getAdded()).'igallery.'.$imagesObject->getIgalleryGalleriesId().'.'.$imagesObject->getId().'.images-%s.'.$ext;
		if (file_exists(sprintf($path, 'xsmall'))) wgIo::delete(sprintf($path, 'xsmall'));
		if (file_exists(sprintf($path, 'small'))) wgIo::delete(sprintf($path, 'small'));
		if (file_exists(sprintf($path, 'medium'))) wgIo::delete(sprintf($path, 'medium'));
		if (file_exists(sprintf($path, 'large'))) wgIo::delete(sprintf($path, 'large'));
		if (file_exists(sprintf($path, 'original'))) wgIo::delete(sprintf($path, 'original'));
		return true;
	}
	
	public static function getConfiguration() {
		if (!wgConfig::isConfiguration('igallery')) wgConfig::saveConfiguration('igallery', self::getDefaultConfig());
		return wgConfig::getConfiguration('igallery');
	}
	
	public static function getDefaultConfig() {
		$conf = array();
		$conf['images']['xsmall'][0] = 40;
		$conf['images']['xsmall'][1] = 30;
		$conf['images']['small'][0] = 100;
		$conf['images']['small'][1] = 75;
		$conf['images']['medium'][0] = 420;
		$conf['images']['medium'][1] = 420;
		$conf['images']['large'][0] = 800;
		$conf['images']['large'][1] = 800;
		$conf['images']['quality'] = 80;
		return $conf;
	}
}
		
?>