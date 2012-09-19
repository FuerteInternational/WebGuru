var wgForms = {
	
	_domPath: '',
	
	isSafari: function() {
		if (navigator.userAgent.toLowerCase().indexOf('applewebkit') == -1) return false;
		else return true;
	},
	
	initFocus: function(domPath) {
		wgForms._domPath = domPath;
		$(domPath + ' input[type="text"]').focus(function() { wgForms.setFocus(this); });
		$(domPath + ' input[type="text"]').blur(function() { wgForms.removeFocus(this); });
		$(domPath + ' input[type="password"]').focus(function() { wgForms.setFocus(this); });
		$(domPath + ' input[type="password"]').blur(function() { wgForms.removeFocus(this); });
		$(domPath + ' textarea').focus(function() { wgForms.setFocus(this); });
		$(domPath + ' textarea').blur(function() { wgForms.removeFocus(this); });
	},
	
	setFocus: function(elem) {
		$(elem).addClass('active');
	},
	
	removeFocus: function(elem) {
		$(elem).removeClass('active');
	}
}