<?php

require_once('interface.wgConnectionInt.php');

class wgFileSystem implements wgConnectionInt {
	
	public function __construct($conn=array()) {
	}
	
	public function connect($params) {
		return true;
	}
	
	public function setPath($path) {
		return chdir($path);
	}
	
	public function getPath() {
		return getcwd();
	}
	
	public function getFilesList($path=NULL) {
		if (!(bool) $path) $path = './';
		return wgIo::getFiles($path);
	}
	
	public function getFoldersList($path=NULL) {
		if (!(bool) $path) $path = './';
		return wgIo::getFolders($path);
	}
	
	public function getContent($path=NULL) {
		if (!(bool) $path) $path = './';
		return wgIo::getFiles($path);
	}
	
	public function downloadFile($filename, $destination=NULL) {
		;
	}
	
	public function downloadFolder($foldername, $destination=NULL) {
		;
	}
	
	public function uploadFile($file, $destination) {
		if (is_file($source)) return $this->_conn->put($source, $dest, $overwrite);
		else return false;
	}
	
	public function uploadFolder($folder, $destination) {
		if (is_dir($source)) return $this->_conn->putRecursive($source, $dest, $overwrite);
		elseif (is_file($source)) return $this->_conn->put($source, $dest, $overwrite);
		else return false;
	}
	
	public function isFile($file) {
		return (bool) is_file($file);
	}
	
	public function isFolder($file) {
		return (bool) is_dir($file);
	}
	
	public function isConnection() {
		return true;
	}
	
	public function setLog($enable=true) {
		;
	}
	
	public function setPerms($perms) {
		return (bool) chmod($dir, $perms);
	}
	
	public function mkdir($folder, $recursive=true) {
		if ((bool) $recursive) return (bool) wgIo::mkdir($path);
		else return (bool) mkdir($folder);
	}
	
	public function delete($path, $recursive=true) {
		if ((bool) $recursive) return wgIo::delete($path);
		else unlink($path);
	}
	
	public function rename($source, $destination) {
		wgIo::move($source, $destination);
	}
	
	public function writeFile($file, $data, $perms='a') {
		wgIo::writeFile($file, $data, $perms);
	}
	
	public function readFile($file) {
		return wgIo::readFile($file);
	}
	
	public function backup($file) {
		return wgIo::backup($file);
	}
	
	public function getSize($path) {
		return wgIo::getSize($path);
	}
	
	public function __destruct() {
		
	}
	
}
?>