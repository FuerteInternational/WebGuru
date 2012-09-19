<?php
/**
 * Database class for table cron_jobs
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/cron_jobs
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        14. April 2009 15:34:12
 */

class CronJobsModel extends BaseCronJobsModel {
	
	public static function getJobName($id) {
		$id = (int) $id;
		$job = parent::doSelectPKey($id);
		return $job->getName();
	}
	
	
}
?>