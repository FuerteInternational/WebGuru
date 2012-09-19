<?php
/**
 * Install class for module Forms
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        17. April 2009
 */

class installForms {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table forms_fields
		$this->tables['forms_fields'] = "
CREATE TABLE `forms_fields` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `forms_items_id` int(8) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` varchar(115) NOT NULL default 'text',
  `system_validation_id` int(4) unsigned default '0',
  `errmessage` varchar(255) NOT NULL,
  `errorgroup` int(4) unsigned NOT NULL,
  `sort` int(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `keys` (`forms_items_id`,`system_validation_id`,`sort`),
  KEY `FK_forms_fields_validation` (`system_validation_id`),
  CONSTRAINT `FK_forms_fields_form` FOREIGN KEY (`forms_items_id`) REFERENCES `forms_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table forms_items
		$this->tables['forms_items'] = "
CREATE TABLE `forms_items` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `system_language_id` int(3) default NULL,
  `system_websites_id` int(4) default NULL,
  `mailfield` varchar(80) NOT NULL,
  `forms_messages_group_id` int(8) unsigned default NULL,
  `adminmail` varchar(255) NOT NULL,
  `template` text NOT NULL,
  `usehtml` tinyint(1) unsigned NOT NULL default '0',
  `mailhtml` text NOT NULL,
  `usetxt` tinyint(1) unsigned NOT NULL default '0',
  `mailtxt` text NOT NULL,
  `okmessage` varchar(255) NOT NULL,
  `errormessage` varchar(255) NOT NULL,
  `warningmessage` varchar(255) NOT NULL,
  `redirect` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`system_language_id`,`system_websites_id`,`forms_messages_group_id`),
  KEY `FK_forms_items_website` (`system_websites_id`),
  KEY `FK_forms_items_messgroup` (`forms_messages_group_id`),
  CONSTRAINT `FK_forms_items_language` FOREIGN KEY (`system_language_id`) REFERENCES `system_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_forms_items_messgroup` FOREIGN KEY (`forms_messages_group_id`) REFERENCES `forms_messages_groups` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_forms_items_website` FOREIGN KEY (`system_websites_id`) REFERENCES `system_websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table forms_messages
		$this->tables['forms_messages'] = "
CREATE TABLE `forms_messages` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `forms_items_id` int(8) unsigned default '0',
  `forms_messages_groups_id` int(8) unsigned NOT NULL,
  `data` text NOT NULL,
  `added` datetime NOT NULL,
  `readflag` int(8) NOT NULL default '0',
  `readwhen` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`forms_items_id`,`forms_messages_groups_id`),
  KEY `added` (`added`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table forms_messages_groups
		$this->tables['forms_messages_groups'] = "
CREATE TABLE `forms_messages_groups` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table forms_messages_history
		$this->tables['forms_messages_history'] = "
CREATE TABLE `forms_messages_history` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `forms_messages_id` int(11) unsigned NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `action` int(3) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`forms_messages_id`,`system_users_id`,`added`),
  KEY `FK_forms_messages_history_users` (`system_users_id`),
  CONSTRAINT `FK_forms_messages_history_message` FOREIGN KEY (`forms_messages_id`) REFERENCES `forms_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_forms_messages_history_users` FOREIGN KEY (`system_users_id`) REFERENCES `system_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table forms_recipients
		$this->tables['forms_recipients'] = "
CREATE TABLE `forms_recipients` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `mail` varchar(255) NOT NULL,
  `forms_items_id` int(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_forms_recipients_form` (`forms_items_id`),
  CONSTRAINT `FK_forms_recipients_form` FOREIGN KEY (`forms_items_id`) REFERENCES `forms_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		// Table forms_sendmails
		$this->tables['forms_sendmails'] = "
CREATE TABLE `forms_sendmails` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `forms_items_id` int(8) unsigned NOT NULL,
  `emails_templates_id` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL default '0',
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`forms_items_id`,`emails_templates_id`,`type`),
  KEY `FK_forms_sendmails_template` (`emails_templates_id`),
  CONSTRAINT `FK_forms_sendmails_form` FOREIGN KEY (`forms_items_id`) REFERENCES `forms_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_forms_sendmails_template` FOREIGN KEY (`emails_templates_id`) REFERENCES `emails_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		// Table forms_subscriptions
		$this->tables['forms_subscriptions'] = "
CREATE TABLE `forms_subscriptions` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `emails_groups_id` int(8) unsigned NOT NULL,
  `forms_items_id` int(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `keys` (`emails_groups_id`,`forms_items_id`),
  KEY `FK_forms_subscriptions_form` (`forms_items_id`),
  CONSTRAINT `FK_forms_subscriptions_form` FOREIGN KEY (`forms_items_id`) REFERENCES `forms_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_forms_subscriptions_groups` FOREIGN KEY (`emails_groups_id`) REFERENCES `emails_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
		";
			
		
		
		
		
	}
}
?>