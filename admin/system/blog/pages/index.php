<?php
/**
 * Page Index in the Blog module
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. June 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');
// ----------- encoding (Block: index) start -----------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

if (file_exists(wgPaths::getModulePath().'/menu.xml')) $arr = xml::xmlFileToArray(wgPaths::getModulePath().'/menu.xml');
else {
	$arr = wgIo::getFiles(wgPaths::getModulePath().'/pages/');
	sort($arr);
}
$isblog = (bool) BlogModel::isBlog();
if (!$isblog) wgError::add('setupblogfirst', 1);
if (!empty($arr) && is_array($arr)) foreach ($arr as $k=>$page) {
	if ((bool) $page['show'] && $k != 'index') {
		if ($isblog || $k == 'settings') {
			if (isset($page['ajax']) && (bool) $page['ajax']) $ajax = ' ajax';
			else $ajax = NULL;
			$link = wgPaths::makeModuleLink(wgSystem::getModule(), $k);
			$pagename = wgLang::get($page['name']);
			$page = $k;
			$tpl->setCurrentBlock('functions');
			$var['LINK'] = $link;
			$var['PAGENAME'] = $pagename;
			$var['FUNCIMAGE'] = wgIcons::getPageIcon($page, $pagename);
			$var['DESCRIPTION'] = wgLang::get('desc'.$page);
			$tpl->setVariable($var);
			$tpl->parseBlock('functions');
		}
	}
}
$var = array();
$tpl->parseBlock($block);
// ----------- countries end -----------
$system['parse']['content'] = $tpl->getBlock($block);
?>