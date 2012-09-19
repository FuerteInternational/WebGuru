<?php
/**
 * Database class for table csnippets_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/csnippets_templates
 * @author       Ondrej Rafaj (fiftyfootsquid.com)
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        6. August 2009 12:50:48
 */

class CsnippetsTemplatesModel extends BaseCsnippetsTemplatesModel {
	
	public static function getDatasourceArray($tempType) {
		$arr = array();
		switch ($tempType) {
			case 0:
				$arr[0] = wgLang::get('selectedcat');
				$arr[1] = wgLang::get('variablecat');
				$arr[2] = wgLang::get('all');
				//$arr[3] = wgLang::get('usersallvar');
				//$arr[4] = wgLang::get('usersallvarcat');
				$arr[5] = wgLang::get('usersallsnippets');
				$arr[6] = wgLang::get('userspublishedsnippets');
				break;
			case 1:
				$arr[0] = wgLang::get('variable');
				$arr[1] = wgLang::get('latest');
				$arr[2] = wgLang::get('latestcat');
				$arr[3] = wgLang::get('random');
				$arr[4] = wgLang::get('randomcat');
				break;
			case 2:
				//$arr[0] = wgLang::get('');
				//$arr[1] = wgLang::get('');
				//$arr[2] = wgLang::get('');
				break;
			case 3:
				$arr[0] = wgLang::get('variable');
				$arr[1] = wgLang::get('justnew');
				$arr[2] = wgLang::get('onlyonecat');
				break;
		}
		return $arr;
	}
	
	
	// --------------------- Predefined functions for CsnippetsTemplates ---------------------

	//*
	public static function getTemplateByIdentifierAndType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, wgText::safeText($identifier));
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CsnippetsTemplatesModel();
	}
	//*/

	/*
	public static function getSelfData(, $templateType=0) {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where->(parent::COL_TEMPTYPE, (int) $templateType);
		//$conn->order(parent::COL_ID, 'ASC');
		return parent::doSelect($conn);
	}
	//*/
	
	//*
	public static function getSelfPagerData($page, $limit=20, $templateType=0) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_TEMPTYPE, (int) $templateType);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	/*
	public static function getOneSelfData($idCsnippetsTemplates) {
		$id = (int) $idCsnippetsTemplates;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id)
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CsnippetsTemplatesModel();
	}
	//*/
	
}
?>