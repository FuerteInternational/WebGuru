<?php
$mainstep = 'Configuration';
// checking if everything is ok
if (isset($_POST['submit'])) {
	$ok = true;
	if (empty($_POST['dbhost'])) { wgError::add('Database host name can not be blank');
		$ok = false;
	}
	if (empty($_POST['dbuname'])) { wgError::add('Database user name can not be blank');
		$ok = false;
	}
	if (empty($_POST['dbupass'])) wgError::add('Database user password is blank, you can change this later in Administration settings', 1);
	if ($_POST['dbname'] == 'root') wgError::add('Using Root account in database connection is very dangerous, you can change this later in Administration settings', 1);
	if (empty($_POST['dbname'])) { wgError::add('Database name can not be blank');
		$ok = false;
	}
	if (empty($_POST['webroot'])) { wgError::add('Website URL can not be blank');
		$ok = false;
	}
	if (empty($_POST['language'])) { wgError::add('System language can not be blank');
		$ok = false;
	}
	if (empty($_POST['skin'])) { wgError::add('System skin can not be blank');
		$ok = false;
	}
	if (empty($_POST['skin'])) { wgError::add('System skin can not be blank');
		$ok = false;
	}
	if ($ok) {
		$_SESSION['data'] = $_POST;
		$_SESSION['step']++;
		header('Location: ?step=4');
	}
}
if (!ini_get('safe_mode') || is_writable('../')) {
	if (file_exists('./system/system.zip')) {
		if (!is_file('../admin/libs/class.users.php')) {
			chdir('../');
			upload::makeDir('./admin/');
			upload::makeDir('./temp/');
			upload::makeDir('./userfiles/');
			upload::makeDir('./ftpfiles/');
			if (getPhpSetting('safe_mode') == 'OFF') {
				set_time_limit(0);
				upload::makeDir('./userfiles/htmlarea/');
				upload::makeDir('./admin/config/');
				upload::makeDir('./admin/temp/');
				chdir('./admin/');
				$zip = new Archive_Zip('../install/system/system.zip');
				$zip->extract();
				$ex = $zip->extract();
				chdir('../');
			}
			if (!is_file('./admin/libs/class.users.php')) { wgError::add('System is not extracted, please follow instructions how to continue with installation without zip support on <a href="http://www.webgurucms.com/">WebGuruCMS.com</a>.');
				upload::setChmod('./admin', 0755); wgError::add('Please continue with installation by filling this configuration form', 2);
			}
			else wgError::add('System is prepared for installation', 2);
	
			chdir('./install/');
	
		}
		else wgError::add('System is prepared for installation', 2);
	}
	else wgError::add('Installation package not found!');
}
else { wgError::add('Installer is unable to unpack files from archive because of some server restrictions'); wgError::add('Please follow the instructions on the <a href="http://webgurucms.com/en/installation/manual/">WebGuruCMS.com</a> website (<a href="http://webgurucms.com/en/installation/manual/">manual installation</a>)'); wgError::add('Please reload when finished');
}
if (!file_exists('../admin/config/config.php') && is_writable('../admin/config/')) {
	upload::writeFile('../admin/config/config.php', '', 'w');
	if(!file_exists('../admin/config/config.php')) wgError::add('You can\'t continue with installation until ../admin/config/config.php is created with permissions to write!');
}
if (!is_file('../admin/libs/class.users.php')) wgError::add('You can\'t continue with installation until all system files are on it\'s place. Please follow instructions on <a href="http://webgurucms.com/en/installation/manual/">WebGuruCMS.com</a>.');
// prefilling the form
if (!isset($_SESSION['data']) || empty($_SESSION['data']) || (bool) $_GET['reload']) {
	$_SESSION['data'] = array();
	// mysql settings
	$_SESSION['data']['dbhost'] = 'localhost';
	$_SESSION['data']['dbuname'] = 'root';
	$_SESSION['data']['dbupass'] = '';
	$_SESSION['data']['dbname'] = '';
	$_SESSION['data']['createdb'] = 0;
	// ftp settings
	$_SESSION['data']['ftphost'] = 'localhost';
	$_SESSION['data']['ftpname'] = '';
	$_SESSION['data']['ftppass'] = '';
	$_SESSION['data']['ftproot'] = '/';
	$_SESSION['data']['ftpport'] = 21;
	// web settings
	$port = ( $_SERVER['SERVER_PORT'] == 80 ) ? '' : ":".$_SERVER['SERVER_PORT'];
	$root = $_SERVER['SERVER_NAME'].$port.$_SERVER['PHP_SELF'];
	$root = str_ireplace("/install.*", '', $root);
	$url = "http://".$root.'/';
	$_SESSION['data']['webroot'] = $url;
	$_SESSION['data']['basetitle'] = 'WebGuru Publisher CMS';
	$_SESSION['data']['customer'] = 'My Website';
	$_SESSION['data']['language'] = 'english';
	$_SESSION['data']['skin'] = 'blow';
	$_SESSION['data']['xedit'] = 1;
	$_SESSION['data']['help'] = 1;
	$_SESSION['data']['developer'] = 0;
	// smtp settings
	$_SESSION['data']['smtphost'] = '';
	$_SESSION['data']['smtpport'] = 25;
	$_SESSION['data']['smtpname'] = '';
	$_SESSION['data']['smtppass'] = '';
	// ssl settings
	$_SESSION['data']['ssl'] = 0;
	$_SESSION['data']['sslport'] = 443;
	// extended settings
	$_SESSION['data']['filemode'] = '0755';
	$_SESSION['data']['imageq'] = 80;
	$_SESSION['data']['errorrep'] = 1;
	$_SESSION['data']['debugger'] = 1;
	$_SESSION['data']['rewprefix'] = '';
	$_SESSION['data']['logintype'] = 'nick';
	$_SESSION['data']['ipcheck'] = '0';
}
else if (isset($_POST['submit'])) $_SESSION['data'] = $_POST;
?>