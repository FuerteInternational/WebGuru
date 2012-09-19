<?php
$id = 0;
$rec0 = NULL;
$rec1 = NULL;
$rec2 = NULL;
$rec3 = NULL;
$rec4 = NULL;
$code = NULL;
if (wgGet::isValue('edit')) {
	$id = (int) wgGet::getValue('edit');
	if (ImessagesFormsModel::validateUserForm($id)) {
		$form = ImessagesFormsModel::getOneUserData($id, moduleUsers::getId());
		$title = 'Edit "'.$form->getName().'"';
		$code = '<p>Your form API code is: <strong style="color:red;">'.$form->getCode().'</strong></p>';
		$arr = ImessagesRecipientsModel::getSelfData($form->getId());
		foreach ($arr as $k=>$r) {
			$var = 'rec'.$k;
			$$var = $r->getMail();
		}
	}
	else $id = 0;
}
if (!(bool) $id) {
	$form = new CsnippetsSnippetsModel();
	$title = 'Create new form';
}

?><a name="editForm"></a>
<form action="?from=<?php echo (int) wgGet::getValue('from'); ?>" method="post" class="form">
	<h2><?php echo $title; ?></h2>
	<fieldset>
		<p>
			<label for="ifname" class="mandatory">Form name:</label>
			<input name="ifname" id="ifname" type="text" value="<?php echo $form->getName(); ?>" title="Name of your form (should be name of the app, etc ...)" />
		</p><?php echo $code; ?>
	</fieldset>
	<h2>Recipients:</h2>
	<h4>Setup up to 5 recients for your form API.</h4>
	<fieldset>
		<p>
			<label for="ifrec1">Recipient 1:</label>
			<input name="ifrec1" id="ifrec1" type="text" value="<?php echo $rec0; ?>" title="Recipients e-mail" />
		</p>
		<p>
			<label for="ifrec2">Recipient 2:</label>
			<input name="ifrec2" id="ifrec2" type="text" value="<?php echo $rec1; ?>" title="Recipients e-mail" />
		</p>
		<p>
			<label for="ifrec3">Recipient 3:</label>
			<input name="ifrec3" id="ifrec3" type="text" value="<?php echo $rec2; ?>" title="Recipients e-mail" />
		</p>
		<p>
			<label for="ifrec4">Recipient 4:</label>
			<input name="ifrec4" id="ifrec4" type="text" value="<?php echo $rec3; ?>" title="Recipients e-mail" />
		</p>
		<p>
			<label for="ifrec5">Recipient 5:</label>
			<input name="ifrec5" id="ifrec5" type="text" value="<?php echo $rec4; ?>" title="Recipients e-mail" />
		</p>
	</fieldset>
	<fieldset>
		<p>
			<input name="edit" type="hidden" value="<?php echo (int) $id; ?>" />
			<button name="reset" type="reset">Reset</button>
			<!--<button name="applySnippet" type="submit">Apply</button>-->
			<button name="submitForm" type="submit">Save</button>
		</p>
	</fieldset>
</form>