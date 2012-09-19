<?php
wgModules::runModule('users');
wgModules::runModule('imessages');

if (wgGet::isValue('edit')) {
	$id = (int) wgGet::getValue('edit');
	if (!ImessagesFormsModel::validateUserForm($id)) {
		wgError::add('You don\'t have enough permissions to edit this form.');
	}
	else {
		$form = ImessagesFormsModel::getOneUserData($id, moduleUsers::getId());
	}
}
if (wgGet::isValue('delete')) {
	$id = (int) wgGet::getValue('delete');
	if (ImessagesFormsModel::validateUserForm($id)) {
		ImessagesFormsModel::deleteForm($id);
		ImessagesRecipientsModel::deleteMailsForForm($id);
		ImessagesFieldsModel::deleteFieldsForForm($id);
		wgError::add('Form has been successfully deleted.', 2);
		wgPaths::redirectToReferer();
	}
	else wgError::add('You don\'t have enough permissions to delete this form.');
}
if (wgPost::isValue('applyForm') || wgPost::isValue('submitForm')) {
	$ok = true;
	$id = (int) wgPost::getValue('edit');
	$save = array();
	$save['name'] = wgPost::getValue('ifname');
	if (empty($save['name'])) {
		wgError::add('Form name can not be empty!');
		$ok = false;
	}
	$save['users_id'] = (int) moduleUsers::getId();
	if ($ok) {
		if ((bool) $id && ImessagesFormsModel::validateUserForm($id)) {
			$save['where'] = $id;
			$ok = (bool) ImessagesFormsModel::doUpdate($save);
		}
		else {
			$save['added'] = 'NOW()';
			$save['code'] = sha1(moduleUsers::getId().time());
			$id = ImessagesFormsModel::doInsert($save);
			$ok = (bool) $id;
			ImessagesFieldsModel::createBasicFields($id);
		}
		if ($ok) {
			ImessagesRecipientsModel::deleteMailsForForm($id);
			for ($i=1; $i <= 5; $i++) {
				$mail = trim(wgPost::getValue('ifrec'.$i));
				if (!empty($mail)) ImessagesRecipientsModel::saveMailsForForm($id, $mail);
			}
		}
	}
	if ($ok) wgError::add('Your form has been successfully saved.', 2);
	else wgError::add('We were unable to save your form, please contact our administrators.');
}
?>