<?php
/**
 * Parsing administration page
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      21. October 2008
 * 
 * @todo Languages from english only to dinamic ... line 22
 */

$pageblock = 'main';

// parsing content for actual page
$system['parse'] = array();
$system['parse']['content'] = NULL;
$var = array();
$block = wgSystem::getPage();
$path .= 'templates/';
$temp = ''.$block.'.html';
$module = wgModules::runModule(wgSystem::getModule());
$var['ACTION'] = wgPaths::makeSelfLink(NULL, false);
$var['ADDR'] = wgPaths::getAdminPath('url');
$var['WEBROOT'] = wgPaths::getPath('url');
$var['WGSSID'] = wgGet::getValue('wgssid');
$var['AJAX'] = wgPaths::getAdminPath('url').'js/ajax/scripts/';
$var['MODULE'] = wgPaths::getModulePath('url');
require('class.tabs.php');
if (wgSystem::isDevelopment()) {
	wgLang::startTracking();
	$tran = wgPost::getValue('tran');
	if (!empty($tran) && is_array($tran)) {
		if (wgLang::addDefinitionsToPageFile($tran)) { wgError::add('definitionssaved', 2);
			wgLang::addModuleFile();
		}
		else wgError::add('cantsavedefinitions');
	}
}
include(wgSystem::makeIncludePage());
if (wgSystem::isDevelopment()) $system['lang']['page']['nodefinitions'] = wgLang::getTrackingArrayFlush();

$var = array();
if (isset($system['parse']['head'])) $var['HEAD'] = $system['parse']['head'];
$var['CONTENT']   = $system['parse']['content'];
$var['ADMINROOT'] = wgPaths::getAdminPath('url');
$var['TEMPLATE']  = wgPaths::getTemplatePath('url');
$var['WGSSID'] = wgGet::getValue('wgssid');
$var['LOGOUTLINK'] = wgPaths::makeSelfLink('logout=yes');


// setting editor if required
if (isset($system['parse']['editor']) && (bool) $system['parse']['editor']) include('inc.editor.php');
// parsing user info
$var['NAME']    = wgUsers::getDetail('firstname');
$var['SURNAME'] = wgUsers::getDetail('lastname');
$var['MAIL']    = wgUsers::getDetail('mail');
$var['TEAM']    = wgUsers::getDetail('name', 'team');

// parsing web info
$var['WEBNAME'] = 'Test Web';
$var['SUPPORT'] = 'http://www.webgurucms.com/';
$var['DEVELOP'] = 'Ondrej Rafaj';
$var['CREDITS'] = 'Ondrej Rafaj';

// parsing menu, modules and functions
include('inc.menu.php');
$var['MENU'] = $system['parse']['menu'];
$params = array();
$params['onchange'] = 'switchSystemWebsite(this.value);';
$var['FULLWEBSITES'] = formsHelper::getSelectBox('switchwebsite', wgSystem::getCurrentWebsite(), SystemWebsitesModel::getWebsitesWithPermissions(), $params);
$params['onchange'] = 'switchSystemLanguage(this.value);';
$var['FULLLANGUAGES'] = formsHelper::getSelectBox('switchlang', wgLang::getLanguageId(), SystemLanguageModel::getLanguagesWithPermissionsForWebsite() , $params);
$var['MODULES'] = $system['parse']['modules'];
$var['FUNCTIONS'] = $system['parse']['functions'];
// parsing help & breadcrumbs
$temp = array();
$var['HELP'] = '<a href="#'.wgSystem::getModule().'">'.wgLang::get('helpforpage').'</a>';
$temp[0] = '<a href="'.wgPaths::makeLink('home', 'index', NULL, wgSystem::getPart()).'">'.wgLang::get(wgSystem::getPart()).'</a>';
$temp[1] = '<a href="'.wgPaths::makeLink(wgSystem::getModule(), 'index', NULL, wgSystem::getPart()).'">'.wgLang::get(wgSystem::getModule()).'</a>';
$temp[2] = '<a href="'.wgPaths::makeLink(wgSystem::getModule(), wgSystem::getPage(), NULL, wgSystem::getPart()).'">'.wgLang::get(wgSystem::getPage()).'</a>';
$sep = ' &raquo; ';
if (wgSystem::getPage() == 'index') {
	$var['BREADCRUMBS'] = $temp[0].$sep.$temp[1];
	$var['TITLE'] = wgSystem::getPart().$sep.wgSystem::getModule();
}
else {
	$var['BREADCRUMBS'] = $temp[0].$sep.$temp[1].$sep.$temp[2];
	$var['TITLE'] = wgSystem::getPart().$sep.wgSystem::getModule().$sep.wgSystem::getPage();
}
// TODO: Problem with new line can cause problems to parsers (serch engine robots). May be because of the language translations
$var['TITLE'] = str_ireplace("\r\n", '', $var['TITLE']);
$var['MODULENAME'] = wgModules::getModuleName();
// parsing errors
include('inc.errors.php');

// parse main teplate for the page
$path = wgPaths::getTemplatePath().'/templates/';
$temp = $pageblock.'.html';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($pageblock);

// setting variable
$tpl->setVariable($var);

// show database errors & queries in development mode
if (wgSystem::isDevelopment()) include('inc.develop.php');

// cleaning
$system['parse'] = NULL;
$var = array();
$temp = NULL;

// display page
$tpl->parseBlock($pageblock);
$tpl->showBlock($pageblock);
?>