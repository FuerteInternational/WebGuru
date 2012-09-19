<?php
/**
 * Install class for module Mobile Apps
 * 
 * @package      WebGuru3
 * @subpackage   modules/mobileapps/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. September 2012
 */

class installMobileapps {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		$this->tables[] = 'CREATE TABLE `mobileapps` (`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `identifier` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `companies_id` BIGINT(20) UNSIGNED NOT NULL, `apptype` SMALLINT(1) UNSIGNED NOT NULL DEFAULT \'0\', `icon` SMALLINT(1) UNSIGNED NOT NULL DEFAULT \'0\', `sort` INT(11) NOT NULL DEFAULT \'0\', `added` DATETIME NOT NULL, `changed` DATETIME NOT NULL, `version` VARCHAR(20) NOT NULL, INDEX (`identifier`, `companies_id`, `apptype`, `icon`, `sort`, `added`, `changed`)) ENGINE = MyISAM;';
		
		$this->tables[] = 'CREATE TABLE `mobileapps_users` (`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, `users_id` INT(11) UNSIGNED NOT NULL, `companies_id` BIGINT(20) UNSIGNED NOT NULL, INDEX (`users_id`, `companies_id`)) ENGINE = MyISAM;';
		
		//$this->queries[] = '';
		
	}
}
		
?>