<?php
chdir('../admin/');
require('./init/init.basic.php');

if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
	$count = (count($_POST)+10);
	foreach ($_POST as $k=>$el) {
		$id = (int) eregi_replace('wi', '', $k);
		$sort = $count;
		$count--;
		WspriteItemsModel::updateSortForItem($id, $sort);
	}
	echo 1;
}
else echo 0;
?>