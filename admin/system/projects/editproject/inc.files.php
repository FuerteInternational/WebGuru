<?php
$tpl2 = new wgParse($temp, $path);
$tpl2->setCurrentBlock('upload');

$var2['FULLUPLOAD'] = backendHelper::getMultipleFileHtml(wgLang::get('file'), 10, 'projectsFiles');

$tpl2->setVariable($var2);
$tpl2->parseBlock('upload');

$tab2->addTab('files', wgLang::get('documents'), $firstTab, $tpl2->getBlock('upload'));

?>