<?php
/**
 * Basic includes for administration
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      17. October 2008
 */

require('init/init.vars.php');
require('config/config.php');
require('init/init.defines.php');

require('./wgframework/libs/class.wgPaths.php');
$conf['inclusion'] = array();
$conf['inclusion'][] = wgPaths::getAdminPath().'libs/';
$conf['inclusion'][] = wgPaths::getAdminPath().'pear/';
$conf['inclusion'][] = wgPaths::getAdminPath().'init/';
$conf['inclusion'][] = wgPaths::getAdminPath().'config/';
$conf['inclusion'][] = wgPaths::getAdminPath().'thirdparty/';
//$conf['inclusion'][] = wgPaths::getAdminPath().'thirdparty/Zend/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/libs/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/libs/helpers/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/model/base/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/model/extended/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/model/info/';
$conf['inclusion'][] = wgPaths::getAdminPath().'wgframework/model/';
if (!defined('PATH_SEPARATOR')) define('PATH_SEPARATOR', ';');
set_include_path(implode(PATH_SEPARATOR, $conf['inclusion']));

require('class.DbModel.php');
require('class.exceptions.php');
/*function __autoload($class_name) {
	if ($class_name == 'id' || eregi('_id', $class_name)) return;
	include('class.'.$class_name.'.php');
}*/
function __autoload($class_name) {
    if ($class_name != 'fileio' || $class_name != 'mail') include('class.'.$class_name.'.php');
}

require('class.wgParse.php');
require('class.dbSystem.php');
require('class.validation.php');
require('class.timer.php');
require('func.php.php');

if (DEVELOP == true) require('class.developer.php');

?>