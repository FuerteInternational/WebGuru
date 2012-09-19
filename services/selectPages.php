<?php require('./inc.main.php'); ?><?php
$res = true;
$error = NULL;
$data = NULL;
set_time_limit(0);
$arr = PagesModel::doSelect();
$count = (int) count($arr);
$c = $count;

foreach ($arr as $k=>$v) {
	$c--;
	if ($c <= 0) $comma = NULL;
	else $comma = ',';
	$data .= '{ "id": '.(int) $v->getId().', "system_websites_id": '.(int) $v->getSystemWebsitesId().', "system_language_id": '.(int) $v->getSystemLanguageId().', "pages_templates_id": '.(int) $v->getPagesTemplatesId().', "revision": '.(int) $v->getRevision().', "name": "'.(string) wgText::encodeJsonText($v->getName()).'", "identifier": "'.(string) wgText::encodeJsonText($v->getIdentifier()).'", "title": "'.(string) wgText::encodeJsonText($v->getTitle()).'", "heading1": "'.(string) wgText::encodeJsonText($v->getHeading1()).'", "heading2": "'.(string) wgText::encodeJsonText($v->getHeading2()).'", "heading3": "'.(string) wgText::encodeJsonText($v->getHeading3()).'", "rewrite": "'.(string) wgText::encodeJsonText($v->getRewrite()).'", "keywords": "'.(string) wgText::encodeJsonText($v->getKeywords()).'", "description": "'.(string) wgText::encodeJsonText($v->getDescription()).'", "addtext1": "'.(string) wgText::encodeJsonText($v->getAddtext1()).'", "addtext2": "'.(string) wgText::encodeJsonText($v->getAddtext2()).'", "enabled": '.(int) $v->getEnabled().', "master": '.(int) $v->getMaster().', "parentid": '.(int) $v->getParentid().', "home": '.(int) $v->getHome().', "sort": '.(int) $v->getSort().', "head": "'.(string) wgText::encodeJsonText($v->getHead()).'", "page": "'.(string) wgText::encodeJsonText($v->getPage()).'", "note": "'.(string) wgText::encodeJsonText($v->getNote()).'", "redirect1": '.(int) $v->getRedirect1().', "redirect2": '.(int) $v->getRedirect2().', "redirect3": "'.(string) wgText::encodeJsonText($v->getRedirect3()).'", "redirect4": "'.(string) wgText::encodeJsonText($v->getRedirect4()).'" }'.$comma; 
}
?>{
	"result": <?php echo (int) $res; ?>,
	"error": "<?php echo $error; ?>",
	"count": <?php echo (int) $count; ?>,
	"table": "pages",
	"structure": [ { "type": "INTEGER", "name": "id", "extra": "" }, { "type": "INTEGER", "name": "system_websites_id", "extra": "" }, { "type": "INTEGER", "name": "system_language_id", "extra": "" }, { "type": "INTEGER", "name": "pages_templates_id", "extra": "" }, { "type": "INTEGER", "name": "revision", "extra": "" }, { "type": "VARCHAR", "name": "name", "extra": "" }, { "type": "VARCHAR", "name": "identifier", "extra": "" }, { "type": "VARCHAR", "name": "title", "extra": "" }, { "type": "VARCHAR", "name": "heading1", "extra": "" }, { "type": "VARCHAR", "name": "heading2", "extra": "" }, { "type": "VARCHAR", "name": "heading3", "extra": "" }, { "type": "VARCHAR", "name": "rewrite", "extra": "" }, { "type": "TEXT", "name": "keywords", "extra": "" }, { "type": "TEXT", "name": "description", "extra": "" }, { "type": "VARCHAR", "name": "addtext1", "extra": "" }, { "type": "VARCHAR", "name": "addtext2", "extra": "" }, { "type": "INTEGER", "name": "enabled", "extra": "" }, { "type": "INTEGER", "name": "master", "extra": "" }, { "type": "INTEGER", "name": "parentid", "extra": "" }, { "type": "INTEGER", "name": "home", "extra": "" }, { "type": "INTEGER", "name": "sort", "extra": "" }, { "type": "TEXT", "name": "head", "extra": "" }, { "type": "TEXT", "name": "page", "extra": "" }, { "type": "TEXT", "name": "note", "extra": "" }, { "type": "INTEGER", "name": "redirect1", "extra": "" }, { "type": "INTEGER", "name": "redirect2", "extra": "" }, { "type": "VARCHAR", "name": "redirect3", "extra": "" }, { "type": "VARCHAR", "name": "redirect4", "extra": "" } ],
	"data": [ <?php echo $data; ?> ]
}<?php ?>