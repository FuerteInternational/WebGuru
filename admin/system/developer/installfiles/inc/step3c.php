<?php
$data = &$_SESSION['data'];
if (is_writable('../admin/config/config.php')) {
?>
<form action="" method="post">
	<div class="box">
    	<a href="#" class="hidebutton" onclick="return switchIt('mysqlsett', this);">-</a>
        <h2>MySQL database connection</h2>
        <div id="mysqlsett">
            <div class="legend">
                <p>&nbsp;</p>
            </div>
            <div class="content">
                <p><label for="name">Host name:</label> <input id="dbhost" name="dbhost" type="text" value="<?php echo $data['dbhost']; ?>" /></p>
                <p><label for="name">User name:</label> <input id="dbuname" name="dbuname" type="text" value="<?php echo $data['dbuname']; ?>" /></p>
                <p><label for="name">User password:</label> <input id="dbupass" name="dbupass" type="text" value="<?php echo $data['dbupass']; ?>" /></p>
                <p><label for="name">Database name:</label> <input id="dbname" name="dbname" type="text" value="<?php echo $data['dbname']; ?>" /></p>
                <p><label for="name">Create database:</label> <input name="createdb" type="checkbox" value="1"<?php echo checked($data['createdb']); ?> /></p>
                <p><input name="testdb" type="button" value="Test DB connection" onclick="testDB();" /></p>
            </div>
        </div>
    </div>
	<div class="box">
    	<a href="#" class="hidebutton" onclick="return switchIt('ftpsett', this);">-</a>
        <h2>FTP settings</h2>
        <div id="ftpsett">
            <div class="legend">
                <p>Is necessary to fill this form if your webserver is running under safe_mode</p>
            </div>
            <div class="content">
                <p><label for="name">FTP host:</label> <input id="ftphost" name="ftphost" type="text" value="<?php echo $data['ftphost']; ?>" /></p>
                <p><label for="name">FTP port:</label> <input id="ftpport" name="ftpport" type="text" value="<?php echo $data['ftpport']; ?>" /></p>
                <p><label for="name">FTP user name:</label> <input id="ftpname" name="ftpname" type="text" value="<?php echo $data['ftpname']; ?>" /></p>
                <p><label for="name">FTP password:</label> <input id="ftppass" name="ftppass" type="text" value="<?php echo $data['ftppass']; ?>" /></p>
                <p><label for="name">Root directory:</label> <input id="ftproot" name="ftproot" type="text" value="<?php echo $data['ftproot']; ?>" /></p>
                <p><input name="testftp" type="button" value="Test FTP" onclick="testFTP();" /></p>
            </div>
        </div>
    </div>
	<div class="box">
    	<a href="#" class="hidebutton" onclick="return switchIt('websett', this);">-</a>
        <h2>Web configuration</h2>
        <div id="websett">
            <div class="legend">
                <p>&nbsp;</p>
            </div>
            <div class="content">
                <p><label for="name">Website URL:</label> <input name="webroot" type="text" value="<?php echo $data['webroot']; ?>" /></p>
                <p>&nbsp;</p>
                <p><label for="name">System title:</label> <input name="basetitle" type="text" value="<?php echo $data['basetitle']; ?>" /></p>
                <p><label for="name">Website/Customer:</label> <input name="customer" type="text" value="<?php echo $data['customer']; ?>" /></p>
                <p>
                    <label for="name">Admin language:</label>
                    <select name="language">
                    	<?php
						$arr = upload::readDirectories('../admin/language/', false);
						if (!empty($arr) && is_array($arr)) foreach ($arr as $res) {
						?>
                        <option value="<?php echo $res; ?>"<?php if ($res == $data['language']) echo ' selected="selected"'?>><?php echo ucfirst($res); ?></option>
                        <?php } else { ?>
                        <option value="english">English</option>
                        <?php } ?>
                    </select>
                </p>
                <p>
                    <label for="name">Admin skin:</label>
                    <select name="skin">
                    	<?php
						$arr = upload::readDirectories('../admin/issues/', false);
						if (!empty($arr) && is_array($arr)) foreach ($arr as $res) {
						?>
                        <option value="<?php echo $res; ?>"<?php if ($res == $data['skin']) echo ' selected="selected"'?>><?php echo ucfirst($res); ?></option>
                        <?php } else { ?>
                        <option value="blow">Blow</option>
                        <?php } ?>
                    </select>
                </p>
                <p><label for="name">XEdit:</label> <input name="xedit" type="checkbox" value="1"<?php echo checked($data['xedit']); ?> /></p>
                <p><label for="name">Show help:</label> <input name="help" type="checkbox" value="1"<?php echo checked($data['help']); ?> /></p>
                <p><label for="name">Developer mode:</label> <input name="developer" type="checkbox" value="1"<?php echo checked($data['developer']); ?> /></p>
            </div>
    	</div>
    </div>
	<div class="box">
    	<a href="#" class="hidebutton" onclick="return switchIt('smtpsett', this);">+</a>
    	<h2>SMTP server settings (E-Mails)</h2>
        <div id="smtpsett">
            <div class="legend">
                <p>&nbsp;</p>
            </div>
            <div class="content">
                <p><label for="name">Host server:</label> <input name="smtphost" type="text" value="<?php echo $data['smtphost']; ?>" /></p>
                <p><label for="name">Host port:</label> <input name="smtpport" type="text" value="<?php echo $data['smtpport']; ?>" /></p>
                <p><label for="name">User name:</label> <input name="smtpname" type="text" value="<?php echo $data['smtpname']; ?>" /></p>
                <p><label for="name">User password:</label> <input name="smtppass" type="text" value="<?php echo $data['smtppass']; ?>" /></p>
            </div>
        </div>
    </div>
	<div class="box">
    	<a href="#" class="hidebutton" onclick="return switchIt('sslsett', this);">+</a>
    	<h2>SSL settings</h2>
        <div id="sslsett">
            <div class="legend">
                <p>&nbsp;</p>
            </div>
            <div class="content">
                <p><label for="name">Enabled:</label> <input name="ssl" type="checkbox" value="1"<?php echo checked($data['ssl']); ?> /></p>
                <p><label for="name">SSL port:</label> <input name="sslport" id="sslport" type="text" value="<?php echo $data['sslport']; ?>" /></p>
                <p><input name="testssl" type="button" value="Test SSL" onclick="testSSL();" /></p>
            </div>
        </div>
    </div>
	<div class="box">
    	<a href="#" class="hidebutton" onclick="return switchIt('extsett', this);">+</a>
    	<h2>Extended settings</h2>
        <div id="extsett">
            <div class="legend">
                <p>&nbsp;</p>
            </div>
            <div class="content">
                <p><label for="name">Special license key:</label> <input name="licencekey" type="text" value="<?php echo $data['licencekey']; ?>" /></p>
                <p><label for="name">Image quality (10-100):</label> <input name="imageq" type="text" value="<?php echo $data['imageq']; ?>" /></p>
                <p><label for="name">Error reporting (0,1,2):</label> <input name="errorrep" type="text" value="<?php echo $data['errorrep']; ?>" /></p>
                <p><label for="name">Mod_rewrite prefix:</label> <input name="rewprefix" type="text" value="<?php echo $data['rewprefix']; ?>" /></p>
                <p><label for="name">Default Chmod value:</label> <input name="filemode" type="text" value="<?php echo $data['filemode']; ?>" /></p>
            </div>
        </div>
    </div>
    <p class="clear">&nbsp;</p>
	<p>
		<input name="back" type="button" value="Back" onclick="goBack();" class="js" />
		<input name="reload" type="button" value="Reload" onclick="reloadPage();" class="js" />
		<input name="submit" type="submit" value="Finish installation"<?php echo $disablenext; ?> onclick="showWarning();" />
	</p>
</form>
<script type="text/javascript">
<!--
document.getElementById('mysqlsett').style.display = 'block';
document.getElementById('ftpsett').style.display = 'block';
document.getElementById('websett').style.display = 'block';
document.getElementById('smtpsett').style.display = 'none';
document.getElementById('sslsett').style.display = 'none';
document.getElementById('extsett').style.display = 'none';
-->
</script>
<?php
}
else {
?>
<form action="" method="post">
	<p>
		<input name="reload" type="button" value="Reload" onclick="reloadPage();" class="js" />
	</p>
</form>
<?php
}
?>