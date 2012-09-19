<?php
/**
 * Auto generate class for module iPhone gallery
 * 
 * @package      WebGuru3
 * @subpackage   modules/igallery/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        29. October 2009
 */


class autoGenerateIgallery {
		
	public function __construct() {
	$path = wgPaths::getWebdataPath().'igallery-upload.php';
		if (!file_exists($path)) {
			$file = '<?php
chdir(\'../admin/\');
require(\'./init/init.basic.php\');
wgModules::runModule(\'igallery\');
if (isset($_FILES[\'file\'][\'name\']) && isset($_POST[\'code\']) && isset($_POST[\'name\']) && isset($_POST[\'caption\'])) {
	if (empty($_POST[\'name\'])) $_POST[\'name\'] = $_FILES[\'file\'][\'name\'];
	echo (int) moduleIgallery::uploadPicture($_POST[\'code\'], $_POST[\'name\'], $_POST[\'caption\'], $_FILES[\'file\']);
}
else echo 0;
?>';
			wgIo::writeFile($path, $file);
		}
		$path = wgPaths::getWebdataPath().'igallery-json.php';
		if (!file_exists($path)) {
			$file = '<?php
chdir(\'../admin/\');
require(\'./init/init.basic.php\');
wgModules::runModule(\'igallery\');
if (isset($_GET[\'code\'])) {
	$id = (int) IgalleryGalleriesModel::getGalleryIdByCode($_GET[\'code\']);
	$arr = IgalleryItemsModel::getSelfData($id);
	echo \'[\'.NL;
	$c = count($arr);
	foreach ($arr as $v) {
		$c--;
		if ($c > 0) $comma = \',\';
		else $comma = NULL;
		echo TAB.\'{ \'.NL;
		echo TAB.TAB.\'"xsmall": "\'.moduleIgallery::getImage($v->getIgalleryGalleriesId(), $v->getSmallid(), $v->getAdded(), \'xsmall\').\'",\'.NL;
		echo TAB.TAB.\'"small": "\'.moduleIgallery::getImage($v->getIgalleryGalleriesId(), $v->getSmallid(), $v->getAdded(), \'small\').\'",\'.NL;
		echo TAB.TAB.\'"medium": "\'.moduleIgallery::getImage($v->getIgalleryGalleriesId(), $v->getSmallid(), $v->getAdded(), \'medium\').\'",\'.NL;
		echo TAB.TAB.\'"large": "\'.moduleIgallery::getImage($v->getIgalleryGalleriesId(), $v->getSmallid(), $v->getAdded(), \'large\').\'",\'.NL;
		echo TAB.TAB.\'"name": "\'.$v->getName().\'",\'.NL;
		echo TAB.TAB.\'"caption": "\'.$v->getCaption().\'",\'.NL;
		echo TAB.TAB.\'"file": "\'.$v->getFile().\'",\'.NL;
		echo TAB.TAB.\'"longitude": "\'.$v->getLongitude().\'",\'.NL;
		echo TAB.TAB.\'"latitude": "\'.$v->getLatitude().\'",\'.NL;
		echo TAB.TAB.\'"added": "\'.$v->getAdded().\'",\'.NL;
		echo TAB.TAB.\'"changed": "\'.$v->getChanged().\'",\'.NL;
		echo TAB.TAB.\'"gallery": "\'.$v->getIgalleryGalleriesId().\'"\'.NL;
		echo TAB.\'}\'.$comma.NL;
	}
	echo \']\';
}
else echo 0;
?>';
			wgIo::writeFile($path, $file);
		}
	}
	
}
?>