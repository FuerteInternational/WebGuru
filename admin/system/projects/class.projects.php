<?php
/**
 * Main class for module Projects
 * 
 * @package      WebGuru3
 * @subpackage   modules/projects/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        13. June 2009
 */

class moduleProjects {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Projects';
		$this->code    = 'projects';
		$this->version = '4.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function getImage($id, $smallId, $size='small', $altFullImage=NULL) {
		if ((bool) $altFullImage) {
			$ext = pathinfo($altFullImage);
			$ext = $ext['extension'];
		}
		else $ext = 'jpg';
		$filename = wgIo::getUserfilesFilename('projects', 'images-'.$size, $id, $smallId, 'file.'.$ext);
		$path = wgPaths::getUserfilesPath('url').$filename;
		if (!file_exists(wgPaths::getUserfilesPath().$filename)) $path = self::getDefaultPicture($size);
		if (!(bool) $altFullImage) return $path;
		else return '<img src="'.$path.'" alt="'.$altFullImage.'" />';
	}
	
	public static function getMainImage($projectId, $size='small', $altFullImage=NULL) {
		$filename = 'projects.'.(int) $projectId.'.main.images-'.$size.'.jpg';
		$path = wgPaths::getUserfilesPath('url').$filename;
		if (!file_exists(wgPaths::getUserfilesPath().$filename)) $path = self::getDefaultPicture($size);
		if ($altFullImage == NULL) return $path;
		else return '<img src="'.$path.'" alt="'.$altFullImage.'" />';
	}
	
	public static function deleteMainPicture($projectId) {
		$filename = 'projects.'.(int) $projectId.'.main.images-%s.jpg';
		$path = wgPaths::getUserfilesPath().$filename;
		wgIo::delete(sprintf($path, 'original'));
		wgIo::delete(sprintf($path, 'large'));
		wgIo::delete(sprintf($path, 'medium'));
		wgIo::delete(sprintf($path, 'small'));
		return (bool) wgIo::delete(sprintf($path, 'xsmall'));
	}
	
	public static function resizeMainPicture($projectId, $picture) {
		$filename = 'projects.'.(int) $projectId.'.main.images-%s.jpg';
		$path = wgPaths::getUserfilesPath().$filename;
		$conf = self::getConfiguration();
		$c = &$conf['images'];
		$img = new wgImages($picture, 'upload');
		$img->setQuality($c['quality']);
		$img->save(sprintf($path, 'original'));
		$img->resize($c['large'][0], $c['large'][1]);
		$img->save(sprintf($path, 'large'));
		$img->resize($c['medium'][0], $c['medium'][1]);
		$img->save(sprintf($path, 'medium'));
		$img->resize($c['small'][0], $c['small'][1]);
		$img->save(sprintf($path, 'small'));
		$img->resize($c['xsmall'][0], $c['xsmall'][1]);
		$img->save(sprintf($path, 'xsmall'));
		$img->clear();
		return (bool) file_exists(sprintf($path, 'xsmall'));
	}
	
	public static function resizePicture($pictureName) {
		$path = wgPaths::getUserfilesPath().$pictureName;
		$conf = self::getConfiguration();
		$c = &$conf['images'];
		$info = wgIo::parseUserfilesFilename($pictureName);
		$img = new wgImages($path);
		$img->setQuality($c['quality']);
		$img->resize($c['large'][0], $c['large'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('projects', 'images-large', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->resize($c['medium'][0], $c['medium'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('projects', 'images-medium', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->resize($c['small'][0], $c['small'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('projects', 'images-small', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->resize($c['xsmall'][0], $c['xsmall'][1]);
		$img->save(wgPaths::getUserfilesPath().wgIo::getUserfilesFilename('projects', 'images-xsmall', $info['id'], $info['smallid'], $pictureName.'.jpg'));
		$img->clear();
		return $info;
	}
	
	public static function deleteImages($id) {
		$imagesObject = ProjectsImagesModel::deleteImage($id);
		$ext = pathinfo($imagesObject->getFilename());
		if (isset($ext['extension'])) $ext = $ext['extension'];
		$path = wgPaths::getUserfilesPath().'projects.'.$imagesObject->getProjectsItemsId().'.'.$imagesObject->getSmallid().'.images-%s.'.$ext;
		if (file_exists(sprintf($path, 'xsmall'))) wgIo::delete(sprintf($path, 'xsmall'));
		if (file_exists(sprintf($path, 'small'))) wgIo::delete(sprintf($path, 'small'));
		if (file_exists(sprintf($path, 'medium'))) wgIo::delete(sprintf($path, 'medium'));
		if (file_exists(sprintf($path, 'large'))) wgIo::delete(sprintf($path, 'large'));
		if (file_exists(sprintf($path, 'original'))) wgIo::delete(sprintf($path, 'original'));
		return true;
	}
	
	public static function getDefaultPicture($size='small', $imgAlt=NULL) {
		$file = 'projects-items-def-'.$size.'.jpg';
		if (file_exists(wgPaths::getUserfilesPath().$file)) {
			if ((bool) $imgAlt) return '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="'.$imgAlt.'" />'; 
			else return wgPaths::getUserfilesPath('url').$file;
		}
		else return NULL;
	}
	
	public static function getConfiguration() {
		if (!wgConfig::isConfiguration('projects')) wgConfig::saveConfiguration('projects', self::getDefaultConfig());
		return wgConfig::getConfiguration('projects');
	}
	
	public static function getDefaultConfig() {
		$conf = array();
		// Images
		$conf['images']['xsmall'][0] = 80;
		$conf['images']['xsmall'][1] = 60;
		$conf['images']['small'][0] = 100;
		$conf['images']['small'][1] = 75;
		$conf['images']['medium'][0] = 400;
		$conf['images']['medium'][1] = 300;
		$conf['images']['large'][0] = 800;
		$conf['images']['large'][1] = 600;
		$conf['images']['quality'] = 80;
		// video
		$conf['video']['width'] = 800;
		$conf['video']['height'] = 600;
		// Rewrite url
		$conf['imagesrewrite']['rewritesmall'] = 'images/small/{%ProjectId}-{%ImageId}-{%Identifier}.jpg';
		$conf['imagesrewrite']['rewritexsmall'] = 'images/xsmall/{%ProjectId}-{%ImageId}-{%Identifier}.jpg';
		$conf['imagesrewrite']['rewritemedium'] = 'images/medium/{%ProjectId}-{%ImageId}-{%Identifier}.jpg';
		$conf['imagesrewrite']['rewritelarge'] = 'images/large/{%ProjectId}-{%ImageId}-{%Identifier}.jpg';
		// Files
		return $conf;
	}
	
}
		
?>