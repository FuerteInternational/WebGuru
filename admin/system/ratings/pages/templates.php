<?php
/**
 * Page Templates in the Ratings module
 * 
 * @package      WebGuru3
 * @subpackage   modules/ratings/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;


$system['parse']['content'] = wgIncludesBackend::getIncludesCodeAdmin('ratings');
?>
