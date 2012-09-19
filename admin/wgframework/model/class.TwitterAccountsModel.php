<?php
/**
 * Database class for table twitter_accounts
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/twitter_accounts
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. June 2009 17:10:10
 */

class TwitterAccountsModel extends BaseTwitterAccountsModel {
	
	public static function getAccountsByName() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
}
?>