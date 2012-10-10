<?php
require_once(wgPaths::getModulePath('ftp', 'mobileapps').'actions/class.appsmobileapps.php');
wgModules::runModule('mobileapps');
wgModules::runModule('users');


if (isset($_GET['downloadAppId'])) {
	$ok = moduleMobileapps::downloadIpaWithId($_GET['downloadAppId']);
	if (!$ok) wgError::add('Sorry, you don\'t have a permission to download requested app!');
}

if (isset($_POST['doSaveCompaniesForApp'])) {
	if (moduleUsers::isAdmin()) {
		if (moduleMobileapps::doSaveCompaniesForApp()) {
			wgError::add('The record has been successfully saved!', 2);
		}
		else {
			wgError::add('Unable to save the data!');
		}
	}
	else wgError::add('Action only allowed to administrators!');
	wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'&editBoxId='.wgPost::getValue('editBoxId'));
}

if (isset($_POST['deleteCurrentBuild'])) {
	if (moduleUsers::isAdmin()) {
		if (moduleMobileapps::deleteAppWithId(wgPost::getValue('appId'))) {
			wgError::add('The app has been successfully deleted!', 2);
		}
		else {
			wgError::add('Unable to delete the app!');
		}
	}
	else wgError::add('Action only allowed to administrators!');
	wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'');
}
if (isset($_POST['submitAppDataButton'])) {
	if (moduleUsers::isAdmin()) {
		$ok = appsmobileappsActionsMobileapps::doSaveMobileapps();
		if ($ok) {
			wgError::add('The app has been successfully saved!', 2);
		}
		else {
			wgError::add('Unable to save the app!');
		}
	}
	else wgError::add('Action only allowed to administrators!');
	wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'');
}
if (isset($_GET['deleteAllApps'])) {
	if (moduleUsers::isAdmin()) {
		if (moduleMobileapps::deleteAllAppWithId($_GET['deleteAllApps'])) {
			wgError::add('All apps has been successfully deleted!', 2);
			wgPaths::redirect('?done=:)');
		}
		else {
			wgError::add('Unable to delete selected apps!');
			wgPaths::redirect('?mobileAppId='.$_GET['deleteAllApps'].'');
		}
	}
	else {
		wgError::add('Action only allowed to administrators!');
		wgPaths::redirect('?mobileAppId='.$_GET['deleteAllApps'].'');
	}
}
?>