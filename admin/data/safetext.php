<?php
$start = microtime();
chdir('../');
require('./init/init.basic.php');
echo wgText::safeText(wgSystem::getValue('text'));
?>