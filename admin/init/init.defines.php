<?php
/**
 * Definitions init
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      16. October 2008
 */

define('WGVERSION', '3.0.0.0');

if (!empty($conf['define']) && is_array($conf['define'])) foreach ($conf['define'] as $k=>$v) define(strtoupper($k), $v);
if (!empty($conf['system']) && is_array($conf['system'])) foreach ($conf['system'] as $k=>$v) define(strtoupper($k), $v);

if (!defined('DEBUGGER')) define('DEBUGGER', false);
define('PREFIX', $conf['db']['pref']);

define('LANGUAGE', $conf['admin']['deflang']);

define('NL', "\r\n");
define('TAB', "\t");
define('UNDEFINED', 'undefined');

?>