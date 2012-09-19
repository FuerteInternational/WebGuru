<?php
class wgDbDynamicTable {
	
	protected $_table;
	
	protected $_prefix;
	
	protected $_columns = array();
	
	protected $_isInDb = false;
	
	const VARCHAR = 'varchar';
	
	const TEXT = 'text';
	
	const LOGTEXT = 'longtext';
	
	const INTEGER = 'int()';
	
	const TINYINT = 'tinyint';
	
	const BIGINT = 'bigint';
	
	const DATE = 'date';
	
	const DATETIME = 'datetime';
	
	public function __construct($table, $prefix=NULL) {
		$this->_table = $table;
		$this->_prefix = $prefix;
		if ((bool) $this->isTable()) $this->_reloadTableXml();
	}
	
	public function __call($name, $args) {
		
	}
	
	public function isTable() {
		if (file_exists($this->getXmlFile())) return true;
		else return false;
	}
	
	public function createTable($columns=NULL) {
		$query = 'CREATE TABLE `'.$this->getTableName().'` (
			`id` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			'.$this->_prepareIndexes().'
			`integer` INT( 11 ) NULL ,
			`varchar` VARCHAR( 255 ) NULL ,
			`text` TEXT NOT NULL ,
			`datetime` DATETIME NOT NULL ,
			INDEX ( '.$this->_prepareIndexes().' )
			) ENGINE = MYISAM ;';
	}
	
	private function _prepareColumns() {
		
	}
	
	private function _prepareIndexes() {
		
	}
	
	public function addColumn($columnName, $type=NULL, $lenght=NULL, $null=false, $indexKey=NULL) {
		$this->_columns[$columnName] = array('name'=>$columnName, 'lenght'=>$lenght, 'null'=>$null, 'index'=>$key);
	}
	
	public function replaceColumn($oldColumn, $newColumn, $type=NULL, $lenght=NULL, $null=false, $key=NULL) {
		$this->removeColumn($oldColumn);
		$this->addColumn($newColumn, $type, $lenght, $null, $key);
	}
	
	public function removeColumn($columnName) {
		if (isset($this->_columns[$columnName])) unset($this->_columns[$columnName]);
		else return false;
		$query = "ALTER TABLE `".$this->getTableName()."` DROP `$columnName`;";
		$conn = new wgConnector();
		$this->_rebuildTableXml();
		return true;
	}
	
	public function getTableName() {
		return $this->_prefix.$this->_table;
	}
	
	protected function _reloadTableXml() {
		;
	}
	
	protected function _rebuildTableXml() {
		
		$this->_reloadTableXml();
	}
	
}
?>