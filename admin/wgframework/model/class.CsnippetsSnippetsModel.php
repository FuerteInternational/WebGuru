<?php
/**
 * Database class for table csnippets_snippets
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/csnippets_snippets
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        6. August 2009 12:15:22
 */

class CsnippetsSnippetsModel extends BaseCsnippetsSnippetsModel {
	
	public static function deleteSnippet($idSnippet) {
		$id = (int) $idSnippet;
		$conn = new wgConnector();
		$conn->set('deleted', 1);
		$conn->where(parent::COL_ID, $id);
		$conn->limit(1);
		return (bool) parent::doUpdate($conn);
	}
	
	public static function getSearchData($searchString, $cat=0, $approvedOnly=false, $strict=false) {
		if (empty($searchString)) return false;
		$id = (int) $cat;
		$user = (int) $user;
		$conn = new wgConnector();
		$conn->myWhere(self::_getSearchString($searchString));
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		$conn->where(parent::COL_USERS_ID, $user);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function validateUserSnippet($snippetId, $userId=NULL) {
		$s = (int) $snippetId;
		$u = (int) $userId;
		if (!(bool) $u) $u = (int) moduleUsers::getId();
		if (!(bool) $u) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, $u);
		$conn->where(parent::COL_ID, $s);
		return (bool) parent::doCount($conn);
	}
	
	
	public static function getSearchPagerData($searchString, $page, $limit=20, $cat=0, $approvedOnly=false, $strict=false) {
		if (empty($searchString)) return false;
		$id = (int) $cat;
		$user = (int) $user;
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		$conn->myWhere(self::_getSearchString($searchString));
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		$conn->where(parent::COL_USERS_ID, $user);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	private static function _getSearchString($searchString) {
		$parts = wgSearch::parseSearchKeywords($searchString);
		$where = NULL;
		$or = NULL;
		foreach ($parts as $p) {
			if ($where != NULL) $or = ' OR ';
			$where .= $ok.parent::FULL_KEYWORDS.' LIKE \'%'.$p.'%\' OR '.parent::FULL_NAME.' LIKE \'%'.$p.'%\'';
		}
		return $where;
	}
	
	public static function getUserData($user, $cat=0, $approvedOnly=false, $strict=false) {
		$id = (int) $cat;
		$user = (int) $user;
		$conn = new wgConnector();
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		$conn->where(parent::COL_USERS_ID, $user);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function getOneUserData($idSnippet, $user, $cat=0, $approvedOnly=false, $strict=false) {
		$id = (int) $cat;
		$user = (int) $user;
		$ids = (int) $idSnippet;
		$conn = new wgConnector();
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		$conn->where(parent::COL_USERS_ID, $user);
		$conn->where(parent::COL_ID, $ids);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new CsnippetsSnippetsModel();
	}
	
	public static function getUserPagerData($user, $page, $limit=20, $cat=0, $approvedOnly=false, $strict=false) {
		$id = (int) $cat;
		$user = (int) $user;
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		$conn->where(parent::COL_USERS_ID, $user);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getSelfData($cat=0, $approvedOnly=false, $strict=false) {
		$id = (int) $cat;
		$conn = new wgConnector();
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20, $cat=0, $approvedOnly=false, $strict=false) {
		$id = (int) $cat;
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		if ((bool) $id || (bool) $strict) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idCsnippetsSnippets, $approvedOnly=false) {
		$id = (int) $idCsnippetsSnippets;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
			$conn->where('deleted', 0);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CsnippetsSnippetsModel();
	}
	
	public static function getLatestSelfData($idCategory, $approvedOnly=false) {
		$id = (int) $idCategory;
				$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->where('deleted', 0);
		$conn->order(parent::COL_ADDED, 'DESC');
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CsnippetsSnippetsModel();
	}
	
	public static function getRandomSelfData($idCategory, $approvedOnly=false) {
		$id = (int) $idCategory;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_CSNIPPETS_CATEGORIES_ID, $id);
		if ((bool) $approvedOnly) $conn->where(parent::COL_APPROVED, 1);
		$conn->rand();
		$conn->where('deleted', 0);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CsnippetsSnippetsModel();
	}
	
	public function getIdentifier() {
		return wgText::safeText($this->getName());
	}
	
	public function getDate() {
		return wgSystem::formatDate($this->getAdded());
	}
	
	public function getCode() {
		return htmlspecialchars($this->getSnippet());
	}
	
	public function getEnabled() {
		return ((bool) $this->getApproved()) ? 'enabled' : 'disabled';
	}
	
	public function getAuthor() {
		if ((bool) $this->getUsersId()) return UsersModel::getFullNameCached($this->getUsersId());
		else if ((bool) $this->getSystemUsersId()) return SystemUsersModel::getFullNameCached($this->getSystemUsersId());
		else return NULL;
	}
	
	
}
?>