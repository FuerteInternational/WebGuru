<?php
/**
 * Database class for table comments_messages
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/comments_messages
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        27. February 2009 12:39:28
 */

class CommentsMessagesModel extends BaseCommentsMessagesModel {
	
	public static function getPager($group, $for, $perpage=20, $page=0, $dataset=0) {
		$group = (int) $group;
		$for = (int) $for;
		$perpage = (int) $perpage;
		$page = (int) $page;
		if ($dataset == 0) $dataset = 'ASC';
		else $dataset = 'DESC';
		$conn = new wgConnector();
		$conn->where(parent::COL_COMMENTS_GROUPS_ID, $group);
		$conn->where(parent::COL_FOR_ID, $for);
		$conn->order(parent::COL_ADDED_GMT, $dataset);
		$arr = parent::doPager($conn, $page, $perpage);
		//print_r($conn->getLastQuery());
		return $arr;
	}
	
	public static function getData($group, $for, $dataset=0) {
		$group = (int) $group;
		$for = (int) $for;
		if ($dataset == 0) $dataset = 'ASC';
		else $dataset = 'DESC';
		$conn = new wgConnector();
		$conn->where(parent::COL_COMMENTS_GROUPS_ID, $group);
		$conn->where(parent::COL_FOR_ID, $for);
		$conn->order(parent::COL_ADDED_GMT, $dataset);
		return parent::doSelect($conn);
	}
	
	public function getName() {
		$u = new UsersModel();
		return $u->getFullName($this->getUsersId());
	}
	
	public function getMail() {
		$u = new UsersModel();
		return $u->getFullName($this->getUsersId());
	}
	
	public function getWebsite() {
		$u = new UsersModel();
		return $u->getFullName($this->getUsersId());
	}
	
	public function getFor() {
		$u = new UsersModel();
		return $u->getFullName();
	}
	
	public function getParent() {
		$u = new UsersModel();
		return $u->getFullName();
	}
	
	public function getIp() {
		return wgIpTools::getPrivateIp($this->getAuthorIp(), 2, '**');
	}
	
	public function getGravatar() {
		if (!(bool) $this->getAuthorEmail()) $mail = 'gravatar@webguru3.com';
		else $mail = $this->getAuthorEmail();
		//error::add('http://www.gravatar.com/avatar/'.md5(strtolower($mail)));
		return 'http://www.gravatar.com/avatar/'.md5(strtolower($mail));
	}
	
	public function getUserName() {
		return moduleUsers::getVar('nickname');
	}
	
	public function getUserMail() {
		return moduleUsers::getVar('mail');
	}
	
	
}
?>