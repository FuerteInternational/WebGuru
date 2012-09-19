<?php
//print_r($_POST);
//print_r($_FILES);

chdir('../admin/');
require('./init/init.basic.php');
$filename = NULL;
if (isset($_POST['widgetID'])) {
	$v = WspriteItemsModel::getOneSelfData((int) $_POST['widgetID']);
	$id = $v->getId();
	if ((bool) $id) {
		$save = array();
		$save['where'] = $id;
		if ($v->getW1() == 1) $save['w2'] = serialize(array('twitterTitle'=>$_POST['twitterTitle'], 'twitterName'=>$_POST['twitterName'], 'twitterPassword'=>$_POST['twitterPassword']));
		elseif ($v->getW1() == 2) $save['w2'] = serialize(array('contentTitle'=>$_POST['contentTitle'], 'contentBody'=>$_POST['contentBody'], 'linkText'=>$_POST['linkText'], 'linkURL'=>$_POST['linkURL']));
		elseif ($v->getW1() == 3) {
			if (!isset($_FILES['multipleItems']['name'])) {
				$data = unserialize($v->getW2());
				//print_r($data);
				//wgIo::writeFile(wgPaths::getTempPath().'test.xml', xml::arrayToXml($data['content']));
				$_FILES['m']['name'] = $data['fileName'];
				$content = $data['content'];
			}
			else $content = WspriteItemsModel::serializeMultipleItemsFromFile($_FILES['multipleItems']['tmp_name']);
			$save['w2'] = serialize(array('multipleItemsTitle'=>$_POST['multipleItemsTitle'], 'content'=>$content, 'fileName'=>$_FILES['multipleItems']['name']));
			$filename = $_FILES['multipleItems']['name'];
			//$save['w2'] = serialize(array('multipleItemsTitle'=>'heeeey :)', 'content'=>$content, 'fileName'=>$_FILES['multipleItems']['name']));
		}
		elseif ($v->getW1() == 4) $save['w2'] = serialize(array('linkButtonText'=>$_POST['linkButtonText'], 'linkButtonURL'=>$_POST['linkButtonURL']));
		elseif ($v->getW1() == 5) {
			if (isset($_FILES['imageFile']['name'])) {
				$filename = 'wsprite-'.$id.'-'.$_FILES['imageFile']['name'];
				$_POST['imageLinkURL'] = wgPaths::getUserfilesPath('url').$filename;
				wgIo::uploadFile($filename, $_FILES['imageFile']['tmp_name'], wgPaths::getUserfilesPath());
			}
			$save['w2'] = serialize(array('imageAltText'=>$_POST['imageAltText'], 'imageLinkURL'=>$_POST['imageLinkURL']));
		}
		$save['w2'] = eregi_replace("'", "\'", $save['w2']);
		$ok = (int) (bool) WspriteItemsModel::doUpdate($save);
	}
	else $ok = 0;
}
else $ok = 0;
?>{
	"resp": <?php echo $ok; ?>,
	"file": "<?php echo $filename; ?>",
	"error": ""
}