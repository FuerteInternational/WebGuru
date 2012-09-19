<?php
/**
 * Page Templates in the Databaze dluzniku module
 * 
 * @package      WebGuru3
 * @subpackage   modules/databazedluzniku/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. May 2009
 */

$system['parse']['head'] = '
<script type="text/javascript" src="./'.wgPaths::getAdminPath('url').'databazedluznikujs/functions.js"></script>
'; // any code you want to include to the head section of the WebGuru administration
$system['parse']['editor'] = true; // enable or disable wysiwyg for user on the page (leave false if you are not using this one)
// --------------------------------- start content ---------------------------------

wgIncludes::getIncludeCode(wgSystem::getModule(), 'first');
wgIncludes::getIncludeCode(wgSystem::getModule(), 'second');
wgIncludes::getIncludeCode(wgSystem::getModule(), 'third');

$system['parse']['content'] = wgIncludesBackend::getIncludesCodeAdmin(wgSystem::getModule());
?>
