<?php
/**
 * WebGuru3 configuration file
 *
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @author     WebGuruCMS3 Configuration module
 * @version    Generated automaticaly
 */



// Database connection
$conf['db']['host']                 = "localhost";                     // Database host computer (default: localhost)

$conf['db']['user']                 = "appstore";		               // User name (default: root)

$conf['db']['pass']                 = "Sn33z3";		                   // infdbpass
$conf['db']['dtbs']                 = "appstore";      		           // infdbdtbs
$conf['db']['pref']                 = "";                              // infdbpref


// System definitions
$conf['define']['develop']          = 1;                               // infdefinedevelop
$conf['define']['filemode']         = 493;                             // infdefinefilemode
$conf['define']['webroot']          = "http://192.168.105.178/appstore.fuerteint.com/";     // infdefinewebroot
$conf['define']['adminfolder']      = "admin/";                        // infdefineadminfolder
$conf['define']['tempfolder']       = "temp/";                         // infdefinetempfolder
$conf['define']['usrffolder']       = "userfiles/";                    // infdefineusrffolder

$conf['smtp']['host'] 				= '';
$conf['smtp']['auth'] 				= 0;
$conf['smtp']['name'] 				= 'send@xprogress.com';
$conf['smtp']['pass'] 				= 'exploited';



// Administration
$conf['admin']['logintype']         = "mail";                          // infadminlogintype
$conf['admin']['template']          = "fuerte";                        // infadmintemplate
$conf['admin']['deflang']           = "english";                       // infadmindeflang
$conf['admin']['editor']            = "markitup";                      // infadmineditor
$conf['admin']['administrator']     = "info@fuerte.cz";                // infadminadministrator


// System
$conf['system']['ssl']              = 443;                             // infsystemssl
$conf['system']['sestime']          = 1800;                            // infsystemsestime


// Logs
$conf['logs']['access']             = 1;                               // inflogsaccess
$conf['logs']['errors']             = 1;                               // inflogserrors
$conf['logs']['queries']            = 1;                               // inflogsqueries

?>