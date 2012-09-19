<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'editimageprojectsimages';

// set default values for columns here
wgSystem::defPostValue(ProjectsImagesModel::COL_NAME, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_FILENAME, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_TEXT1, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_TEXT2, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_TEXT3, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_VIEWS, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_DOWNLOADS, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_SIZE, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_SORT, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_H1, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_TITLE, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_MDESCRIPTION, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_MKEYWORDS, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_H2, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_H3, '');
wgSystem::defPostValue(ProjectsImagesModel::COL_TEXT4, '');

if (!(bool) wgGet::getValue('edit')) {
	$item = new ProjectsImagesModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = ProjectsImagesModel::doSelectPKey(wgGet::getValue('edit'));


// ----------------------------- starting settings (projectsimagesa) -----------------------------
$block = 'projectsimagesa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLFILENAME'] = $item->getFilename();
$var['COLTEXT1'] = $item->getText1();
$var['COLTEXT2'] = $item->getText2();
$var['COLTEXT3'] = $item->getText3();
$var['COLVIEWS'] = $item->getViews();
$var['COLDOWNLOADS'] = $item->getDownloads();
$var['COLSIZE'] = $item->getSize();
$var['COLSORT'] = $item->getSort();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('settings'), true, $tpl->getBlock($block));


// ----------------------------- starting seo (projectsimagesb) -----------------------------
$block = 'projectsimagesb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLH1'] = $item->getH1();
$var['COLTITLE'] = $item->getTitle();
$var['COLMDESCRIPTION'] = $item->getMdescription();
$var['COLMKEYWORDS'] = $item->getMkeywords();
$var['COLH2'] = $item->getH2();
$var['COLH3'] = $item->getH3();
$var['COLTEXT4'] = $item->getText4();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('seo'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'pagetabscontainer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['EDIT'] = $item->getPrimaryKey();
$var['ITEMID'] = (int) wgSystem::getRequestValue('item');
// inserting tabs into the main template
$var['PAGETABSCONTENT'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>