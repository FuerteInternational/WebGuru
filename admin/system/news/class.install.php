<?php
/**
 * Install class for module News
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        17. April 2009
 */

class installNews {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table news_categories
		$this->tables['news_categories'] = "
CREATE TABLE `news_categories` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `parent` varchar(8) NOT NULL default '0',
  `name` varchar(255) NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `system_websites_id` int(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_news_categories_user` (`system_users_id`),
  KEY `FK_news_categories_web` (`system_websites_id`),
  CONSTRAINT `FK_news_categories_user` FOREIGN KEY (`system_users_id`) REFERENCES `system_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_news_categories_web` FOREIGN KEY (`system_websites_id`) REFERENCES `system_websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table news_items
		$this->tables['news_items'] = "
CREATE TABLE `news_items` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `news_categories_id` int(8) unsigned default '0',
  `name` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `head` text NOT NULL,
  `text` text NOT NULL,
  `displayfrom` datetime NOT NULL,
  `displayto` datetime NOT NULL,
  `datefor` datetime NOT NULL,
  `system_users_id` int(8) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_news_items_user` (`system_users_id`),
  KEY `FK_news_items_cat` (`news_categories_id`),
  CONSTRAINT `FK_news_items_user` FOREIGN KEY (`system_users_id`) REFERENCES `system_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table news_rss
		$this->tables['news_rss'] = "
CREATE TABLE `news_rss` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `version` tinyint(1) unsigned NOT NULL,
  `news_categories_id` int(8) unsigned NOT NULL default '0',
  `showitems` int(4) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `displaylanguage` varchar(30) NOT NULL,
  `copyright` text NOT NULL,
  `ttl` int(4) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `imagetitle` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_news_rss_cat` (`news_categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table news_templates
		$this->tables['news_templates'] = "
CREATE TABLE `news_templates` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL default '0',
  `pager` tinyint(1) unsigned NOT NULL default '1',
  `perpage` int(4) unsigned NOT NULL,
  `addid` int(11) NOT NULL default '0',
  `datasource` int(3) unsigned NOT NULL default '0',
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