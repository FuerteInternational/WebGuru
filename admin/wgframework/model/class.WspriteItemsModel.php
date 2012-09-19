<?php
/**
 * Database class for table wsprite_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/wsprite_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. September 2009 16:06:36
 */

class WspriteItemsModel extends BaseWspriteItemsModel {
	
	
	// --------------------- Predefined functions for WspriteItems ---------------------

	public static function getMultipleItemsFromFile($file) {
		require_once('Excel/reader.php');
		set_time_limit(0);
		$data = new Spreadsheet_Excel_Reader();
		$file = wgIo::saveTemp($file);
		if ((bool) $file) {
			$data->read($file);
			$data->sheets[0]['numCols'] = count($data->sheets[0]['cells']);
			$array = array();
			for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
				$save = array();
				$r = &$data->sheets[0]['cells'][$j+1];
				if (isset($r[1]) && !empty($r[1])) {
					$d = utf8_encode(trim($r[1]));
					//$lt = NULL;
					$l = NULL;
					$lt = NULL;
					if (isset($r[2])) {
						$l = utf8_encode(trim($r[2]));
						$lt = trim($l);
					}
					if (isset($r[3])) $lt = utf8_encode(trim($r[3]));
					if (!empty($d)) $arr[] = array($d, $l, $lt);
				}
			}
			wgIo::delTemp();
			//wgIo::writeFile(wgPaths::getTempPath().'mi.xml', xml::arrayToXml($arr));
			return $arr;
		}
		else return array();
	}
	
	public static function getSelfData($widgetId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_WSPRITE_WIDGETS_ID, (int) $widgetId);
		$conn->order(parent::COL_SORT, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function updateSortForItem($widgetId, $sort=0) {
		$conn = new wgConnector();
		$conn->set(parent::COL_SORT, (int) $sort);
		$conn->where(parent::COL_ID, (int) $widgetId);
		return parent::doUpdate($conn);
	}
	
	public static function deleteBox($id) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, (int) $id);
		return (bool) parent::doDelete($conn);
	}
	
	/*
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	public static function getOneSelfData($idWspriteItems) {
		$id = (int) $idWspriteItems;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new WspriteItemsModel();
	}
	
}
?>