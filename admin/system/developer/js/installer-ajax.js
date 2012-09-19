function getTableColumns(table, basepath, colObject) {
	var addr = basepath + 'ajax/getColumnsSelectBox.php?table=' + table;
	$('#' + colObject).removeOption(/./);
	$('#' + colObject).ajaxAddOption(addr);
}

function getModuleTables(module, addr) {
	var path = addr + 'ajax/getTablesTable.php?module=' + module;
	$("#tablelist").load(path);
}
