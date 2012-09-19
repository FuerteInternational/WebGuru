<?php
header("Cache-Control: no-cache");
header("Pragma: nocache");
chdir('../../../');
require('init/init.basic.php');
wgModules::runModule('ratings');
echo moduleRatings::getRatingBarUpdate();
?>