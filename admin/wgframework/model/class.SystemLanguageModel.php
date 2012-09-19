<?php
/**
 * Database class for table system_language
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_language
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class SystemLanguageModel extends BaseSystemLanguageModel {
	
	
	public static function getLanguagesIdArrayForWeb($web=0) {
		$web = (int) $web;
		$conn = new wgConnector();
		if ((bool) $web) $conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$arr = parent::doSelect($conn);
		$new = array();
		foreach ($arr as $l) $new[$l->getId()] = $l;
		return $new; 
	}
	
	public static function getLanguagesCodeArrayForWeb($web=0) {
		$web = (int) $web;
		$conn = new wgConnector();
		if ((bool) $web) $conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$arr = parent::doSelect($conn);
		$new = array();
		foreach ($arr as $l) $new[$l->getCode()] = $l;
		return $new; 
	}
	
	public static function getCurrentLanguageName() {
		$lang = parent::doSelectPKey(wgLang::getLanguageId());
		return $lang->getName();
	}
	
	public static function setDefault($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->set(parent::COL_ISDEFAULT, 0);
		parent::doUpdate($conn);
		$conn = new wgConnector();
		$conn->set(parent::COL_ISDEFAULT, 1);
		$conn->where(parent::COL_ID, $id);
		parent::doUpdate($conn);
	}
	
	public static function getLanguagesWithPermissionsForWebsite($web=false) {
		if ($web == false) $web = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$conn->order(parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		$arr = parent::doSelect($conn);
		if (empty($arr)) {
			self::createLanguage();
			$arr = self::getLanguagesWithPermissionsForWebsite($web);
		}
		return $arr;
	}
	
	public static function getLanguagesPagerWithPermissionsForWebsite($page=0, $web=false) {
		$page = (int) $page;
		if ($web == false) $web = wgSystem::getCurrentWebsite();
		$web = (int) $web;
		$conn = new wgConnector();
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$conn->order(parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		$arr = parent::doPager($conn, $page);
		if (empty($arr['data'])) {
			self::createLanguage();
			$arr = self::getLanguagesPagerWithPermissionsForWebsite($page, $web);
		}
		return $arr;
	}
	
	public static function createLanguage() {
		$save = NULL;
		$save['name'] = 'Default language';
		$save['code'] = 'def';
		$save['image'] = '';
		$save['directory'] = 'default/';
		$save['sort'] = 0;
		$save['isdefault'] = 1;
		$save['system_websites_id'] = wgSystem::getCurrentWebsite();
		$save['changed'] = 'NOW()';
		$save['added'] = 'NOW()';
		return (bool) parent::doInsert($save);
	}
	
	public static function getCurrentLanguageCode() {
		$lang = parent::doSelectPKey(wgLang::getLanguageId());
		return $lang->getCode();
	}
	
	public static function getDefaultLanguage() {
		$conn = new wgConnector();
		$conn->where(parent::COL_ISDEFAULT, 1);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, wgSystem::getCurrentWebsite());
		$conn->limit(1);
		$lang = parent::doSelect($conn);
		if (!isset($lang[0])) {
			$conn = new wgConnector();
			$conn->where(parent::COL_SYSTEM_WEBSITES_ID, wgSystem::getCurrentWebsite());
			$conn->order(parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
			$conn->limit(1);
			$lang = parent::doSelect($conn);
		}
		if (isset($lang[0]) && is_a($lang[0], 'SystemLanguageModel')) return $lang[0];
		else {
			$lang = new SystemLanguageModel();
			$lang->setNullResults();
			return $lang;
		}
	}
	
}
?>