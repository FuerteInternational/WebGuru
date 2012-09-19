<?php
/**
 * Action class for module Crawler
 * 
 * @package      WebGuru3
 * @subpackage   modules/crawler/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        17. February 2009
 */

class actionsCrawler extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		$func['doindexjob'] = array('doIndexJob', 'index');
		$func['docrawlerjob'] = array('doCrawlerJob', 'crawler');
		$func['dowebsitejob'] = array('doWebsiteJob', 'website');
		$func['dosearchjob'] = array('doSearchJob', 'search');
		$func['dositemapsjob'] = array('doSitemapsJob', 'sitemaps');
		$func['docronjobsjob'] = array('doCronjobsJob', 'cronjobs');
		$func['dotemplatesjob'] = array('doTemplatesJob', 'templates');
		
		// END: functions-list ----------------------------------------------------------------
		$funcname = parent::_init($func, $parameters);
		$ok = false;
		if ((bool) $funcname && method_exists($this, $funcname)) $ok = $this->$funcname($parameters);
		else parent::_reportError($funcname, __FILE__);
		wgPaths::moduleRedirect(NULL, !$ok);
	}
	
	// SYSTEM: functions ----------------------------------------------------------------------

	/**
	 * This is the _doIndexJob function description
	 *
	 * @name _doIndexJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doIndexJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.index.php');
		$class = new crawlerActionsIndex();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCrawlerJob function description
	 *
	 * @name _doCrawlerJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCrawlerJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.crawler.php');
		$class = new crawlerActionsCrawler();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doWebsiteJob function description
	 *
	 * @name _doWebsiteJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doWebsiteJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.website.php');
		$class = new crawlerActionsWebsite();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doSearchJob function description
	 *
	 * @name _doSearchJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doSearchJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.search.php');
		$class = new crawlerActionsSearch();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doSitemapsJob function description
	 *
	 * @name _doSitemapsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doSitemapsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.sitemaps.php');
		$class = new crawlerActionsSitemaps();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doCronjobsJob function description
	 *
	 * @name _doCronjobsJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doCronjobsJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.cronjobs.php');
		$class = new crawlerActionsCronjobs();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	/**
	 * This is the _doTemplatesJob function description
	 *
	 * @name _doTemplatesJob
	 * @author Ondrej Rafaj
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _doTemplatesJob($parameters) {
		require(wgPaths::getModulePath().'actions/class.templates.php');
		$class = new crawlerActionsTemplates();
		if ((bool) $class->init()) { wgError::add('actionok', 2);
			return true;
		}
		else { wgError::add('actionfailed');
			return false;
		}
	}
	
	
	
	// END: functions ----------------------------------------------------------------------
	
}
		
?>