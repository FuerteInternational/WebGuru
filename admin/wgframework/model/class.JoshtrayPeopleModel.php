<?php
/**
 * Database class for table joshtray_people
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/joshtray_people
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class JoshtrayPeopleModel extends BaseJoshtrayPeopleModel {
	
	public static function getLatestPerson() {
		$conn = new wgConnector();
		$conn->order(parent::COL_ADDED, 'DESC');
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else {
			$c = new JoshtrayPeopleModel();
			return $c;
		}
	}
	
	public static function getRandomPerson() {
		$conn = new wgConnector();
		$conn->rand();
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else {
			$c = new JoshtrayPeopleModel();
			return $c;
		}
	}
	
	public static function searchPeople($search) {
		$pieces = explode(' ', $search);
		$conn = new wgConnector();
		$where = NULL;
		foreach ($pieces as $qs) {
			if (empty($where)) $or = '';
			else $or = 'OR ';
			$where .= $or.parent::FULL_FIRSTNAME.' LIKE \'%'.$qs.'%\' OR '.parent::FULL_LASTNAME.' LIKE \'%'.$qs.'%\'';
		}
		$where = '('.$where.')';
		$conn->myWhere($where);
		$conn->order(parent::COL_LASTNAME);
		return parent::doSelect($conn);
	}
	
	public function getFullXSmallImage() {
		return $this->getXSmallImage($this->getFirstname().' '.$this->getLastname());
	}
	
	public function getFullSmallImage() {
		return $this->getSmallImage($this->getFirstname().' '.$this->getLastname());
	}
	
	public function getFullMediumImage() {
		return $this->getMediumImage($this->getFirstname().' '.$this->getLastname());
	}
	
	public function getFullLargeImage() {
		return $this->getLargeImage($this->getFirstname().' '.$this->getLastname());
	}
	
	public function getXSmallImage($full=false) {
		global $mod;
		$mod->runModule('phonebook');
		return modulePhonebook::getImage($this->getId(), 'xsml', $full);
	}
	
	public function getSmallImage($full=false) {
		global $mod;
		$mod->runModule('phonebook');
		return modulePhonebook::getImage($this->getId(), 'sml', $full);
	}
	
	public function getMediumImage($full=false) {
		global $mod;
		$mod->runModule('phonebook');
		return modulePhonebook::getImage($this->getId(), 'med', $full);
	}
	
	public function getLargeImage($full=false) {
		global $mod;
		$mod->runModule('phonebook');
		return modulePhonebook::getImage($this->getId(), 'lrg', $full);
	}
	
	public static function getPeople($limit) {
		$conn = new wgConnector();
		$conn->order(parent::COL_LASTNAME);
		return parent::doSelect($conn);
	}
	
	public static function getPeoplePager($limit, $page=0) {
		$conn = new wgConnector();
		$conn->order(parent::COL_LASTNAME);
		return parent::doPager($conn, $page, $limit);
	}
	
}
?>