<?php
$system = array();
$system['processtimer'] = microtime();
error_reporting({ERRORREP});
//error_reporting(0);
define('DOCUMENTROOT', '{ROOTPATH}');
$system['paths']['rootpath'] = '{ROOTPATH}';
define('PAGEID', {PAGEID});
define('LANGCODE', '{LANGCODE}');
define('LANGID', {LANGID});
define('WEBID', {WEBID});
define('UNDEFINED', NULL);

{CONFIG}
// make definitions
if (isset($conf['define']) && is_array($conf['define'])) foreach ($conf['define'] as $k=>$v) define(strtoupper($k), $v);

$conf['inclusion'] = array();
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'libs/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'pear/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'init/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'config/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'thirdparty/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/libs/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/libs/helpers/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/model/base/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/model/extended/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/model/info/';
$conf['inclusion'][] = DOCUMENTROOT.ADMINFOLDER.'wgframework/model/';
if (!defined('PATH_SEPARATOR')) define('PATH_SEPARATOR', ';');
set_include_path(implode(PATH_SEPARATOR, $conf['inclusion']));

session_start();

if (!isset($_SESSION['system'])) $_SESSION['system'] = array();
if (!isset($_SESSION['system']['error'])) $_SESSION['system']['error'] = array();
if (!isset($_SESSION['system']['error']['groups'])) $_SESSION['system']['error']['groups'] = array();
if (!isset($_SESSION['system']['error']['messages'])) $_SESSION['system']['error']['messages'] = array();
if (!isset($_SESSION['system']['admin'])) $_SESSION['system']['admin'] = array();

require(DOCUMENTROOT.ADMINFOLDER.'/wgframework/libs/class.wgPaths.php');

require('class.wgError.php');
wgError::createGroups();
require('class.wgConnector.php');
require('class.exceptions.php');

function __autoload($class_name) {
	if ($class_name == 'id' || preg_match('/(\_id)/', $class_name)) {
		return;
	}
	include('class.'.$class_name.'.php');
}

require('class.validation.php');
require('class.timer.php');
require('func.php.php');

if (DEVELOP == true) require('class.developer.php');

$db = new wgConnector();
$db->connect($conf['db']['host'], $conf['db']['user'], $conf['db']['pass'], $conf['db']['dtbs']);
$db->characterSet('utf8');

$mod = new wgModules();
{PRETEXT}
//if ((bool) DEVELOP) if (!empty(counter::$debug)) wgError::add(counter::$debug);
?>{TEMPLATE}<?php
if (false) {
	$title = '{TITLE}';
	if (isset($system['seo']['title']) && !empty($system['seo']['title'])) $title = $system['seo']['title'];
	define('_BBC_PAGE_NAME', $title);
	define('_BBCLONE_DIR', './admin/thirdparty/bbclone/');
	define('COUNTER', _BBCLONE_DIR.'mark_page.php');
	if (is_readable(COUNTER)) include_once(COUNTER);
}
$db->disconnect();
$db = NULL;
session_write_close();
//print timer::getTime($system['processtimer']);
?>