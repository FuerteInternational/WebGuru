<?php
$id = 0;
if (wgGet::isValue('fields')) {
	$id = (int) wgGet::getValue('fields');
	if (ImessagesFormsModel::validateUserForm($id)) {
		$form = ImessagesFormsModel::getOneUserData($id, moduleUsers::getId());
		$title = 'Editing fields for "'.$form->getName().'"';
		$arr = ImessagesFieldsModel::getSelfFormData($form->getId());
	}
	else $id = 0;
}
?><a name="editForm"></a>
<form action="{#LINK_50}">
	<p>
		<button type="submit" class="left">&laquo; Back</button>
	</p>
</form>
<form action="" method="post" class="form">
	<h2><?php echo $title; ?></h2>
	<?php
	if (!empty($arr)) {
	?>
	<fieldset>
		<table class="admin">
			<colgroup>
				<col style="width: 50%;" />
				<col style="width: 20%;" />
				<col style="width: 20%;" />
				<col style="width: 10%;" />
			</colgroup>
		    <thead>
		        <tr>
		            <th><span>Field name</span></th>
		            <th><span>Type</span></th>
		            <th><span>Weight</span></th>
		            <th><span>Delete</span></th>
		        </tr>
		    </thead>
		    <tbody>
			    <?php
				foreach ($arr as $v) {
				?>
				<tr>
				    <td><input type="text" name="efname[<?php echo $v->getId(); ?>]" value="<?php echo $v->getName(); ?>" style="width:320px;" /></td>
				    <td class="center">
						<select name="eftype[<?php echo $v->getId(); ?>]">
							<?php echo ImessagesFieldsModel::getFieldTypes($v->getFieldtype()); ?>
						</select>
					</td>
				    <td class="center"><input type="text" name="efsort[<?php echo $v->getId(); ?>]" value="<?php echo $v->getSort(); ?>" style="width:30px;" /></td>
				    <td class="center"><a href="?delete=<?php echo $v->getId(); ?>"><span>Delete</span></a></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</fieldset>
	<?php } ?>
	<h4>New fields</h4>
	<fieldset>
		<table class="admin">
			<colgroup>
				<col style="width: 50%;" />
				<col style="width: 20%;" />
				<col style="width: 20%;" />
				<col style="width: 10%;" />
			</colgroup>
		    <thead>
		        <tr>
		            <th><span>Field name</span></th>
		            <th><span>Type</span></th>
		            <th><span>Weight</span></th>
		            <th><span>&nbsp;</span></th>
		        </tr>
		    </thead>
		    <tbody>
				<tr>
				    <td><input type="text" name="nfname[0]" value="" style="width:320px;" title="New field name, leave blank if not used" /></td>
				    <td class="center">
						<select name="nftype[0]">
							<?php echo ImessagesFieldsModel::getFieldTypes(); ?>
						</select>
					</td>
				    <td class="center"><input type="text" name="nfsort[0]" value="0" style="width:30px;" /></td>
				    <td class="center">&nbsp;</td>
				</tr>
				<tr>
				    <td><input type="text" name="nfname[1]" value="" style="width:320px;" title="New field name, leave blank if not used" /></td>
				    <td class="center">
						<select name="nftype[1]">
							<?php echo ImessagesFieldsModel::getFieldTypes(); ?>
						</select>
					</td>
				    <td class="center"><input type="text" name="nfsort[1]" value="0" style="width:30px;" /></td>
				    <td class="center">&nbsp;</td>
				</tr>
				<tr>
				    <td><input type="text" name="nfname[2]" value="" style="width:320px;" title="New field name, leave blank if not used" /></td>
				    <td class="center">
						<select name="nftype[2]">
							<?php echo ImessagesFieldsModel::getFieldTypes(); ?>
						</select>
					</td>
				    <td class="center"><input type="text" name="nfsort[2]" value="0" style="width:30px;" /></td>
				    <td class="center">&nbsp;</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset>
		<p>
			<input name="formId" type="hidden" value="<?php echo (int) $id; ?>" />
			<button name="reset" type="reset">Reset</button>
			<button name="submitField" type="submit">Save</button>
			<button name="applyField" type="submit">Apply</button>
		</p>
	</fieldset>
</form>