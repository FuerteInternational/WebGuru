<?php require('./inc.main.php'); ?><?php
$error = NULL;
$id = (int) wgGet::getValue('id');
if ((bool) $id) {
	$conn = new wgConnector();
	$conn->where('id', $id);
	$conn->limit(1);
	$res = (bool) PagesModel::doDelete($conn);
	if (!$res) $error = 'Unable to delete entry.';
}
else {
	$res = false;
	$error = 'No item Id has been sent.';
}
?>{
	"result": <?php echo (int) $res; ?>,
	"error": "<?php echo $error; ?>"
}<?php ?>