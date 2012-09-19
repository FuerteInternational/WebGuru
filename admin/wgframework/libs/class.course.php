<?php
class course
{
	protected $courseDate;
	protected $courses;
	
	public function __construct($courseDate = 0)
	{
		$this->courseDate = $courseDate;
		$this->courses = array();
		if(empty($this->courseDate)) $this->courseDate = Time();
		// load courses from czech national bank in XML format for selected date
		$xml = simplexml_load_file("http://www.cnb.cz/cz/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.xml?date=".date("d.m.Y", $this->courseDate));
		$valid_date = $xml["datum"];
		$items = explode(".", $valid_date);
		// retrieve date when course was set (because during holidays and weekends are courses not updated)
		$this->courseDate = mktime(0, 0, 0, $items[1], $items[0], $items[2]);
		// store courses
		foreach($xml->tabulka->radek as $item)
		{
			$currency = strval($item["kod"]);
			$course = $this->replaceComma($item["kurz"]);
			$this->courses[$currency] = array('value'=>$course, 'currency'=>$item["mena"], 'count'=>$item["mnozstvi"], 'country'=>$item["zeme"]); 
		}
	}
	
	private function replaceComma($number)
	{
		$str = strval($number);
		$pos = strpos($str, ",");
		if($pos !== FALSE) $str[$pos] = ".";
		return doubleval($str);
	}
	// get one specified course
	public function getCourse($currency = "EUR")
	{
		return $this->courses[strtoupper($currency)];
	}
	
	// get all courses
	public function getCourses()
	{
		return $this->courses;
	}
	
	// get course date
	public function getTime()
	{
		return $this->courseDate;
	}
}

?>
