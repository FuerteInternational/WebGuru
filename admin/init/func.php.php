<?php
/**
 * Missing PHP functions
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      23. October 2008
 */

if (!function_exists('http_build_query')) {
	/**
	 * Returns query string from array suitable for URI
	 *
	 * @name 
	 * @author Ondrej Rafaj
	 * @author missing-score (codingforums.com)
	 * @param array $array Array to convert
	 * @param string $convention
	 * @return string Query string
	 */
	function http_build_query($array=array(), $convention='%s') {
		$query = NULL;
		$array = array($array);
		if (!empty($array) && is_array($array)) foreach ($array as $key=>$value ) {
			if (is_array($value)) {
				$new_convention = sprintf($convention, $key).'[%s]';
				$query .= http_build_query($value, $new_convention);
			}
			else {
				$key = urlencode($key);
				$value = urlencode($value);
				$query .= sprintf($convention, $key)."=$value&";
			}
		}
		return $query;
	}
}

?>