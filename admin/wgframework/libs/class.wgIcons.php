<?php 
/**
 * Admin class for distributing different types of icons
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      22. October 2008
 * 
 */

class wgIcons {
	
	/**
	 * Object constructor
	 *
	 */
	public function __construct() {
		
	}
	
	public static function getPageIcon($page, $image=NULL, $mod=NULL) {
		if (!(bool) $mod) $mod = wgSystem::getModule();
		$file = 'data/'.$page.'.png';
		if (file_exists(wgPaths::getModulePath('ftp', $mod).$file)) $out = wgPaths::getModulePath('url', $mod).$file;
		else $out = wgPaths::getTemplatePath('url').'img/default/module-xxl.png';
		if ((bool) $image) return self::_getImage($out, $image);
		else return $out;
	}
	
	
	public static function getGravatar($mail, $size=100, $default=NULL) {
		$size = (int) $size;
		if (!(bool) $size) $size = 100;
		if (!(bool) $default) $default = 'http%3A%2F%2Fwww.webgurucms.com%2Fgravatar.jpg';
		return 'http://www.gravatar.com/avatar/'.md5($mail).'?d='.$default.'&s='.$size;
	}
	
	/**
	 * Get icon for file
	 *
	 * @name getFileIco
	 * @author Ondrej Rafaj
	 * @param string $file Filename
	 * @param string $img Image tag if string, path to the file if false
	 * @return string Path or Image tag
	 */
	public static function getFileIco($file, $img=false) {
		$data = explode('.', $file);
		$x = (int) count($data);
		if (!empty($x)) $x--;
		$ext = strtolower($data[$x]);
		if (!empty($ext)) return self::getIcon($ext, $img);
		else return self::getIcon('unknown', $img);
	}
	
	public static function getFileIcoExtension($file) {
		$data = explode('.', $file);
		$x = (int) count($data);
		if (!empty($x)) $x--;
		$ext = strtolower($data[$x]);
		if (!empty($ext)) return $ext;
		else 'unknown';
	}
	
	/**
	 * Get icon by name
	 *
	 * @name getIcon
	 * @author Ondrej Rafaj
	 * @param string $name Name of the icon
	 * @param string $img Image tag if string, path to the file if false
	 * @return string Path or Image tag
	 */
	public static function getIcon($name, $img=false) {
		if (file_exists(wgPaths::getAdminPath().'icons/'.$name.'.png')) {
			return self::_getImage(wgPaths::getAdminPath('url').'icons/'.$name.'.png', $img);
		}
		else {
			//if (DEVELOP == true) wgError::add(wgLang::get('iconnotexist', false).': '.$name);
			return self::_getImage(wgPaths::getAdminPath('url').'icons/quiz.png', $img);
		}
	}
	
	/**
	 * Get flag image by country code
	 *
	 * @name getFlag
	 * @author Ondrej Rafaj
	 * @param string $name Flag code
	 * @param string $img Image tag if string, path to the file if false
	 * @return string Path or Image tag
	 */
	public static function getFlag($name, $img=false) {
		if (file_exists(wgPaths::getAdminPath().'/icons/flags/'.$name.'.png')) {
			return self::_getImage(wgPaths::getAdminPath('url').'/icons/flags/'.$name.'.png', $img);
		}
		else return wgLang::get($img, false);
	}
	
	/**
	 * Returns icon of the module
	 *
	 * @name getModuleIcon
	 * @author Ondrej Rafaj
	 * @param string $module Module name
	 * @param string $img Image tag if string, path to the file if false
	 * @param string $size Icon version, ("xxl", NULL)
	 * @return string Path or Image tag
	 */
	public static function getModuleIcon($module, $img=false, $size=NULL) {
		$mod = dbSystem::getModulesByName($module);
		if ((bool) $size) $size = '-xxl';
		$file = $mod['part'].'/'.$module.'/module'.$size.'.png';
		if (file_exists(wgPaths::getAdminPath().$file)) return self::_getImage(wgPaths::getAdminPath('url').$file, $img);
		else {
			$file = 'img/default/module'.$size.'.png';
			if (file_exists(wgPaths::getTemplatePath().$file)) return self::_getImage(wgPaths::getTemplatePath().$file, $img);
			else return wgLang::get($img, false);
		}
	}
	
	private static function _getImage($path, $image) {
		if (!(bool) $image) return $path;
		else return '<img src="'.$path.'" alt="'.wgLang::get($image, false).'" />';
	}
	
	/**
	 * Returns image link (tags, js, ...) 
	 *
	 * @name getButton
	 * @author Ondrej Rafaj
	 * @param string $icon Icon name
	 * @param string $name Item name
	 * @param string $link Link
	 * @param mixed $del Require a delete confirmation (true, false, string)
	 * @return string Image link
	 */
	public static function getButton($icon, $name, $link, $del=false, $props=array()) {
		$img = self::getIcon($icon, $name);
		$add = NULL;
		if (is_string($del)) $add = ' onclick="return confirmAction(\''.wgLang::get($del, false).'?\');"';
		elseif ((bool) $del) $add = ' onclick="return confirmAction(\''.wgLang::get('delrealy', false).' '.$name.'?\');"';	
		else $add = &$del;
		if (!empty($props) && is_array($props)) foreach ($props as $k=>$v) $add .= ' '.$k.'="'.$v.'"';
		return '<a href="'.$link.'"'.$add.'>'.$img.'</a>';
	}
}
?>