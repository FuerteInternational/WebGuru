<?php
/**
 * Creating menu
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      21. October 2008
 * 
 * @todo User must be able to setup his own menu
 */

$system['parse']['menu'] = NULL;
$system['parse']['modules'] = NULL;
$system['parse']['functions'] = NULL;

// parsing top menu
$temp = array();
$temp[] = array('system', 'home');
$temp[] = array('system', 'pages');
$temp[] = array('system', '3mcatalogue');
$temp[] = array('system', 'forms');
$temp[] = array('system', 'dynamic');
$temp[] = array('system', 'configuration');
if ((bool) wgSystem::isDevelopment()) $temp[] = array('system', 'developer'); // turns on developers link

$su = (bool) wgUsers::isSu();

$system['parse']['menu'] = '<ul>';
foreach ($temp as $k=>$v) if (wgModules::canRun($v[1]) || $v[1] == 'home') {
	$active = 'passive';
	if (wgSystem::getPart() == $v[0] && wgSystem::getModule() == $v[1]) $active = 'active';
	$link = wgPaths::makeLink($v[1], 'index', NULL, $v[0]);
	$system['parse']['menu'] .= '<li><a href="'.$link.'" class="'.$active.'">'.wgLang::get($v[1]).'</a></li>';
}
$system['parse']['menu'] .= '</ul>';
$temp = array();

// parsing modules
$arr = dbSystem::getModulesByType();
$system['parse']['modules'] = '<ul>';
if (!empty($arr['system']) && is_array($arr['system'])) foreach ($arr['system'] as $k=>$v) {
	if (wgModules::canRun($v['name'])) {
		$active = 'passive';
		if (wgSystem::getPart() == 'modules' && wgSystem::getModule() == $v['name']) $active = 'active';
		$link = wgPaths::makeModuleLink($v['name'], 'index');
		$system['parse']['modules'] .= '<li><a href="'.$link.'" class="'.$active.'">'.wgLang::get($v['name']).'</a></li>';
	}
}
unset($arr);
$system['parse']['modules'] .= '</ul>';


// parsing functions
if (file_exists(wgPaths::getModulePath().'/menu.xml')) $arr = xml::xmlFileToArray(wgPaths::getModulePath().'/menu.xml');
else {
	$arr = wgIo::getFiles(wgPaths::getModulePath().'/pages/');
	sort($arr);
}
$system['parse']['functions'] = '<ul>';
if (!empty($arr) && is_array($arr)) foreach ($arr as $k=>$page) {
	$active = 'passive';
	if (is_array($page)) {
		if (isset($page['su']) && (bool) $page['su'] && !$su) {
			$enabled = false;
		}
		else $enabled = true;
		if ((bool) $page['show'] && $enabled) {
			if (wgSystem::getPage()== $k) $active = 'active';
			if (isset($page['ajax']) && (bool) $page['ajax']) $ajax = ' ajax';
			else $ajax = NULL;
			$link = wgPaths::makeModuleLink(wgSystem::getModule(), $k);
			$system['parse']['functions'] .= '<li><a href="'.$link.'" class="'.$active.$ajax.'">'.wgLang::get($page['name']).'</a></li>';
		}
	}
	else {
		$name = explode('.', $page);
		if (!isset($name[3])) {
			if (wgSystem::getPage()== $name[0]) $active = 'active';
			$link = wgPaths::makeModuleLink(wgSystem::getModule(), $name[0]);
			$system['parse']['functions'] .= '<li><a href="'.$link.'" class="'.$active.'">'.wgLang::get($name[0]).'</a></li>';
		}
	}
}
unset($arr);
$system['parse']['functions'] .= '</ul>';





?>