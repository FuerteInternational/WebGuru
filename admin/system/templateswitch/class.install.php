<?php
/**
 * Install class for module Template Switch
 * 
 * @package      WebGuru3
 * @subpackage   modules/templateswitch/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        8. October 2012
 */

class installTemplateswitch {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		$this->tables[] = "CREATE TABLE  `appstore`.`templateswitch` (
`id` INT( 11 ) UNSIGNED NOT NULL ,
`name` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`identifier` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`templatename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (  `id` ) ,
INDEX (  `identifier` )
) ENGINE = MYISAM ;";
		
		$this->tables[] = '
		
		';
		
		$this->tables[] = '
		
		';
		
		$this->queries[] = '';
		
		$this->queries[] = '';
		
		$this->queries[] = '';
		
	}
}
		
?>