<?php
/**
 * Page Webpermissions in the System users module
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

$system['parse']['head'] = '
<script type="text/javascript" src="./'.wgPaths::getAdminPath('url').'systemusersjs/functions.js"></script>
'; // any code you want to include to the head section of the WebGuru administration
$system['parse']['editor'] = true; // enable or disable wysiwyg for user on the page (leave false if you are not using this one)
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

// setting plain variable
$var['TEXT'] = 'Hello World :-)';

// setting default _POST variable
wgSystem::defPostValue('myvalue', 'My value with postback');

// setting postback for _POST variables
$var = wgSystem::getFormCallback($var);

// adding variables to the template
$tpl->setVariable($var);

// parsing block from template
$tpl->parseBlock($block);
// --------------------------------- end content ---------------------------------
$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>
