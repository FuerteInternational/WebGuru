<?php
$tpl2 = new wgParse($temp, $path);
$tpl2->setCurrentBlock('codes');

//$var2['FULLUPLOAD'] = backendHelper::getMultipleFileHtml(wgLang::get('image'), 10, 'projectsImages');
$var2['CODE'] = 'VideoCode';
$var2['ADDCODE'] = wgLang::get('videocode');
$tpl2->setVariable($var2);
$tpl2->parseBlock('codes');

$tab2->addTab('videocodes', wgLang::get('videocodes'), $firstTab, $tpl2->getBlock('codes'));

?>