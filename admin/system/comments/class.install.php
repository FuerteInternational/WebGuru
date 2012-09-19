<?php
/**
 * Install class for module Comments
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        17. April 2009
 */

class installComments {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table comments_groups
		$this->tables['comments_groups'] = "
CREATE TABLE `comments_groups` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `system_websites_id` int(4) default NULL,
  `system_language_id` int(3) default NULL,
  `name` varchar(150) NOT NULL,
  `registered` tinyint(1) unsigned NOT NULL default '1',
  `parameter` varchar(45) NOT NULL default 'id',
  PRIMARY KEY  (`id`),
  KEY `keys` (`system_websites_id`,`system_language_id`),
  KEY `FK_comments_groups_language` (`system_language_id`),
  CONSTRAINT `FK_comments_groups_language` FOREIGN KEY (`system_language_id`) REFERENCES `system_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comments_groups_website` FOREIGN KEY (`system_websites_id`) REFERENCES `system_websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table comments_messages
		$this->tables['comments_messages'] = "
CREATE TABLE `comments_messages` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `comments_groups_id` int(8) NOT NULL default '0',
  `for_id` int(11) NOT NULL default '0',
  `author` tinytext NOT NULL,
  `author_email` varchar(100) NOT NULL default '',
  `author_url` varchar(255) NOT NULL default '',
  `author_ip` varchar(20) NOT NULL default '',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  `added_gmt` datetime NOT NULL default '0000-00-00 00:00:00',
  `content` text NOT NULL,
  `karma` int(11) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `agent` varchar(255) NOT NULL default '',
  `parent` bigint(20) NOT NULL default '0',
  `users_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `approved` (`approved`),
  KEY `for_id` (`for_id`),
  KEY `approved_date_gmt` (`approved`,`added_gmt`),
  KEY `date_gmt` (`added_gmt`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table comments_templates
		$this->tables['comments_templates'] = "
CREATE TABLE `comments_templates` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL default '0',
  `pager` tinyint(1) unsigned NOT NULL default '1',
  `comments_groups_id` int(4) unsigned NOT NULL,
  `perpage` int(4) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `datasource` int(3) unsigned NOT NULL default '0',
  `noidsyserror` varchar(255) NOT NULL,
  `emptyauthor` varchar(255) NOT NULL,
  `emptyemail` varchar(255) NOT NULL,
  `emptycomment` varchar(255) NOT NULL,
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  `notemp` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		
		
		
		
	}
}
?>