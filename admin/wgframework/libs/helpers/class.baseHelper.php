<?php
abstract class baseHelper {
	
	const DATA_VAL_NAME = 0;
	
	protected static function getBasicData($data=array()) {
		if (empty($data)) return array();
		if (is_a($data, 'dataHelper')) return $data->getData();
		else {
			if (isset($data[0]) && is_array($data[0])) {
				$new = array();
				foreach ($data as $v) $new[(string) $v[0]] = $v[1];
				return $new;
			}
			return $data;
		}
	}
	
	protected static function getParamsAsAttributes($params) {
		if (is_array($params) && !empty($params)) {
			$data = NULL;
			foreach ($params as $k=>$v) if (!empty($v)) $data .= ' '.$k.'="'.$v.'"';
			return $data;
		}
		else return NULL;
	}
	
	
	
}
?>