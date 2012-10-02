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
		
		$this->tables[] = "CREATE TABLE `mobileapps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `identifier` varchar(150) NOT NULL,
  `devtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `apptype` smallint(1) unsigned NOT NULL DEFAULT '0',
  `icon` smallint(1) unsigned NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `version` varchar(20) NOT NULL,
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`,`devtype`,`apptype`,`icon`,`sort`,`added`,`changed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
		
		$this->tables[] = 'CREATE TABLE `mobileapps_users` (
  `users_id` int(11) unsigned NOT NULL,
  `companies_id` bigint(20) unsigned NOT NULL,
  KEY `users_id` (`users_id`,`companies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
		
		$this->tables[] = 'CREATE TABLE  `mobileapps_companies` (
`companies_id` BIGINT( 20 ) UNSIGNED NOT NULL ,
`mobileapps_id` BIGINT( 20 ) UNSIGNED NOT NULL ,
INDEX (`companies_id`, `mobileapps_id`)
) ENGINE = MYISAM;';
		
	}
}
		
?>