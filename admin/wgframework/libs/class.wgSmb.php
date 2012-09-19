<?php

require_once('interface.wgConnectionInt.php');
//require_once('class.smb.php');

class wgSmb extends smb implements wgConnectionInt {
	
	private $_path = NULL;
	
	public function __construct($conn=array()) {
		;
	}
	
	public function connect($params) {
		$this->_path = $params['path'];
	}
	
	public function setPath($path) {
		;
	}
	
	public function getPath() {
		;
	}
	
	public function getFilesList($path=NULL) {
		;
	}
	
	public function getFoldersList($path=NULL) {
		;
	}
	
	public function getContent($path=NULL) {
		return parent::Go($this->_path);
	}
	
	public function downloadFile($filename, $destination=NULL) {
		;
	}
	
	public function downloadFolder($foldername, $destination=NULL) {
		;
	}
	
	public function uploadFile($file, $destination) {
		;
	}
	
	public function uploadFolder($folder, $destination) {
		;
	}
	
	public function isConnection() {
		;
	}
	
	public function isFile($file) {
		;
	}
	
	public function isFolder($file) {
		;
	}
	
	public function setLog($enable=true) {
		;
	}
	
	public function setPerms($perms) {
		;
	}
	
	public function mkdir($folder, $recursive=true) {
		;
	}
	
	public function delete($path, $recursive=true) {
		;
	}
	
	public function rename($source, $destination) {
		;
	}
	
	public function writeFile($file, $data, $perms=NULL) {
		;
	}
	
	public function readFile($file) {
		;
	}
	
	public function backup($file) {
		;
	}
	
	public function getSize($file) {
		;
	}
	
	public function __destruct() {
		;
	}
	
}
?>