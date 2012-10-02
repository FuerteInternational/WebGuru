<?php
/**
 * Install class for module Users
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

class installUsers {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		$this->tables[] = "CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `users_groups_id` int(8) unsigned NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ansver` varchar(150) NOT NULL,
  `added` datetime NOT NULL,
  `online` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `timever` varchar(15) NOT NULL,
  `codever` varchar(5) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '1',
  `lastlogin` datetime NOT NULL,
  `gender` set('m','f') NOT NULL,
  `lastip` varchar(17) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `system_countries_id` int(5) unsigned NOT NULL,
  `visits` int(11) NOT NULL default '0',
  `downloads` int(11) NOT NULL default '0',
  `xdata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`users_groups_id`,`nickname`,`mail`,`password`,`online`,`active`,`lastlogin`,`gender`,`system_countries_id`),
  KEY `FK_users_country` (`system_countries_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
		
		$this->tables[] = "CREATE TABLE `users_groups` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `system_websites_id` int(4) default NULL,
  `system_language_id` int(3) default NULL,
  `emails_templates_id` int(10) unsigned default NULL COMMENT 'for in mail link approval',
  PRIMARY KEY  (`id`),
  KEY `keys` (`system_websites_id`,`system_language_id`,`emails_templates_id`),
  KEY `FK_users_groups_language` (`system_language_id`),
  KEY `FK_users_groups_verification` (`emails_templates_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
		
		$this->tables[] = '
		
		';
		
		$this->queries[] = "INSERT INTO `users_groups` (`id`, `name`, `system_websites_id`, `system_language_id`, `emails_templates_id`) VALUES
(1, 'Admin', 1, 1, 1);";
		
		$this->queries[] = '';
		
		$this->queries[] = '';
		
	}
}
		
?>