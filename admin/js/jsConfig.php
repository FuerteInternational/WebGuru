<?php
error_reporting(0);
include('../config/config.php');
?>var wgConfig = {
	
	define: {
		webroot     : '<?php echo $conf['define']['webroot']; ?>',
		adminfolder : '<?php echo $conf['define']['adminfolder']; ?>',
		tempfolder  : '<?php echo $conf['define']['tempfolder']; ?>',
		usrfolder   : '<?php echo $conf['define']['usrffolder']; ?>'
	},
	
	admin: {
	
	},
	
	system: {
		sestime: '<?php echo $conf['system']['sestime']; ?>'
	},
	
	ajax: {
		content: '<?php echo $conf['ajax']['content']; ?>'
	}
	
}