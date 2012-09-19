<?php
session_start();
require('./libs/class.wgIo.php');
$arr = wgIo::getFiles('../includes/locale/');
//print_r($arr);
if (isset($_REQUEST['file']) && $_REQUEST['pass'] == 'hulahula') $_SESSION['myfile'] = $_REQUEST['file'];
if (isset($_SESSION['myfile'])) {
	if (isset($_REQUEST['def'])) {
		//print_r($_REQUEST['def']);
		$newfile = './versions/backup.'.date('Y-m-d_H-i-s').'.'.$_SESSION['myfile'];
		wgIo::copy('../includes/locale/'.$_SESSION['myfile'], $newfile);
		if (!file_exists($newfile)) echo '<h2 style="color:red;">Backup was not created, can\'t save the translations</h2>';
		else {
			$new = '<?php
$LANGUAGE_TEXT = array();

';
			foreach ($_REQUEST['def'] as $file=>$definitions) {
				$new .= '$LANGUAGE_TEXT[$LANGUAGE_ID]["'.$file.'"] = Array
	(
				
';
				$count = count($definitions);
				foreach ($definitions as $k=>$d) {
					if ($count > 1) $coma = ',';
					else $coma = '';
					$d = str_ireplace("'", "\'", stripslashes(($d)));
					$new .= "\t\t'$k' => '$d'".$coma."\r\n";
					$count--;
				}
				
				$new .= ');'."\r\n\r\n";
			}
			$new .= '

?>';
			wgIo::writeFile('../includes/locale/'.$_SESSION['myfile'], $new, 'w');
			echo '<h2 style="color:green;">File has been saved, backup created :-)</h2>';
		}
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Language administration tool</title>
</head>
<body>
<form action="" method="post">
	<p>
		<label>Please Select language file:</label>
		<select name="file">
			<?php 
			foreach ($arr as $f) {
				if ($f == $_SESSION['myfile']) $selected = ' selected="selected"';
				else $selected = NULL;
				echo '<option value="'.$f.'"'.$selected.'>'.$f.'</option>';
			}
			?>
		</select>
	</p>
	<p>
		<label>Top secret password:</label>
		<input type="password" name="pass" value="" />
	</p>
	<p>
		<button type="submit">Select</button>
	</p>
</form>
<form action="" method="post">
<?php
$LANGUAGE_ID = 'en';
if (file_exists('../includes/locale/en.inc.php')) include('../includes/locale/en.inc.php');
$en = &$LANGUAGE_TEXT[$LANGUAGE_ID];
$LANGUAGE_ID = 'editor';
if (isset($_SESSION['myfile']) && !empty($_SESSION['myfile'])) {
	$path = '../includes/locale/'.$_SESSION['myfile'];
	if (file_exists($path)) include($path);
}
if (isset($LANGUAGE_TEXT) && !empty($LANGUAGE_TEXT)) {
	//print_r($LANGUAGE_TEXT);
	foreach ($LANGUAGE_TEXT[$LANGUAGE_ID] as $page=>$definitions) {
		echo '<p>&nbsp;</p><table style="text-align:left; width:100%;">
	<caption style="font-weight:bold; font-size:140%;">'.$page.'</caption>
	<colgroup>
		<col />
		<col />
	</colgroup>
	<thead>
		<tr>
			<th>Code</th>
			<th>Definition</th>
		</tr>
	</thead>
	<tbody>
		';
		foreach ($definitions as $k=>$d) {
			if (isset($en[$page][$k])) $orig = $en[$page][$k];
			else $orig = '';
			echo '<tr>
			<td style="width:30%">'.$k.'</td>
			<td><input type="text" name="def['.$page.']['.$k.']" value="'.str_ireplace('&', '&amp;', ($d)).'" style="width:100%" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><i style="color:#666;">'.$orig.'</i></td>
		</tr>
		';
		}
		echo '</tbody>
</table>
<p>
	<button type="submit">Save</button>
</p>
';
	}
}
?>
</form>
</body>
</html>