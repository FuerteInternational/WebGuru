<?php
/**
 * Basig WG functions
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      23. October 2008
 */

/**
 * Returns query string from array suitable for URI
 *
 * @name 
 * @author Ondrej Rafaj
 * @author missing-score (codingforums.com)
 * @param array $array Array to convert
 * @param string $convention
 * @return string Query string
 * /
function incTemp($module, $temp) {
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
}*/

?>