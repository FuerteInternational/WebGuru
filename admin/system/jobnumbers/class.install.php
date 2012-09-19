<?php
/**
 * Install class for module Jobnumbers
 * 
 * @package      WebGuru3
 * @subpackage   modules/jobnumbers/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        17. April 2009
 */

class installJobnumbers {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		// Table jobnumbers
		$this->tables['jobnumbers'] = "
CREATE TABLE `jobnumbers` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `shortname` varchar(255) NOT NULL,
  `jnumber` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '1',
  `changed` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `shortname` (`shortname`),
  KEY `jnumber` (`jnumber`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8
		";
			
		
		
		
		
	}
}
?>