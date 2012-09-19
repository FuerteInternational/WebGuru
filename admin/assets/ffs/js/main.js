$(document).ready( function() {
	pixelpage.init();
	wgTables.setOddEven('#content table');
	wgTables.setRollOver('#content table');
	wgTables.setInputs('#content table td.wgcode');
	wgForms.initFocus('#content .box form p');
	wgMenu.initMenuHeader('#menu .box', 'h4');
	wgTables.initTableSort('#content table');
	//wgTables.initCheckBoxSelects('#content table');
});


var pixelpage = {
	
	init: function() {
		$('#loginstat').hide();
		$('#dialogwindow').hide();
		pixelpage._initLogin();
		pixelpage._initWindow();
		pixelpage._initSitemapLinks();
		pixelpage._initBasicValidations();
		pixelpage._initExternalLinks();
		pixelpage._initPopupLinks();
		pixelpage._initFooterLinks();
		pixelpage._initTime('#acttime', '#actdate');
		//pixelpage._initAjaxLinks('#wgFunctions a.ajax');
		pixelpage.vars.pageWidth = document.documentElement.clientWidth;
		pixelpage.vars.pageHeight = document.documentElement.clientHeight;
		pixelpage._initMaximization('.maximizable', '#maxplacement');
	},
	
	vars: { 
		pageWidth: 0,
		pageHeight: 0,
		maxButton: '',
		maxArea: '',
		maxOrWidth: 0,
		maxOrHeight: 0,
		maxImgPath: '',
		maxImgPlus: '',
		maxImgMinus: ''
	},
	
	_initMaximization: function(domPath, buttonPath) {
		pixelpage.vars.maxImgPath = wgConfig.define.webroot + wgConfig.define.adminfolder + 'icons/';
		pixelpage.vars.maxImgPlus = '<img src="' + pixelpage.vars.maxImgPath + 'window_fullscreen.png" alt="" />';
		pixelpage.vars.maxImgMinus = '<img src="' + pixelpage.vars.maxImgPath + 'window_nofullscreen.png" alt="" />';
		pixelpage.vars.maxArea = domPath;
		pixelpage.vars.maxButton = buttonPath;
		pixelpage.vars.maxOrWidth = $(domPath).width();
		pixelpage.vars.maxOrHeight = $(domPath).height();
		var newValue;
		if ($.cookie('wgContentMax') == 1) {
			newValue = 'min';
			pixelpage._maximize();
		}
		else newValue = 'max';
		$(buttonPath).html('<span class="left">' + $(buttonPath).html() + '</span><span class="wgmaximize ' + newValue + '"></span>');
		
		$(buttonPath + ' .wgmaximize.max').html(pixelpage.vars.maxImgPlus);
		$(buttonPath + ' .wgmaximize.min').html(pixelpage.vars.maxImgMinus);
		pixelpage._maxMinProcess();
	},
	
	_maxMinProcess: function() {
		$(pixelpage.vars.maxButton + ' .wgmaximize.max').click( function () {
			pixelpage._maximize();
		});
		$(pixelpage.vars.maxButton + ' .wgmaximize.min').click( function () {
			pixelpage._minimize();
		});
	},
	
	_maximize: function() {
		$(pixelpage.vars.maxArea).addClass('maximized');
		$(pixelpage.vars.maxButton + ' .wgmaximize').addClass('min');
		$(pixelpage.vars.maxButton + ' .wgmaximize').removeClass('max');
		$(pixelpage.vars.maxButton + ' .wgmaximize.min').html(pixelpage.vars.maxImgMinus);
		$(pixelpage.vars.maxArea).css('width', pixelpage.vars.pageWidth + 'px');
		var height = pixelpage.vars.pageHeight;
		if (height < pixelpage.vars.maxOrHeight) height = pixelpage.vars.maxOrHeight;
		$(pixelpage.vars.maxArea).css('height', height + 'px');
		$.cookie('wgContentMax', 1);
		pixelpage._maxMinProcess();
	},
	
	_minimize: function() {
		$(pixelpage.vars.maxArea).css('width', pixelpage.vars.maxOrWidth + 'px');
		$(pixelpage.vars.maxArea).css('height', pixelpage.vars.maxOrHeight + 'px');
		$(pixelpage.vars.maxArea).removeClass('maximized');
		$(pixelpage.vars.maxButton + ' .wgmaximize').addClass('max');
		$(pixelpage.vars.maxButton + ' .wgmaximize').removeClass('min');
		$(pixelpage.vars.maxButton + ' .wgmaximize.max').html(pixelpage.vars.maxImgPlus);
		$.cookie('wgContentMax', 0);
		pixelpage._maxMinProcess();
	},
	
	_initAjaxLinks: function(domPath) {
		$(domPath).click(
			function() {
				var href = this.href;
				var newHref = href.replace(wgConfig.define.webroot + wgConfig.define.adminfolder, '');
				$('#content').load(wgConfig.define.webroot + wgConfig.define.adminfolder + 'data/runAjaxPage.php' + newHref);
				return false;
			}						  
		);
	},
	
	vars: {
		origText: '',
		loadStatus: false
	},
	
	generateWeb: function(generating, SSID) {
		pixelpage.vars.origText = $('#generateweb span').html();
		$('#generateweb span').html(generating);
		$('#generateweb').attr('disabled', 'disabled');
		$('#generateInfo').removeClass('green');
		$('#generateInfo').addClass('red');
		$('#generateInfo').html('10 / 55');
		pixelpage.vars.loadStatus = true;
		var xh = jQuery.get("./system/pages/ajax/generateWeb.php", { wgssid: SSID, part: 'system', mod: 'pages' }, function(data){
			pixelpage.vars.loadStatus = false;
		});
		pixelpage._loadGenStatus(SSID);
		return false;
	},
	
	_loadGenStatus: function(SSID) {
		if (pixelpage.vars.loadStatus) {
			$('#generateInfo').load('../temp/' + SSID + '-generate.wgtmp');
			setTimeout('pixelpage._loadGenStatus("' + SSID + '")', 500);
		}
		else {
			$('#generateInfo').addClass('green');
			$('#generateInfo').removeClass('red');
			$('#generateweb span').html(pixelpage.vars.origText);
			$('#generateweb').attr('disabled', null);
			$('#generateInfo').html('Ok');
		}
	},
	
	_initTime: function(time, date) {
		var now = new Date();
		var curHour = now.getHours();
		var curMin = now.getMinutes();
		var curSec = now.getSeconds();
		if (time) $(time).html(((curHour < 10) ? "0" : "") + curHour + ":" + ((curMin < 10) ? "0" : "") + curMin + ":" + ((curSec < 10) ? "0" : "") + curSec);
		if (date) {
			var year = now.getYear();
		    if(year < 1000) year += 1900;
			$(date).html(now.getDate() + ". " + (now.getMonth()+1) + ". " + year);
		}
		setTimeout('pixelpage._initTime("' + time + '", "' + date + '")', 1000);
	},

	
	_initExternalLinks: function() {
		$('a.ext').click(function() {
			window.open(this.href);
			return false;
		});
	},
	
	_initFooterLinks: function() {
		$('#wgautofooter a').click(function() {
			var html = pixelpage._getIframe(this.href);
			pixelpage._showDialogWindow(html);
			return false;
		});
	},
	
	_getIframe: function(url) {
		var html = '<iframe src="' + url + '" style="height:' + (screen.height-550) + 'px;"></iframe>';
		return html;
	},
	
	_showDialogWindow: function(data) {
		if (!$('#dialogwindow').is(':hidden')) $('#dialogwindow').hide(100);
		$('#dialogwindow .content').html(data);
		$('#dialogwindow').show(100);
	},
	
	_initPopupLinks: function(object) {
		$('a.popup').click(function() {
			var html = pixelpage._getIframe(this.href);
			pixelpage._showDialogWindow(html);
			return false;
		});
	},
	
	doCorners: function(object) {
		settings = {
		  tl: { radius: 20 },
		  tr: { radius: 20 },
		  bl: { radius: 20 },
		  br: { radius: 20 },
		  antiAlias: true,
		  autoPad: false
		}
	
		var divObj = document.getElementById('loginstat');
	
		var cornersObj = new curvyCorners(settings, divObj);
		cornersObj.applyCornersToAll();
	},
	
	_initBasicValidations: function() {
		$("#navsubscribe").validate({
				rules: {
					emailfield: {
						required: true,
						mail: true
					}
				},
				messages: {
				mail: "Please enter a valid email address."
			}
		});
	},
	
	_initSitemapLinks: function() {
		$('.sitemaplink').click(function() {
			//$('#dialogwindow').hide(100);
			//if ($('#dialogwindow').is(':hidden')) $('#dialogwindow .content').html(':-)');
			var html = 'this is my sitemap :-)';
			if ($('#dialogwindow').is(':hidden')) pixelpage._showDialogWindow(html);
			return false;
		});
	},
	
	_initLogin: function() {
		$('#wgInsert').hide();
		$('#wgInsert').html('');
		$('#toplogin').click(function() {
			$('#wgInsert').addClass('shadow');
			$('#wgInsert').fadeIn(100);
			$('#loginstat').toggle(100);
			//pixelpage.doCorners('loginstat');
			return false;
		});
		$('#loginstat .close').click(function() {
			$('#wgInsert').fadeOut(100);
			$('#loginstat').hide(100);
			return false;
		});
	},
	
	_initWindow: function() {
		$('#dialogwindow .close').click(function() {
			$('#dialogwindow').hide(100);
			return false;
		});
	}

	

};