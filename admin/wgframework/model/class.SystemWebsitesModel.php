<?php
/**
 * Database class for table system_websites
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_websites
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class SystemWebsitesModel extends BaseSystemWebsitesModel {
	
	public static function getDefaultWebsite() {
		$conn = new wgConnector();
		$conn->where(parent::COL_ISDEFAULT, 1);
		$conn->limit(1);
		$lang = parent::doSelect($conn);
		if (!isset($lang[0])) {
			$conn = new wgConnector();
			$conn->order(parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
			$conn->limit(1);
			$lang = parent::doSelect($conn);
		}
		if (isset($lang[0]) && is_a($lang[0], 'SystemWebsitesModel')) return $lang[0];
		else {
			$lang = new SystemWebsitesModel();
			$lang->setNullResults();
			return $lang;
		}
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
	
	public static function getWebNameByPK($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$item = parent::doSelectPKey($id);
		return $item->getName();
	}
	
	public static function getWebsitesWithPermissions() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		$arr = parent::doSelect();
		if (empty($arr)) {
			self::createWebsite();
			$arr = self::getWebsitesWithPermissions();
		}
		return $arr;
	}
	
	public static function createWebsite() {
		$save = NULL;
		$save['name'] = 'Default website';
		$save['code'] = 'def';
		$save['image'] = '';
		$save['directory'] = '../';
		$save['sort'] = 0;
		$save['isdefault'] = 1;
		$save['alternativepath'] = wgPaths::getPath('url');
		$save['changed'] = 'NOW()';
		$save['added'] = 'NOW()';
		return (bool) parent::doInsert($save);
	}
	
}
?>