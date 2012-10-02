<?php
wgModules::runModule('mobileapps');
if (isset($_POST['doSaveUsersForCompany'])) {
	if (moduleMobileapps::doSaveUsersForCompany()) {
		wgError::add('Users have been saved successfuly!', 2);
	}
	else {
		wgError::add('Unable to save users!');
	}
	wgPaths::redirect('?companyId='.wgPost::getValue('companyId'));
}
?>