<?php
/**
 * Class pager
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      24. November 2008
 */

class pager  {
	
	private static $_pcode = NULL;
	
	public static function getPage($code) {
		if (!wgSystem::isAdmin()) return (int) (isset($_GET['from']) ? $_GET['from'] : 0);
		self::$_pcode = $code;
		if (isset($_GET['pcode']) && isset($_GET['from'])) {
			if ($code == $_GET['pcode']) {
				$_SESSION['pager'][$code] = (int) $_GET['from'];
				return (int) $_GET['from'];
			}
			else {
				//if (isset($_SESSION['pager'][$code])) return (int) $_SESSION['pager'][$code];
				//else return 0;
				return 0;
			}
		}
		else {
			if (isset($_SESSION['pager'][$code])) return (int) $_SESSION['pager'][$code];
			else return 0;
		}
	}
	
	public static function getPcode() {
		return self::$_pcode;
	}
	
	public static function makeFullPager($data) {
		$activefield = ' class="active"';
		$links = NULL;
		$title = NULL;
		$activepos = 1;
		//$links .= '<a href="'.wgPaths::makeFrontLink(array('from'=>0)).'"><span>&laquo;</span></a>';
		for ($i=0; $i <= $data['maxpage']; $i++) {
			$pos = ($i * $data['perp']);
			$ok = false;
			if ($data['from'] > ($pos-(6*$data['perp'])) && $data['from'] < ($pos+(4*$data['perp']))) $ok = true;
			else {
				if ($data['from'] > ($pos-(60*$data['perp'])) && $data['from'] < ($pos+(40*$data['perp'])) && is_integer($i / 10)) $ok = true;
				else if (is_integer($i / 100)) $ok = true;
			}
			if ($i == 1 || $i == $data['maxpage']) $ok = true;
			if ($ok) {
				$from = ($pos / $data['perp']);
				if ($data['from'] == $pos) {
					$active = $activefield;
					$activepos = $pos;
				}
				else $active = NULL;
				if (wgSystem::isAdmin()) {
					$links .= '<a href="'.wgPaths::makeSelfLink('from='.$from.'&amp;pcode='.self::getPcode()).'"'.$title.$active.'>'.($i+1).'</a>';
				}
				else {
					$links .= '<a href="'.wgPaths::makeFrontLink(array('from'=>$from, 'pcode'=>self::getPcode())).'"'.$title.$active.'><span>'.($i+1).'</span></a>';
				}
			}
		}
		//wgError::add('pcode: '.self::getPcode(), 1);
		//$links .= '<a href="'.wgPaths::makeFrontLink(array('from'=>$data['maxpage'], 'pcode'=>self::getPcode())).'"><span>&raquo;</span></a>';
		//print_r($data);
		//exit();
		$jumper = '<!--<form action="'.wgPaths::makeSelfLink().'" method="get">
	<p>
		<input type="text" name="from" value="'.$activepos.'" />
		<button type="submit" name="go">'.wgLang::get('gopager').'</button>
	</p>
</form>-->';
		if (wgSystem::isAdmin()) return '<div class="pager">'.$links.$jumper.'</div>';
		else return $links;
	}
	
	public static function makeAdminPager($data) {
		return $data;
	}
	
}


?>