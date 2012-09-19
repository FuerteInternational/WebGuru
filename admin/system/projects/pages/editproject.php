<?php
// add something to the head of the page here
$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'editprojectprojectsitems';

// set default values for columns here
wgSystem::defPostValue(ProjectsItemsModel::COL_PROJECTS_CATEGORIES_ID, wgGet::getValue('cat'));
wgSystem::defPostValue(ProjectsItemsModel::COL_CLIENT, '');
wgSystem::defPostValue(ProjectsItemsModel::COL_LINK, '');

if (!(bool) wgGet::getValue('edit')) {
	$item = new ProjectsItemsModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = ProjectsItemsModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting main (projectsitemsa) -----------------------------
$block = 'projectsitemsa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLPROJECTSCATEGORIESID'] = formsHelper::getSelectBox('projects_categories_id', $item->getProjectsCategoriesId(), ProjectsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLCLIENT'] = $item->getClient();
$var['COLLINK'] = $item->getLink();
$var['FULLCOLDATE'] = formsHelper::getDateTimeBox('date', $item->getDate());

$var['IMAGE'] = moduleProjects::getMainImage($item->getId(), 'small', $item->getName());
$var['DELETEIMAGE'] = formsHelper::getCheckBox('deleteimg', 0);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('main'), true, $tpl->getBlock($block));


// ----------------------------- starting texts (projectsitemsb) -----------------------------
$block = 'projectsitemsb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLINFO'] = $item->getInfo();
$var['COLTEXT1'] = $item->getText1();
$var['COLTEXT2'] = $item->getText2();
$var['COLTEXT3'] = $item->getText3();
$var['COLTEXT4'] = $item->getText4();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('texts'), false, $tpl->getBlock($block));


// ----------------------------- starting seo (projectsitemsc) -----------------------------
$block = 'projectsitemsc';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLH1'] = $item->getH1();
$var['COLTITLE'] = $item->getTitle();
$var['COLMKEYWORDS'] = $item->getMkeywords();
$var['COLMDESCRIPTION'] = $item->getMdescription();
$var['COLH2'] = $item->getH2();
$var['COLH3'] = $item->getH3();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('seo'), false, $tpl->getBlock($block));



// ----------------------------- starting images (projectsitemsd) -----------------------------
$block = 'projectsitemsd';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
//*
$tab2 = new myTabs('insider');
$path2 = wgPaths::getModulePath().'/editproject/';
$files = wgIo::getFiles($path2);
$firstTab = 0;
foreach ($files as $file) {
	include($path2.$file);
	$firstTab++;
}
$var['ADDTABS'] = $tab2->getAll();
//*/
$arr = ProjectsImagesModel::getImagesForProject($item->getId());
if (!empty($arr)) foreach ($arr as $v) {
	$tpl->setCurrentBlock('imageslist');
	//$v = new ProjectsImagesModel();
	$vl = array();
	$vl['NAME'] = $v->getName();
	if ($v->getItemtype() == 0) $vl['THUMB'] = moduleProjects::getImage($item->getId(), $v->getSmallid(), 'xsmall', $v->getFilename());
	elseif ($v->getItemtype() == 1) $vl['THUMB'] = wgIcons::getFileIco($v->getFilename(), $v->getName());
	else $vl['THUMB'] = moduleProjects::getDefaultPicture('xsmall', $v->getName());
	$vl['VIEWS'] = $v->getViews();
	$vl['DOWNLOADS'] = $v->getDownloads();
	$vl['DOWNLOAD'] = wgIcons::getButton('filesave', $v->getName(), '#');
	$vl['EDITROW'] = wgIcons::getButton('edit', $v->getName(), wgPaths::makeTableEditLink($v->getId(), 'item='.$item->getId(), 'editimage'));
	$vl['DELETEROW'] = wgIcons::getButton('delete', $v->getName(), wgPaths::makeTableDeleteLink($v->getId(), 'edit='.$item->getId().'&amp;type=image&amp;act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($vl);
	$tpl->parseBlock('imageslist');
}


$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('attachments'), false, $tpl->getBlock($block));

/*

// ----------------------------- starting files (projectsitemse) -----------------------------
$block = 'projectsitemse';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLUPLOAD'] = backendHelper::getMultipleFileHtml(wgLang::get('file'), 5, 'projectsFiles');
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('files'), false, $tpl->getBlock($block));


// ----------------------------- starting videos (projectsitemsf) -----------------------------
$block = 'projectsitemsf';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLUPLOAD'] = backendHelper::getMultipleFileHtml(wgLang::get('video'), 2, 'projectsVideos');
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

//$tab->addTab($block, wgLang::get('videos'), false, $tpl->getBlock($block));

// ----------------------------- starting videos (projectsitemsg) -----------------------------
$block = 'projectsitemsg';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLUPLOAD'] = backendHelper::getMultipleTextHtml(wgLang::get('link'), 15, 'projectsLinks');
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

//$tab->addTab($block, wgLang::get('links'), false, $tpl->getBlock($block));

//*/

// --------------------------------- end content -----------------------------------
$block = 'pagetabscontainer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['EDIT'] = $item->getPrimaryKey();
// inserting tabs into the main template
$var['PAGETABSCONTENT'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>