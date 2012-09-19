<?php
/**
 * Generate class for module Widget Sprite
 * 
 * @package      WebGuru3
 * @subpackage   modules/wsprite/
 * @author       Ondrej Rafaj (FiftyFootSquid.com)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        7. September 2009
 */

		
class generateWsprite {
		
	public function __construct() {
		
	}
	
	public function generateTemplate($p) {
		$path = wgPaths::getModulePath('ftp', 'wsprite').'frontend/'.$p[3].'.php';
		if (file_exists($path)) {
			$data['modules'][] = 'users';
			$data['modules'][] = 'wsprite';
			$data['pretext'] = '';
			$data['content'] = file_get_contents($path);
		}
		else return NULL;
	}
	
	public function generateInclude($p) {
		$path = wgPaths::getModulePath('ftp', 'wsprite').'frontend/'.$p[3].'.php';
		if (file_exists($path)) {
			$data['modules'][] = 'users';
			$data['modules'][] = 'wsprite';
			$data['pretext'] = '';
			$data['content'] = '<?php
$path = wgPaths::getModulePath(\'ftp\', \'wsprite\').\'frontend/'.$p[3].'.php\';
include($path);
?>';
			return $data;
		}
		else return NULL;
	}
	
	
}
?>