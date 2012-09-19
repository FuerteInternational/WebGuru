<?php
$id = 0;
if (wgGet::isValue('edit')) {
	$id = (int) wgGet::getValue('edit');
	if (CsnippetsSnippetsModel::validateUserSnippet($id)) {
		$snippet = CsnippetsSnippetsModel::getOneUserData($id, moduleUsers::getId());
		$title = 'Edit "'.$snippet->getName().'"';
	}
	else $id = 0;
}
if (!(bool) $id) {
	$snippet = new CsnippetsSnippetsModel();
	$title = 'Add new snippet';
}

?><a name="editForm"></a>
<form action="" method="post" class="form">
	<h2><?php echo $title; ?></h2>
	<fieldset>
		<p>
			<label for="snname" class="mandatory">Snippet title:</label>
			<input name="snname" id="snname" type="text" value="<?php echo $snippet->getName(); ?>" title="This title will apear in the heading and the title of the page" />
		</p>
		<p>
			<label for="snsnippet" class="mandatory">Code:</label>
			<textarea cols="50" rows="9" name="snsnippet" id="snsnippet" title="Please insert code of your snippet here" class="big html"><?php echo $snippet->getSnippet(); ?></textarea>
		</p>
		<p>
			<label for="snexcerpt">Excerpt:</label>
			<textarea cols="50" rows="9" name="snexcerpt" id="snexcerpt" title="Short description of your snippet" class="editor small"><?php echo $snippet->getExcerpt(); ?></textarea>
		</p>
		<p>
			<label for="sndescription" class="mandatory">Description:</label>
			<textarea cols="50" rows="9" name="sndescription" id="sndescription" title="Full description of your snippet" class="editor"><?php echo $snippet->getDescription(); ?></textarea>
		</p>
		<p>
			<label for="snkeywords">Meta keywords:</label>
			<textarea cols="50" rows="9" name="snkeywords" id="snkeywords" title="Comma separated keywords" class="small"><?php echo $snippet->getKeywords(); ?></textarea>
		</p>
		<p>
			<input name="edit" type="hidden" value="<?php echo (int) $id; ?>" />
			<button name="reset" type="reset">Reset</button>
			<!--<button name="applySnippet" type="submit">Apply</button>-->
			<button name="submitSnippet" type="submit">Save</button>
		</p>
	</fieldset>
</form>