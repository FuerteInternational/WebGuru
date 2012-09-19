<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');
//print_r($_POST);
$params = array();
$var['ACTIONNAME'] = 'editformsformsitems';
wgSystem::setPostValue('recipient', NULL);
// set default values for columns here
wgSystem::defPostValue(FormsItemsModel::COL_MAILFIELD, 'email');
wgSystem::defPostValue(FormsItemsModel::COL_FORMS_MESSAGES_GROUP_ID, '');
wgSystem::defPostValue(FormsItemsModel::COL_ADMINMAIL, wgUsers::getMail());
wgSystem::defPostValue(FormsItemsModel::COL_OKMESSAGE, 'Your message has been sent');
wgSystem::defPostValue(FormsItemsModel::COL_ERRORMESSAGE, 'Please try again later');
wgSystem::defPostValue(FormsItemsModel::COL_WARNINGMESSAGE, '');
wgSystem::defPostValue(FormsItemsModel::COL_REDIRECT, '');
wgSystem::defPostValue(FormsItemsModel::COL_USEHTML, 0);
wgSystem::defPostValue(FormsItemsModel::COL_MAILHTML, '');
wgSystem::defPostValue(FormsItemsModel::COL_USETXT, 0);
wgSystem::defPostValue(FormsItemsModel::COL_MAILTXT, '');
wgSystem::defPostValue(FormsItemsModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(FormsItemsModel::COL_TEMPLATE, '<form action="" method="post">
	<p>
		<label class="required">Your Name an Surname:</label>
		<input name="name" value="{NAME}" type="text">
	</p>
	<p>
		<label class="required">Your E-Mail:</label>

		<input name="email" value="{EMAIL}" type="text">
	</p>
	<p>
		<label class="required" for="subject">Subject of message:</label>
		<input name="subject" value="{SUBJECT}" type="text">
	</p>
	<p>

		<label class="required" for="message">Message:</label>
		<textarea name="message" cols="50" rows="9">{MESSAGE}</textarea>
	</p>
	<p>
		<label class="required" for="captcha">Verification code:</label>
		{CAPTCHAIMG}
	</p>
	<p>
		<label class="required" for="captcha">Enter verification code:</label>
		<input name="captcha" value="" type="text">
	</p>
	<p>
		<!-- submitqform field must be used to identify the form -->
		<input name="submitqform" value="{IDFORM}" type="hidden">
		<input name="reset" value="Cancel" type="reset">
		<input name="submit" value="Submit" type="submit">
	</p>

</form>
<p>* All form fields in red are required fields</p>');

if (!(bool) wgGet::getValue('edit')) {
	$item = new FormsItemsModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = FormsItemsModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting form (formsitemsa) -----------------------------
$block = 'formsitemsa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//$var = array();
$params = array();
$params['baseclass'] = 'SystemLanguageModel';
$var['FULLCOLSYSTEMLANGUAGEID'] = formsHelper::getSelectBox('system_language_id', $item->getSystemLanguageId(), SystemLanguageModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$var['COLMAILFIELD'] = $item->getMailfield();
$params = array();
$params['baseclass'] = 'FormsMessagesGroupsModel';
$var['FULLCOLFORMSMESSAGESGROUPID'] = formsHelper::getSelectBox('forms_messages_group_id', $item->getFormsMessagesGroupId(), FormsMessagesGroupsModel::doSelect(), $params);
$var['COLADMINMAIL'] = $item->getAdminmail();
$var['COLOKMESSAGE'] = $item->getOkmessage();
$var['COLERRORMESSAGE'] = $item->getErrormessage();
$var['COLWARNINGMESSAGE'] = $item->getWarningmessage();
$var['COLREDIRECT'] = $item->getRedirect();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('form'), true, $tpl->getBlock($block));

// ----------------------------- starting recipients (formsitemsb) -----------------------------
$block = 'recipients';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//$var = array();
$var['COLID'] = $item->getId();
$arr = FormsRecipientsModel::getRecipientsForForm($item->getId());
$v = array();
foreach ($arr as $r) {
	$v = array();
	$tpl->setCurrentBlock('recipientslist');
	$v['RECIPIENT'] = $r->getMail();
	$v['DELROW'] = wgIcons::getIcon('close', wgLang::get('close'));
	$tpl->setVariable($v);
	$tpl->parseBlock('recipientslist');
}
$var['DELROW'] = wgIcons::getIcon('close', wgLang::get('close'));
$var['FULLUSEHTML'] = formsHelper::getCheckBox('usehtml', $item->getUsehtml());
$var['FULLUSETXT'] = formsHelper::getCheckBox('usetxt', $item->getUsetxt());
$var['COLMAILHTML'] = wgParse::decode($item->getMailhtml());
$var['COLMAILTXT'] = wgParse::decode($item->getMailtxt());
$var = wgSystem::getFormCallback($var);

$v = NULL;

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('recipients'), false, $tpl->getBlock($block));

// ----------------------------- starting template (formsitemsc) -----------------------------
$block = 'formsitemsc';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['COLTEMPLATE'] = wgParse::decode($item->getTemplate());
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('template'), false, $tpl->getBlock($block));

// ----------------------------- starting fields (formsitemsd) -----------------------------
$block = 'formsitemsd';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['URL'] = wgPaths::getModulePath('url').'ajax/getFField.php?id=5';
$var['COLID'] = $item->getId();
$html = NULL;
$arr = FormsFieldsModel::getFieldsForForm($item->getId());
foreach ($arr as $ff) {
	include(wgPaths::getModulePath().'data/field-temp.php');
	$html .= $data;
}
$var['FIELDS'] = $html;
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('fields'), false, $tpl->getBlock($block));

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