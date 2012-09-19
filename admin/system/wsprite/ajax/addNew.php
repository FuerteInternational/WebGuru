<?php
chdir('../admin/');
require('./init/init.basic.php');

if (!isset($_POST['type'])) $_POST['type'] = NULL;
$type = false;

if ($_POST['type'] == 'twitterItem') $type = 1;
elseif ($_POST['type'] == 'singleContentItem') $type = 2;
elseif ($_POST['type'] == 'multipleContentItem') $type = 3;
elseif ($_POST['type'] == 'buttonItem') $type = 4;
elseif ($_POST['type'] == 'imageLogoItem') $type = 5;

if ((bool) $type) {
	$save = array();
	$save['wsprite_widgets_id'] = (int) $_POST['id'];
	$save['w1'] = $type;
	if ($type == 1) $save['w2'] = serialize(array('twitterTitle'=>'', 'twitterName'=>'', 'twitterPassword'=>''));
	elseif ($type == 2) $save['w2'] = serialize(array('contentTitle'=>'', 'contentBody'=>'', 'linkText'=>'', 'linkURL'=>'http://www.example.com/'));
	elseif ($type == 3) $save['w2'] = serialize(array('multipleItemsTitle'=>'', 'content'=>'', 'fileName'=>''));
	elseif ($type == 4) $save['w2'] = serialize(array('linkButtonText'=>'', 'linkButtonURL'=>'http://www.example.com/'));
	elseif ($type == 5) $save['w2'] = serialize(array('imageAltText'=>'', 'imageLinkURL'=>'http://www.example.com/image.jpg'));
	echo (int) WspriteItemsModel::doInsert($save);
}
else echo 0;
?>