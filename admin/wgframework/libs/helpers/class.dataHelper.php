<?php

class dataHelper extends baseHelper {
	
	private $_data = array();
	
	public function __construct($data=array()) {
		if (is_array($data) && !empty($data)) $this->_data = $data;
		else $this->_data = array();
	}
	
	public function addBasicData($value, $key=NULL) {
		if ($key != NULL) $this->_data[$key] = $value;
		else $this->_data[] = $value;
	}
	
	public function getData() {
		return $this->_data;
	}
	
	public static function getIdNameFromResult($data, $firstRows=array(), $valueFunction='getName', $dataFunction='getPrimaryKey') {
		if (is_array($firstRows)) $arr = $firstRows;
		else $arr = array();
		if (is_array($data) && !empty($data)) foreach ($data as $obj) {
			if (is_object($obj)) $arr[$obj->$dataFunction()] = $obj->$valueFunction();
			else $arr[$obj[0]] = $obj[1];
		}
		return $arr;
	}
	
	
	
}

?>