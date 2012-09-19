<?php
/**
 * Database class for table news_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/news_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        7. April 2009 16:52:18
 */

class NewsTemplatesModel extends BaseNewsTemplatesModel {
	
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
			$arr[0] = array(1, 'URL var (?newscat=X) ('.wgLang::get('withpager').')', 'NewsItemsModel::getArticlesPagerInCat(%s, pager::getPage(\'%s\'), %s)');
			$arr[1] = array(0, 'URL var (?newscat=X) ('.wgLang::get('nopager').')', 'NewsItemsModel::getArticlesInCat(%s, %s)');
			$arr[2] = array(1, wgLang::get('predefinedcat').' ('.wgLang::get('withpager').')', 'NewsItemsModel::getArticlesPagerInCat(%s, pager::getPage(\'%s\'), %s)');
			$arr[3] = array(0, wgLang::get('predefinedcat').' ('.wgLang::get('nopager').')', 'NewsItemsModel::getArticlesInCat(%s, %s)');
			$arr[4] = array(1, wgLang::get('allarticles').' ('.wgLang::get('withpager').')', 'NewsItemsModel::getArticlesPager(pager::getPage(\'%s\'), %s)');
			$arr[5] = array(0, wgLang::get('allarticles').' ('.wgLang::get('nopager').')', 'NewsItemsModel::getArticles(%s)');
		}
		elseif ($type == 1) {
			$arr[0] = array(0, 'URL var (?article=X)', 'NewsItemsModel::doSelectPKey((int) %s)');
			$arr[1] = array(0, wgLang::get('predefinedart'), 'NewsItemsModel::doSelectPKey((int) %s)');
			$arr[2] = array(0, wgLang::get('latestall'), 'NewsItemsModel::getLatestArticle()');
			$arr[3] = array(0, wgLang::get('latestpredefinedcat'), 'NewsItemsModel::getLatestArticle(%s)');
			$arr[4] = array(0, wgLang::get('random'), 'NewsItemsModel::getRandomArticle()');
			$arr[5] = array(0, wgLang::get('randpredefinedcat'), 'NewsItemsModel::getRandomArticle(%s)');
		}
		elseif ($type == 2) {
			$arr[0] = array(1, 'URL var (?newscat=X) ('.wgLang::get('withpager').')', 'NewsCategoriesModel::getSubcatsPager(%s, pager::getPage(\'%s\'), %s)');
			$arr[1] = array(0, 'URL var (?newscat=X) ('.wgLang::get('nopager').')', 'NewsCategoriesModel::getSubcats(%s, %s)');
			$arr[2] = array(1, wgLang::get('predefinedcat').' ('.wgLang::get('withpager').')', 'NewsCategoriesModel::getSubcatsPager(%s, pager::getPage(\'%s\'), %s)');
			$arr[3] = array(0, wgLang::get('predefinedcat').' ('.wgLang::get('nopager').')', 'NewsCategoriesModel::getSubcats(%s, %s)');
			$arr[4] = array(1, wgLang::get('allcats').' ('.wgLang::get('withpager').')', 'NewsCategoriesModel::getCatsPager(%s, %s)');
			$arr[5] = array(0, wgLang::get('allcats').' ('.wgLang::get('nopager').')', 'NewsCategoriesModel::getCats(%s)');
		}
		return $arr;
	}
		
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
		
}
?>