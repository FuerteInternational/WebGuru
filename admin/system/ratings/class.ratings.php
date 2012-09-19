<?php
/**
 * Main class for module Ratings
 * 
 * @package      WebGuru3
 * @subpackage   modules/ratings/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. May 2009
 */

class moduleRatings {
	
	public $name = NULL;
	public $version = NULL;
	public $author = NULL;
	
	const COOKIE_ID = 'ratings-basic-';
	
	private static $_path = NULL;
	private static $_module = NULL;
	
	public function __construct() {
		$this->_init ();
	}
	
	private function _init() {
		$this->name = 'Ratings';
		$this->code = 'ratings';
		$this->version = '0.2.0.0';
		$this->author = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path = wgPaths::getAdminPath().$this->_module['part'].'/';
	
	}
	
	// ------------------------- class functions -------------------------
	
	public static function getRatingId($group, $variable) {
		$id = (int) wgSystem::getRequestValue($variable);
		if (!(bool) $id) return 0;
		return wgText::safeText('g'.$group.'i'.$id);
	}
	

	public static function getRatingBar($name, $id, $units=5, $static=false) {
		$units = (int) $units;
		$static = (int) $static;
		$rating_unitwidth = 30;
		$ip = wgIpTools::getUserIp();
		if (!(bool) $units) $units = 5;
		$r = RatingPointsModel::getRating($id);
		if (!(bool) $r->getId()) RatingPointsModel::createNewRating($id);
		$count = (int) $r->getTotalVotes();
		$current_rating = $r->getTotalValue();
		$tense = ($count == 1) ? "vote" : "votes"; //plural form votes/vote
		$voted = RatingPointsModel::verifyIp($id);
		// now draw the rating bar
		$rating_width = @number_format($current_rating / $count, 2) * $rating_unitwidth;
		$rating1 = @number_format($current_rating / $count, 1);
		$rating2 = @number_format($current_rating / $count, 2);
		if ((bool) $static) {
			$static_rater = array ();
			$static_rater[] .= NL.'<div class="ratingblock">';
			$static_rater[] .= '<div id="unit_long'.$id.'">';
			$static_rater[] .= '<ul id="unit_ul'.$id.'" class="unit-rating" style="width:'.$rating_unitwidth * $units.'px;">';
			$static_rater[] .= '<li class="current-rating" style="width:'.$rating_width.'px;">Currently '.$rating2.'/'.$units.'</li>';
			$static_rater[] .= '</ul>';
			$static_rater[] .= '<p class="static">'.$name.'. Rating: <strong> '.$rating1.'</strong>/'.$units.' ('.$count.' '.$tense.' cast) <em>Rating is closed.</em></p>';
			$static_rater[] .= '</div>';
			$static_rater[] .= '</div>'.NL.NL;
			return join(NL, $static_rater);
		}
		else {
			$rater = '';
			$rater .= '<div class="ratingblock">';
			$rater .= '<div id="unit_long'.$id.'">';
			$rater .= '  <ul id="unit_ul'.$id.'" class="unit-rating" style="width:'.$rating_unitwidth * $units.'px;">';
			$rater .= '     <li class="current-rating" style="width:'.$rating_width.'px;">Currently '.$rating2.'/'.$units.'</li>';
			for($ncount = 1; $ncount <= $units; $ncount ++) { // loop from 1 to the number of units
				if (!$voted) $rater .= '<li><a href="db.php?j='.$ncount.'&amp;q='.$id.'&amp;t='.$ip.'&amp;c='.$units.'&amp;name='.$name.'" title="'.$ncount.' out of '.$units.'" class="r'.$ncount.'-unit rater" rel="nofollow">'.$ncount.'</a></li>';
			}
			$ncount = 0; // resets the count
			$rater .= '  </ul>';
			$rater .= '  <p';
			if ($voted) $rater .= ' class="voted"';
			$rater .= '>'.$name.' Rating: <strong> '.$rating1.'</strong>/'.$units.' ('.$count.' '.$tense.' cast)';
			$rater .= '  </p>';
			$rater .= '</div>';
			$rater .= '</div>';
			return $rater;
		}
	}
	
	public static function getRatingBarUpdate() {
		$rating_unitwidth = 30;
		$vote_sent = preg_replace('/[^0-9]/', '', wgGet::getValue('j'));
		$id_sent = preg_replace('/[^0-9a-zA-Z]/', '', wgGet::getValue('q'));
		$ip_num = preg_replace('/[^0-9\.]/', '', wgGet::getValue('t'));
		$units = preg_replace('/[^0-9]/', '', wgGet::getValue('c'));
		$name = wgGet::getValue('name');
		$ip = wgIpTools::getUserIp();
		
		if ($vote_sent > $units) die('Sorry, vote appears to be invalid.'); // kill the script because normal users will never see this.
		$r = RatingPointsModel::getRating($id_sent);
		$count = (int) $r->getTotalVotes();
		$current_rating = (int) $r->getTotalValue();
		$checkIP = unserialize($r->getUsedIps());
		$sum = $vote_sent+$current_rating; // add together the current vote value and the total vote value
		$tense = ($count==1) ? 'vote' : 'votes'; //plural form votes/vote
		($sum==0 ? $added=0 : $added = $count + 1);
		((is_array($checkIP)) ? array_push($checkIP,$ip_num) : $checkIP=array($ip_num));
		$insertip=serialize($checkIP);
		$voted = RatingPointsModel::verifyIp($id_sent);
		if(!$voted) {     //if the user hasn't yet voted, then vote normally...
			if (($vote_sent >= 1 && $vote_sent <= $units) && ($ip == $ip_num)) { // keep votes within range, make sure IP matches - no monkey business!
				$save = array();
				$save[RatingPointsModel::COL_RATING_POINTS_GROUPS_ID] = 0;
				$save[RatingPointsModel::COL_TOTAL_VOTES] = $added;
				$save[RatingPointsModel::COL_TOTAL_VALUE] = $sum;
				$save[RatingPointsModel::COL_USED_IPS] = $insertip;
				$save['where'] = $id_sent;
				$result = (bool) RatingPointsModel::doUpdate($save);
			} 
		}
		$r = RatingPointsModel::getRating($id_sent);
		$count = (int) $r->getTotalVotes();
		$current_rating = $r->getTotalValue();
		$tense = ($count==1) ? "vote" : "votes"; //plural form votes/vote
		$new_back = array();
		$new_back[] .= '<ul class="unit-rating" style="width:'.($units * $rating_unitwidth).'px;">';
		$new_back[] .= '<li class="current-rating" style="width:'.@number_format($current_rating / $count,2) * $rating_unitwidth.'px;">Current rating.</li>';
		$new_back[] .= '<li class="r1-unit">1</li>';
		$new_back[] .= '<li class="r2-unit">2</li>';
		$new_back[] .= '<li class="r3-unit">3</li>';
		$new_back[] .= '<li class="r4-unit">4</li>';
		$new_back[] .= '<li class="r5-unit">5</li>';
		$new_back[] .= '<li class="r6-unit">6</li>';
		$new_back[] .= '<li class="r7-unit">7</li>';
		$new_back[] .= '<li class="r8-unit">8</li>';
		$new_back[] .= '<li class="r9-unit">9</li>';
		$new_back[] .= '<li class="r10-unit">10</li>';
		$new_back[] .= '</ul>';
		$new_back[] .= '<p class="voted">'.$name.' Rating: <strong>'.@number_format($sum / $added,1).'</strong>/'.$units.' ('.$count.' '.$tense.' cast) ';
		$new_back[] .= '<span class="thanks">Thanks for voting!</span></p>';
		$allnewback = join(NL, $new_back);
		return 'unit_long'.$id_sent.'|'.$allnewback.'';
	}
	
	public static function doNoAjaxUpdate() {
		$rating_unitwidth = 30;
		$vote_sent = preg_replace('/[^0-9]/', '', wgGet::getValue('j'));
		$id_sent = preg_replace('/[^0-9a-zA-Z]/', '', wgGet::getValue('q'));
		$ip_num = preg_replace('/[^0-9\.]/', '', wgGet::getValue('t'));
		$units = preg_replace('/[^0-9]/', '', wgGet::getValue('c'));
		$name = wgGet::getValue('name');
		$ip = wgIpTools::getUserIp();
		$referer = $_SERVER ['HTTP_REFERER'];

		if ($vote_sent > $units) die('Sorry, vote appears to be invalid.'); // kill the script because normal users will never see this.
		$r = RatingPointsModel::getRating($id_sent);
		$count = (int) $r->getTotalVotes();
		$current_rating = (int) $r->getTotalValue();
		$checkIP = unserialize($r->getUsedIps());
		$sum = $vote_sent+$current_rating; // add together the current vote value and the total vote value
		$tense = ($count==1) ? 'vote' : 'votes'; //plural form votes/vote
		($sum == 0 ? $added = 0 : $added = $count + 1);
		((is_array($checkIP)) ? array_push($checkIP, $ip_num) : $checkIP = array ($ip_num));
		$insertip = serialize($checkIP);
		$voted = RatingPointsModel::verifyIp($id_sent);
		if(!$voted) {     //if the user hasn't yet voted, then vote normally...
			if (($vote_sent >= 1 && $vote_sent <= $units) && ($ip == $ip_num)) { // keep votes within range, make sure IP matches - no monkey business!
				$save = array();
				$save[RatingPointsModel::COL_RATING_POINTS_GROUPS_ID] = 0;
				$save[RatingPointsModel::COL_TOTAL_VOTES] = $added;
				$save[RatingPointsModel::COL_TOTAL_VALUE] = $sum;
				$save[RatingPointsModel::COL_USED_IPS] = $insertip;
				$save['where'] = $id_sent;
				$result = (bool) RatingPointsModel::doUpdate($save);
			} 
			header('Location: '.$referer); // go back to the page we came from 
		}
	}
	
	
	
	public static function verifyCookie($id) {
		if (!isset($_COOKIE['ratings'][self::COOKIE_ID][$id])) {
			if ((bool) $create) $_COOKIE['ratings'][self::COOKIE_ID][$id] = time();
			return false;
		}
		return false;
	}
	
	public static function createCookie($id) {
		if (!isset($_COOKIE['ratings'][self::COOKIE_ID][$id])) return (bool) wgCookies::set('ratings['.self::COOKIE_ID.']['.$id.']', time());
		else return true;
	}
	
	
}

?>