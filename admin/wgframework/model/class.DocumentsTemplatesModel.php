<?php
/**
 * Database class for table documents_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/documents_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. February 2009 17:30:21
 */

class DocumentsTemplatesModel extends BaseDocumentsTemplatesModel {
	
	public static function getTemplatesByType($type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	public static function getTemplateByIdentifierType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return array();
	}
	
	public static function getTemplatesPagerByType($type=0, $page=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page);
	}
	
	public static function getSelectDataForType($type=0) {
		$arr = self::getDatasourcesForType($type);
		$new = array();
		foreach ($arr as $k=>$d) $new[$k] = $d[1];
		return $new;
	}
	
	public static function getOneDatasource($type, $id, $a='',$b='', $c='') {
		$arr = self::getDatasourcesForType($type);
		return array(sprintf($arr[$id][2], $a, $b ,$c), $arr[$id][0]);
	}
	
	public static function getDatasourcesForType($type=0) {
		$type = (int) $type;
		$arr = array();
		if ($type == 0) {
			$arr[0] = array(1, 'URL var (?cat=X) ('.wgLang::get('withpager').')', 'DocumentsCategoriesModel::getSubcatsPager(%s, pager::getPage(\'%s\'), %s)');
			$arr[1] = array(0, 'URL var (?cat=X) ('.wgLang::get('nopager').')', 'DocumentsCategoriesModel::getSubcats(%s, %s)');
			$arr[2] = array(1, 'PHP var ($cat=X;) ('.wgLang::get('predefinedvar').' - '.wgLang::get('withpager').')', 'DocumentsCategoriesModel::getSubcatsPager($cat, pager::getPage(\'%s\'), %s)');
			$arr[3] = array(0, 'PHP var ($cat=X;) ('.wgLang::get('predefinedvar').' - '.wgLang::get('nopager').')', 'DocumentsCategoriesModel::getSubcats($cat, %s)');
			$arr[4] = array(1, wgLang::get('alldocs').' ('.wgLang::get('withpager').')', 'DocumentsCategoriesModel::getCatsPager(%s, %s)');
			$arr[5] = array(0, wgLang::get('alldocs').' ('.wgLang::get('nopager').')', 'DocumentsCategoriesModel::getCats(%s)');
		}
		elseif ($type == 1) {
			$arr[0] = array(1, 'URL var (?cat=X) ('.wgLang::get('withpager').')', 'DocumentsItemsModel::getItemsInCatPager(%s, pager::getPage(\'%s\'), %s, false)');
			$arr[1] = array(0, 'URL var (?cat=X) ('.wgLang::get('nopager').')', 'DocumentsItemsModel::getItemsInCat(%s, %s, false)');
			$arr[2] = array(1, 'PHP var ($cat=X;) ('.wgLang::get('predefinedvar').' - '.wgLang::get('withpager').')', 'DocumentsItemsModel::getItemsInCatPager($cat, pager::getPage(\'%s\'), %s, false)');
			$arr[3] = array(0, 'PHP var ($cat=X;) ('.wgLang::get('predefinedvar').' - '.wgLang::get('nopager').')', 'DocumentsItemsModel::getItemsInCat($cat, %s, false)');
			$arr[4] = array(1, wgLang::get('alldocs').' ('.wgLang::get('withpager').')', 'DocumentsItemsModel::getItemsPager(pager::getPage(\'%s\'), %s, false)');
			$arr[5] = array(0, wgLang::get('alldocs').' ('.wgLang::get('nopager').')', 'DocumentsItemsModel::getItems(%s, false)');
		}
		elseif ($type == 2) {
			$arr[0] = array('Source t3 0', 'TemplatesModel::getDatasourcesForType(0)');
			$arr[1] = array('Source t3 1', 'TemplatesModel::getDatasourcesForType(1)');
			$arr[2] = array('Source t3 2', 'TemplatesModel::getDatasourcesForType(2)');
			$arr[3] = array('Source t3 3', 'TemplatesModel::getDatasourcesForType(3)');
			$arr[4] = array('Source t3 4', 'TemplatesModel::getDatasourcesForType(4)');
		}
		elseif ($type == 3) {
			$arr[0] = array(1, wgLang::get('favorites').' ('.wgLang::get('withpager').')', 'DocumentsItemsModel::getFavoriteItemsPager(pager::getPage(\'%s\'), %s, false)');
			$arr[1] = array(0, wgLang::get('favorites').' ('.wgLang::get('nopager').')', 'DocumentsItemsModel::getFavoriteItems(%s, false)');
		}
		return $arr;
	}
	
	
}
?>