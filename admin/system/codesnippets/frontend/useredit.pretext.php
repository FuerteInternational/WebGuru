<?php
if (wgGet::isValue('edit')) {
	$id = (int) wgGet::getValue('edit');
	if (!CsnippetsSnippetsModel::validateUserSnippet($id)) {
		wgError::add('You don\'t have enough permissions to edit this snippet.');
	}
}
if (wgGet::isValue('delete')) {
	$id = (int) wgGet::getValue('delete');
	if (CsnippetsSnippetsModel::validateUserSnippet($id)) {
		$snippet = CsnippetsSnippetsModel::getOneSelfData($id);
		if ((bool) $snippet->getApproved()) wgError::add('You can\'t delete published snippet. Please contact administrator.');
		else {
			CsnippetsSnippetsModel::deleteSnippet($id);
			wgError::add('Snippet has been successfully deleted.');
		}
	}
	else wgError::add('You don\'t have enough permissions to delete this snippet.');
}
if (wgPost::isValue('applySnippet') || wgPost::isValue('submitSnippet')) {
	$ok = true;
	$id = (int) wgPost::getValue('edit');
	$save = array();
	$save['name'] = wgPost::getValue('snname');
	if (empty($save['name'])) {
		wgError::add('Snippet name can not be empty!');
		$ok = false;
	}
	$save['snippet'] = wgPost::getValue('snsnippet');
	if (empty($save['name'])) {
		wgError::add('Snippet code can not be empty!');
		$ok = false;
	}
	$save['description'] = wgPost::getValue('sndescription');
	if (empty($save['name'])) {
		wgError::add('Snippet description can not be empty!');
		$ok = false;
	}
	$save['excerpt'] = wgPost::getValue('snexcerpt');
	if (empty($save['excerpt'])) {
		wgError::add('Snippet excerpt should not be empty!', 1);
		$save['excerpt'] = wgText::cutText($save['description'], 240);
	}
	$save['keywords'] = wgPost::getValue('snkeywords');
	if (empty($save['keywords'])) {
		$save['keywords'] = wgText::getTextKeywords($save['description'], 3, 2, 1, 15);
	}
	$save['users_id'] = (int) moduleUsers::getId();
	$save['system_users_id'] = (int) wgUsers::getDetail('idu');
	$save['csnippets_categories_id'] = (int) 1;
	$save['changed'] = 'NOW()';
	if ($ok) {
		if ((bool) $id && CsnippetsSnippetsModel::validateUserSnippet($id)) {
			$save['approved'] = 0;
			$save['where'] = $id;
			$ok = (bool) CsnippetsSnippetsModel::doUpdate($save);
		}
		else {
			$save['approved'] = 0;
			$save['added'] = 'NOW()';
			$id = CsnippetsSnippetsModel::doInsert($save);
			$ok = (bool) $id;
		}
	}
	if ($ok) wgError::add('Your snippet has been successfully saved.', 2);
	else wgError::add('We were unable to save your snippet, please contact our administrators.');
}
?>