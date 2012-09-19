<?php
/**
 * Database class for table cron_jobs_log
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/cron_jobs_log
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        14. April 2009 15:37:56
 */

class CronJobsLogModel extends BaseCronJobsLogModel {
	
	public static function getLogForJobPager($id, $errors, $page) {
		$id = (int) $id;
		$errors = (int) $errors;
		$page = (int) $page;
		$conn = new wgConnector();
		if ((bool) $errors) $conn->where(parent::COL_ISERROR, 1);
		if ((bool) $id) $conn->where(parent::COL_CRON_JOBS_ID, $id);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page);
	}
	
	
}
?>