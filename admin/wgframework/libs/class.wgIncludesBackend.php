<?php
class wgIncludesBackend extends wgIncludes {
	
	public function __construct() {
		if (wgPost::isValue('edit')) {
			$ok = wgIncludes::writeInclude(wgPost::getValue('module'), wgPost::getValue('file'), wgPost::getValue('code'));
			if ($ok) wgError::add('saved', 2);
			else wgError::add('cantsave');
		}
		elseif (wgGet::isValue('delete')) {
			$ok = wgIo::delete(wgPaths::getUserfilesPath().wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		else wgError::add('error');
	}
	
	public static function getIncludesCodeAdmin($module) {
		if (!is_writable(wgPaths::getUserfilesPath())) { wgError::add(wgLang::get('pathnotwritable').': '.wgPaths::getUserfilesPath('url'));
			return '<p>'.wgLang::get('pagecannotbeloaded').'</p>';
		}
		$arr = parent::getModuleIncludes($module);
		$editfile = NULL;
		$editcode = NULL;
		$data = '<table>
	<colgroup>
		<col style="width: 40%;" />
		<col style="width: 30%;" />
		<col style="width: 10%;" />
		<col style="width: 10%;" />
		<col style="width: 10%;" />
	</colgroup>
	<thead>
		<tr>
			<th>'.wgLang::get('includename').'</th>
			<th>'.wgLang::get('insertcode').'</th>
			<th>'.wgLang::get('filesize').'</th>
			<th>'.wgLang::get('edit').'</th>
			<th>'.wgLang::get('delete').'</th>
		</tr>
	</thead>
	<tbody>';
		foreach ($arr as $file) {
			$name = parent::getNameFromFilename($file);
			$elink = wgPaths::makeTableEditLink($name, array('handlingclass'=>'wgIncludesBackend'));
			$dlink = wgPaths::makeTableDeleteLink($file, array('handlingclass'=>'wgIncludesBackend', 'act'=>1));
			$data .= '<tr>
			<td>'.$name.'</td>
			<td class="wgcode">{#INC_'.$module.'_'.$name.'}</td>
			<td>'.wgIo::getSize(wgPaths::getUserfilesPath().$file, true).'</td>
			<td>'.wgIcons::getButton('edit', $name, $elink).'</td>
			<td>'.wgIcons::getButton('delete', $name, $dlink, true).'</td>
		</tr>';
			if (wgSystem::getRequestValue('edit') == $name) {
				$editfile = $name;
				$editcode = parent::getIncludeCode(wgSystem::getModule(), $name);
			}
		}
		$data .= '
	</tbody>
</table>
<form action="'.wgPaths::makeSelfLink().'" method="post">
	<p><input name="new" type="submit" value="'.wgLang::get('createnew').'" /></p>
</form>
<form action="'.wgPaths::makeSelfLink().'" method="post">
	<fieldset><legend>'.wgLang::get('edit').'</legend>
		<p class="topbuttons">
			<input name="reset" type="reset" value="'.wgLang::get('reset').'" />
			<input name="apply" type="submit" value="'.wgLang::get('apply').'" />
			<input name="submit" type="submit" value="'.wgLang::get('save').'" />
		</p>
		<p>
			<label>'.wgLang::get('filename').':</label>
			<input name="file" id="file" type="text" value="'.parent::getNameFromFilename($editfile).'" />
		</p>
		<p>
			<label>'.wgLang::get('code').':</label>
			<textarea name="code" rows="9" cols="50" class="large html">'.$editcode.'</textarea>
		</p>
		<p class="bottombuttons">
			<input name="edit" type="hidden" value="'.$editfile.'" />
			<input name="module" type="hidden" value="'.wgSystem::getModule().'" />
			<input name="act" type="hidden" value="1" />
			<input name="handlingclass" type="hidden" value="wgIncludesBackend" />
			<input name="reset" type="reset" value="'.wgLang::get('reset').'" />
			<input name="apply" type="submit" value="'.wgLang::get('apply').'" />
			<input name="submit" type="submit" value="'.wgLang::get('save').'" />
		</p>
	</fieldset>
</form>';
		return $data;		
	}
	
	
}
?>