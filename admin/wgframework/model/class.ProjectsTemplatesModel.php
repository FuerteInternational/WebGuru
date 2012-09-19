<?php
/**
 * Database class for table projects_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/projects_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. July 2009 17:21:08
 */

class ProjectsTemplatesModel extends BaseProjectsTemplatesModel {
	
	public static function getPagerData($page, $type, $limit) {
		$conn = new wgConnector();
		$conn->where(parent::FULL_TEMPTYPE, (int) $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, (int) $page, (int) $limit);
	}
	
	public static function getTemplateByIdentifierType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, valid::safeText($identifier));
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new ProjectsTemplatesModel();
	}
	
	public static function getTempSorting($type=0) {
		$type = (int) $type;
		$new = array();
		if ($type == 0) {
			$new['`date` DESC'] = wgLang::get('datedesc');
			$new['`date` ASC'] = wgLang::get('dateasc');
			$new['`client` DESC'] = wgLang::get('clientdesc');
			$new['`client` ASC'] = wgLang::get('clientasc');
			$new['`name` DESC'] = wgLang::get('namedesc');
			$new['`name` ASC'] = wgLang::get('nameasc');
			$new['`views` DESC'] = wgLang::get('viewsdesc');
			$new['`views` ASC'] = wgLang::get('viewsasc');
			$new['`added` DESC'] = wgLang::get('addeddesc');
			$new['`added` ASC'] = wgLang::get('addedasc');
		}
		elseif ($type == 1) {
			$new['`date` DESC'] = wgLang::get('datedesc');
			$new['`date` ASC'] = wgLang::get('dateasc');
			$new['`client` DESC'] = wgLang::get('clientdesc');
			$new['`client` ASC'] = wgLang::get('clientasc');
			$new['`name` DESC'] = wgLang::get('namedesc');
			$new['`name` ASC'] = wgLang::get('nameasc');
			$new['`views` DESC'] = wgLang::get('viewsdesc');
			$new['`views` ASC'] = wgLang::get('viewsasc');
			$new['`added` DESC'] = wgLang::get('addeddesc');
			$new['`added` ASC'] = wgLang::get('addedasc');
		}
		elseif ($type == 2) {
			$new['`name` DESC'] = wgLang::get('datedesc');
			$new['`name` ASC'] = wgLang::get('dateasc');
			$new['`added` DESC'] = wgLang::get('addeddesc');
			$new['`added` ASC'] = wgLang::get('addedasc');
			$new['`views` DESC'] = wgLang::get('viewsdesc');
			$new['`views` ASC'] = wgLang::get('viewsasc');
			$new['`downloads` DESC'] = wgLang::get('downloadsdesc');
			$new['`downloads` ASC'] = wgLang::get('downloadsasc');
			$new['`itemtype` ASC'] = wgLang::get('itemtypeimgfirst');
			$new['`itemtype` DESC'] = wgLang::get('itemtypeimglast');
		}
		elseif ($type == 3) {
			$new['`name` DESC'] = wgLang::get('namedesc');
			$new['`name` ASC'] = wgLang::get('nameasc');
			$new['`added` DESC'] = wgLang::get('addeddesc');
			$new['`added` ASC'] = wgLang::get('addedasc');
			$new['`views` DESC'] = wgLang::get('viewsdesc');
			$new['`views` ASC'] = wgLang::get('viewsasc');
		}
		return $new;
	}
	
	public static function getTempDatasource($type=0) {
		$type = (int) $type;
		$new = array();
		if ($type == 0) {
			$new[0] = wgLang::get('allprojects');
			$new[1] = wgLang::get('selectedcat');
			$new[2] = wgLang::get('urlcat');
		}
		elseif ($type == 1) {
			$new[0] = wgLang::get('urlvar');
			$new[1] = wgLang::get('last');
			$new[2] = wgLang::get('lastfromcat');
			$new[3] = wgLang::get('random');
			$new[4] = wgLang::get('randomfromcat');
		}
		elseif ($type == 2) {
		}
		elseif ($type == 3) {
			$new[0] = wgLang::get('allcat');
			$new[1] = wgLang::get('selectedcat');
			$new[2] = wgLang::get('last');
		}
		return $new;
	}
	
	
}
?>