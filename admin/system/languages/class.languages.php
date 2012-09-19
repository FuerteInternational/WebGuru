<?php
/**
 * Main class for module Languages
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */

class moduleLanguages {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Languages';
		$this->code    = 'languages';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
	}
	
	// ------------------------- class functions -------------------------
	
	public function getTranslationCode($code, $pid) {
		$data['once'] = 'wgLang::setFrontCodeAuto();
if (!isset($system[\'languages\'][\'frontend\'][\'definitions\'])) {
	$path = wgPaths::getWebdataPath().\'cache.front.lang.\'.wgLang::getFrontCode().\'.'.$pid.'.php\';
	if (file_exists($path)) include($path);
}
';
		$data['content'] = '<?php
if (isset($system[\'languages\'][\'frontend\'][\'definitions\'][\''.strtoupper($code).'\'])) echo $system[\'languages\'][\'frontend\'][\'definitions\'][\''.strtoupper($code).'\'];
?>';
		return $data;
	}
}
		
?>