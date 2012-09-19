var wgTables = {
	
	vars: {
		oldText: null,
		element: null,
		counter: 0
	},
	
	init: function() {
	},
	
	initCheckBoxSelects: function(domPath) {
		$(domPath + ' tr').filter(':has(:checkbox:checked)').addClass('selected').end().click(function(event) {
			$(this).toggleClass('selected');
			if (event.target.type !== 'checkbox') {
				$(':checkbox', this).trigger('click');
			}
		});
	},
	
	setInputs: function(where) {
		$(where).click(function() {
			if (wgTables.vars.element != this) {
				if (wgTables.vars.element) $(wgTables.vars.element).html(wgTables.vars.oldText);
				wgTables.vars.oldText = $(this).html();
				$(this).html('<input type="text" id="wgTablesInputElement" readonly="readonly" value="' + wgTables.vars.oldText + '" />');
				wgTables.vars.element = this;
				$('#wgTablesInputElement').select();
			}
		});
	},
	
	setAllOddEven: function() {
		wgTables.setOddEven('table');
	},
	
	setOddEven: function(where) {
		$(where + ' tbody tr:odd').addClass('odd');
		$(where + ' tbody tr:even').addClass('even');
	},
	
	setAllRollOver: function() {
		wgTables.setRollOver('table');
	},
	
	setRollOver: function(where) {
		$(where + ' tbody tr').hover(
			function() {
				$(this).addClass('over');
				$(this).removeClass('out');
			},
			function() {
				$(this).removeClass('over');
				$(this).addClass('out');
			}
		);
	},
	
	initTableSort: function(domPath) {
		//$(domPath + ' tr td.moveUp a').click( function() { return false; } );	
		//$(domPath + ' tr td.moveDown a').click( function() { return false; } );	
		$(domPath + ' tr td.moveUp a').click(
			function() {
				return wgTables.moveUp(this);
			}
		);
		$(domPath + ' tr td.moveDown a').click(
			function() {
				return wgTables.moveDown(this);
			}
		);
	},
	
	moveUp: function(element) {
		wgTables._move(element, 1);
		//alert($(element).eq());
		return false;
	},
	
	moveDown: function(element) {
		wgTables._move(element, -1);
		//alert($(element).eq());
		return false;
	},
	
	_move: function(element, how) {
		var row = $(element).parent().parent().get();
		var tbody = $(element).parent().parent().parent().get();
		var newTB = tbody;
		tbody.sort();
		$(tbody).html('');
		$(tbody).html(newTB);
		//$(tbody).html(tbody);
	}
	
};