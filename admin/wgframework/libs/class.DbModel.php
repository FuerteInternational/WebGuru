<?php
/**
 * Database model mother class
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */

abstract class DbModel {
	
	const INNER_JOIN           = 'INNER JOIN';
	
	const LEFT_JOIN            = 'LEFT JOIN';
	
	const RIGHT_JOIN           = 'RIGHT JOIN';
	
	const CROSS_JOIN           = 'CROSS JOIN';
	
	const BIGGER_THAN          = '>';
	
	const SMALLER_THAN         = '<';
	
	const BIGGER_THAN_EQUALS   = '>=';
	
	const SMALLER_THAN_EQUALS  = '<=';
	
	const NOT_NULL             = 'NOT NULL';
	
	const FIELD_PHPNAME        = '_tableNames';

	const FIELD_COLVALUE       = '_tableValues';

	const FIELD_FIELDNAME      = '_tableFields';
	
	const FIELD_FIELDNAME_KEY  = '_tableFieldsByKey';
	
	const FIELD_FULLFIELDNAME  = '_fullTblFields';
	
	function __construct() {
		
	}
	
	public function __toString() {
		
	}
	
	protected static function doSelectParameters(&$conn, $params, $primaryKey) {
		if (!empty($params) && !is_a($params, 'wgConnector')) {
			if (is_numeric($params)) $conn->where($primaryKey, $params);
			elseif (is_array($params)) foreach ($params as $k=>$v) $conn->where($k, $v);
			else $conn->where($params, false);
		}
	}
	
	/**
	 * Initialize query
	 * 
	 * @name _initwgConnector
	 * @param array $params
	 * @return object wgConnector()
	 */
	protected static function _initwgConnector($params=NULL, $pk) {
		if (!is_a($params, 'wgConnector')) {
			$conn = new wgConnector();
			self::doSelectParameters($conn, $params, $pk);
		}
		else {
			$conn = clone($params);
			$conn->setInit(false);
		}
		return $conn;
	}
	
	protected static function _getSelectFields($fields=array()) {
		if (empty($fields) || !is_array($fields)) $out = '*';
		else {
			$out = NULL;
			$c = count($fields);
			foreach ($fields as $field) {
				$coma = ', ';
				if ($c <= 1) $coma = NULL;
				$out .= $field.$coma; 
				$c--;
			}
		}
		return $out;
	}
	
	public static function doSelect(&$conn, &$child) {
		$resource = $conn->executeQuery();
		if (!(bool) $resource) return array();
		$result = array();
		$cols = array();
		$i = 0;
		if ((bool) $resource)  {
			while ($col = mysql_fetch_field($resource)) $cols[$col->name] = $i++;
			while ($data = mysql_fetch_row($resource)) {
				$new = clone $child;
				$new->_result = $data;
				$new->_query  = $conn->getLastQuery();
				$new->_data = $conn->getInfo();
				$new->_resultFields  = $cols;
				$result[] = $new;
			}
		}
		return $result;
	}
	
	public static function doPager(&$conn, &$child, $perPage, $selectedPage, $count, $params) {
		$result = array();
		$result['info'] = self::_getPagerInfo($perPage, $selectedPage, $count);
		//$result['html'] = self::_getPagerHtml($result['info'], $params);
		$conn->limit($result['info']['perp'], $result['info']['from']);
		$resource = $conn->executeQuery();
		$result['data'] = array();
		$cols = array();
		$i = 0;
		if ((bool) $resource) {
			while ($col = mysql_fetch_field($resource)) $cols[$col->name] = $i++;
			while ($data = mysql_fetch_row($resource)) {
				$new = clone $child;
				$new->_result = $data;
				$new->_query  = $conn->getLastQuery();
				$new->_data = $conn->getInfo();
				$new->_resultFields  = $cols;
				$result['data'][] = $new;
			}
			$result['pager'] = pager::makeFullPager($result['info']);
		}
		return $result;
	}
	
	private static function _getPagerInfo($perPage, $page, $count) {
		$data 				= array();
		$data['count'] 		= $count;
		$data['perp'] 		= $perPage;
		$data['from'] 		= 0;
		$data['page']		= $page;
		$data['maxpage'] 	= 0;
		
		$data['maxpage'] = (ceil($count / $perPage) - 1);
		if ($data['page'] > $data['maxpage']) $data['page'] = $data['maxpage'];
		$data['from'] = $data['page'] * $data['perp'];
		if ($data['from'] < 0) $data['from'] = 0;
		
		return $data;
	}

	public static function doSelectOne(&$conn, &$child) {
		return $conn->getOne();
	}
	
	public static function doInsert(&$conn, &$child) {
		$conn->makeQuery();
		return (int) $conn->insertedId();
	}
	
	public static function doAffected(&$conn, &$child) {
		$conn->makeQuery();
		$info = $conn->getInfo();
		if ((bool) $info['errorcode']) throw new WgException('MySQL Error No.'.$info['errorcode'].' ('.$info['errormesg'].') in query:'.$conn->getLastQuery().'');
		return (int) $info['affected'];
	}
	
	protected static function throwGetColException($func, $line, $file) {
		throw new WgException('!!!!!!!!!!!!!!!! '.$func.' !!!!!!!!!!!!!!!!!!!!');
	}
	
	protected static function throwNoResException($func, $line, $file) {
		throw new WgException('!!!!!!!!!!!!!!!! neni result '.$func.' !!!!!!!!!!!!!!!!!!!!');
	}
	
}

?>