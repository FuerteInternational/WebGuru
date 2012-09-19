<?php
/**
 * Administration init
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 * 
 * @todo Do actions better
 */

if ((bool) wgSystem::isRequest('website')) {
	wgSessions::setSession('website', wgSystem::getRequestValue('website'));
	wgSessions::setSession('language', NULL);
	wgSessions::setSession('language', wgLang::getLanguageId());
}

//print (wgPaths::getLangPath(wgLang::getLanguageId()));
//print (wgPaths::getWebPath(wgSystem::getCurrentWebsite()));

if ((bool) wgSystem::isRequest('language')) wgSessions::setSession('language', wgSystem::getRequestValue('language'));
$path = wgPaths::getAdminPath().'languages/'.$conf['admin']['deflang'].'/';
$files = wgIo::getFiles($path);
foreach ($files as $file) $lang->addFile($path.$file);
$path = wgPaths::getAdminPath().wgSystem::getPart().'/'.wgSystem::getModule().'/';
wgLang::addFile($path.'/languages/'.LANGUAGE.'/global.'.wgSystem::getModule().'.txt');
wgLang::addFile($path.'/languages/'.LANGUAGE.'/'.wgSystem::getPage().'.txt');
$files = NULL;
$file = NULL;
if (!(bool) wgUsers::isLogged()) {
	if ((bool) wgPost::getValue('name')) {
		$inst = new wgInstall();
		unset($inst);
		$usr = new wgUsers();
		$usr->login(wgPost::getValue('name'), wgPost::getValue('pass')); wgError::add('logged', 2);
	}
	else wgUsers::destroySession();
}
else wgUsers::check();
if (isset($_REQUEST['logout'])) wgUsers::logout();
// system actions
$act = wgSystem::getRequestValue('act');
//if ((bool) $act && !(bool) wgGet::getValue('edit')) {
if ((bool) $act) {
	if (wgSystem::isRequest('handlingclass')) {
		$class = wgSystem::getRequestValue('handlingclass');
		new $class();
	}
	else {
		$clPath = wgPaths::getModulePath().'actions/class.'.$act.'.php';
		if (file_exists($clPath)) {
			require($clPath);
			$cname = $act.'Actions'.ucfirst(wgSystem::getModule());
			$class = new $cname();
			if ($class->isOk()) {
				if (wgSystem::isSave()) {
					if (method_exists($class, 'getSaveParams')) wgPaths::redirect(wgPaths::makeSelfLink($class->getSaveParams()));
					else wgPaths::redirect(wgPaths::makeSelfLink());
				}
				if (wgSystem::isApply()) {
					if (method_exists($class, 'getApplyParams')) wgPaths::redirect(wgPaths::makeEditLink($class->getApplyParams()));
					else wgPaths::redirect(wgPaths::makeEditLink());
				}
				if (wgGet::getValue('delete')) {
					if (method_exists($class, 'getDeleteParams')) wgPaths::redirect(wgPaths::makeSelfLink($class->getDeleteParams()));
					else wgPaths::redirect(wgPaths::makeSelfLink());
				}
				else wgPaths::redirect(wgPaths::makeSelfLink());
			}
		}
	}
	/*else {
		require('abstract.actions.php');
		$clPath = wgPaths::getAdminPath().wgSystem::getPart().'/'.wgSystem::getModule().'/class.actions.php';
		if (file_exists($clPath)) require($clPath);
		$cname = 'actions'.ucfirst(wgSystem::getModule());
		$class = new $cname(wgGet::getValue('parameter'));
	}*/
	//else wgError::add('noactionsclass');
	$clPath  = NULL;
	$cname = NULL;
	$class = NULL;
}
?>