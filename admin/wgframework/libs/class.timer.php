<?php
/**
 * Timer
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      21. October 2008
 */

class timer {
	
	/**
	 * Returns time in seconds
	 * 
	 * @name getTime
	 * @param microtime $start Start time from microtime()
	 * @param microtime $end End time (Default NULL = actual microtime)
	 * @return string Time in seconds
	 */ 
	public static function getTime($start, $end=NULL) {
		if (!(bool) $end) $end = microtime();
		$time = explode(' ', $start);
		$start = $time[1] + $time[0];
		$time = explode(' ', $end);
		$end = $time[1] + $time[0];
		$time = ($end-$start);
		return (string) $time;
	}
}
?>