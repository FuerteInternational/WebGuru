<?php
/**
 * Database class for table blog
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/blog
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        27. February 2009 15:03:06
 */

class BlogModel extends BaseBlogModel {
	
	public static function countBlogs() {
		return (int) parent::doCount();
	}
	
	public static function isBlog() {
		return (bool) self::countBlogs();
	}
	
	
}
?>