<?php
if (isset($_GET['testssl'])) {
	if ((bool) $_GET['secured']) {
		if ($_GET['sslport'] != $_SERVER['SERVER_PORT']) echo '<h3 style="color:red">Can\'t start SSL communication on port '.$_GET['sslport'].'</h3>';
		echo '<h3 style="color:green">SSL communication can be started on port <span id="sslport">'.$_SERVER['SERVER_PORT'].'</span></h3>';
		exit();	
	}
	$_GET['sslport'] = (int) $_GET['sslport'];
	if (!(bool) $_GET['sslport']) $_GET['sslport'] = 443;
	if ($_SERVER['SERVER_PORT'] != $_GET['sslport']) {
		if (!(bool) $_GET['secured']) header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?testssl&sslport='.$_GET['sslport'].'&secured=1');
		else echo '<h3 style="color:red">Can\'t start SSL communication on port '.$_GET['sslport'].'</h3>';
	}
	else header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?testssl&sslport='.$_GET['sslport'].'&secured=1');
	exit();
}
include('./inc/init.php');
if (isset($_GET['testdb'])) {
	//print_r($_GET);
	$db = NULL;
	if (!$db = @mysql_connect($_GET['dbhost'], $_GET['dbuname'], $_GET['dbupass'])) echo '<h3 style="color:red">Can\'t connect to server '.$_GET['dbhost'].', as '.$_GET['dbuname'].'</h3>';
	else {
		if (@!mysql_select_db($_GET['dbname'], $db)) echo '<h3 style="color:red">There is no database name '.$_GET['dbname'].'</h3>';
		else echo '<h3 style="color:green">MySQL DB connection is OK</h3>';
	}
	exit();
}
if (isset($_GET['testftp'])) {
	require('./libs/class.ftp.php');
	$ftp = new ftp($_GET['host'], $_GET['name'], $_GET['pass'], $_GET['port']);
	if (!$ftp->isconn()) {
		if (!empty($_SESSION['error']) && is_array($_SESSION['error'])) foreach ($_SESSION['error'] as $res) {
			echo '<h3 style="color:red">'.$res[0].'</h3>';
		}
		unset($_SESSION['error']);
	}
	else echo '<h3 style="color:green">FTP connection is OK</h3>';
	exit();
}
if (!(bool) $_SESSION['step']) $_SESSION['step'] = 1;
if (isset($_GET['step']) && (bool) ((int) $_GET['step']) && (int) $_GET['step'] < $_SESSION['step']) $_SESSION['step'] = (int) $_GET['step'];
if ($_SESSION['step'] == 1) include('./inc/step1.php');
elseif ($_SESSION['step'] == 2) include('./inc/step2.php');
elseif ($_SESSION['step'] == 3) include('./inc/step3.php');
elseif ($_SESSION['step'] == 4) include('./inc/step4.php');
else include('./inc/step1.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WebGuru Publisher CMS Installation - <?php echo $mainstep; ?></title>
<link href="./styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function checkStep(step) {
	if (step < <?php echo $_SESSION['step'] ?>) return true;
	else return false;
}
function reloadPage() {
	document.location = '?step=<?php echo $_SESSION['step'] ?>&reload=1';
}
function goBack() {
	if (<?php echo $_SESSION['step'] ?> > 1) document.location = '?step=<?php echo ($_SESSION['step']-1) ?>'
}
function switchIt(id, button) {
	var element = document.getElementById(id);
	if (element.style.display == 'block') {
		element.style.display = 'none';
		button.innerHTML = '+';
	}
	else {
		element.style.display = 'block';
		button.innerHTML = '-';
	}
	return false;
}
function testSSL() {
	var address = 'index.php?testssl&sslport=' + document.getElementById('sslport').value;
	var newwin = window.open(address, 'SSL test', 'toolbar=no, menubar=no, location=yes, directories=no, scrollbars=no, resizable=no, status=no, width=500, height=100');
//	var newport = newwin.getElementById('sslport').innerHTML;
//	alert(newport);
}
function testDB() {
	var dbhost = document.getElementById('dbhost').value;
	var dbuname = document.getElementById('dbuname').value;
	var dbupass = document.getElementById('dbupass').value;
	var dbname = document.getElementById('dbname').value;
	var address = 'index.php?testdb&dbhost=' + dbhost + '&dbuname=' + dbuname + '&dbpass=' + dbupass + '&dbname=' + dbname;
	var newwin = window.open(address, 'MySQL DB test', 'toolbar=no, menubar=no, location=yes, directories=no, scrollbars=no, resizable=no, status=no, width=500, height=100');
//	var newport = newwin.getElementById('sslport').innerHTML;
//	alert(newport);
}
function testFTP() {
	var fhost = document.getElementById('ftphost').value;
	var fport = document.getElementById('ftpport').value;
	var fname = document.getElementById('ftpname').value;
	var fpass = document.getElementById('ftppass').value;
	var froot = document.getElementById('ftproot').value;
	var address = 'index.php?testftp&host=' + fhost + '&port=' + fport + '&name=' + fname + '&pass=' + fpass + '&dir=' + froot;
	var newwin = window.open(address, 'FTP test', 'toolbar=no, menubar=no, location=yes, directories=no, scrollbars=no, resizable=no, status=no, width=500, height=100');
//	var newport = newwin.getElementById('sslport').innerHTML;
//	alert(newport);
}
-->
</script>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>WebGuru Publisher CMS Installation - <?php echo $mainstep; ?></h1>
    </div>
    <div id="leftbar">
    	<ul>
        	<li><a href="?step=1" class="<?php echo active(1); ?>" onclick="return checkStep(1);">Pre-installation check</a></li>
        	<li><a href="?step=2" class="<?php echo active(2); ?>" onclick="return checkStep(2);">License</a></li>
        	<li><a href="?step=3" class="<?php echo active(3); ?>" onclick="return checkStep(3);">Configuration</a></li>
        	<li><a href="?step=4" class="<?php echo active(4); ?>" onclick="return checkStep(4);">Finish installation</a></li>
        </ul>
    </div>
	<?php
    if (!empty($_SESSION["error"])) {
        echo '<div id="error">';
        foreach ($_SESSION["error"] as $key=>$message) {
            if ($message[1] == 0) $class = "errorred";
            if ($message[1] == 1) $class = "errororange";
            if ($message[1] == 2) $class = "errorgreen";
            ?>
            <p class="<?php echo $class; ?>"><?php echo $message[0]; ?></p>
            <?php
        }
        echo "</div>";
        $_SESSION["error"] = array();
    }
    ?>
    <div id="content">
	<?php
    if ($_SESSION['step'] == 1) include('./inc/step1c.php');
    elseif ($_SESSION['step'] == 2) include('./inc/step2c.php');
    elseif ($_SESSION['step'] == 3) include('./inc/step3c.php');
    elseif ($_SESSION['step'] == 4) include('./inc/step4c.php');
    else include('./inc/step1c.php');
    ?>
    </div>
    <div id="footer">
    	<p>Copyright &copy; 2008 <a href="http://www.webgurucms.com/">WebGuru Publisher CMS</a></p>
    </div>
</div>
<script type="text/javascript">
<!--
var js = document.getElementsByTagName('input');
for (tag in js) {
	if (tag.className == 'js') {
		tag.style.display = 'block';
		alert(tag.className);
	}
}
-->
</script>
</body>
</html>
