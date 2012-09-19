<?php

class backendHelper extends baseHelper {
	
	
	private static $_identifierId = 0;
	
	public static $IMAGES_EXTENSIONS = array('jpg', 'jpeg', 'gif', 'png');
	
	public static $DOCUMENTS_EXTENSIONS = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'rtf', 'txt', 'ppt', 'pptx');
	
	public static $VIDEOS_EXTENSIONS = array('wmv', 'flv', 'mov', 'avi');
	
	
	public function __construct($data=array()) {
	}
	
	public static function saveMultipleFiles($module, $subIdentifier, $id, $filesKey, $allowedExtensions=array(), $startId=0) {
		$startId = (int) $startId;
		$subIdentifier = valid::safeText($subIdentifier);
		$files = wgSystem::getFileValue($filesKey);
		$out = array();
		//print_r($files);
		if (is_array($files) && !empty($files)) {
			foreach ($files as $k=>$file) {
				$ok = true;
				if (empty($file['name'])) $ok = false;
				//if (!empty($allowedExtensions) && is_array($allowedExtensions)) $ok = valid::validateExtension($file['name'], $allowedExtensions);
				if ($ok) {
					$startId++;
					//print_r($file);
					$name = wgIo::getUserfilesFilename($module, $subIdentifier, $id, $startId, $file['name']);
					$path = wgIo::uploadFile($name, $file['tmp_name'], wgPaths::getUserfilesPath());
					wgError::add($path, 2);
					if ((bool) $path) $out[$name] = array('path'=>$path, 'original'=>$file['name'], 'mime'=>$file['type'], 'size'=>$file['size'], 'filename'=>$name);
				}
			}
			return $out;
		}
		else return $out;
	}
	
	public static function getMultipleFileHtml($label, $num=10, $identifier=NULL) {
		$item = '<p id="'.$identifier.'%1$s">
	<label>'.$label.' %1$s</label>
	<input type="file" name="'.$identifier.'[%1$s]" class="'.$identifier.'Class" />
</p>		
';
		return self::getMultipleHtml($item, $num, $identifier);
	}
	
	public static function getMultipleTextHtml($label, $num=10, $identifier=NULL) {
		$item = '<p id="'.$identifier.'%1$s">
	<label>'.$label.' %1$s</label>
	<input type="text" name="'.$identifier.'[%1$s]" class="'.$identifier.'Class" />
</p>		
';
		return self::getMultipleHtml($item, $num, $identifier);
	}
	
	public static function getMultipleSelectHtml($label, $num=10, $selected=0, $data=array(), $params=array(), $addNullValues=NULL, $identifier=NULL) {
		$params['class'] = $identifier.'Class';
		$item = '<p id="'.$identifier.'%1$s">
	<label>'.$label.' %1$s</label>
	'.formsHelper::getSelectBox(''.$identifier.'[%1$s]', $selected, $data, $params, $addNullValue).'
</p>		
';
		return self::getMultipleHtml($item, $num, $identifier);
	}
	
	public static function getMultipleHtml($item, $num=10, $identifier=NULL) {
		self::$_identifierId++;
		if (!(bool) $identifier) $identifier = 'multipleSaveHtml'.self::$_identifierId;
		$num = (int) $num;
		if (!(bool) $num) $num = 10;
		$button = '<div id="'.$identifier.'Placer"></div>
<p>
	<button type="button" onclick="add'.$identifier.'Field();">'.wgLang::get('addfield').'</button>
</p>
';
		$javascript = '<script type="text/javascript">
<!--
var actual'.$identifier.'Field = '.$num.';
function add'.$identifier.'Field() {
	var html = \''.preg_replace("/[ ]+/", ' ', str_ireplace(NL, '', sprintf($item, '\' + (actual'.$identifier.'Field + 1) + \''))).'\';
	$(\'#'.$identifier.'Placer\').append(html);
	actual'.$identifier.'Field++;
	
}
-->
</script>
';
		$out = NULL;
		for ($i=0; $i < $num; $i++) {
			$out .= sprintf($item, ($i+1));
		}
		return $out.$button.$javascript;
	}
	
	
	
}

?>