<?php
/**
 * Database class for table nato3mcat_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/nato3mcat_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. September 2009 17:36:13
 */

class Nato3mcatItemsModel extends BaseNato3mcatItemsModel {
	
	
	// --------------------- Predefined functions for Nato3mcatItems ---------------------
	
	private static function _getSearchString($search) {
		return "(niin = '$search' OR nato_item_name LIKE '%$search%' OR nato_description LIKE '%$search%' OR market LIKE '%$search%' OR clasification LIKE '%$search%' OR item_type LIKE '%$search%' OR description LIKE '%$search%' OR common_ref_name LIKE '%$search%' OR common_description LIKE '%$search%')";
	}
	
	
	public static function getItemTypeData() {
		$conn = new wgConnector();
		$search = $_GET['search'];
		if (!empty($search)) $search = self::_getSearchString($search);
		$q = self::_getPreservedWhere($search);
		if (!empty($q)) $conn->myWhere($q);
		$conn->order(parent::COL_ITEM_TYPE, 'ASC');
		$conn->group(parent::COL_ITEM_TYPE);
		return parent::doSelect($conn);
	}
	
	public static function getDescriptionData() {
		$conn = new wgConnector();
		$search = $_GET['search'];
		if (!empty($search)) $search = self::_getSearchString($search);
		$q = self::_getPreservedWhere($search);
		if (!empty($q)) $conn->myWhere($q);
		$conn->order(parent::COL_DESCRIPTION, 'ASC');
		$conn->group(parent::COL_DESCRIPTION);
		return parent::doSelect($conn);
	}
	
	public static function getMarketData() {
		$conn = new wgConnector();
		$search = $_GET['search'];
		if (!empty($search)) $search = self::_getSearchString($search);
		$q = self::_getPreservedWhere($search);
		if (!empty($q)) $conn->myWhere($q);
		$conn->order(parent::COL_MARKET, 'ASC');
		$conn->group(parent::COL_MARKET);
		return parent::doSelect($conn);
	}
	
	public static function getgetClasificationData() {
		$conn = new wgConnector();
		$search = $_GET['search'];
		if (!empty($search)) $search = self::_getSearchString($search);
		$q = self::_getPreservedWhere($search);
		if (!empty($q)) $conn->myWhere($q);
		$conn->order(parent::COL_CLASIFICATION, 'ASC');
		$conn->group(parent::COL_CLASIFICATION);
		return parent::doSelect($conn);
	}
	
	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getCountAll() {
		return (int) parent::doCount();
	}
	
	public static function getSearchData($search) {
		if (isset($_SESSION['searchterm'])) {
			if ($_SESSION['searchterm'] != $search) {
				$_SESSION['searchterm'] = $search;
				$_SESSION['3m'] = array();
			}
		}
		else $_SESSION['searchterm'] = $search;
		//$limit = (int) $limit;
		self::_preserveValues();
		//if (isset($_SESSION['limit'])) $limit = (int) $_SESSION['limit'];
		//if (!(bool) $limit) $limit = 20;
		//print $limit;
		$conn = new wgConnector();
		if (!empty($search)) $search = self::_getSearchString($search);
		$q = self::_getPreservedWhere($search);
		//print $q;
		if (!empty($q)) $conn->myWhere($q);
		$conn->order(parent::COL_NIIN, 'ASC');
		$conn->limit(25);
		return parent::doSelect($conn);
	}
	
	private static function _preserveValues() {
		if (isset($_GET['perpage'])) $_SESSION['limit'] = (int) $_GET['perpage'];
		if (isset($_GET['itemtypeFilter'])) $_SESSION['3m'][$_GET['search']]['itemtypeFilter'] = (string) $_GET['itemtypeFilter'];
		if (isset($_GET['descriptionFilter'])) $_SESSION['3m'][$_GET['search']]['descriptionFilter'] = (string) $_GET['descriptionFilter'];
		if (isset($_GET['marketFilter'])) $_SESSION['3m'][$_GET['search']]['marketFilter'] = (string) $_GET['marketFilter'];
		if (isset($_GET['classificationFilter'])) $_SESSION['3m'][$_GET['search']]['classificationFilter'] = (string) $_GET['classificationFilter'];
		//print_r($_SESSION);
	}
	
	private static function _getPreservedWhere($sq='') {
		$where = $sq;
		if (isset($_SESSION['3m'][$_GET['search']]['marketFilter']) && !empty($_SESSION['3m'][$_GET['search']]['marketFilter'])) {
			if (!empty($where)) $where .= ' AND ';
			$where .= '`market` = \''.$_SESSION['3m'][$_GET['search']]['marketFilter'].'\'';
		}
		if (isset($_SESSION['3m'][$_GET['search']]['classificationFilter']) && !empty($_SESSION['3m'][$_GET['search']]['classificationFilter'])) {
			if (!empty($where)) $where .= ' AND ';
			$where .= '`clasification` = \''.$_SESSION['3m'][$_GET['search']]['classificationFilter'].'\'';
		}
		if (isset($_SESSION['3m'][$_GET['search']]['itemtypeFilter']) && !empty($_SESSION['3m'][$_GET['search']]['itemtypeFilter'])) {
			if (!empty($where)) $where .= ' AND ';
			$where .= '`item_type` = \''.$_SESSION['3m'][$_GET['search']]['itemtypeFilter'].'\'';
		}
		if (isset($_SESSION['3m'][$_GET['search']]['descriptionFilter']) && !empty($_SESSION['3m'][$_GET['search']]['descriptionFilter'])) {
			if (!empty($where)) $where .= ' AND ';
			$where .= '`description` = \''.$_SESSION['3m'][$_GET['search']]['descriptionFilter'].'\'';
		}
		return $where;
	}
	
	public static function getSearchPagerData($search, $page, $limit=20) {
		if (isset($_SESSION['searchterm'])) {
			if ($_SESSION['searchterm'] != $search) {
				$_SESSION['searchterm'] = $search;
				$_SESSION['3m'] = array();
			}
		}
		else $_SESSION['searchterm'] = $search;
		$limit = (int) $limit;
		self::_preserveValues();
		if (isset($_SESSION['limit'])) $limit = (int) $_SESSION['limit'];
		if (!(bool) $limit) $limit = 20;
		//print $limit;
		$conn = new wgConnector();
		if (!empty($search)) $search = self::_getSearchString($search);
		$q = self::_getPreservedWhere($search);
		//print $q;
		if (!empty($q)) $conn->myWhere($q);
		$conn->order(parent::COL_NIIN, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idNato3mcatItems) {
		$id = (int) $idNato3mcatItems;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new Nato3mcatItemsModel();
	}
	
	public static function importData($file) {
		require_once('Excel/reader.php');
		set_time_limit(0);
		$data = new Spreadsheet_Excel_Reader();
		$file = wgIo::saveTemp($file);
		Nato3mcatItemsModel::doTruncate();
		if ((bool) $file) {
			$data->read($file);
			$data->sheets[0]['numCols'] = count($data->sheets[0]['cells']);
			for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
				if ($j > 2) {
					$save = array();
					$r = &$data->sheets[0]['cells'][$j+1];
					
					if (isset($r[1])) $save['niin'] = $r[1];
					if (isset($r[2])) $save['bigb'] = ($r[2]);
					if (isset($r[3])) $save['smallb'] = ($r[3]);
					if (isset($r[4])) $save['market'] = ($r[4]);
					if (isset($r[5])) $save['clasification'] = ($r[5]);
					if (isset($r[6])) $save['item_type'] = ($r[6]);
					if (isset($r[7])) $save['description'] = ($r[7]);
					if (isset($r[8])) $save['common_ref_name'] = ($r[8]);
					if (isset($r[9])) $save['common_description'] = ($r[9]);
					if (isset($r[10])) $save['nato_item_name'] = ($r[10]);
					if (isset($r[11])) $save['nato_description'] = ($r[11]);
					if (isset($r[12])) $save['length'] = ($r[12]);
					if (isset($r[13])) $save['length_unit'] = ($r[13]);
					if (isset($r[14])) $save['width'] = ($r[14]);
					if (isset($r[15])) $save['width_unit'] = ($r[15]);
					if (isset($r[16])) $save['height'] = ($r[16]);
					if (isset($r[17])) $save['height_unit'] = ($r[17]);
					if (isset($r[18])) $save['volume_weight'] = ($r[18]);
					if (isset($r[19])) $save['volume_weight_unit'] = ($r[19]);
					if (isset($r[20])) $save['diameter'] = ($r[20]);
					if (isset($r[21])) $save['diameter_unit'] = ($r[21]);
					
					//$save['status'] = ($r[4] == 'LIVE') ? 1 : 0;
					//$save['changed'] = 'NOW()';
					//print $j;
					//if ($j > 130) print_r($r);
					if (!empty($save['niin'])) Nato3mcatItemsModel::doInsert($save);
					//print_r($r);
					//if ($j == 50) return true;
				}
			}
			wgIo::delTemp();
			return (int) $data->sheets[0]['numCols'];
		}
		else return false;
	}
	
	
}
?>