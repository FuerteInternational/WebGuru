<?php
/*
chdir('../../../');
require('init/init.basic.php');
require('init/init.admin.php');
//*/
$read = true;
if (isset($ff)) if (is_a($ff, 'FormsFieldsModel')) $read = false; 
if ((bool) $read) {
	if (!isset($formfieldid)) $id = (int) wgGet::getValue('id');
	else $id = (int) $formfieldid;
	if (!(bool) $id) {
		$ff = new FormsFieldsModel();
		$ff->setNullResults();
	}
	else $ff = FormsFieldsModel::doSelectPKey($id);
}

$var = array();
if ((bool) $ff->getId()) $id = $ff->getId();
else $id = rand(9999999999, 999999999999999);
$var['RAND'] = $id;
$var['FNAME'] = $ff->getName();
$var['FLABEL'] = $ff->getLabel();
$var['ERRMESAGE'] = $ff->getErrmessage();
$var['SORT'] = $ff->getSort();
$var['FTYPES'] = formsHelper::getSelectBox('qfields[type]['.$id.']', $ff->getType(), FormsFieldsModel::getFFTypes(), array('id'=>'ftype'.$id));
$var['FVALS'] = formsHelper::getSelectBox('qfields[valid]['.$id.']', $ff->getSystemValidationId(), SystemValidationsModel::getValidationTypes(), array('id'=>'vtype'.$id), wgLang::get('novalid'));
$var['ERRTYPES'] = formsHelper::getSelectBox('qfields[errtype]['.$id.']', $ff->getErrorgroup(), FormsFieldsModel::getFErrorTypes(), array('id'=>'etype'.$id), wgLang::get('noerror'));
$data = wgIo::readFile(wgPaths::getModulePath().'data/field-temp.html');
$data = wgParse::parseVarTemplate($data, $var);
?>