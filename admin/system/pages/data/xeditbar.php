<?php
chdir('../../../');
require('./init/init.basic.php');

if (!wgUsers::isLogged()) die('Please login to the system!');

?><div id="wgXeditBar" style="position:absolute; top:5px; right:5px; z-index: 9999999999999; background:#CCC;" >
	<div style="margin:3px;">
		<span id="wgXeditEdit" style="margin:3px;"><?php echo wgLang::get('edit'); ?></span>
		<span id="wgXeditValidate" style="margin:3px;"><?php echo wgLang::get('validate'); ?></span>
		<span id="wgXeditDb" style="margin:3px;"><?php echo wgLang::get('dbqueries'); ?></span>
	</div>
</div>