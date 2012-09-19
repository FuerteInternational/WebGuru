<?php
/**
 * WebGuru3 configuration file
 * 
 * If you want to use this file you need to rename this file to config.php
 *
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @version    Generated automaticaly
 */

// database configuration
$conf['db']['host']             = 'localhost';                       // database host computer, default localhost
$conf['db']['user']             = 'root';					         // user name, default root
$conf['db']['pass']             = '';							     // user password, blank password can be only in development mode
$conf['db']['dtbs']             = 'wg3';					         // database name
$conf['db']['pref']             = '';					             // prefix for database, blank as default

// system definitions
$conf['define']['develop']      = true;                              // development tool, default false, enable = true
$conf['define']['filemode']     = 0755;                              // default CHMOD value for files, recomended 0755
$conf['define']['webroot']      = 'http://localhost/';               // root of the website
$conf['define']['adminfolder']  = 'admin/';                          // path to the admin folder
$conf['define']['tempfolder']   = 'temp/';                           // path to the temporary folder (temp)
$conf['define']['usrffolder']   = 'userfiles/';                      // path to the temporary folder (temp)

// admin configuration
$conf['admin']['logintype']     = 'mail';                            // login type for administration, "mail" or "nickname"
$conf['admin']['template']      = 'g2';                           // default template for administration (default: "three")
$conf['admin']['deflang']       = 'english';                         // default template for administration (default: "three")
$conf['admin']['editor']        = 'editor';                          // default html editor for administration ("markitup" or "tiny_mce")
$conf['admin']['administrator'] = 'info@fuerte.cz';                  // system administrator contact email

// system configuration
$conf['system']['ssl']          = 443;                               // SSL port number or 0 for disabled
$conf['system']['sestime']      = 1800;                              // session valid (seconds) or 0 for unlimited

// logging
$conf['logs']['access']         = 1;                                 // enable or disable administration access logging
$conf['logs']['errors']         = 1;                                 // enable or disable database errors logging
$conf['logs']['queries']        = 1;                                 // enable or disable database queries logging
?>