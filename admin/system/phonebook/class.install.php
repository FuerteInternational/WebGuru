<?php
/**
 * Install class for module Phonebook
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        17. April 2009
 */

class installPhonebook {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table joshtray_friends
		$this->tables['joshtray_friends'] = "
CREATE TABLE `joshtray_friends` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `joshtray_people_id` int(11) unsigned NOT NULL,
  `friend_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`joshtray_people_id`,`friend_id`),
  KEY `FK_joshtray_friends_friends` (`friend_id`),
  CONSTRAINT `FK_joshtray_friends_friends` FOREIGN KEY (`friend_id`) REFERENCES `joshtray_people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_joshtray_friends_people` FOREIGN KEY (`joshtray_people_id`) REFERENCES `joshtray_people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table joshtray_groups
		$this->tables['joshtray_groups'] = "
CREATE TABLE `joshtray_groups` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table joshtray_images
		$this->tables['joshtray_images'] = "
CREATE TABLE `joshtray_images` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `joshtray_people_id` int(11) unsigned NOT NULL,
  `filename` varchar(100) NOT NULL,
  `default` tinyint(1) unsigned NOT NULL default '0',
  `show` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `keys` (`joshtray_people_id`),
  CONSTRAINT `FK_joshtray_images_people` FOREIGN KEY (`joshtray_people_id`) REFERENCES `joshtray_people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table joshtray_messages
		$this->tables['joshtray_messages'] = "
CREATE TABLE `joshtray_messages` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `joshtray_people_id` int(11) unsigned NOT NULL,
  `from_id` int(10) unsigned default NULL,
  `message` text NOT NULL,
  `added` datetime NOT NULL,
  `received` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`joshtray_people_id`,`from_id`,`added`,`received`),
  KEY `FK_joshtray_messages_from` (`from_id`),
  CONSTRAINT `FK_joshtray_messages_from` FOREIGN KEY (`from_id`) REFERENCES `joshtray_people` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_joshtray_messages_people` FOREIGN KEY (`joshtray_people_id`) REFERENCES `joshtray_people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table joshtray_news
		$this->tables['joshtray_news'] = "
CREATE TABLE `joshtray_news` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `joshtray_people_id` int(10) unsigned default NULL,
  `joshtray_groups_id` int(10) unsigned default NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `show` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `keys` USING BTREE (`joshtray_people_id`,`joshtray_groups_id`,`added`,`show`),
  KEY `FK_joshtray_news_group` (`joshtray_groups_id`),
  CONSTRAINT `FK_joshtray_news_group` FOREIGN KEY (`joshtray_groups_id`) REFERENCES `joshtray_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_joshtray_news_people` FOREIGN KEY (`joshtray_people_id`) REFERENCES `joshtray_people` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table joshtray_people
		$this->tables['joshtray_people'] = "
CREATE TABLE `joshtray_people` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `joshtray_groups_id` int(8) unsigned NOT NULL default '0',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `line` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `note` varchar(45) NOT NULL,
  `online` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `mail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`mail`,`password`),
  KEY `joshtray_groups_id` (`joshtray_groups_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table joshtray_templates
		$this->tables['joshtray_templates'] = "
CREATE TABLE `joshtray_templates` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL default '0',
  `pager` int(11) unsigned NOT NULL default '1',
  `perpage` int(11) unsigned NOT NULL default '20',
  `search` tinyint(1) unsigned NOT NULL default '0',
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		
		
		
		
	}
}
?>