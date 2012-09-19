<?php 
$conf = array();
$true = false;
if (file_exists('./config/config.php')) {
	include('./config/config.php');
	if ($conf['define']['develop'] != true) {
		header("HTTP/1.0 404 Not Found");
		print 'Access not allowed, please turn on the developers mode!';
		exit();
	}
	$ok = true;
}
$phpRecommendedSettings = array(array ('Safe Mode', 'safe_mode', true),
array ('Display Errors','display_errors', true),
array ('File Uploads','file_uploads', true),
array ('Magic Quotes GPC','magic_quotes_gpc', true),
array ('Magic Quotes Runtime','magic_quotes_runtime', false),
array ('Register Globals','register_globals', false),
array ('Output Buffering','output_buffering', false),
array ('Session auto start','session.auto_start', false),
);
function getPhpSetting($val) {
	$ret =  (ini_get($val) == '1' ? 1 : 0);
	return $ret ? 'ON' : 'OFF';
}
$class = 'red';
$exp = explode('.', phpversion());
if ($exp[0] >= 5 && $exp[1] >= 1 && $exp[2] >= 5) $class = 'green';
$phpver = '<span class="'.$class.'">'.phpversion().' (Minimum 5.1.5)</span>';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WebGuru3 Framework CMS - PHP Info page</title>
<style type="text/css">
.red {
	color: red;
	font-weight: bold;
}
.orange {
	color: orange;
	font-weight: bold;
}
.green {
	color: green;
	font-weight: bold;
}
</style>
</head>

<body>
<div class="center">
	<table border="0" cellpadding="3" width="600">
		<tbody>
			<tr class="h">
				<td>
				<a href="http://www.webgurucms.com/">
					<img src="http://www.webgurucms.com/assets/black-magic/img/logo.png" alt="WebGuru Logo" border="0" />
				</a>
				<h1 class="p">WebGuru3 Framework CMS</h1>
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	<hr />
	<h1><a href="http://www.webgurucms.com/">WebGuru3 Framework CMS</a></h1>
	<hr />
	<h2>Installation configuration</h2>
	<table border="0" cellpadding="3" width="600">
		<tbody>
			<tr>
				<td class="e" width="200">PHP version </td>
				<td class="v"><?php echo $phpver; ?></td>
			</tr>
			<tr>
				<td class="e">MySQL Support </td>
				<td class="v"><?php echo function_exists('mysql_connect') ? '<span class="green">YES' : '<span class="red">NO'; ?></span></td>
			</tr>
			<tr>
				<td class="e">Clever installer </td>
				<td class="v"><?php echo ini_get($val) ? '<span class="green">YES' : '<span class="green">YES, Files must be copied manually'; ?></span></td>
			</tr>
		</tbody>
	</table>
	<h2>Recommended settings</h2>
	<table border="0" cellpadding="3" width="600">
		<colgroup>
			<col style="width:50%;" />
			<col style="width:25%;" />
			<col style="width:25%;" />
		</colgroup>
		<tbody>
			<tr class="h">
				<th>Directive</th>
				<th>Recomended value</th>
				<th>Local value</th>
			</tr>
			<?php foreach ($phpRecommendedSettings as $res) {?>
			<tr>
				<td class="e"><?php echo $res[0]; ?></td>
				<td class="v"><?php echo $res[2] ? 'ON' : 'OFF'; ?></td>
				<td class="v">
					<?php
					$onoff = $res[2] ? 'ON' : 'OFF';
					if (getPhpSetting($res[1]) == $onoff) {
					?><span class="green"><?php
					}
					else {
					if ($res[1] == 'safe_mode') $color = 'red';
					else $color = 'red';
					?><span class="<?php echo $color; ?>"><?php
					}
					echo getPhpSetting($res[1]);
					?></span>
				</td>
			</tr>
			<?php } ?>
	    </tbody>
	</table>
	<h2>Important paths</h2>
	<table border="0" cellpadding="3" width="600">
		<tbody>
			<tr>
				<td class="e" width="200">Document root </td>
				<td class="v"><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
			</tr>
			<tr>
				<td class="e">Document addr </td>
				<td class="v"><?php echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?></td>
			</tr>
			<tr>
				<td class="e">Directories </td>
				<td class="v"><?php echo dirname($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); ?></td>
			</tr>
		</tbody>
	</table>
	<?php if ($ok) foreach ($conf as $group=>$arr) { ?>
	<h2>Configuration - <?php echo ucfirst($group); ?></h2>
	<table border="0" cellpadding="3" width="600">
		<tbody>
			<?php 
			foreach ($arr as $key=>$val) {
			if ($group == 'db' && $key == 'pass') $val = '**********';
			?><tr>
				<td class="e" width="200"><?php echo ucfirst($key); ?> </td>
				<td class="v"><?php echo $val; ?> </td>
			</tr><?php
			}
			?>
		</tbody>
	</table>
	<?php } ?>
</div>
<br /><br /><br />
<?php 
print phpinfo();
?>
</body>
</html>