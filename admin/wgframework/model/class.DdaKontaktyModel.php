<?php
/**
 * Database class for table dda_kontakty
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/dda_kontakty
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. May 2009 17:14:09
 */

class DdaKontaktyModel extends BaseDdaKontaktyModel {
	
	public static function getKontaktyPagerByPrijmeni($page, $firma=0, $search=NULL, $limit=20) {
		$firma = (int) $firma;
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		if ((bool) $search) $conn->where(parent::COL_PRIJMENI, $search);
		if ((bool) $firma) $conn->where(parent::COL_DDA_FIRMY_ID, $firma);
		$conn->order(parent::COL_PRIJMENI, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
}
?>