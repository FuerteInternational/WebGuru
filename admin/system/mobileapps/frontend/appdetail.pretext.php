<?php
require_once(wgPaths::getModulePath('ftp', 'mobileapps').'actions/class.appsmobileapps.php');
wgModules::runModule('mobileapps');
wgModules::runModule('users');
if (moduleUsers::isAdmin()) {
	if (isset($_POST['doSaveCompaniesForApp'])) {
		if (moduleMobileapps::doSaveCompaniesForApp()) {
			wgError::add('The record has been successfully saved!', 2);
		}
		else {
			wgError::add('Unable to save the data!');
		}
		wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'&editBoxId='.wgPost::getValue('editBoxId'));
	}
	
	if (isset($_POST['deleteCurrentBuild'])) {
		if (moduleMobileapps::deleteAppWithId(wgPost::getValue('appId'))) {
			wgError::add('The app has been successfully deleted!', 2);
		}
		else {
			wgError::add('Unable to delete the app!');
		}
		wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'');
	}
	if (isset($_POST['submitIpaButton'])) {
		print ':)';
		$ok = appsmobileappsActionsMobileapps::doSaveMobileapps();
		if ($ok) {
			wgError::add('The app has been successfully saved!', 2);
		}
		else {
			wgError::add('Unable to save the app!');
		}
		wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'');
	}
}
?>