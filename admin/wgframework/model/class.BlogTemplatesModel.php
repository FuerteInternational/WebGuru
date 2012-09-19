<?php
/**
 * Database class for table blog_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/blog_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        25. June 2009 17:11:56
 */

class BlogTemplatesModel extends BaseBlogTemplatesModel {
	
	public static function getPagerByType($page, $type=0, $limit=20) {
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, (int) $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getTemplateByIdentifierType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, valid::safeText($identifier));
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return array();
	}
	
	public static function getDatasourceArr($tempType) {
		$type = (int) $tempType;
		$arr = array();
		if ($type == 0) {
			$arr[0] = wgLang::get('seladdedascending');
			$arr[1] = wgLang::get('seladdeddescending');
			$arr[2] = wgLang::get('dynaddedascending');
			$arr[3] = wgLang::get('dynaddeddescending');
		}
		elseif ($type == 1) {
			$arr[0] = wgLang::get('fromurlvar');
			$arr[1] = wgLang::get('fromphpvar');
			$arr[2] = wgLang::get('latest');
			$arr[3] = wgLang::get('random');
		}
		elseif ($type == 2) {
			$arr[0] = wgLang::get('selectedasc');
			$arr[1] = wgLang::get('selecteddesc');
			$arr[2] = wgLang::get('fromurlvarasc');
			$arr[3] = wgLang::get('fromurlvardesc');
			$arr[4] = wgLang::get('fromtemplateasc');
			$arr[5] = wgLang::get('fromtemplatedesc');
		}
		elseif ($type == 3) {
			$arr[0] = wgLang::get('dateascending');
			$arr[1] = wgLang::get('datedescending');
		}
		elseif ($type == 4) {
		}
		elseif ($type == 5) {
			//$arr[0] = wgLang::get('postdetail');
			$arr[1] = wgLang::get('fromurlvar');
			$arr[2] = wgLang::get('selectedcat');
		}
		elseif ($type == 6) {
			$arr[0] = wgLang::get('fromcaturlvarasc');
			$arr[1] = wgLang::get('fromcaturlvardesc');
			//$arr[2] = wgLang::get('fromcattemplateasc');
			//$arr[3] = wgLang::get('fromcattemplatedesc');
			//$arr[20] = wgLang::get('fromgroupurlvarasc');
			//$arr[21] = wgLang::get('fromgroupurlvardesc');
			//$arr[22] = wgLang::get('fromgrouptemplateasc');
			//$arr[23] = wgLang::get('fromgrouptemplatedesc');
		}
		elseif ($type == 7) {
			$arr[0] = wgLang::get('fromurlvarasc');
			$arr[1] = wgLang::get('fromurlvardesc');
			$arr[2] = wgLang::get('fromtemplateasc');
			$arr[3] = wgLang::get('fromtemplatedesc');
		}
		return $arr;
	}
	
	public static function getSelectDatasourceForType($type=0) {
		$arr = self::getDatasourceArr($type);
		$new = array();
		foreach ($arr as $k=>$d) $new[$k] = $d;
		return $new;
	}
	
	
}
?>