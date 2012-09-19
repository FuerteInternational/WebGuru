<?php
chdir('../admin/');
require('./init/init.basic.php');
$id  = 0;
if (isset($_POST['id'])) $id = (int) $_POST['id'];
if ((bool) $id) echo (int) WspriteItemsModel::deleteBox($id);
else echo 0;
?>