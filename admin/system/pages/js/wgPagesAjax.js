var wgPagesAjax = {
	
		getSmallEditPage: function(id) {
		var href = document.location.href;
		var newHref = href.replace(wgConfig.define.webroot + wgConfig.define.adminfolder, '');
		var newHref = newHref.replace('page=index', 'page=smalledit') + '&edit=' + id;
		var url = wgConfig.define.webroot + wgConfig.define.adminfolder + 'data/runAjaxPage.php' + newHref
		wgPopups.createSmall(url);
		//return false;
	},
	
	getPagePreview: function(id) {
		var url = wgConfig.define.webroot + wgConfig.define.adminfolder + 'system/pages/ajax/generatePreview.php?id=' + id;
		wgPopups.createSmall(url);
		//return false;
	}

};