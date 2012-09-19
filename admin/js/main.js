function switchSystemWebsite(id) {
	var href = window.location.href;
	if (href.match(/(\?)/)) add = '&';
	else add = '?';
	window.location = href + add + 'website=' + id;
}
function switchSystemLanguage(id) {
	var href = window.location.href;
	if (href.match(/(\?)/)) add = '&';
	else add = '?';
	window.location = href + add + 'language=' + id;
}
$(document).ready(function() {
	$('#switchweb').hide();
});
