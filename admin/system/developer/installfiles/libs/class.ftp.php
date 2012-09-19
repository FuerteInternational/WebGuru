<?php
class installFtp {
	
	private $_host = NULL;
	private $_name = NULL;
	private $_pass = NULL;
	private $_port = NULL;
	private $_conn = NULL;
	
	public function __construct($host, $name, $pass, $port=21, $root='/') {
		$this->_host = $host;
		$this->_name = $name;
		$this->_pass = $pass;
		$this->_port = $port;
		require_once('Net/FTP.php');
		$this->_conn = new Net_FTP();
		$this->_conn->setHostname($host);
		$this->_conn->setPort($port);
		$response = $this->_conn->connect();
		if (PEAR::isError($response)) { wgError::add($response->getMessage());
			$this->_conn = false;
			return false;
		}
		$response = $this->_conn->login($name, $pass);
		if (PEAR::isError($response)) { wgError::add($response->getMessage());
			$this->_conn = false;
			return false;
		}
	}
	
	public function __destruct() {
		if ((bool) $this->_conn) $this->_conn->disconnect();
	}
	
	public function isconn() {
		return (bool) $this->_conn;
	}
	
	public function upload($source, $dest, $overwrite=true) {
		if (is_dir($source)) return $this->_conn->putRecursive($source, $dest, $overwrite);
		elseif (is_file($source)) return $this->_conn->put($source, $dest, $overwrite);
		else return false;
	}
	
	public function chmodAll($dir, $chmod=777) {
		$this->_conn->chmodRecursive($dir, $chmod);
	}
	
	public function ls($folder) {
		$this->_conn->cd($folder);
		return $this->_conn->ls();
	}
	
	public function cd($folder) {
		return $this->_conn->cd($folder);
	}
	
	public function mkdir($dir) {
		$this->_conn->mkdir($dir);
	}
}
?>