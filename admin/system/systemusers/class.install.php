<?php
/**
 * Install class for module Systemusers
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        15. December 2008
 */

class installSystemusers {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table system_teams
		$this->tables['system_teams'] = "
		CREATE TABLE `system_teams` (
		  `id` int(8) unsigned NOT NULL auto_increment,
		  `name` varchar(255) NOT NULL,
		  `note` text NOT NULL,
		  `ipfilter` text NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table system_users
		$this->tables['system_users'] = "
		CREATE TABLE `system_users` (
		  `id` int(8) unsigned NOT NULL auto_increment,
		  `nickname` varchar(60) NOT NULL,
		  `mail` varchar(150) NOT NULL,
		  `pass` varchar(40) NOT NULL,
		  `firstname` varchar(255) NOT NULL,
		  `lastname` varchar(255) NOT NULL,
		  `lastlogin` datetime NOT NULL,
		  `system_team_id` int(8) unsigned NOT NULL,
		  `timever` varchar(15) NOT NULL,
		  `codever` varchar(5) NOT NULL,
		  `active` tinyint(1) unsigned NOT NULL default '1',
		  PRIMARY KEY  (`id`),
		  KEY `system_team_id` (`system_team_id`),
		  KEY `lastlogin` (`lastlogin`),
		  CONSTRAINT `team` FOREIGN KEY (`system_team_id`) REFERENCES `system_teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		
		
		$this->queries[] = "INSERT INTO `system_teams` (`id`, `name`, `note`, `ipfilter`) VALUES ('1', 'Administrators', 'huhuh', '80.169.154.11;127.0.0.1') ;";
		$this->queries[] = "INSERT INTO `system_users` (`id`, `nickname`, `mail`, `pass`, `firstname`, `lastname`, `lastlogin`, `system_team_id`, `timever`, `codever`, `active`) VALUES ('1', 'admin', 'admin@example.com', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'Ondrej', 'Rafaj', '0000-00-00 00:00:00', '1', '', '', '1') ;";
		
		
	}
}
		
?>