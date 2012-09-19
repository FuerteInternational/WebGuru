<?php
/**
 * Page Templates in the MotoCatalogue module
 * 
 * @package      WebGuru3
 * @subpackage   modules/motocatalogue/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
// --------------------------------- start content ---------------------------------

// --------------------------------- end content ---------------------------------
$var = array();
$system['parse']['content'] = wgIncludesBackend::getIncludesCodeAdmin('motocatalogue');
?>
