<?php
wgModules::runModule('mobileapps');
if (isset($_POST['doSaveCompaniesForApp'])) {
	if (moduleMobileapps::doSaveCompaniesForApp()) {
		wgError::add('Data have been saved successfuly!', 2);
	}
	else {
		wgError::add('Unable to save data!');
	}
	wgPaths::redirect('?mobileAppId='.wgPost::getValue('mobileAppId').'&editBoxId='.wgPost::getValue('editBoxId'));
}
?>