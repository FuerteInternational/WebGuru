<?php
/**
 * Page groups for module Emailer
 * 
 * @package      WebGuru3
 * @subpackage   modules/emailer/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. January 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');





$var = array();
$system['parse']['content'] = $tab->getAll();
?>