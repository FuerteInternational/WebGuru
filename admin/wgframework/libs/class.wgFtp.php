<?php

require_once('interface.wgConnectionInt.php');

class wgFtp implements wgConnectionInt {
	
	private $_host = NULL;
	private $_name = NULL;
	private $_pass = NULL;
	private $_port = 21;
	private $_conn = NULL;
	
	public function __construct($conn=array()) {
		if (is_array($conn) && !empty($conn)) $this->connect($conn);
	}
	
	public function connect($params) {
		if (!isset($params['host'])) return false;
		$this->_host = $params['host'];
		if (isset($params['name'])) $this->_name = $params['name'];
		if (isset($params['pass'])) $this->_pass = $params['pass'];
		if (isset($params['port']) && (bool) $params['port']) $this->_port = (int) $params['port'];
		require_once('Net/FTP.php');
		$this->_conn = new Net_FTP();
		$this->_conn->setHostname($this->_host);
		$this->_conn->setPort($this->_port);
		$response = $this->_conn->connect();
		if (PEAR::isError($response)) { wgError::add($response->getMessage());
			$this->_conn = false;
			return false;
		}
		$response = $this->_conn->login($this->_name, $this->_pass);
		if (PEAR::isError($response)) { wgError::add($response->getMessage());
			$this->_conn = false;
			return false;
		}
	}
	
	public function setPath($path) {
		return $this->_conn->cd($folder);
	}
	
	public function getPath() {
		return $this->_conn;
	}
	
	public function getFilesList($path=NULL) {
		;
	}
	
	public function getFoldersList($path=NULL) {
		;
	}
	
	public function getContent($path=NULL) {
		$this->_conn->cd($path);
		return $this->_conn->ls();
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
		;
	}
	
	public function isFolder($file) {
		;
	}
	
	public function isConnection() {
		return (bool) $this->_conn;
	}
	
	public function setLog($enable=true) {
		;
	}
	
	public function setPerms($perms) {
		$this->_conn->chmodRecursive($dir, $perms);
	}
	
	public function set($perms) {
		;
	}
	
	public function mkdir($folder, $recursive=true) {
		$this->_conn->mkdir($dir);
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
		if ((bool) $this->_conn) $this->_conn->disconnect();
	}
	
}
?>