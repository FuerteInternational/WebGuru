<?php
if (wgPost::isValue('submitwidget')) {
	wgModules::runModule('users');
	$ok = moduleUsers::isLogged();
	if (!wgValidation::name(wgPost::getValue('name'))) {
		wgError::add('Name can not be empty');
		$ok = false;
	}
	$save = array();
	$save['changed'] = 'NOW()';
	if ((bool) ((int) wgPost::getValue('wid'))) {
		$ok = WspriteWidgetsModel::validateWidgetAgainstUser(wgPost::getValue('wid'), moduleUsers::getId());
		$save['where'] = (int) wgPost::getValue('wid');
	}
	else {
		$save['views'] = 0;
		$save['added'] = 'NOW()';
		$save['users_id'] = moduleUsers::getId();
	}
	$save['name'] = trim(wgPost::getValue('name'));
	$save['identifier'] = wgText::safeText($save['name']);
	
	if ($ok) {
		$id = (int) wgPost::getValue('wid');
		if ((bool) ((int) wgPost::getValue('wid'))) $ok = (bool) WspriteWidgetsModel::doUpdate($save);
		else {
			$id = (int) WspriteWidgetsModel::doInsert($save);
			$ok = (bool) $id;
		}
	}
	
	if ($ok) {
		wgError::add('Widget has been saved.', 2);
		//wgPaths::redirect(wgPaths::getPagePath(75).'?edit='.$id);
		wgGet::setValue('edit', $id);
	}
	else wgError::add('Widget can not be saved, please try again.');
}
if (wgGet::isValue('delete')) {
	wgModules::runModule('users');
	$ok = moduleUsers::isLogged();
	$ok = WspriteWidgetsModel::validateWidgetAgainstUser(wgGet::getValue('delete'), moduleUsers::getId());
	if ($ok) $ok = WspriteWidgetsModel::deleteWidget(wgGet::getValue('delete'));
	if ($ok) wgError::add('Widget has been deleted.', 2);
	else wgError::add('Widget can not be deleted, please try again.');
	header('Location: '.wgPaths::getPath('url').'my-account/dashboard/');
}
?>