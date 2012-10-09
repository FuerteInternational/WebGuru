<?php
/**
 * Generate class for module Template Switch
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

		
class generateTemplateswitch {
		
	public function __construct() {
		
	}
	
	public function generateSwitch($p) {
		$s = TemplateswitchModel::getTemplateByIdentifier($p[3]);
		return $s->getTemplatename();
	}
	
	public function generateSwitchname($p) {
		$s = TemplateswitchModel::getTemplateByIdentifier($p[3]);
		return $s->getName();
	}
	
}
?>