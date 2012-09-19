<?php
$mainstep = 'License agreement';

if (isset($_POST['submit'])) {
	$_SESSION['step']++;
	header('Location: ?step=3');
}

if (!ini_get('safe_mode') && is_writable('../')) {
	//error::add('');
}


?>