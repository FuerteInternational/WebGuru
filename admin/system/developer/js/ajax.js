function getTableColumns(table, basepath, colObject) {
	var addr = basepath + 'ajax/getColumnsSelectBox.php?table=' + table;
	$('#' + colObject).ajaxAddOption(addr);
}
