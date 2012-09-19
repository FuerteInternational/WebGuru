<?php
header('Content-type: text/plain');
chdir('../');

function ent($text) {
	return preg_replace('/\&nbsp\;/si', '', $text);
}

?>