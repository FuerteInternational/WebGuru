<?php
/**
 * Main class for module Blog
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. June 2009
 */

class moduleBlog {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Blog';
		$this->code    = 'blog';
		$this->version = '0.1.0.4';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function deleteCategoryPicture($projectId) {
		$filename = wgIo::getUserfilesFilename('blog', 'categories', $projectId, '%s', 'empty.jpg');
		$path = wgPaths::getUserfilesPath().$filename;
		wgIo::delete(sprintf($path, 'original'));
		wgIo::delete(sprintf($path, 'large'));
		wgIo::delete(sprintf($path, 'medium'));
		wgIo::delete(sprintf($path, 'small'));
		return (bool) wgIo::delete(sprintf($path, 'xsmall'));
	}
	
	public static function resizeCategoryPicture($projectId, $picture) {
		$filename = wgIo::getUserfilesFilename('blog', 'categories', $projectId, '%s', 'empty.jpg');
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
	
	public static function getDefaultPicture($size='small', $imgAlt=NULL) {
		$file = 'blog-items-def-'.$size.'.jpg';
		if (file_exists(wgPaths::getUserfilesPath().$file)) {
			if ((bool) $imgAlt) return '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="'.$imgAlt.'" />'; 
			else return wgPaths::getUserfilesPath('url').$file;
		}
		else return NULL;
	}
	
	public static function getConfiguration() {
		if (!wgConfig::isConfiguration('blog')) wgConfig::saveConfiguration('blog', self::getDefaultConfig());
		return wgConfig::getConfiguration('blog');
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
		// Rewrite url
		$conf['imagesrewrite']['rewritesmall'] = 'images/small/blog-{%PostId}-{%ImageId}-{%Identifier}.jpg';
		$conf['imagesrewrite']['rewritexsmall'] = 'images/xsmall/blog-{%PostId}-{%ImageId}-{%Identifier}.jpg';
		$conf['imagesrewrite']['rewritemedium'] = 'images/medium/blog-{%PostId}-{%ImageId}-{%Identifier}.jpg';
		$conf['imagesrewrite']['rewritelarge'] = 'images/large/blog-{%PostId}-{%ImageId}-{%Identifier}.jpg';
		// Files
		return $conf;
	}
	
	public function isCategoryPicture($idCategory) {
		$id = (int) $idCategory;
		if (!(bool) $id) return false;
		$filename = wgIo::getUserfilesFilename('blog', 'categories', $id, 'xsmall', 'empty.jpg');
		if (file_exists(wgPaths::getUserfilesPath().$filename)) return true;
		else return false;
	}
	
	public function getCategoryPicturePath($idCategory, $size='small') {
		$id = (int) $idCategory;
		if (!(bool) $id) return false;
		$filename = wgIo::getUserfilesFilename('blog', 'categories', $id, $size, 'empty.jpg');
		if (file_exists(wgPaths::getUserfilesPath().$filename)) return wgPaths::getUserfilesPath('url').$filename;
		else return self::getDefaultPicture($size);
	}
	
	public static function downloadFile($id) {
		$id = (int) $id;
		$file = BlogFilesModel::doSelectPKey($id);
		if ((bool) $file->getId()) {
			$path = wgPaths::getUserfilesPath().$file->getFilename();
			if (file_exists($path)) {
				BlogFilesModel::setDownload($file->getId());
				wgIo::downloadFile($path, $file->getName(), $file->getMime());
				exit();
			}
		}
	}
	
	public static function viewFile($id) {
		$id = (int) $id;
		$file = BlogFilesModel::doSelectPKey($id);
		if ((bool) $file->getId()) {
			$path = wgPaths::getUserfilesPath().$file->getFilename();
			if (file_exists($path)) {
				BlogFilesModel::setView($file->getId());
				header('Content-type: '.$file->getMime());
				echo file_get_contents(wgPaths::getUserfilesPath().$file->getFilename());
			}
		}
	}
	
	public static function deleteFilesForArticle($idArticle) {
		$files = BlogFilesModel::deleteFilesForArticle($idArticle);
	}
	
	public static function deleteFile($idFile) {
		$file = BlogFilesModel::deleteFile($idFile);
		return (bool) wgIo::delete(wgPaths::getUserfilesPath().$file->getFilename());
	}
	
	
}
		
?>