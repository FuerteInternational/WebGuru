<?php
class upload {
	public $dir;
	public $tempdir;
	public $file;
	public $filepath;
	public $ftp = false;
	
	public function setChmod($path, $mode) {
		$arr = self::readDirectories($path);
		if (!empty($arr) && is_array($arr)) foreach ($arr as $dir) {
			@chmod($path.$dir.'/', $mode);
			self::setChmod($path.$dir.'/', $mode);
		}
		$arr = self::readDir($path);
		if (!empty($arr) && is_array($arr)) foreach ($arr as $file) @chmod($path.$file, $mode);
	}
	
	
	// create folder
	public function makeDir($path, $chmod=0755) {
		if (!(bool) $chmod) $chmod = 0755;
		if (!is_dir($path)) {
			$ok = mkdir($path,  $chmod);
			chmod($path, $chmod);
		}
		else {
			chmod($path, $chmod);
			return true;
		}
		return $ok;
	}
	
	// download export file
	public function downloadFile($file) {
		if (file_exists($file)) {
			require_once('HTTP/Download.php');
			$d = new HTTP_Download(array('file'=>$file));
			$d->send();
			exit();
		}
	}
	// rename file
	public function renameFile($source, $dest) {
		if (is_file($source)) { 
			if (@rename(dirname($dest).$oldname, $dest)) return true;
			else { wgError::add('cantrenamefile');
				return false;
			}
		}
		else { wgError::add('filenotexist');
			return false;
		}
	}
	
	// move file
	public function moveFile($source, $dest) {
		if (is_file($source)) { 
			if (@rename($source, $dest)) return true;
			else return false;
		}
		else return false;
	}
	
	// copy file
	public function copyFile($source, $dest, $lower=false) {
		if ($lower) $dest = strtolower($dest);
		if (is_dir($dest)) { 
			if (!copy($source, $dest)) return false;
			else return true;
		}
		else {
			self::mkdir_p(dirname($dest));
			if (copy($source, $dest)) return true;
			else return false;
		}
	}
	// copy folder (entire structure)
	function fullCopy($source, $target) {
        if (is_dir($source)) {
            @mkdir($target);
            $d = dir($source);
            while (false !== ($entry = $d->read())) {
                if ($entry == '.' || $entry == '..') continue;
                $Entry = $source.'/'.$entry;           
                if (is_dir($Entry)) {
                    self::fullCopy($Entry, $target.'/'.$entry);
                    continue;
                }
                copy($Entry, $target.'/'.$entry);
            }
            $d->close();
        }
		else copy($source, $target);
    }
	// upload temporary file and return path
	public function saveTemp($file, $name='tmpfile.tmp') {
		$path = basic::getPath().'admin/temp/'.$_SESSION['user']['nick'].'/tempfiles/';
		upload::mkdir_p($path);
		$ret = self::uploadFile($name, $file, $path, false, 0);
		if ($ret == false) return false;
		else return $path.$name;
	}
	// delete temporary file
	public function delTemp($name='tmpfile.tmp') {
		$path = basic::getPath().'admin/temp/'.$_SESSION['user']['nick'].'/tempfiles/';
		self::deleteFile($path.$name);
	}
	// upload some file
	public function uploadFile($name, $file, $dest, $safe=false, $iconv=ICONV) {
		global $lang, $size;
		if((bool) $iconv) $tname = iconv('windows-1250', CHARSET, $name);
		if ((bool) $safe) $name = checker::safeText($name, 'file');
		if (!is_dir($dest)) self::mkdir_p($dest);
//		if($file['size'] > $size['file']['max']) {
// wgError::add($lang->get('toobigfile'));
//			return false;
//		} 
		if (move_uploaded_file($file, $dest.$name)) return $dest.$name;
		else return false;
	}
	// read list of files from folder (no dirs)
	public function readDir($path, $err=true) {
		global $lang;
		$arr = array();
		if (is_dir($path)) {
			if ($selected_dir = opendir($path)) {
				while (false !== ($file = readdir($selected_dir))) {
					if ($file != "." && $file != "..") {
						if (is_file($path.$file)) array_push($arr, $file);
					}
				}
				closedir($selected_dir);
			}
			return $arr;
		}
		else {
			if ((bool) $err) wgError::add('dirnotexist');
			return false;
		}
	}
	// read list of folders from some path
	public function readDirectories($path, $err=true) {
		$arr = array();
		if (is_dir($path)) {
			if ($selected_dir = opendir($path)) {
				while (false !== ($file = readdir($selected_dir))) {
					if ($file != "." && $file != "..") {
						if (is_dir($path.$file)) array_push($arr, $file);
					}
				}
				closedir($selected_dir);
			}
			return $arr;
		}
		else {
			if ((bool) $err) wgError::add('dirnotexist');
			return false;
		}
	}

	// create full dir path
	public function mkpath($path, $mode) {
		if(!$this->isDirExist($path)) {
		$err=false;
		umask(0000);
		$dirs = explode("/", $this->getRealpath($path)); 
		$path = $dirs[0]; 
		for($i = 1;$i < count($dirs);$i++) { 
			$path .= "/".$dirs[$i]; 
			if(!file_exists($path) && $path!='/') {
				if($this->isFTP()) {
					if(!$this->FTPmkdir($path,$mode)) { $err=true; }
				} 
				else {
					if(!@mkdir($path,$mode)) $err=true; 
				}
				if($err) { wgError::add('mkdirfailes'); wgError::add($path, 1);
				} else { wgError::add('Dir create: '.$path, 2);
				}
			}
		} 
		}
	}

	// create folder
	public function createFolder($dir, $chmod=0755) {
		if (!is_dir($dir)) {
			if (!@mkdir($dir,  $chmod)) return false;
			else return true;
		}
		else return true;
	}
	
	// make .htaccess with deny all
	public function makeDenyAll($folder) {
		$ht = new htaccess($folder.'/.htaccess');
		if (!$ht->denyAll()) return false;
		else return true;
	}
	
	// delete everything
	public function deleteDir($path) {
		if (is_dir($path)) {
			$dir = opendir($path); 
			while (false!==($file = readdir($dir))) { 
				if ($file != "." && $file != "..") { 
					if (is_dir($path.'/'.$file)) self::deleteDir($path.'/'.$file);
					else {
						$delete = @unlink($path.'/'.$file); 
						clearstatcache();
						if (@file_exists($path.'/'.$file)) { 
							$filesys = str_ireplace("/","\\",$file); 
							$delete = @system("del $filesys");
							clearstatcache();
							if (@file_exists($path.'/'.$file)) { 
								$delete = @chmod ($path.'/'.$file, 0755); 
								$delete = @unlink($path.'/'.$file); 
								$delete = @system("del $filesys");
							}
						}
					}
					if (is_dir($path.'/'.$file)) {
						clearstatcache();
						rmdir($path.'/'.$file);
					}
				} 
			}
			chmod ($path, 0755);
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
		else return false;
	}
	// delete file
	function deleteFile($file) {
		$delete = @unlink($file);
		clearstatcache();
		if (@file_exists($file)) { 
			$filesys = str_ireplace("/","\\",$file); 
			//$delete = @system("del $filesys");
			clearstatcache();
			if (@file_exists($file)) { 
				$delete = @chmod ($file, 0755); 
				$delete = @unlink($file); 
				//$delete = @system("del $filesys");
				if (file_exists($file)) return false;
			}
			else {
				return true;
			}
		}
		else {
			return true;
		}
	}
	
	// write to file
	function writeFile($path, $data=NULL, $how='w') {
		global $lang;
		$handle = fopen($path, $how);
		if(!fwrite($handle, $data)) {
			$ret=false;
			if (!empty($data)) wgError::add('Unable to write file: '.$path);
		} else {
			if(@!chmod($path, 0755)) wgError::add($lang->get('cantsetpermition').': '.$path);
			$ret=true;
		}
		fclose($handle);
		return $ret;
	}
	
	// read file
	public function readFile($path, $linesep=NULL) {
		if(file_exists($path)) {
			$arr = file($path);
			$data = NULL;
			if (empty($linesep)) foreach ($arr as $line) $data .= $line;
			else foreach ($arr as $line) $data .= '<'.$linesep.'>'.$line.'</'.$linesep.'>';
			return $data;
		}
		else return false;
	}
	
	// make full dir path
	function mkdir_p($target) {
		umask(0000);
		if (is_dir($target)||empty($target)) return 1; // best case check first
		if (file_exists($target) && !is_dir($target)) return 0;
		if (self::mkdir_p(substr($target,0,strrpos($target,'/'))))
		if (!is_dir($target)) {
			$ok = mkdir($target,0755); // crawl back up & create dir tree
			chmod($target, 0755);
			return $ok;
		}
		else return true;
		return 0;
	}
	// delete dir
	function deldir($dir, $tryToChandeMode = false) {
		$success = false;
		if(is_file($dir)){
			if(@unlink($dir)) { $success = true; }
		} else {
			$handle = opendir($dir);
			while (false!==($FolderOrFile = readdir($handle))) {
				if($FolderOrFile != "." && $FolderOrFile != "..") {  
					if(is_dir("$dir/$FolderOrFile")) { $this->deldir("$dir/$FolderOrFile"); }  // recursive
					else { 
						if($tryToChandeMode) $this->setMod("$dir/$FolderOrFile");
						@unlink("$dir/$FolderOrFile"); 
					}
				}  
			}
			closedir($handle);
			if($tryToChandeMode) $this->setMod($dir);
			if(@rmdir($dir)) { $success = true; }
		}
		if($success==true) { wgError::add('Dir deleted', 2);
		}
		else { wgError::add('norulezfordeletedir'); wgError::add($dir,1);
		}
		return $success;  
	}
}
?>