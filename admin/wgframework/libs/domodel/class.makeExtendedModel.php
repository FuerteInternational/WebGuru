<?php

final class makeExtendedModel extends doModel  {

	function __construct($table, $tableName) {
		// generate extended model for table
		$path = wgPaths::getAdminPath().'wgframework/model/extended/class.Extended'.$tableName.'Model.php';
		$data = parent::_getHeader($table, 'model/extended/', true).'
class Extended'.$tableName.'Model extends Base'.$tableName.'Model {
	
}
?>';
		//wgIo::writeFile($path, $data);
	}

}

?>