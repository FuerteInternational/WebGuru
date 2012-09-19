<?php
/**
 * Showing error messages
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      22. October 2008
 */
$err = wgError::getErrors();
$grp = wgError::getErrorsGroups();
$var['ERRORS'] = NULL;
if (!empty($err) && !empty($grp) && is_array($grp)) foreach ($grp as $grid=>$group) {
	if (!empty($err[$grid])) foreach ($err[$grid] as $message) $var['ERRORS'].= '<p class="'.$grp[$grid][1].'">'.$message[0].'</p>';
}
wgError::clearSession();
unset($err);
unset($grp);
?>