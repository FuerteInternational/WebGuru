wgXeditBar = {
	
	root: '',
	
	init: function() {
		$.ajax({
			type: 'get',
			url: wgXeditBar.root + 'system/pages/data/xeditbar.php',
			success: function(html){
				$('body:last-child').append(html);
				wgXeditBar._doFunctionality();
			}
		});
	},

	_doFunctionality: function() {
		//alert(':-)');
	},
	
	checkJquery: function() {
		if (typeof($) == 'undefined') wgXeditBar._include('js/jquery.php');
	},
	
	_include: function(filename) {
		var body = document.getElementsByTagName('head').item(0);
		script = document.createElement('script');
		script.src = 'http://pc4209/webguru/WebGuru3/admin/' + filename;
		script.type = 'text/javascript';
		body.appendChild(script)
	}
	
};