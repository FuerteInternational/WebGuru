<?php
/**
 * File Input Output
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      16. October 2008
 */
class wgIo extends wgCookies {
	
	const READ_ONLY = 0644;
	
	const FULL_PERMISSIONS = 0777;
	
	const SAFE_READ_WRITE = 0755;
	
	/**
	 * CHMOD settings
	 *
	 * @var
	 */
	private static $_chmod = NULL;
	
	/**
	* Object constructor, sets the default CHMOD for class (755 or from config)
	* 
	* @name __construct
	* @author Ondrej Rafaj
	* @return mixed object
	*/ 
	public function __construct() {
		if (is_numeric(FILEMODE)) self::$_chmod = FILEMODE;
		else self::$_chmod = self::SAFE_READ_WRITE;
	}
	
	public static function saveTemp($file, $name='tmpfile.tmp') {
		$path = wgPaths::getTempPath();
		self::mkdir($path);
		$ret = self::uploadFile($name, $file, $path, false, 0);
		if ($ret == false) return false;
		else return $path.$name;
	}
	
	public static function getUserfilesFilename($module, $identifier, $bigId, $smallId, $originalFilename) {
		$info = pathinfo($originalFilename);
		return strtolower($module.'.'.$bigId.'.'.$smallId.'.'.$identifier.'.'.$info['extension']);
	}
	
	public static function parseUserfilesFilename($filename) {
		$arr = explode('.', $filename);
		$new = array();
		$new['module']		 = $arr[0];
		$new['id']			 = $arr[1];
		$new['smallid']		 = $arr[2];
		$new['identifier']	 = $arr[3];
		$new['extension']	 = $arr[4];
		$new['filename']	 = $filename;
		return $new;
	}
	
	public static function delTemp($name='tmpfile.tmp') {
		$path = wgPaths::getTempPath();
		self::delete($path.$name);
	}
	
	public static function mkdirWritable($path) {
		$ok = self::mkdir($path);
		if (!is_writable($path)) $ok = false;
		return $ok;
	}
	
	public static function uploadFile($name, $fileTmp, $dest, $safe=false) {
		global $lang, $size;
		//if((bool) $iconv) $tname = iconv('windows-1250', CHARSET, $name);
		if ((bool) $safe) $name = valid::safeText($name, 'file');
		if (!is_dir($dest)) self::mkdir($dest);
		if (move_uploaded_file($fileTmp, $dest.$name)) return $dest.$name;
		else return false;
	}
	
	public static function uploadModuleImage($file, $name, $module, $datestamp=NULL) {
		$path = wgPaths::getUserfilesPath('ftp', $datestamp);
		$path = self::uploadFile($module.'-'.$name, $file['tmp_name'], $path);
		wgError::add($path);
		return $path;
	}
	
	public static function downloadFile($file, $filename=NULL, $mime=NULL) {
		error_reporting(0);
		$info = pathinfo($file);
		if (empty($filename)) $filename = $info['filename'];
		if (file_exists($file)) {
			require_once('HTTP/Download.php');
			$params = array('file'=>$file);
			$filename = str_ireplace(' ', '_', $filename);
			$params['contentdisposition'] = 'Content-Disposition: attachment; filename='.$filename;
			if (!empty($mime)) $params['contenttype'] = $mime;
			$d = new HTTP_Download($params);
			$d->send();
			exit();
		}
		else return false;
	}
	
	public static function createTempFile($name, $data) {
		$ssid = wgGet::getValue('wgssid');
		if (empty($ssid)) return false;
		$folder = wgPaths::getPath().'temp/';
		if (!is_dir($folder)) self::mkdir($folder);
		$path = $folder.$ssid.'-'.$name.'.wgtmp';
		self::writeFile($path, $data);
		return $path;
	}
	
	public static function getTempFile($name) {
		$ssid = wgGet::getValue('wgssid');
		if (empty($ssid)) $ssid = session_id();
		$folder = wgPaths::getPath().'temp/';
		$path = $folder.$ssid.'-'.$name.'.wgtmp';
		return (bool) self::readFile($path);
	}
	
	public static function clearTempFolder($path) {
		
	}
	
	public static function deleteTempFile($name) {
		$ssid = wgGet::getValue('wgssid');
		if (empty($ssid)) return false;
		$folder = wgPaths::getPath().'temp/';
		$path = $folder.$ssid.'-'.$name.'.wgtmp';
		return (bool) self::delete($path);
	}
	
	/**
	* Creates a directory or path if safe_mode is not enabled
	* 
	* @name mkdir
	* @author Ondrej Rafaj
	* @param string $path path of the directory to create
	* @param int $chmod template for translatable
	* @return bool returns false or created path on success
	*/ 
	public static function mkdir($path, $chmod=NULL) {
		if (!(bool) $chmod) $chmod = self::SAFE_READ_WRITE;
		umask(0000);
		if (is_dir($path)||empty($path)) return 1; // best case check first
		if (file_exists($path) && !is_dir($path)) return 0;
		if (self::mkdir(substr($path,0,strrpos($path,'/'))))
		if (!is_dir($path)) {
			$ok = (bool) mkdir($path, $chmod); // crawl back up & create dir tree
			chmod($path, $chmod);
			if ($ok) return $path;
			else return false;
		}
		else return $path;
	}
	
	public static function deleteContent($path, $deleteFolders=true) {
		if (is_dir($path)) {
			$files = self::getFiles($path);
			foreach ($files as $file) self::delete($path.$file);
			if ((bool) $deleteFolders) {
				$dirs = self::getFiles($path);
				foreach ($dirs as $dir) self::delete($path.$dir);
			}
		}
		elseif (is_file($path)) wgIo::writeFile($path, '');
	}
	
	/**
	* Returns base path for website (root of the website)
	* 
	* @name delete
	* @author Ondrej Rafaj
	* @param string $path path of the file or 
	* @param bool $all true to delete the entire file structure or false to try to delete just one file (true is default) 
	* @return bool true on success or false
	*/ 
	public static function delete($path, $all=true) {
		if (is_dir($path) && (bool) $all) {
			$dir = opendir($path); 
			while (false!==($file = readdir($dir))) { 
				if ($file != "." && $file != "..") { 
					if (is_dir($path.'/'.$file)) self::delete($path.'/'.$file);
					else {
						$delete = @unlink($path.'/'.$file); 
						clearstatcache();
						if (@file_exists($path.'/'.$file)) { 
							$filesys = str_ireplace("/","\\",$file); 
							$delete = @system("del $filesys");
							clearstatcache();
							if (@file_exists($path.'/'.$file)) { 
								$delete = @chmod ($path.'/'.$file, self::FULL_PERMISSIONS); 
								$delete = @unlink($path.'/'.$file); 
								$delete = @system("del $filesys");
							}
						}
					}
					if (is_dir($path.'/'.$file)) {
						clearstatcache();
						$path = str_ireplace('//', '/', $path);
						if(file_exists($path.'/'.$file)) rmdir($path.'/'.$file);
					}
				} 
			}
			chmod ($path, self::FULL_PERMISSIONS);
			@rmdir($path);
			if (is_dir($path)) {
				closedir($dir); 
				return false;
			}
			else {
				closedir($dir); 
				return true;
			}
		}
		else {
			if (!file_exists($path) && !is_dir($path)) return true;
			return unlink($path);
		}
	}
	
	/**
	* Makes a copy of the file source path to destination path
	* 
	* @name copy
	* @author Ondrej Rafaj
	* @param string $source source file
	* @param string $target destination file
	* @return bool true on success or false
	*/ 
	public static function copy($source, $target) {
        if (is_dir($source)) {
            self::mkdir($target);
            $d = dir($source);
            while (false !== ($entry = $d->read())) {
                if ($entry == '.' || $entry == '..') continue;
                $Entry = $source.'/'.$entry;           
                if (is_dir($Entry)) {
                    self::copy($Entry, $target.'/'.$entry);
                    continue;
                }
                copy($Entry, $target.'/'.$entry);
            }
            $d->close();
            return true;
        }
		else return copy($source, $target);
    }
	
    /**
	* Moves (renames) old file (folder) to a new one
	* 
	* @name move
	* @author Ondrej Rafaj
	* @param string $source old file path
	* @param string $destination new file path
	* @return bool true on success or false
	*/ 
	public static function move($source, $destination) {
		return rename($source, $destination);
	}
	
	/**
	* Makes backup from a file
	* 
	* @name backup
	* @author Ondrej Rafaj
	* @param string $file old file path
	* @return bool true on success or false
	*/ 
	public static function backup($file) {
		if (!file_exists($file)) return false;
		return copy($file, $file.'.'.date('Y-m-d-H-i-s').'.bak');
	}
	
	public static function setChmod($path, $chmod=NULL) {
		if (empty($path)) return false;
		if (!(bool) $chmod) $chmod = self::SAFE_READ_WRITE;
		if (is_writable($path)) return (bool) @chmod($path, $chmod);
		else return false;
	}
	
	/**
	* Returns base path for website (root of the website)
	* 
	* @name writeFile
	* @author Ondrej Rafaj
	* @param string $path path of the file
	* @param string $data data to write
	* @param string $mode write mode (w overwrite the file, a write on the end of the file)
	* @return bool true on success or false
	*/ 
	public static function writeFile($path, $data='', $mode='w') {
		if (!is_dir(dirname($path))) self::mkdir(dirname($path));
		if (!$handle = fopen($path, $mode)) return false;
		$ret = true;
		if(!fwrite($handle, $data)) $ret=false;
		fclose($handle);
		self::setChmod($path, 0755);
		return $ret;
	}
	
	/**
	* Returns base path for website (root of the website)
	* 
	* @name readFile
	* @author Ondrej Rafaj
	* @param string $source path of the file to read
	* @return string contentent of the file if success or false
	*/ 
	public static function readFile($source) {
		return file_get_contents($source);
	}
	
	/**
	* Returns array of files in specified folder
	* 
	* @name getFiles
	* @author Ondrej Rafaj
	* @param string $path Path to the folder
	* @param bool $error Send error message if any and developers mode is turned on
	* @return array Array with all files in the folder (no folders)
	*/ 
	public static function getFiles($path, $error=true) {
		return self::_getContent($path, 'is_file', $error);
	}
	
	/**
	* Returns array of sub-folders in specified folder
	* 
	* @name getFolders
	* @author Ondrej Rafaj
	* @param string $path Path to the folder
	* @param bool $error Send error message if any and developers mode is turned on
	* @return array Array with all sub-folders in the selected folder (no ffiles)
	*/ 
	public static function getFolders($path, $error=true) {
		return self::_getContent($path, 'is_dir', $error);
	}
	
	/**
	 * Returns array with all files and subfolders
	 *
	 * @param unknown_type $path
	 * @param unknown_type $error
	 * @return unknown
	 */
	public static function getFoldersAndFiles($path, $error=true) {
		return self::_getContent($path, NULL, $error);
	}
	
	/**
	* Returns array of sub-folders in specified folder
	* 
	* @name _getContent
	* @author Ondrej Rafaj
	* @param string $path Path to the folder
	* @param string $function Name of the used function ("is_file" or "is_dir")
	* @param bool $error Send error message if any and developers mode is turned on
	* @return array Array with all sub-folders in the selected folder (no ffiles)
	*/ 
	private static function _getContent($path, $function=NULL, $error=true) {
		$arr = array();
		if (is_dir($path)) {
			if ($selected_dir = opendir($path)) {
				while (false !== ($file = readdir($selected_dir))) {
					$check = strtolower($file);
					if ($check != "." && $check != ".." && $check != ".svn" && $check != ".ds_store") {
						if ((bool) $function) if ($function($path.$file)) array_push($arr, $file);
						else array_push($arr, $file);
					}
				}
				closedir($selected_dir);
			}
			return $arr;
		}
		else {
			if (DEVELOP == true && (bool) $error) wgError::add(wgLang::get('dirnotexist').': '.$path);
			return array();
		}
	}
	
	/**
	 * Return file or directory size (recursively)
	 *
	 * @author http://lixlpixel.org/recursive_function/php/get_size_recursively/
	 * @author Ondrej Rafaj
	 * @name getDirectorySize
	 * @param string $directory Path
	 * @param bool $format Format output (Mb, Kb, bytes)
	 * @return mixed filesize (int or string if $format == true)
	 */
	public static function getSize($pathOrSize, $format=false) {
		$size = 0;
		if (!is_int($pathOrSize)) {
			$path = $pathOrSize;
			if (is_dir($path)) {
				if (substr($path, -1) == '/')  $path = substr($path, 0, -1);
				if (!file_exists($path) || !is_dir($path) || !is_readable($path)) return -1;
				if ($handle = opendir($path)) {
					while(($file = readdir($handle)) !== false) {
						$fpath = $path.'/'.$file;
						if($file != '.' && $file != '..') {
							if(is_file($fpath))  $size += filesize($fpath);
							elseif(is_dir($fpath)) {
								$handlesize = self::getSize($fpath);
								if($handlesize >= 0) $size += $handlesize;
								else return -1;
							}
						}
					}
					closedir($handle);
				}
			}
			else if (is_file($path)) $size = filesize($path);
		}
		else {
			$size = $pathOrSize;
		}
		if ((bool) $format) {
			if($size / 1048576 > 1) return round($size / 1048576, 1).' Mb';
			elseif($size / 1024 > 1) return round($size / 1024, 1).' Kb';
			else return round($size, 1).' bytes';
		}
		else return $size;
	}
	
	/**
	 * Send file to the user
	 *
	 * @author Ondrej Rafaj
	 * @name sendDownloadFile
	 * @param string $file Full path to the file
	 */
	public static function sendDownloadFile($file) {
		if (file_exists($file)) {
			require_once('HTTP/Download.php');
			$d = new HTTP_Download(array('file'=>$file));
			$d->send();
			exit();
		}
	}
}

?>