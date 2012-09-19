<?php
/**
 * Variables declaration
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      16. October 2008
 */

// configuration variables
$conf = array();
$conf['db'] = array();

// system variables
$system = array();

// sessions
if (!isset($_SESSION['system'])) $_SESSION['system'] = array();
if (!isset($_SESSION['system']['error'])) $_SESSION['system']['error'] = array();
if (!isset($_SESSION['system']['error']['groups'])) $_SESSION['system']['error']['groups'] = array();
if (!isset($_SESSION['system']['error']['messages'])) $_SESSION['system']['error']['messages'] = array();
if (!isset($_SESSION['system']['admin'])) $_SESSION['system']['admin'] = array();

?>