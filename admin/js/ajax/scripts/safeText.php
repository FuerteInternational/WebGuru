<?php
/**
 * Returns select box for table
 * 
 * @package    WebGuru3
 * @subpackage ajax
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */

require('include.ajax.php');
$text = wgSystem::getValue('text');
$text = valid::safeText($text);
echo $text;
$db = NULL;
?>