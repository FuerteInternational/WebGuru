<?php
class systemDBinstall {
	
	public $tables = array();
	public $queries = array();
	
	function __construct() {
		global $conf;
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_settings` (
		`id` int(16) unsigned NOT NULL auto_increment,
		`group` varchar(40) NOT NULL,
		`prop` varchar(40) NOT NULL,
		`value` varchar(255) NOT NULL,
		PRIMARY KEY  (`id`),
		KEY `group` (`group`,`prop`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_addons` (
		`id` int(4) unsigned NOT NULL auto_increment,
		`name` varchar(50) NOT NULL,
		PRIMARY KEY  (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_query_analyzer` (
		`id` int(32) unsigned NOT NULL auto_increment,
		`query` text NOT NULL,
		`count` int(16) NOT NULL,
		PRIMARY KEY  (`id`),
		KEY `count` (`count`),
		FULLTEXT KEY `query` (`query`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_templates` (
		`id` int(16) unsigned NOT NULL auto_increment,
		`identifier` varchar(40) NOT NULL,
		`group` varchar(40) NOT NULL,
		`sort` int(8) NOT NULL,
		`temp` text NOT NULL,
		`web` int(4) default 1,
		PRIMARY KEY  (`id`),
		KEY `keys` (`identifier`,`group`,`sort`),
		FULLTEXT KEY `fulltext` (`temp`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_actualizations` (
		`id` int(16) unsigned NOT NULL auto_increment,
		`string` text NOT NULL,
		`added` datetime NOT NULL,
		PRIMARY KEY  (`id`),
		FULLTEXT KEY `fulltext` (`string`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_countries` (
		`id` int(5) NOT NULL auto_increment,
		`name` varchar(64) NOT NULL,
		`iso1` char(2) NOT NULL,
		`iso2` char(3) NOT NULL,
		PRIMARY KEY  (`id`),
		KEY `COUNTRIES_NAME` (`name`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";

		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_websites` (
		`id` int(4) NOT NULL auto_increment,
		`name` varchar(32) NOT NULL,
		`code` char(3) NOT NULL,
		`image` varchar(15) default NULL,
		`directory` varchar(15) default NULL,
		`sort` int(3) default NULL,
		`default` tinyint(1) NOT NULL default 0,
		PRIMARY KEY  (`id`),
		KEY `LANGUAGES_NAME` (`name`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";

		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_websites` (`id`, `name`, `code`, `image`, `directory`, `sort`, `default`) VALUES (1, 'WebGuru Website', 'wg', 'wg', 'wgweb', 1, 1);";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_language` (
		`id` int(3) NOT NULL auto_increment,
		`name` varchar(32) NOT NULL,
		`code` char(3) NOT NULL,
		`image` varchar(15) default NULL,
		`directory` varchar(15) default NULL,
		`sort` int(3) default NULL,
		`default` tinyint(1) NOT NULL default 0,
		`web` int(4) default 1,
		PRIMARY KEY  (`id`),
		KEY `LANGUAGES_NAME` (`name`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";

		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_language` (`id`, `name`, `code`, `image`, `directory`, `sort`, `default`, `web`) VALUES (1, 'English', 'en', 'gb', 'english', 1, 1, 1);";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_language` (`id`, `name`, `code`, `image`, `directory`, `sort`, `default`, `web`) VALUES (2, 'Czech', 'cz', 'cz', 'czech', 2, 0, 1);";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_language` (`id`, `name`, `code`, `image`, `directory`, `sort`, `default`, `web`) VALUES (3, 'Deutsch', 'de', 'de', 'deutsch', 3, 0, 1);";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_language` (`id`, `name`, `code`, `image`, `directory`, `sort`, `default`, `web`) VALUES (4, 'Française', 'fr', 'fr', 'francaise', 4, 0, 1);";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_modules` (
		`id` int(6) unsigned NOT NULL auto_increment,
		`name` varchar(60) NOT NULL,
		`added` datetime NOT NULL,
		`part` varchar(15) NOT NULL default 'modules',
		PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_modules_permissions` (
		`id` int(8) unsigned NOT NULL auto_increment,
		`sm_id` int(6) NOT NULL,
		`sut_id` int(8) NOT NULL,
		`perm` tinyint(1) NOT NULL default '0',
		PRIMARY KEY  (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";

		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_teams` (
		`id` int(6) unsigned NOT NULL auto_increment,
		`name` varchar(255) NOT NULL,
		`note` text NOT NULL,
		`ipfilter` text NOT NULL,
		PRIMARY KEY  (`id`),
		FULLTEXT KEY `ipfilter` (`ipfilter`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_teams` (`id`, `name`, `note`, `ipfilter`) VALUES(1, 'Administrators', NOW(), '');
		";

		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."system_users` (
		`id` int(8) unsigned NOT NULL auto_increment,
		`nickname` varchar(60) NOT NULL,
		`mail` varchar(150) NOT NULL,
		`pass` varchar(40) NOT NULL,
		`firstname` varchar(255) NOT NULL,
		`lastname` varchar(255) NOT NULL,
		`lastlogin` datetime NOT NULL,
		`system_team_id` int(4) unsigned NOT NULL,
		`timever` varchar(15) NOT NULL,
		`codever` varchar(5) NOT NULL,
		PRIMARY KEY  (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_users` (`id`, `nickname`, `mail`, `pass`, `firstname`, `lastname`, `lastlogin`, `system_team_id`, `timever`, `codever`) VALUES(1, 'admin', 'admin@example.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'System', 'Administrator', NOW(), 1, '', '');";
		
		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."tinymce_image_folders` (
		`id` int(3) NOT NULL auto_increment,
		`caption` varchar(255) NOT NULL,
		`web` int(4) default 1,
		UNIQUE KEY `id` (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";	

		$this->tables[] = "
		CREATE TABLE `".$conf['db']['pref']."tinymce_images` (
		`id` int(5) NOT NULL auto_increment,
		`caption` varchar(255) NOT NULL,
		`filename` varchar(255) NOT NULL,
		`alttext` varchar(255) NOT NULL,
		`folder` int(3) NOT NULL,
		`web` int(4) default 1,
		UNIQUE KEY `id` (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";	

		$this->queries[] = "
		INSERT INTO `".$conf['db']['pref']."tinymce_image_folders` (`id`, `caption`, `web`) VALUES (1, 'System', 1);
		";

		$this->tables[] = "
        CREATE TABLE `".$conf['db']['pref']."system_encoding` (
        `id` int(8) unsigned NOT NULL auto_increment,
        `name` varchar(255) NOT NULL,
        `code` varchar(40) NOT NULL,
        `num` int(8) NOT NULL,
        `show` tinyint(1) NOT NULL default '1',
        PRIMARY KEY  (`id`),
        KEY `code` (`code`,`num`,`show`),
        KEY `name` (`name`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
		";

		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (1, 'Afghanistan', 'AF', 'AFG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (2, 'Albania', 'AL', 'ALB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (3, 'Algeria', 'DZ', 'DZA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (4, 'American Samoa', 'AS', 'ASM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (5, 'Andorra', 'AD', 'AND');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (6, 'Angola', 'AO', 'AGO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (7, 'Anguilla', 'AI', 'AIA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (8, 'Antarctica', 'AQ', 'ATA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (9, 'Antigua and Barbuda', 'AG', 'ATG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (10, 'Argentina', 'AR', 'ARG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (11, 'Armenia', 'AM', 'ARM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (12, 'Aruba', 'AW', 'ABW');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (13, 'Australia', 'AU', 'AUS');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (14, 'Austria', 'AT', 'AUT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (15, 'Azerbaijan', 'AZ', 'AZE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (16, 'Bahamas', 'BS', 'BHS');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (17, 'Bahrain', 'BH', 'BHR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (18, 'Bangladesh', 'BD', 'BGD');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (19, 'Barbados', 'BB', 'BRB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (20, 'Belarus', 'BY', 'BLR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (21, 'Belgium', 'BE', 'BEL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (22, 'Belize', 'BZ', 'BLZ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (23, 'Benin', 'BJ', 'BEN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (24, 'Bermuda', 'BM', 'BMU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (25, 'Bhutan', 'BT', 'BTN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (26, 'Bolivia', 'BO', 'BOL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (27, 'Bosnia and Herzegowina', 'BA', 'BIH');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (28, 'Botswana', 'BW', 'BWA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (29, 'Bouvet Island', 'BV', 'BVT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (30, 'Brazil', 'BR', 'BRA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (31, 'British Indian Ocean Territory', 'IO', 'IOT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (32, 'Brunei Darussalam', 'BN', 'BRN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (33, 'Bulgaria', 'BG', 'BGR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (34, 'Burkina Faso', 'BF', 'BFA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (35, 'Burundi', 'BI', 'BDI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (36, 'Cambodia', 'KH', 'KHM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (37, 'Cameroon', 'CM', 'CMR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (38, 'Canada', 'CA', 'CAN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (39, 'Cape Verde', 'CV', 'CPV');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (40, 'Cayman Islands', 'KY', 'CYM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (41, 'Central African Republic', 'CF', 'CAF');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (42, 'Chad', 'TD', 'TCD');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (43, 'Chile', 'CL', 'CHL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (44, 'China', 'CN', 'CHN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (45, 'Christmas Island', 'CX', 'CXR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (46, 'Cocos (Keeling) Islands', 'CC', 'CCK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (47, 'Colombia', 'CO', 'COL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (48, 'Comoros', 'KM', 'COM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (49, 'Congo', 'CG', 'COG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (50, 'Cook Islands', 'CK', 'COK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (51, 'Costa Rica', 'CR', 'CRI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (52, 'Cote D''Ivoire', 'CI', 'CIV');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (53, 'Croatia', 'HR', 'HRV');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (54, 'Cuba', 'CU', 'CUB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (55, 'Cyprus', 'CY', 'CYP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (56, 'Czech Republic', 'CZ', 'CZE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (57, 'Denmark', 'DK', 'DNK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (58, 'Djibouti', 'DJ', 'DJI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (59, 'Dominica', 'DM', 'DMA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (60, 'Dominican Republic', 'DO', 'DOM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (61, 'East Timor', 'TP', 'TMP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (62, 'Ecuador', 'EC', 'ECU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (63, 'Egypt', 'EG', 'EGY');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (64, 'El Salvador', 'SV', 'SLV');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (65, 'Equatorial Guinea', 'GQ', 'GNQ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (66, 'Eritrea', 'ER', 'ERI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (67, 'Estonia', 'EE', 'EST');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (68, 'Ethiopia', 'ET', 'ETH');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (69, 'Falkland Islands (Malvinas)', 'FK', 'FLK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (70, 'Faroe Islands', 'FO', 'FRO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (71, 'Fiji', 'FJ', 'FJI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (72, 'Finland', 'FI', 'FIN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (73, 'France', 'FR', 'FRA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (74, 'France, Metropolitan', 'FX', 'FXX');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (75, 'French Guiana', 'GF', 'GUF');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (76, 'French Polynesia', 'PF', 'PYF');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (77, 'French Southern Territories', 'TF', 'ATF');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (78, 'Gabon', 'GA', 'GAB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (79, 'Gambia', 'GM', 'GMB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (80, 'Georgia', 'GE', 'GEO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (81, 'Germany', 'DE', 'DEU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (82, 'Ghana', 'GH', 'GHA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (83, 'Gibraltar', 'GI', 'GIB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (84, 'Greece', 'GR', 'GRC');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (85, 'Greenland', 'GL', 'GRL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (86, 'Grenada', 'GD', 'GRD');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (87, 'Guadeloupe', 'GP', 'GLP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (88, 'Guam', 'GU', 'GUM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (89, 'Guatemala', 'GT', 'GTM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (90, 'Guinea', 'GN', 'GIN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (91, 'Guinea-bissau', 'GW', 'GNB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (92, 'Guyana', 'GY', 'GUY');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (93, 'Haiti', 'HT', 'HTI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (94, 'Heard and Mc Donald Islands', 'HM', 'HMD');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (95, 'Honduras', 'HN', 'HND');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (96, 'Hong Kong', 'HK', 'HKG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (97, 'Hungary', 'HU', 'HUN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (98, 'Iceland', 'IS', 'ISL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (99, 'India', 'IN', 'IND');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (100, 'Indonesia', 'ID', 'IDN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (101, 'Iran (Islamic Republic of)', 'IR', 'IRN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (102, 'Iraq', 'IQ', 'IRQ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (103, 'Ireland', 'IE', 'IRL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (104, 'Israel', 'IL', 'ISR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (105, 'Italy', 'IT', 'ITA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (106, 'Jamaica', 'JM', 'JAM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (107, 'Japan', 'JP', 'JPN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (108, 'Jordan', 'JO', 'JOR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (109, 'Kazakhstan', 'KZ', 'KAZ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (110, 'Kenya', 'KE', 'KEN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (111, 'Kiribati', 'KI', 'KIR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (113, 'Korea, Republic of', 'KR', 'KOR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (114, 'Kuwait', 'KW', 'KWT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (115, 'Kyrgyzstan', 'KG', 'KGZ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (116, 'Lao People''s Democratic Republic', 'LA', 'LAO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (117, 'Latvia', 'LV', 'LVA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (118, 'Lebanon', 'LB', 'LBN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (119, 'Lesotho', 'LS', 'LSO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (120, 'Liberia', 'LR', 'LBR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (121, 'Libyan Arab Jamahiriya', 'LY', 'LBY');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (122, 'Liechtenstein', 'LI', 'LIE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (123, 'Lithuania', 'LT', 'LTU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (124, 'Luxembourg', 'LU', 'LUX');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (125, 'Macau', 'MO', 'MAC');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (127, 'Madagascar', 'MG', 'MDG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (128, 'Malawi', 'MW', 'MWI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (129, 'Malaysia', 'MY', 'MYS');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (130, 'Maldives', 'MV', 'MDV');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (131, 'Mali', 'ML', 'MLI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (132, 'Malta', 'MT', 'MLT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (133, 'Marshall Islands', 'MH', 'MHL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (134, 'Martinique', 'MQ', 'MTQ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (135, 'Mauritania', 'MR', 'MRT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (136, 'Mauritius', 'MU', 'MUS');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (137, 'Mayotte', 'YT', 'MYT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (138, 'Mexico', 'MX', 'MEX');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (139, 'Micronesia, Federated States of', 'FM', 'FSM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (140, 'Moldova, Republic of', 'MD', 'MDA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (141, 'Monaco', 'MC', 'MCO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (142, 'Mongolia', 'MN', 'MNG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (143, 'Montserrat', 'MS', 'MSR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (144, 'Morocco', 'MA', 'MAR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (145, 'Mozambique', 'MZ', 'MOZ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (146, 'Myanmar', 'MM', 'MMR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (147, 'Namibia', 'NA', 'NAM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (148, 'Nauru', 'NR', 'NRU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (149, 'Nepal', 'NP', 'NPL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (150, 'Netherlands', 'NL', 'NLD');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (151, 'Netherlands Antilles', 'AN', 'ANT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (152, 'New Caledonia', 'NC', 'NCL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (153, 'New Zealand', 'NZ', 'NZL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (154, 'Nicaragua', 'NI', 'NIC');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (155, 'Niger', 'NE', 'NER');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (156, 'Nigeria', 'NG', 'NGA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (157, 'Niue', 'NU', 'NIU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (158, 'Norfolk Island', 'NF', 'NFK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (159, 'Northern Mariana Islands', 'MP', 'MNP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (160, 'Norway', 'NO', 'NOR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (161, 'Oman', 'OM', 'OMN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (162, 'Pakistan', 'PK', 'PAK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (163, 'Palau', 'PW', 'PLW');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (164, 'Panama', 'PA', 'PAN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (165, 'Papua New Guinea', 'PG', 'PNG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (166, 'Paraguay', 'PY', 'PRY');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (167, 'Peru', 'PE', 'PER');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (168, 'Philippines', 'PH', 'PHL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (169, 'Pitcairn', 'PN', 'PCN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (170, 'Poland', 'PL', 'POL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (171, 'Portugal', 'PT', 'PRT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (172, 'Puerto Rico', 'PR', 'PRI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (173, 'Qatar', 'QA', 'QAT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (174, 'Reunion', 'RE', 'REU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (175, 'Romania', 'RO', 'ROM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (176, 'Russian Federation', 'RU', 'RUS');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (177, 'Rwanda', 'RW', 'RWA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (178, 'Saint Kitts and Nevis', 'KN', 'KNA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (179, 'Saint Lucia', 'LC', 'LCA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (180, 'Saint Vincent and the Grenadines', 'VC', 'VCT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (181, 'Samoa', 'WS', 'WSM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (182, 'San Marino', 'SM', 'SMR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (183, 'Sao Tome and Principe', 'ST', 'STP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (184, 'Saudi Arabia', 'SA', 'SAU');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (185, 'Senegal', 'SN', 'SEN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (186, 'Seychelles', 'SC', 'SYC');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (187, 'Sierra Leone', 'SL', 'SLE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (188, 'Singapore', 'SG', 'SGP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (189, 'Slovakia (Slovak Republic)', 'SK', 'SVK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (190, 'Slovenia', 'SI', 'SVN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (191, 'Solomon Islands', 'SB', 'SLB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (192, 'Somalia', 'SO', 'SOM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (193, 'South Africa', 'ZA', 'ZAF');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (195, 'Spain', 'ES', 'ESP');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (196, 'Sri Lanka', 'LK', 'LKA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (197, 'St. Helena', 'SH', 'SHN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (198, 'St. Pierre and Miquelon', 'PM', 'SPM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (199, 'Sudan', 'SD', 'SDN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (200, 'Suriname', 'SR', 'SUR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (202, 'Swaziland', 'SZ', 'SWZ');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (203, 'Sweden', 'SE', 'SWE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (204, 'Switzerland', 'CH', 'CHE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (205, 'Syrian Arab Republic', 'SY', 'SYR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (206, 'Taiwan', 'TW', 'TWN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (207, 'Tajikistan', 'TJ', 'TJK');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (208, 'Tanzania, United Republic of', 'TZ', 'TZA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (209, 'Thailand', 'TH', 'THA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (210, 'Togo', 'TG', 'TGO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (211, 'Tokelau', 'TK', 'TKL');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (212, 'Tonga', 'TO', 'TON');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (213, 'Trinidad and Tobago', 'TT', 'TTO');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (214, 'Tunisia', 'TN', 'TUN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (215, 'Turkey', 'TR', 'TUR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (216, 'Turkmenistan', 'TM', 'TKM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (217, 'Turks and Caicos Islands', 'TC', 'TCA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (218, 'Tuvalu', 'TV', 'TUV');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (219, 'Uganda', 'UG', 'UGA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (220, 'Ukraine', 'UA', 'UKR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (221, 'United Arab Emirates', 'AE', 'ARE');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (222, 'United Kingdom', 'GB', 'GBR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (223, 'United States', 'US', 'USA');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (224, 'United States Minor Outlying Islands', 'UM', 'UMI');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (225, 'Uruguay', 'UY', 'URY');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (226, 'Uzbekistan', 'UZ', 'UZB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (227, 'Vanuatu', 'VU', 'VUT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (228, 'Vatican City State (Holy See)', 'VA', 'VAT');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (229, 'Venezuela', 'VE', 'VEN');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (230, 'Viet Nam', 'VN', 'VNM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (231, 'Virgin Islands (British)', 'VG', 'VGB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (232, 'Virgin Islands (U.S.)', 'VI', 'VIR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (233, 'Wallis and Futuna Islands', 'WF', 'WLF');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (234, 'Western Sahara', 'EH', 'ESH');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (235, 'Yemen', 'YE', 'YEM');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (236, 'Yugoslavia', 'YU', 'YUG');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (237, 'Zaire', 'ZR', 'ZAR');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (238, 'Zambia', 'ZM', 'ZMB');";
		$this->queries[] = "INSERT INTO `".$conf['db']['pref']."system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES (239, 'Zimbabwe', 'ZW', 'ZWE');";




        $this->queries[] = 'INSERT INTO `system_encoding` (name, code, num) VALUES ("IBM EBCDIC (US-Canada)", "IBM037", "37");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("OEM United States", "IBM437", "437");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (International)", "IBM500", "500");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Arabic (ASMO 708)", "ASMO-708", "708");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Arabic (DOS)", "DOS-720", "720");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Greek (DOS)", "ibm737", "737");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Baltic (DOS)", "ibm775", "775");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Western European (DOS)", "ibm850", "850");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Central European (DOS)", "ibm852", "852");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("OEM Cyrillic", "IBM855", "855");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Turkish (DOS)", "ibm857", "857");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("OEM Multilingual Latin I", "IBM00858", "858");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Portuguese (DOS)", "IBM860", "860");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Icelandic (DOS)", "ibm861", "861");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Hebrew (DOS)", "DOS-862", "862");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("French Canadian (DOS)", "IBM863", "863");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Arabic (864)", "IBM864", "864");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Nordic (DOS)", "IBM865", "865");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Cyrillic (DOS)", "cp866", "866");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Greek, Modern (DOS)", "ibm869", "869");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Multilingual Latin-2)", "IBM870", "870");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Thai (Windows)", "windows-874", "874");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Greek Modern)", "cp875", "875");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (Shift-JIS)", "shift_jis", "932");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (GB2312)", "gb2312", "936");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Korean", "ks_c_5601-1987", "949");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Traditional (Big5)", "big5", "950");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Turkish Latin-5)", "IBM1026", "1026");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM Latin-1", "IBM01047", "1047");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (US-Canada-Euro)", "IBM01140", "1140");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Germany-Euro)", "IBM01141", "1141");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Denmark-Norway-Euro)", "IBM01142", "1142");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Finland-Sweden-Euro)", "IBM01143", "1143");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Italy-Euro)", "IBM01144", "1144");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Spain-Euro)", "IBM01145", "1145");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (UK-Euro)", "IBM01146", "1146");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (France-Euro)", "IBM01147", "1147");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (International-Euro)", "IBM01148", "1148");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Icelandic-Euro)", "IBM01149", "1149");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Unicode", "utf-16", "1200");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Unicode (Big-Endian)", "unicodeFFFE", "1201");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Central European (Windows)", "windows-1250", "1250");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Cyrillic (Windows)", "windows-1251", "1251");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Western European (Windows)", "Windows-1252", "1252");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Greek (Windows)", "windows-1253", "1253");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Turkish (Windows)", "windows-1254", "1254");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Hebrew (Windows)", "windows-1255", "1255");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Arabic (Windows)", "windows-1256", "1256");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Baltic (Windows)", "windows-1257", "1257");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Vietnamese (Windows)", "windows-1258", "1258");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Korean (Johab)", "Johab", "1361");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Western European (Mac)", "macintosh", "10000");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (Mac)", "x-mac-japanese", "10001");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Traditional (Mac)", "x-mac-chinesetrad", "10002");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Korean (Mac)", "x-mac-korean", "10003");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Arabic (Mac)", "x-mac-arabic", "10004");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Hebrew (Mac)", "x-mac-hebrew", "10005");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Greek (Mac)", "x-mac-greek", "10006");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Cyrillic (Mac)", "x-mac-cyrillic", "10007");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (Mac)", "x-mac-chinesesimp", "10008");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Romanian (Mac)", "x-mac-romanian", "10010");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Ukrainian (Mac)", "x-mac-ukrainian", "10017");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Thai (Mac)", "x-mac-thai", "10021");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Central European (Mac)", "x-mac-ce", "10029");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Icelandic (Mac)", "x-mac-icelandic", "10079");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Turkish (Mac)", "x-mac-turkish", "10081");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Croatian (Mac)", "x-mac-croatian", "10082");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Unicode (UTF-32)", "utf-32", "12000");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Unicode (UTF-32 Big-Endian)", "utf-32BE", "12001");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Traditional (CNS)", "x-Chinese-CNS", "20000");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("TCA Taiwan", "x-cp20001", "20001");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Traditional (Eten)", "x-Chinese-Eten", "20002");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM5550 Taiwan", "x-cp20003", "20003");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("TeleText Taiwan", "x-cp20004", "20004");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Wang Taiwan", "x-cp20005", "20005");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Western European (IA5)", "x-IA5", "20105");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("German (IA5)", "x-IA5-German", "20106");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Swedish (IA5)", "x-IA5-Swedish", "20107");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Norwegian (IA5)", "x-IA5-Norwegian", "20108");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("US-ASCII", "us-ascii", "20127");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("T.61", "x-cp20261", "20261");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISO-6937", "x-cp20269", "20269");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Germany)", "IBM273", "20273");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Denmark-Norway)", "IBM277", "20277");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Finland-Sweden)", "IBM278", "20278");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Italy)", "IBM280", "20280");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Spain)", "IBM284", "20284");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (UK)", "IBM285", "20285");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Japanese katakana)", "IBM290", "20290");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (France)", "IBM297", "20297");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Arabic)", "IBM420", "20420");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Greek)", "IBM423", "20423");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Hebrew)", "IBM424", "20424");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Korean Extended)", "x-EBCDIC-KoreanExtended", "20833");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Thai)", "IBM-Thai", "20838");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Cyrillic (KOI8-R)", "koi8-r", "20866");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Icelandic)", "IBM871", "20871");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Cyrillic Russian)", "IBM880", "20880");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Turkish)", "IBM905", "20905");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM Latin-1", "IBM00924", "20924");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (JIS 0208-1990 and 0212-1990)", "EUC-JP", "20932");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (GB2312-80)", "x-cp20936", "20936");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Korean Wansung", "x-cp20949", "20949");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("IBM EBCDIC (Cyrillic Serbian-Bulgarian)", "cp1025", "21025");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Cyrillic (KOI8-U)", "koi8-u", "21866");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Western European (ISO)", "iso-8859-1", "28591");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Central European (ISO)", "iso-8859-2", "28592");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Latin 3 (ISO)", "iso-8859-3", "28593");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Baltic (ISO)", "iso-8859-4", "28594");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Cyrillic (ISO)", "iso-8859-5", "28595");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Arabic (ISO)", "iso-8859-6", "28596");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Greek (ISO)", "iso-8859-7", "28597");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Hebrew (ISO-Visual)", "iso-8859-8", "28598");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Turkish (ISO)", "iso-8859-9", "28599");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Estonian (ISO)", "iso-8859-13", "28603");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Latin 9 (ISO)", "iso-8859-15", "28605");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Europa", "x-Europa", "29001");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Hebrew (ISO-Logical)", "iso-8859-8-i", "38598");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (JIS)", "iso-2022-jp", "50220");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (JIS-Allow 1 byte Kana)", "csISO2022JP", "50221");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (JIS-Allow 1 byte Kana - SO/SI)", "iso-2022-jp", "50222");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Korean (ISO)", "iso-2022-kr", "50225");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (ISO-2022)", "x-cp50227", "50227");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Japanese (EUC)", "euc-jp", "51932");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (EUC)", "EUC-CN", "51936");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Korean (EUC)", "euc-kr", "51949");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (HZ)", "hz-gb-2312", "52936");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Chinese Simplified (GB18030)", "GB18030", "54936");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Devanagari", "x-iscii-de", "57002");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Bengali", "x-iscii-be", "57003");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Tamil", "x-iscii-ta", "57004");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Telugu", "x-iscii-te", "57005");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Assamese", "x-iscii-as", "57006");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Oriya", "x-iscii-or", "57007");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Kannada", "x-iscii-ka", "57008");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Malayalam", "x-iscii-ma", "57009");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Gujarati", "x-iscii-gu", "57010");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("ISCII Punjabi", "x-iscii-pa", "57011");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Unicode (UTF-7)", "utf-7", "65000");';
        $this->queries[] = 'INSERT INTO `'.$conf['db']['pref'].'system_encoding` (name, code, num) VALUES ("Unicode (UTF-8)", "utf-8", "65001");';
	}
}
?>
