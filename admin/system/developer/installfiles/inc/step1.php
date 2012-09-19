<?php
$mainstep = 'Pre-installation check';
$ismysql = (bool) function_exists('mysql_connect');
if (!$ismysql) $disablenext = ' disabled="disabled"';
if (isset($_POST['submit'])) {
	$ok = true;
	if (!$ismysql) { wgError::add('There is no MySQL support detected in PHP.');
		$ok = false;
	}
	if ($ok) {
		$_SESSION['step']++;
		header('Location: ?step=2');
	}
	else wgError::add('Please check <a href="http://www.webgurucms.com/en/installation/">WebGuruCMS.com</a> for installation manual', 1);
}
?>
