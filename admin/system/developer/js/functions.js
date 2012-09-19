var id = 0;
var mybase = '';

function addJoin(label, base) {
	mybase = base;
	var code = '<p><label>' + label + '</label>';
	code += '`<select name="joina[' + id + ']" id="joina' + id + '"></select>`.';
	code += '`<select name="cola[' + id + ']" id="cola' + id + '"></select>` ';
	code += '<select name="type[' + id + ']" id="type' + id + '">';
	code += '<option value="INNER JOIN">INNER JOIN</option> ';
	code += '</select> ';
	code += '`<select name="joinb[' + id + ']" id="joinb' + id + '"></select>`.';
	code += '`<select name="colb[' + id + ']" id="colb' + id + '"></select>`</p>';
	code += '<div id="wgdevajax' + (id + 1) + '"></div>';
	$('#wgdevajax' + id).html(code);
	$("#maintable").copyOptions('#joina' + id, 'all');
	$("#maintable").copyOptions('#joinb' + id, 'all');
	getTableColumns($('#joina' + id).val(), base, 'cola' + id);
	getTableColumns($('#joinb' + id).val(), base, 'colb' + id);
	$('#joina' + id).change(function (id) {
		alert(this.index);
		getTableColumns(this.value, mybase, 'cola' + id);
	});
	id++;
}

function reloadColA(table, base) {
	
}
