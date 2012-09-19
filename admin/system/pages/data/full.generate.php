<!-- BEGIN generate --><?php 
/*error_reporting({ERRORREP});
session_start();
define('FRONTEND', {PAGEID});
$_GET['act'] = NULL;
$_POST['act'] = NULL;
$_REQUEST['act'] = NULL;
$outerstart = true;
$system['paths']['rootpath'] = '{ROOTPATH}';
$outeridp = {PAGEID};
$_SESSION['page']['id'] = {PAGEID};
$_SESSION['page']['langcode'] = '{LANGCODE}';
$_SESSION['page']['langid'] = {LANGID};
if (is_object($_SESSION['mod'])) unset($_SESSION['mod']);
$conf = parse_ini_file('{DOCUMENTROOT}admin/config/config.ini', true);
foreach ($conf["db"] as $key=>$res) define(strtoupper($key), $res);
foreach ($conf["phpdefined"] as $key=>$res) define(strtoupper($key), $res);
foreach ($conf["paths"] as $key=>$res) define(strtoupper($key), $res);
foreach ($conf["dbcharacterset"] as $key=>$res) define(strtoupper($key), $res);
$conf['inclusion'][] = $outerpath.'admin/libs/';
$conf['inclusion'][] = $outerpath.'admin/libs/pear/';
$conf['inclusion'][] = $outerpath.'admin/conf/';
$conf['inclusion'][] = $outerpath.'admin/db/';
$conf['inclusion'][] = $outerpath.'admin/thirdparty/';
set_include_path(implode(PATH_SEPARATOR, $conf["inclusion"]));
require_once ('system.class.php');
require_once ('class.logging.php');
require_once ('checker.class.php');
require_once ('tables.php');
require_once ('wgConnector.php');
$databaseconnection = new connect();
require_once ('Config.php');
require_once ('language.class.php');
require_once ('fileupload.class.php');
$system['paths']['rootpath'] = '{ROOTPATH}';
//require_once ('directories.class.php');
$lang = new language;
//$lang->addFile('{DOCUMENTROOT}admin/language/{LANG}/{LANG}.txt'); // spoleÄ�nÃ½ jazykovÃ½ soubor
//$lang->addFile('{DOCUMENTROOT}admin/language/{LANG}/errors.txt'); // jazykovÃ½ soubor - chybovÃ© hlÃ¡Å¡ky
$outerstart = true;
require_once ('modules.class.php');
//require_once ('functions.php');
require_once ('class.users.php');
$usr = new users;
$_SESSION['user']['state'] = 0;
if (empty($_SESSION['user']['idu'])) if (isset($_POST['submitlogin'])) {
	$usr->login($_POST['name'], $_POST['pass'], 'nick');
	if (isset($_POST['redirect']) && !empty($_POST['redirect'])) basic::redirect($_POST['redirect']);
}
if (isset($_REQUEST['logout'])) users::logout();
if (!empty($_SESSION['user']['idu'])) $usr->checkSession();
if (isset($_GET['language'])) {
	$language = basic::getLangs('code', $_GET['language']);
	if (empty($language)) $language = basic::getLangs('def');
}
else if (empty($_SESSION['user']['lang'])) $language = basic::getLangs('def');
if (!empty($language)) {
	$_SESSION['user']['lang']['code'] = $language[0]['code_lang'];
	$_SESSION['user']['lang']['name'] = $language[0]['name_lang'];
	$_SESSION['user']['lang']['dir'] = $language[0]['directory_lang'];
	$_SESSION['user']['lang']['img'] = $language[0]['image_lang'];
	$_SESSION['user']['lang']['id'] = $language[0]['id_lang'];
}
$usr = NULL;
if (!isset($_SESSION['user']['perm']) && empty($_SESSION['user']['perm'])) $_SESSION['user']['perm'] = 0;
{PRETEXT}
if ((bool) DEBUGGER) if (!empty(counter::$debug)) wgError::add(counter::$debug);
?>
{TEMPLATE}
{XEDITEND}
<?php
define("_BBC_PAGE_NAME", checker::safeText("{FTITLE}"));
define("_BBCLONE_DIR", "{DOCUMENTROOT}admin/thirdparty/bbclone/");
define("COUNTER", _BBCLONE_DIR."mark_page.php");
if (is_readable(COUNTER) && USEBBCLONE) include_once(COUNTER);
$databaseconnection = NULL;
session_write_close();*/
?>
<!-- END generate -->