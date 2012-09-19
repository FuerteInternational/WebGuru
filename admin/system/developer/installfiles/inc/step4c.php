<form action="../admin/login.php?firstlogin" method="post">
	<p><input name="back" type="button" value="Back" onclick="goBack();" /> <input name="submit" type="submit" value="Login to the system"<?php echo $disablenext; ?> onclick="showWarning();" /></p>
</form>
<?php wgError::add('Thank you for installing WebGuru Publisher CMS', 2); wgError::add('Please change your login informations after the login', 1); wgError::add('Default login is "admin" and password "test"', 2);
?>