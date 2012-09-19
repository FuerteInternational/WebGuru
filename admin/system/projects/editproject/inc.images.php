<?php
$tpl2 = new wgParse($temp, $path);
$tpl2->setCurrentBlock('upload');

$var2['FULLUPLOAD'] = backendHelper::getMultipleFileHtml(wgLang::get('image'), 1, 'projectsImages');

$tpl2->setVariable($var2);
$tpl2->parseBlock('upload');
if ($firstTab == 1) $true = true;
else $true = false;
$tab2->addTab('images', wgLang::get('images'), $true, $tpl2->getBlock('upload'));

?>