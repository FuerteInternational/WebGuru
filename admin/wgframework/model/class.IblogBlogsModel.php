<?php
/**
 * Database class for table iblog_blogs
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/iblog_blogs
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. November 2009 11:35:49
 */

class IblogBlogsModel extends BaseIblogBlogsModel {
	
	
	// --------------------- Predefined functions for IblogBlogs ---------------------

	public static function deleteBlog($idBlog) {
		$id = (int) $idBlog;
		if (!(bool) $id) return false;
		IblogDevicesModel::deleteDevicesForBlog($id);
		IblogPostsModel::deletePostsForBlog($id);
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		return (bool) parent::doDelete($conn);
	}
	
	public static function validateBlogForUser($idBlog, $deviceCode, $idUser) {
		$idBlog = (int) $idBlog;
		if (!(bool) $idBlog) return false;
		$blog = self::getOneSelfData($idBlog);
		if ((bool) $blog->getId()) {
			if (!(bool) $blog->getUsersId()) {
				if (IblogDevicesModel::getDeviceForBlogId($blog->getId()) == wgText::safeText($deviceCode)) return true;
				else return false;
			}
			elseif ($blog->getUsersId() == $idUser) return true;
			else  return false;
		}
		else return false;
	}
	
	public static function saveBlogForDevice($blogId, $name, $identifier, $desc, $motto) {
		$save = array();
		$save['where'] = (int) $blogId;
		$save['name'] = wgText::secureSql($name);
		if (empty($identifier)) $identifier = $name;
		$save['identifier'] = wgText::safeText($identifier);
		$save['description'] = wgText::secureSql($desc);
		$save['motto'] = wgText::secureSql($motto);
		$save['changed'] = 'NOW()';
		return (bool) parent::doUpdate($save);
	}
	
	public static function createBlogForDevice($deviceCode, $name=NULL, $desc=NULL, $motto=NULL) {
		$save = array();
		if (empty($name)) $name = 'My first iBlog';
		if (empty($desc)) $desc = '...';
		if (empty($motto)) $motto = 'Play hard, die well';
		$save['name'] = $name;
		$save['identifier'] = wgText::safeText($name.self::getRandomIdentifier());
		$save['description'] = $desc;
		$save['motto'] = $motto;
		$save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$id = (int) parent::doInsert($save);
		if ((bool) $id) IblogDevicesModel::addDevice($deviceCode, $id);
		return $id;
	}
	
	public static function getRandomIdentifier($plus=0) {
		$conn = new wgConnector();
		$conn->order(parent::COL_ID, 'DESC');
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return ($arr[0]->getId() + (int) $plus);
		else return 1;
	}
	
	public static function getUserBlogsData($userId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, (int) $userId);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function setUserForBlog($blogId, $userId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, (int) $blogId);
		$conn->set(parent::COL_USERS_ID, (int) $userId);
		return (bool) parent::doUpdate($conn);
	}
	
	public static function getDeviceBlogsData($deviceCode) {
		$conn = new wgConnector();
		$where = parent::FULL_USERS_ID.' = 0';
		$devices = IblogDevicesModel::getSelfDataByDeviceId($deviceCode);
		if (!empty($devices)) {
			$w = NULL;
			foreach ($devices as $dev) {
				if (empty($w)) $w = ' AND (';
				else $w .= ' OR ';
				$w .= parent::FULL_ID.' = '.$dev->getIblogBlogsId();
			}
			$where .= $w.')';
		}
		$conn->myWhere($where);
		//print $where;
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idIblogBlogs) {
		$id = (int) $idIblogBlogs;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IblogBlogsModel();
	}
	
	public static function checkIdentifier($identifier, $idIblogBlogs=0) {
		$id = (int) $idIblogBlogs;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, wgText::safeText($identifier));
		if ((bool) $id) $conn->where(parent::COL_ID, $id, '!=');
		$arr = parent::doCount($conn);
	}
	
}
?>