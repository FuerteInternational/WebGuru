<?php
/**
 * Generate class for module Ratings
 * 
 * @package      WebGuru3
 * @subpackage   modules/ratings/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. May 2009
 */

		
class generateRatings {
		
	public function __construct() {
		
	}
	
	public function generateFull($p) {
		$gr = RatingPointsGroupsModel::getByIdentifier($p[3]);
		
		$data = array();
		$data['modules'] = 'ratings';
		$data['pretext'] = '';
		$data['content'] = '<?php
echo moduleRatings::getRatingBar(\''.$gr->getName().'\', (int) wgSystem::getRequestValue(\''.$gr->getIdentifier().'\'), 6, false);
?>';
		return $data;
	}
	
	
}
?>