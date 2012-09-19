<?php 
/**
 * SSL
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      21. October 2008
 */

class wgSsl {
	
	/**
	 * Enable SSL communication if possible
	 * 
	 * @name enable
	 * @param int $port Secured port (default 443)
	 */ 
	public function enable($port=443) {
		$port = (int) $port;
		if ($_SERVER['SERVER_PORT'] != $port) {
			$path = 'https:'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?secured=1';
			if (empty($_GET['secured'])) header('Location: '.$path);
			else echo 'Cant start SSL communicatin';
			exit();
		}
	}
}
?>