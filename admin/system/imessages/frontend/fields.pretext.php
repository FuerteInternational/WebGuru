if (wgGet::isValue('fields')) {
	$id = (int) wgGet::getValue('fields');
	if (ImessagesFormsModel::validateUserForm($id)) {
		$form = ImessagesFormsModel::getOneUserData($id, moduleUsers::getId());
		$id = $form->getId();
	}
	else $id = 0;
}
if (!(bool) $id) {
	wgError::add('You have to create iMessage form first', 1);
	wgPaths::redirectToReferer();
	exit();
}

if (wgGet::isValue('delete')) {
	$id = (int) wgGet::getValue('delete');
	if (ImessagesFieldsModel::validateUserField($id)) {
		//$form = ImessagesFormsModel::getOneSelfData($id);
		ImessagesFieldsModel::deleteField($id);
		wgError::add('Field has been successfully deleted.', 2);
		wgPaths::redirectToReferer();
	}
	else wgError::add('You don\'t have enough permissions to delete this field.');
}

if (wgPost::isValue('applyField') || wgPost::isValue('submitField')) {
	$ok = true;
	$id = (int) wgPost::getValue('edit');
	$save = array();
	
	if (ImessagesFormsModel::validateUserForm(wgPost::getValue('formId'))) {
		$save = array();
		$save['imessages_forms_id'] = wgPost::getValue('formId');
		$save['mandatory'] = 0;
		$save['validation'] = 0;
		
		$names = wgPost::getValue('efname');
		$types = wgPost::getValue('eftype');
		$sorts = wgPost::getValue('efsort');
		
		if (!empty($names) && is_array($names)) foreach ($names as $id=>$name) {
			if (ImessagesFieldsModel::validateUserField($id)) {
				$save['where'] = $id;
				$save['name'] = trim($name);
				$save['fcode'] = wgText::safeText($name);
				$save['fieldtype'] = (int) $types[$id];
				$save['sort'] = (int) $sorts[$id];
				if (!empty($save['name'])) ImessagesFieldsModel::doUpdate($save);
			}
		}
		
		if (isset($save['where'])) unset($save['where']);
		
		$names = wgPost::getValue('nfname');
		$types = wgPost::getValue('nftype');
		$sorts = wgPost::getValue('nfsort');
		
		if (!empty($names) && is_array($names)) foreach ($names as $id=>$name) {
			$save['name'] = trim($name);
			$save['fcode'] = wgText::safeText($name);
			$save['sort'] = (int) $sorts[$id];
			if (!empty($save['name']) && $save['name'] != 'New field name, leave blank if not used') ImessagesFieldsModel::doInsert($save);
		}
		
		if ($ok) wgError::add('Your fields has been successfully saved.', 2);
		else wgError::add('We were unable to save your fields, please contact our administrators.');
		
		if (wgPost::isValue('submitField')) wgPaths::redirect('{#LINK_50}');
		else wgPaths::redirect('{#LINK_51}?fields='.wgPost::getValue('formId'));
		
	}
	else wgError::add('You don\'t have enough permissions to edit this form.');
}
