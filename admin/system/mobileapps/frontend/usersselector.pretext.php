<?php
wgModules::runModule('mobileapps');
if (isset($_POST['doSaveUsersForCompany'])) {
	if (moduleUsers::isAdmin()) {
		if (moduleMobileapps::doSaveUsersForCompany()) {
			wgError::add('Users have been saved successfuly!', 2);
		}
		else {
			wgError::add('Unable to save users!');
		}
		wgPaths::redirect('?companyId='.wgPost::getValue('companyId'));
	}
}
if (isset($_GET['deleteCompany'])) {
	$_GET['deleteCompany'] = (int)$_GET['deleteCompany'];
	if (moduleUsers::isAdmin()) {
		if (moduleMobileapps::deleteCompanyWithId($_GET['deleteCompany'])) {
			wgError::add('All apps has been successfully deleted!', 2);
			wgPaths::redirect('?done=:)');
		}
		else {
			wgError::add('Unable to delete selected group!');
			wgPaths::redirect('?companyId='.$_GET['deleteCompany'].'');
		}
	}
	else {
		wgError::add('Action only allowed to administrators!');
		wgPaths::redirect('?noChanceBaby=:)');
	}
}
?>