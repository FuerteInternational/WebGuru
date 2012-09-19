<?php
/**
 * Install class for module Companies
 * 
 * @package      WebGuru3
 * @subpackage   modules/companies/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. September 2012
 */

class installCompanies {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		$this->tables[] = 'CREATE TABLE  `companies` (
`id` BIGINT( 20 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`identifier` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
INDEX (  `identifier` )
) ENGINE = MYISAM;';
		
		$this->queries[] = 'INSERT INTO `companies` (`id`, `name`, `identifier`) VALUES (NULL, \'Fuerte International\', \'fuerte-international\');';
		
	}
}
		
?>