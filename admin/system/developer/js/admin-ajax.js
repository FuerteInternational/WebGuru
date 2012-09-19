var idtabs = 0;

function getModulePages(module, addr, objname) {
	var path = addr + 'ajax/getPages.php?module=' + module;
	$('#' + objname).removeOption(/./);
	$('#' + objname).ajaxAddOption(path);
	if (idtabs > 0) {
		alert(idtabs);
		for (i=0; i<=idtabs; i++) {
			alert(i);
			//alert($('#efields' + i).selectedOptions());
			$('#efields').copyOptions('#efields' + i, 'all');
			$('#efields' + i).selectOptions(0, true);
		}
	}
}

var firstItemInParent = null;

function getModulePagesWFI(module, addr, objname) {
	if (firstItemInParent == null) firstItemInParent = $('#' + objname).html();
	var path = addr + 'ajax/getPages.php?module=' + module;
	$('#' + objname).removeOption(/./);
	$('#' + objname).html(firstItemInParent);
	$('#' + objname).ajaxAddOption(path);
}

function addTab(tabs, tabfunction, tabname, editfields) {
	var code = '';
	code += '<fieldset><legend>' + tabs + '</legend><p>';
	code += '<label>' + tabfunction + ':</label> ';
	code += '<select name="createtab[]" id="createtab' + idtabs + '" onchange="checkTab(this.value, ' + idtabs + ');">';
	code += '</select></p>';
	code += '<p><label>' + tabname + ':</label> ';
	code += '<input name="tabname[]" id="tabname' + idtabs + '" type="text" value="" />';
	code += '</p>';
	code += '<p><label>' + editfields + ':</label> ';
	code += '<select name="efields[]" id="efields' + idtabs + '"></select>';
	code += '</p>';
	code += '<div id="tabbox' + (idtabs + 1) + '"></div>';
	$('#tabbox' + idtabs).html(code);
	//$('#createtab').copyOptions('#createtab' + idtabs, 'all');
	$('#createtab' + idtabs).html($('#createtab').html());
	$('#efields').copyOptions('#efields' + idtabs, 'all');
	$('#efields' + idtabs).selectOptions(0, true);
	idtabs++;
}

function addOneTab(tabs, name) {
	var code = '';
	code += '<p>';
	code += '<label>' + tabs + ':</label> ';
	code += '<select name="createtab[]" id="createtab' + idtabs + '" onchange="checkTab(this.value, ' + idtabs + ');">';
	code += '</select> ';
	code += '<span>' + name + ':</span> ';
	code += '<input name="tabname[]" id="tabname' + idtabs + '" type="text" value="" />';
	code += '</p>';
	code += '<div id="tabonebox' + (idtabs + 1) + '"></div>';
	$('#tabonebox' + idtabs).html(code);
	//$('#createtab').copyOptions('#createtab' + idtabs, 'all');
	$('#createtab' + idtabs).html($('#createtab').html());
	idtabs++;
}

function checkTab(value, id) {
	
}

function addFileFunc() {
	$('#pageadminform').show();
	clearEditPage();
	
}

function editPage(module, page, addr) {
	var path = addr + 'ajax/getFileContent.php?module=' + module + '&file=';
	$('#filename').val(page);
	$('#origname').val(page);
	$('#origmod').val(module);
	$.get(path + 'templates/' + page + '.html', function(data) {
		$('#htmlcontent').val(data);
	});
	$.get(path + 'pages/' + page + '.php', function(data) {
		$('#phpcontent').val(data);
	});
	$('#pageadminform').show();
}

function clearEditPage() {
	$('#filename').val('');
	$('#origname').val('');
	$('#origmod').val('');
	$('#htmlcontent').val('');
	$('#phpcontent').val('');
}

function getModulePagesTable(module, addr) {
	var path = addr + 'ajax/getPagesTable.php?module=' + module;
	$('#modulepages').load(path);
	clearEditPage();
	$('#pageadminform').hide();
}
var myId = 0;
var tableOne = '';
var moduleOne = '';
var addrOne = '';
function getTableColumnChB(table, module, addr, val) {
	if (val != 'x') myId = val;
	var path = addr + 'ajax/getTableColumnCheckbox.php?module=' + module + '&table=' + table + '&id=' + myId;
	$('#tabonebox' + myId).load(path);
	myId++;
}
function deleteTab(id) {
	$('#tabonebox' + id).html('');
}
function setOneType(type) {
	$('#onetype').val(type);
}