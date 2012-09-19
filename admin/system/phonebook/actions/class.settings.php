<?php
/**
 * Page Settings in the Phonebook module
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

final class settingsActionsPhonebook extends BaseActions {
	/**
	 * All variables neccessary for module
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function __construct() {
		$ok = false;
		if ((bool) wgPost::isValue('submitconfig')) {
			$path = wgPaths::getAdminPath().'config/';
			if (!is_writable($path)) wgError::add('confignotwritable');
			else $ok = wgConfig::saveConfiguration('phonebook', wgPost::getValue('conf'));
		}
		if ((bool) wgPost::isValue('submitdefpic')) {
			global $mod;
			$mod->runModule('phonebook');
			if ((bool) $_FILES['defpic']['name']) $ok = true;
			$conf = modulePhonebook::getConfig();
			$path = wgPaths::getUserfilesPath().'phonebook-people-def-%s.jpg';
			$img = new wgImages($_FILES['defpic'], 'upload');
			$img->setQuality($conf['images']['quality']);
			$img->resize($conf['images']['xsmall'][0], $conf['images']['xsmall'][1]);
			$img->save(sprintf($path, 'xsml'));
			$img->resize($conf['images']['small'][0], $conf['images']['small'][1]);
			$img->save(sprintf($path, 'sml'));
			$img->resize($conf['images']['medium'][0], $conf['images']['medium'][1]);
			$img->save(sprintf($path, 'med'));
			$img->resize($conf['images']['large'][0], $conf['images']['large'][1]);
			$img->save(sprintf($path, 'lrg'));
			$img->clear();
		}
		if ($ok) wgError::add('saved', 2);
		else wgError::add('cantsave');
	}
	
}	
?>