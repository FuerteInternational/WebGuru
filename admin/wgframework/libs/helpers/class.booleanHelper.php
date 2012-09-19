<?php
class booleanHelper extends baseHelper {
	
	const SELECTED = ' selected="selected"';
	
	const CHECKED = ' checked="checked"';
	
	public static function getYesNo($data=1, $html=false, $bold=true) {
		if ((bool) $data) {
			$code = wgLang::get('yes');
			$bold = (bool) $bold ? ' bold' : '';
			if ((bool) $html) $code = '<span class="green'.$bold.'">'.$code.'</span>';
		}
		else {
			$code = wgLang::get('no');
			$bold = (bool) $bold ? ' bold' : '';
			if ((bool) $html) $code = '<span class="red'.$bold.'">'.$code.'</span>';
		}
		return $code;
	}
	
}
?>