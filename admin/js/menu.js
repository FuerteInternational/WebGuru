var wgMenu = {
	
	config: {
		imageFolder    : 'icons/',
		imagePlus      : 'plus.png',
		imageMinus     : 'minus.png',
		headerTag      : 'h4',
		toggleTime     : 100
	},
	
	_vars: {
		instances: 0	
	},
	
	initMenuHeader: function(id, instanceName) {
		if (instanceName == undefined) {
			instanceName = 'wgMenuInst' + wgMenu._vars.instances;
			wgMenu._vars.instances++;
		}
		$(id + ' ' + wgMenu.config.headerTag).css('cursor', 'pointer');
		wgMenu._setFromCookies(id + ' ' + wgMenu.config.headerTag);
		$(id + ' ' + wgMenu.config.headerTag).click(
			function() {
				if ($(this).next().is(':hidden')) wgMenu._setHeader(this, 'minus');
				else wgMenu._setHeader(this, 'plus');
			}			
		);
	}, 

	_setHeader: function(element, img) {
		var cont = $(element).children('span').html();
		if (img == 'minus') {
			$(element).next().show(wgMenu.config.toggleTime);
			var image = wgMenu.config.imageMinus;
			var state = 1;
		}
		else {
			$(element).next().hide(wgMenu.config.toggleTime);
			var image = wgMenu.config.imagePlus;
			var state = 2;
		}
		$(element).html('<span>' + cont + '</span> <img src="' + wgMenu.config.imageFolder + image + '" alt="" />');
		var id = $(element).parent().attr('id');
		$.cookie('wgMenu' + id, state);
	},
	
	_setFromCookies: function(domPath) {
		$(domPath).each(
			function(i) {
				if (!$(this).parent().attr('id')) {
					var id = 'wgBlock' + wgMenu._vars.instances + 'el' + i;
					$(this).parent().attr('id', id)
				}
				else {
					var id = $(this).parent().attr('id');
				}
				if ($.cookie('wgMenu' + id) == 1) {
					wgMenu._setHeader(this, 'minus');
				}
				else if ($.cookie('wgMenu' + id) == 2) {
					wgMenu._setHeader(this, 'plus');
				}
				else wgMenu._setHeader(this, 'minus');;
			}
		);
	}
};