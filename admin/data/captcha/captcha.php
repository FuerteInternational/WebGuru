<?php
chdir('../../');
$lenght = 6;
if (isset($_GET['lenght'])) $lenght = (int) $_GET['lenght'];
if (!(bool) $lenght) $lenght = 6;
require('init/init.basic.php');
//require('class.wgCaptcha.php');
$captcha = new wgCaptcha($lenght);
?>