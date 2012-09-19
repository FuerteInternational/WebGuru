<?php
/**
 * Main class for module MotoCatalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/motocatalogue/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. May 2009
 */

class moduleMotocatalogue {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'MotoCatalogue';
		$this->code    = 'motocatalogue';
		$this->version = '0.0.0.2';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function getMainPicForItem($id, $size='small', $altFullImage=NULL) {
		$mypath = getcwd();
		chdir(wgPaths::getUserfilesPath());
		$arr = glob('motocatalogue.'.$id.'.*.images-'.$size.'.jpg');
		chdir($mypath);
		if (isset($arr[0])) return '<img src="'.$path.'" alt="'.$altFullImage.'" />';
		else return NULL;
	}
	
	public static function getImage($id, $smallId, $size='small', $altFullImage=NULL) {
		if ((bool) $altFullImage) {
			$ext = pathinfo($altFullImage);
			$ext = $ext['extension'];
		}
		else $ext = 'jpg';
		
		$filename = wgIo::getUserfilesFilename('motocatalogue', 'images-'.$size, $id, $smallId, 'file.jpg');
		//wgError::add($filename);
		$path = wgPaths::getUserfilesPath('url').$filename;
		if (!file_exists(wgPaths::getUserfilesPath().$filename)) $path = self::getDefaultPicture($size);
		if (!(bool) $altFullImage) return $path;
		else return '<img src="'.$path.'" alt="'.$altFullImage.'" />';
	}
	
	public static function getLogo($id, $altFullImage=NULL) {
		$filename = wgIo::getUserfilesFilename('motocatalogue', 'logo', $id, 0, 'file.jpg');
		$path = wgPaths::getUserfilesPath('url').$filename;
		if (!(bool) $altFullImage) return $path;
		else return '<img src="'.$path.'" alt="'.$altFullImage.'" />';
	}
	
	public static function resizePicture($pictureName) {
		$path = wgPaths::getUserfilesPath().$pictureName;
		$conf = self::getConfiguration();
		$c = &$conf['images'];
		$info = wgIo::parseUserfilesFilename($pictureName);
		$img = new wgImages($path);
		$img->setQuality($c['quality']);
		$img->resize($c['large'][0], $c['large'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('motocatalogue', 'images-large', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->resize($c['medium'][0], $c['medium'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('motocatalogue', 'images-medium', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->resize($c['small'][0], $c['small'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('motocatalogue', 'images-small', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->resize($c['xsmall'][0], $c['xsmall'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('motocatalogue', 'images-xsmall', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->clear();
		return $info;
	}
	
	public static function getDefaultPicture($size='small', $imgAlt=NULL) {
		$file = 'motocatalogue-items-def-'.$size.'.jpg';
		if (file_exists(wgPaths::getUserfilesPath().$file)) {
			if ((bool) $imgAlt) return '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="'.$imgAlt.'" />'; 
			else return wgPaths::getUserfilesPath('url').$file;
		}
		else return NULL;
	}
	
	public static function getConfiguration() {
		if (!wgConfig::isConfiguration('motocatalogue')) wgConfig::saveConfiguration('motocatalogue', self::getDefaultConfig());
		return wgConfig::getConfiguration('motocatalogue');
	}
	
	public static function getDefaultConfig() {
		$conf = array();
		// Images
		$conf['images']['xsmall'][0] = 80;
		$conf['images']['xsmall'][1] = 60;
		$conf['images']['small'][0] = 198;
		$conf['images']['small'][1] = 113;
		$conf['images']['medium'][0] = 400;
		$conf['images']['medium'][1] = 300;
		$conf['images']['large'][0] = 800;
		$conf['images']['large'][1] = 600;
		$conf['images']['quality'] = 80;
		return $conf;
	}
	
	public static function deleteImages($id) {
		$imagesObject = MotocatalogueImagesModel::deleteImage($id);
		$ext = pathinfo($imagesObject->getFilename());
		if (isset($ext['extension'])) $ext = $ext['extension'];
		$path = wgPaths::getUserfilesPath().'projects.'.$imagesObject->getProjectsItemsId().'.'.$imagesObject->getSmallid().'.images-%s.jpg';
		if (file_exists(sprintf($path, 'xsmall'))) wgIo::delete(sprintf($path, 'xsmall'));
		if (file_exists(sprintf($path, 'small'))) wgIo::delete(sprintf($path, 'small'));
		if (file_exists(sprintf($path, 'medium'))) wgIo::delete(sprintf($path, 'medium'));
		if (file_exists(sprintf($path, 'large'))) wgIo::delete(sprintf($path, 'large'));
		if (file_exists(sprintf($path, 'original'))) wgIo::delete(sprintf($path, 'original'));
		return true;
	}
	
	
}
		
?>