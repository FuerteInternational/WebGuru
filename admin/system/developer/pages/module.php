<?php
/**
 * Home page for the system
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */

$system['parse']['head'] = '
<script type="text/javascript" src="'.wgPaths::getModulePath('url').'js/functions.js"></script>
';
$system['parse']['editor'] = true;
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::defPostValue('modname', 'New module');
wgSystem::defPostValue('modid', 'new-module');
wgSystem::defPostValue('modpages', 'index');
wgSystem::defPostValue('modauthor', wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
// --------------------------------- end content -----------------------------------
$var = array();
$system['parse']['content'] = $tpl->getBlock($block);







?>