if (wgGet::isValue('api')) {
	$code = wgGet::getValue('api');
	$form = ImessagesFormsModel::getOneCodeData($code);
	$id = $form->getId();
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
