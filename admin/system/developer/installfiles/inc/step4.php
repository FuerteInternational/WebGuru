<?php
$mainstep = 'Step 4';

if ((bool) $_SESSION['data']['ssl']) $_SESSION['data']['sslport'] = (int) $_SESSION['data']['sslport'];
else $_SESSION['data']['sslport'] = 0;

$imageq = (int) $_SESSION['data']['imageq'];
if ($imageq < 10 || $imageq > 100) $imageq = 80;

if (empty($_SESSION['data']['dateformat'])) $_SESSION['data']['dateformat'] = 'j.n.Y - G:i';
$_SESSION['data']['developer'] = (int) $_SESSION['data']['developer'];
if ((bool) $_SESSION['data']['developer']) $develop = 'true';
else $develop = 'false';

if (empty($_SESSION['data']['language'])) $_SESSION['data']['language'] = 'english';
if (empty($_SESSION['data']['skin'])) $_SESSION['data']['skin'] = 'three';
if (empty($_SESSION['data']['logintype'])) $_SESSION['data']['logintype'] = 'nickname';

$_SESSION['data']['support'] = 'http://www.webgurucms.com/';
$_SESSION['data']['myhelp'] = 'http://www.webgurucms.com/';
$_SESSION['data']['mynews'] = 'http://www.webgurucms.com/';

$longestlen = 0;
foreach ($_SESSION['data'] as $val) if ($longestlen < strlen($val)) $longestlen = strlen($val);
$longestlen += 6;
function setString($key, $comment=NULL) {
	global $longestlen;
	$val = (string) '"'.$_SESSION['data'][$key].'"';
	$len = (int) strlen($val);
	$width = ($longestlen-$len);
	if ($width < 0) wgError::add($width.' -> '.$key.' -> '.$val);
	$spaces = '';
	for ($i; $i<=$width; $i++) $spaces .= ' ';
	if (!empty($comment)) $comment = '// '.$comment;
	return $val.';'.$spaces.$comment;
}

function setInt($key, $comment=NULL) {
	global $longestlen;
	$val = (string) ((int) $_SESSION['data'][$key]);
	$len = (int) strlen($val);
	$width = ($longestlen-$len);
	if ($width < 0) wgError::add($width.' -> '.$key.' -> '.$val, 1);
	$spaces = '';
	for ($i; $i<=$width; $i++) $spaces .= ' ';
	if (!empty($comment)) $comment = '// '.$comment;
	return $val.';'.$spaces.$comment;
}

function setValue($val, $comment=NULL) {
	global $longestlen;
	if (!is_numeric($val)) $val = (string) '"'.$val.'"';
	else $val = (string) $val;
	$len = (int) strlen($val);
	$width = ($longestlen-$len);
	if ($width < 0) wgError::add($width.' -> '.$val, 2);
	$spaces = '';
	for ($i; $i<=$width; $i++) $spaces .= ' ';
	if (!empty($comment)) $comment = '// '.$comment;
	return ''.$val.';'.$spaces.$comment;
}

$file = '<?php
/**
 * WebGuru3 configuration file
 *
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @author     WebGuruCMS3 Installer
 * @version    Generated automaticaly
 */

// database configuration
$conf["db"]["host"]             = '.setString('dbhost', 'database host computer, default localhost').'
$conf["db"]["user"]             = '.setString('dbuname', 'user name, default root').'
$conf["db"]["pass"]             = '.setString('dbupass', 'user password, blank password can be only in development mode').'
$conf["db"]["dtbs"]             = '.setString('dbname', 'database name').'
$conf["db"]["pref"]             = '.setString('prefix', 'prefix for database, blank as default').'
$conf["db"]["encoding"]         = '.setString('utf8', 'default encoding for the database connection').'

// system definitions
$conf["define"]["develop"]      = '.setValue($develop, 'development tool, default false, enable = true').'
$conf["define"]["filemode"]     = '.setInt('filemode', 'default CHMOD value for files, recomended 0755').'
$conf["define"]["webroot"]      = '.setString('webroot', 'root of the website').'
$conf["define"]["adminfolder"]  = '.setValue('admin/', 'path to the admin folder').'
$conf["define"]["tempfolder"]   = '.setValue('temp/', 'path to the temporary folder (temp)').'
$conf["define"]["usrffolder"]   = '.setValue('userfiles/', 'path to the temporary folder (temp)').'
$conf["define"]["xedit"]        = '.setInt('xedit', 'enable or disable on the frontend edit functions (0, 1)').'
$conf["define"]["errorrep"]     = '.setInt('errorrep', 'type of error reporting, default 0 in develop value is not true, than E_ALL').'
$conf["define"]["dateformat"]   = '.setString('dateformat', 'default Y-m-d H:i:s').'

// ftp settings
$conf["ftp"]["host"]            = '.setString('ftphost', 'host computer for ftp connection').'
$conf["ftp"]["port"]            = '.setString('ftpport', 'ftp port on the host computer, default is 21').'
$conf["ftp"]["username"]        = '.setString('ftpname', 'username for ftp connection').'
$conf["ftp"]["password"]        = '.setString('ftppass', 'password for ftp connection').'
$conf["ftp"]["root"]            = '.setString('ftproot', 'root path for ftp connection, leave blank if none').'

// smtp settings (sending emails)
$conf["smtp"]["host"]           = '.setString('smtphost', 'host computer for smtp connection, leave all smtp settings blank if you want to use the basic php mail() function').'
$conf["smtp"]["port"]           = '.setString('smtpport', 'smtp port on the host computer, default is 25').'
$conf["smtp"]["auth"]           = '.setValue(empty($_SESSION['data']['smtpname']) ? 0 : 1, 'use the smtp authentification (0, 1)').'
$conf["smtp"]["username"]       = '.setString('smtpname', 'smtp username (if authentification is enabled)').'
$conf["smtp"]["password"]       = '.setString('smtppass', 'smtp password (if authentification is enabled)').'

// ajax configuration
$conf["ajax"]["content"]         = '.setString('content', 'content of the div with this id will be replaced with the ajax page content').'

// admin configuration
$conf["admin"]["logintype"]     = '.setString('logintype', 'login type for administration, "mail" or "nickname"').'
$conf["admin"]["template"]      = '.setString('skin', 'default template for administration (default: "three")').'
$conf["admin"]["deflang"]       = '.setString('language', 'default template for administration (default: "three")').'
$conf["admin"]["editor"]        = '.setValue("none", 'default html editor for administration ("markitup" or "tiny_mce")').'
$conf["admin"]["administrator"] = '.setValue("info@example.cz", 'system administrator contact email').'
$conf["admin"]["ipcheck"]       = '.setString('ipcheck', 'it is strongly recomended to use this option, for more ip adresses use comma to separate them').'
$conf["admin"]["support"]       = '.setString('support', 'support server url, default is http://www.webgurucms.com/').'
$conf["admin"]["myhelp"]        = '.setString('myhelp', 'help server url, default is http://www.webgurucms.com/').'
$conf["admin"]["mynews"]        = '.setString('mynews', 'news server url, default is http://www.webgurucms.com/').'
$conf["admin"]["help"]          = '.setInt('help', 'show help in the administration by default (0, 1)').'

// customization
$conf["cust"]["basetitle"]      = '.setString('basetitle', 'base title for the administration').'
$conf["cust"]["webname"]        = '.setString('customer', 'name of the default website').'

// system configuration 
$conf["system"]["ssl"]          = '.setInt('sslport', 'SSL port number or 0 for disabled').'
$conf["system"]["sestime"]      = '.setValue(1800, 'session valid (seconds) or 0 for unlimited').'
$conf["system"]["rewprefix"]    = '.setString('rewprefix', 'prefix for the mod_rewrite url rules, leave blank as default').'
$conf["system"]["rewprefix"]    = '.setValue($imageq, 'quality of generated jpeg images (10 - 100)').'
$conf["system"]["bbclone"]      = '.setValue(1, 'use the bbclone tracking system').'
$conf["system"]["wgclicktrack"] = '.setValue(0, 'use the WGClickTrack tracking system').'

// logging
$conf["logs"]["access"]         = '.setInt('developer', 'enable or disable administration access logging (0, 1)').'
$conf["logs"]["errors"]         = '.setInt('developer', 'enable or disable database errors logging (0, 1)').'
$conf["logs"]["queries"]        = '.setInt('developer', 'enable or disable database queries logging (0, 1)').'
?>';

$ret = upload::writeFile('../admin/config/config.php', $file);
if ($ret) { wgError::add('Configuration file was saved', 2); wgError::add('Please set lower permissions on your configuration file (like 664 on admin/config/config.php)', 1);
	$config = true;
}
else { wgError::add('Configuration file was not saved'); wgError::add('Can\'t write to file admin/config/config.php, please check permissions for this folder'); wgError::add('Can\'t import database');
	$config = false;
}

if ($config) {
	
	require('database.php');
	
	chdir('../admin/');
	require('init/init.vars.php');
	require('config/config.php');
	require('init/init.defines.php');
	
	require('libs/class.wgConnector.php');
	
	require('libs/class.paths.php');
	$conf['inclusion'] = array();
	$conf['inclusion'][] = wgPaths::getAdminPath().'libs/';
	$conf['inclusion'][] = wgPaths::getAdminPath().'pear/';
	$conf['inclusion'][] = wgPaths::getAdminPath().'init/';
	$conf['inclusion'][] = wgPaths::getAdminPath().'config/';
	$conf['inclusion'][] = wgPaths::getAdminPath().'thirdparty/';
	if (!defined('PATH_SEPARATOR')) define('PATH_SEPARATOR', ';');
	set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR, $conf['inclusion']));
	
	require('class.system.php');
	require('class.modules.php');
	require('db.system.php');
	//require('class.users.php');
	//require('class.fileio.php');
	//require('class.logging.php');
	//require('class.validation.php');
	//require('class.lang.php');
	//require('class.parse.php');
	//require('class.timer.php');
	require('func.php.php');
	wgSystem::restorePost();
	//error::createGroups();
	// database connection
	$db = new wgConnector($conf['db']['host'], $conf['db']['user'], $conf['db']['pass'], $conf['db']['dtbs']);
	$db->characterSet('utf8');
	// modules main class
	$mod = new wgModules();
	// setting basic language class and files
	//$lang = new lang();
		
	require('./libs/class.install.php');
	
	install::installDbFromClass(new systemDBinstall());
	
	chdir('../install/');
	/* wgError::add('<h3>Default user name is "admin"</h3>', 2); wgError::add('<h3>Default user password is "test"</h3>', 2); wgError::add('Please change login password imediately after first login to the system', 1);
	if (!empty($tables)) wgError::add('Installer succesfully install '.$tables.' tables to the database', 2);
	if (!empty($rows)) wgError::add('Installer made '.$rows.' "INSERT INTO" queries', 2);
	if (!empty($alters)) wgError::add('Installer made '.$alters.' "ALTER TABLE" queries', 2);
	if (!empty($terr)) wgError::add('There is '.$terr.' errors in queries');
	if (!empty($qerr)) wgError::add('There is '.$qerr.' errors in queries');
	if (!empty($aerr)) wgError::add('There is '.$aerr.' errors in alter table queries');

	if (empty($terr) && empty($qerr) && empty($aerr)) wgError::add('Database is imported<br />Please delete install directory (it is safer)', 2);
	else wgError::add('There are some errors, check the database. If everything is allright continue by deletig install directory (it is safer)', 1);
	//*/
}
?>