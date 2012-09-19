<?php
/**
 * Example AJAX file for module iBlog
 * 
 * @package      WebGuru3
 * @subpackage   modules/iblog/ajax/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        10. November 2009
 */

chdir('../../../');
require('init/init.basic.php');

$code = wgGet::getValue('code');
$login = wgGet::getValue('login');
$password = wgGet::getValue('password');
if (!empty($code)) {
	$result = 0;
	$name = NULL;
	$surname = NULL;
	$nickname = NULL;
	$mail = NULL;
	$lastip = NULL;
	$lastlogin = NULL;
	$error = NULL;
	$uid = 0;
	if (!empty($login)) {
		wgModules::runModule('users');
		$usr = moduleUsers::login($login, $password, 'nickname');
		//print_r($usr);
		if ((bool) $usr && (bool) $usr->getId()) {
			$uid = $usr->getId();
			$name = $usr->getFirstname();
			$surname = $usr->getLastname();
			$nickname = $usr->getNickname();
			$mail = $usr->getMail();
			$lastip = $usr->getLastip();
			$lastlogin = $usr->getLastlogin();
			$result = 1;
			IblogDevicesModel::mergeCodeWithUser($code, $uid);
		}
		else {
			$result = 0;
			$error = 'Wrong login name or password.';
		}
	}
	else {
		if (!(bool) IblogDevicesModel::countBlogsForDevice($code)) {
			$idb = IblogBlogsModel::createBlogForDevice($code);
			$result = (bool) IblogDevicesModel::addDevice($code, $idb);
		}
		else {
			$result = 1;
		}
		$error = 'Register for free to enable additional functionality.';
	}
?>{
	"result": "<?php echo (int) $result; ?>",
	"error": "<?php echo $error; ?>",
	"uid": "<?php echo $uid; ?>",
	"name": "<?php echo $name; ?>",
	"surname": "<?php echo $surname; ?>",
	"mail": "<?php echo $mail; ?>",
	"nick": "<?php echo $nickname; ?>",
	"lastip": "<?php echo $lastip; ?>",
	"lastlogin": "<?php echo $lastlogin; ?>",
	"ssid": "<?php echo session_id(); ?>"
}<?php

}
else {
	
?>{
	"result": "0",
	"error": "No device code provided"
}<?php
	
}
$db = NULL;
?>