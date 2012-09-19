<?php
/**
 * Database class for table projects_images
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/projects_images
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        15. June 2009 18:14:50
 */

class ProjectsImagesModel extends BaseProjectsImagesModel {
	
	public static function getLastFreeId() {
		$conn = new wgConnector();
		$conn->order(parent::COL_ID, 'DESC');
		$conn->limit(1);
		$res = parent::doSelect($conn);
		if (isset($res[0])) return $res[0]->getId();
		else return 0;
	}
	
	public static function getImagesForProject($projectId) {
		$id = (int) $projectId;
		$conn = new wgConnector();
		$conn->where(parent::COL_PROJECTS_ITEMS_ID, $id);
		$conn->order(parent::FULL_SORT.' DESC, '.parent::FULL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function deleteImage($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$im = parent::doSelectPKey($id);
		if (!(bool) $im->getId()) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		parent::doDelete($conn);
		return $im;
	}
	
	
	public static function insertNewImageFromFile($info, $type=0) {
		$save = array();
		$save['name'] 				 = $info['original'];
		$save['projects_items_id'] 	 = $info['id'];
		$save['smallid']		 	 = $info['smallid'];
		$save['identifier']			 = valid::safeText($info['original']);
		$save['filename'] 			 = $info['filename'];
		$save['type'] 				 = $info['mime'];
		$save['h1'] 				 = $info['original'];
		$save['title']				 = $info['original'];
		$save['mdescription']		 = '';
		$save['mkeywords']			 = '';
		$save['h2']					 = $info['original'];
		$save['h3']					 = $info['original'];
		$save['views']				 = 0;
		$save['downloads']			 = 0;
		$save['itemtype']			 = (int) $type;
		$save['sort']				 = 0;
		$save['variable1']			 = ''; //$info['size'];
		$save['variable2']			 = ''; //$info['size'];
		$save['variable3']			 = ''; //$info['size'];
		return (int) parent::doInsert($save);
	}
	
	
}
?>