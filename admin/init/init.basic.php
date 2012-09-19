<?php
/**
 * Basic PHP start
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      16. October 2008
 * 
 * @todo Error reporting must be editable from configuration file
 */

// starting script timer
$wgscriptstart = microtime();
// setting error reporting
error_reporting(E_ALL ^ E_DEPRECATED);
// setting session id if any
session_start();
if (isset($_GET['wgssid']) && !empty($_GET['wgssid'])) session_id($_GET['wgssid']);
// including files
require('./init/init.includes.php');
if (wgSystem::isDevelopment()) wgSystem::clearCache();
wgSystem::restorePost(); wgError::createGroups();
// database connection
$db = new wgConnector();
$db->connect($conf['db']['host'], $conf['db']['user'], $conf['db']['pass'], $conf['db']['dtbs']);
$db->characterSet('utf8');
// modules main class
$mod = new wgModules();
// setting basic language class and files
$lang = new wgLang();
?>