<?php
class formsHelper extends baseHelper {
	
	const SELECTED = ' selected="selected"';
	
	const CHECKED = ' checked="checked"';
	
	// TODO: improve data access !!!!
	public static function getSelectBox($name, $selected=NULL, $data=array(), $params=array(), $addNullValue=false) {
		$isNumeric = true;
		if (is_string($selected)) $isNumeric = false; 
		if (!isset($params['id'])) $params['id'] = $name;
		$class = NULL;
		if (isset($params['baseclass'])) {
			$class = $params['baseclass'];
			unset($params['baseclass']);
		}
		$params = ' name="'.$name.'"'.parent::getParamsAsAttributes($params);
		if (!empty($data) && is_array($data) && isset($data[0]) && is_object($data[0])) $data = dataHelper::getIdNameFromResult($data);
		else $data = parent::getBasicData($data, parent::DATA_VAL_NAME);
		$code = '<select'.$params.'>';
		if ((bool) $addNullValue) {
			$code .= '<option value="'.($isNumeric ? '0' : '').'"'.(($selected == 0) ? ' selected="selected"' : NULL).'>'.$addNullValue.'</option>';
		}
		foreach ($data as $k=>$v) {
			
			if ((bool) $selected) {
				if ($selected == $k) $sel = self::SELECTED;
				else $sel = NULL;
			}
			else $sel = NULL;
			$code .= '<option value="'.$k.'"'.$sel.'>'.$v.'</option>';
		}
		$code .= '</select>';
		return $code;
	}
	
	public static function getCheckBox($name, $selected, $data=1, $params=array()) {
		if (!isset($params['id'])) $params['id'] = $name;
		$params['value'] = $data;
		if ((bool) $selected) $params['checked'] = 'checked';
		$params = ' name="'.$name.'"'.parent::getParamsAsAttributes($params);
		$code = '<input type="checkbox"'.$params.' />';
		return $code;
	}
	
	public static function getDateTimeBox($name, $data, $default='now', $params=array()) {
		if (!(bool) $data) {
			if ($default == 'now') $data = time();
			elseif (!(bool) $default) $data = time();
			else $data = $default;
		}
		$params['value'] = date('Y-m-d H:i:00', ($data));
		if (!isset($params['id'])) $params['id'] = $name;
		if (!isset($params['class'])) $params['class'] = 'date-selector';
		$params['onclick'] = 'setDate()';
		if (!isset($params['alt'])) $params['alt'] = '{wSELECTDATE}';
		$par = ' name="'.$name.'"'.parent::getParamsAsAttributes($params);
		$code = '<input type="text"'.$par.' />
		<img src="'.wgIcons::getIcon('date').'" alt="'.$params['alt'].'" id="'.$params['id'].'-button" class="'.$params['class'].'-button" />
		<script type="text/javascript">
			Calendar.setup({
				inputField     :    "'.$params['id'].'",
				ifFormat       :    "%Y-%m-%d %H:%M:00",
				showsTime      :    true,
				button         :    "'.$params['id'].'-button",
				singleClick    :    false,
				step           :    1
			});
		</script>
		';
		return $code;
	}
	
	public static function getTextField($name, $data, $params=array()) {
		if (!isset($params['id'])) $params['id'] = $name;
		$params['value'] = $data;
		$params['name'] = $name;
		$par = parent::getParamsAsAttributes($params);
		$code = '<input type="text"'.$par.' />';
		return $code;
	} 
	
	public static function getHiddenField($name, $data, $params=array()) {
		if (!isset($params['id'])) $params['id'] = $name;
		$params['value'] = $data;
		$params['name'] = $name;
		$par = parent::getParamsAsAttributes($params);
		$code = '<input type="hidden"'.$par.' />';
		return $code;
	} 
	
}
?>