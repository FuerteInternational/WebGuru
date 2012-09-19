<?php
/**
 * Page Eximport in the 3M Catalogue module
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/pages/
 * @author       Ondrej Rafaj (FiftyFootSquid)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'eximport';

$tpl->setVariable($var);

$tpl->parseBlock($block);
// --------------------------------- end content ---------------------------------
$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>
