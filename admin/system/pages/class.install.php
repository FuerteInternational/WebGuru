<?php
/**
 * Install class for module Pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        17. April 2009
 */

class installPages {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table pages
		$this->tables['pages'] = "
CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `system_websites_id` int(4) NOT NULL default '1',
  `system_language_id` int(3) NOT NULL default '1',
  `pages_templates_id` int(11) unsigned default NULL,
  `revision` int(11) NOT NULL default '1',
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `rewrite` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `addtext1` varchar(255) NOT NULL,
  `addtext2` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL default '0',
  `parentid` int(10) unsigned NOT NULL default '1',
  `home` tinyint(1) unsigned NOT NULL default '0',
  `sort` int(8) unsigned NOT NULL default '0',
  `head` text NOT NULL,
  `page` longtext NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `kangkey` USING BTREE (`system_language_id`),
  KEY `keys` USING BTREE (`system_websites_id`,`pages_templates_id`,`identifier`,`enabled`,`sort`),
  KEY `FK_pages_templates` (`pages_templates_id`),
  KEY `home` (`home`),
  CONSTRAINT `fklanguage` FOREIGN KEY (`system_language_id`) REFERENCES `system_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkwebsites` FOREIGN KEY (`system_websites_id`) REFERENCES `system_websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pages_templates` FOREIGN KEY (`pages_templates_id`) REFERENCES `pages_templates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table pages_alternatelang
		$this->tables['pages_alternatelang'] = "
CREATE TABLE `pages_alternatelang` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `pages_id` int(11) unsigned NOT NULL,
  `system_language_id` int(3) NOT NULL,
  `alternative_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `kpages` USING BTREE (`pages_id`),
  KEY `fklanguages` (`system_language_id`),
  KEY `fkalternative` (`alternative_id`),
  CONSTRAINT `fkalternative` FOREIGN KEY (`alternative_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fklanguages` FOREIGN KEY (`system_language_id`) REFERENCES `system_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkpagesid` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table pages_history
		$this->tables['pages_history'] = "
CREATE TABLE `pages_history` (
  `id` int(10) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `rewrite` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `head` text NOT NULL,
  `page` longtext NOT NULL,
  `pages_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fkuser` (`system_users_id`),
  KEY `fkpage` (`pages_id`),
  CONSTRAINT `fkpage` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkuser` FOREIGN KEY (`system_users_id`) REFERENCES `system_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table pages_languages
		$this->tables['pages_languages'] = "
CREATE TABLE `pages_languages` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `system_languages_id` int(3) NOT NULL,
  `code` varchar(120) NOT NULL,
  `definition` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `klanguage` (`system_languages_id`),
  CONSTRAINT `fkpllanguage` FOREIGN KEY (`system_languages_id`) REFERENCES `system_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table pages_permissions
		$this->tables['pages_permissions'] = "
CREATE TABLE `pages_permissions` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `system_teams_id` int(8) unsigned NOT NULL,
  `pages_id` int(10) unsigned NOT NULL,
  `permissions` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `system_teams_id` USING BTREE (`system_teams_id`),
  KEY `pages_id` (`pages_id`),
  KEY `permissions` (`permissions`),
  CONSTRAINT `fkpages` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkteams` FOREIGN KEY (`system_teams_id`) REFERENCES `system_teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table pages_revisions
		$this->tables['pages_revisions'] = "
CREATE TABLE `pages_revisions` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `pages_id` int(11) unsigned NOT NULL,
  `system_websites_id` int(4) NOT NULL default '1',
  `revision` int(11) NOT NULL default '1',
  `system_language_id` int(3) NOT NULL default '1',
  `pages_templates_id` int(11) unsigned default NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `rewrite` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `addtext1` varchar(255) NOT NULL,
  `addtext2` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL default '0',
  `parentid` int(10) unsigned NOT NULL default '1',
  `sort` int(8) unsigned NOT NULL default '0',
  `head` text NOT NULL,
  `page` longtext NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` USING BTREE (`system_websites_id`,`pages_templates_id`,`identifier`,`enabled`,`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table pages_templates
		$this->tables['pages_templates'] = "
CREATE TABLE `pages_templates` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `revision` int(11) NOT NULL default '1',
  `name` varchar(255) default NULL,
  `identifier` varchar(255) default NULL,
  `master` tinyint(1) unsigned NOT NULL default '0',
  `registered` tinyint(1) NOT NULL default '0',
  `system_language_id` int(3) default '1',
  `pages_templates_groups_id` int(4) unsigned default '1',
  `template` longtext,
  `note` text,
  PRIMARY KEY  (`id`),
  KEY `language` (`system_language_id`),
  KEY `website` USING BTREE (`pages_templates_groups_id`),
  CONSTRAINT `group` FOREIGN KEY (`pages_templates_groups_id`) REFERENCES `pages_templates_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `language` FOREIGN KEY (`system_language_id`) REFERENCES `system_language` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table pages_templates_groups
		$this->tables['pages_templates_groups'] = "
CREATE TABLE `pages_templates_groups` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `identifier` varchar(150) NOT NULL,
  `folder` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table pages_templates_revisions
		$this->tables['pages_templates_revisions'] = "
CREATE TABLE `pages_templates_revisions` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `pages_templates_id` int(11) unsigned NOT NULL,
  `revision` int(11) NOT NULL default '1',
  `added` datetime NOT NULL,
  `name` varchar(255) default NULL,
  `identifier` varchar(255) default NULL,
  `master` tinyint(1) unsigned NOT NULL default '0',
  `registered` tinyint(1) NOT NULL default '0',
  `system_language_id` int(3) default '1',
  `pages_templates_groups_id` int(4) unsigned default '1',
  `template` longtext,
  `note` text,
  PRIMARY KEY  (`id`),
  KEY `language` (`system_language_id`),
  KEY `website` USING BTREE (`pages_templates_groups_id`),
  KEY `added` (`added`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		
		
		
		
	}
}
?>