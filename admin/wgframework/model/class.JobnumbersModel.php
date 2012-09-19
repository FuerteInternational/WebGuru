<?php
/**
 * Database class for table jobnumbers
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/jobnumbers
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. March 2009 14:46:01
 */

class JobnumbersModel extends BaseJobnumbersModel {
	
	public static function getAllWithSearchPager($page, $limit=20, $search=NULL) {
		$page = (int) $page;
		$limit = (int) $limit;
		$search = valid::safeText($search);
		$conn = new wgConnector();
		$where = NULL;
		if ((bool) $search) {
			$pieces = explode('-', $search);
			foreach ($pieces as $qs) {
				if (empty($where)) $or = '';
				else $or = 'OR ';
				$where .= $or.parent::FULL_NAME.' LIKE \'%'.$qs.'%\' OR '.parent::FULL_SHORTNAME.' LIKE \'%'.$qs.'%\'';
			}
			$where = '('.$where.')';
			$conn->myWhere($where);
		}
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getAllWithSearch($search=NULL, $limit=0) {
		$limit = (int) $limit;
		$search = valid::safeText($search);
		$conn = new wgConnector();
		$where = NULL;
		if ((bool) $search) {
			$pieces = explode('-', $search);
			foreach ($pieces as $qs) {
				if (empty($where)) $or = '';
				else $or = 'OR ';
				$where .= $or.parent::FULL_NAME.' LIKE \'%'.$qs.'%\' OR '.parent::FULL_SHORTNAME.' LIKE \'%'.$qs.'%\'';
			}
			$where = '('.$where.')';
			$conn->myWhere($where);
		}
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	
	
	public static function truncateTable() {
		$conn = new wgConnector();
		$conn->truncate(parent::TABLE_NAME);
		return (bool) $conn->executeQuery();
	}
	
	public static function exportData($file=NULL) {
		require_once('Spreadsheet/Excel/Writer.php'); 
		$xls =& new Spreadsheet_Excel_Writer(); 
		$xls->send('jobnumbers.xls');
		$sheet =& $xls->addWorksheet('Jobnumbers');
		$arr = parent::doSelect();
		$fr = new Spreadsheet_Excel_Writer_Format();
		$fr->setBold();
		$fr->setBottom(1);
		$sheet->write(0, 0, 'Sales Shortname', $fr);
		$sheet->write(0, 0, 'Job Name', $fr);
		$sheet->write(0, 0, 'Job Number', $fr);
		$sheet->write(0, 0, 'Status', $fr);
		foreach ($arr as $k=>$v) {
			$sheet->write(($k+1), 0, $v->getShortname());
			$sheet->write(($k+1), 1, $v->getName());
			$sheet->write(($k+1), 2, $v->getJnumber());
			$sheet->write(($k+1), 3, ((bool) $v->getStatus()) ? 'LIVE' : '');
		} 		
		$xls->close();
		return true;
	}
	
	public static function importXLS($file) {
		require_once('Excel/reader.php');
		$data = new Spreadsheet_Excel_Reader();
		$file = wgIo::saveTemp($file);
		if ((bool) $file) {
			$data->read($file);
			$data->sheets[0]['numCols'] = count($data->sheets[0]['cells']);
			for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
				$save = array();
				$r = &$data->sheets[0]['cells'][$j+1];
				$save['name'] = str_ireplace("'", "\'", $r[2]);
				$save['shortname'] = str_ireplace("'", "\'", $r[1]);
				$save['jnumber'] = $r[3];
				$save['status'] = ($r[4] == 'LIVE') ? 1 : 0;
				$save['changed'] = 'NOW()';
				if (!empty($save['name'])) JobnumbersModel::doInsert($save);
			}
			wgIo::delTemp();
			return (int) $data->sheets[0]['numCols'];
		}
		else return false;
			
	}
	
	
}
?>