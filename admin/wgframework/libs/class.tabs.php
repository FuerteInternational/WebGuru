<?php
/**
 * Automatic tabs
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      27. October 2008
 */

class myTabs {
	private $tabs = array();
	private $tabsname = NULL;
	private $js = true;
	private $baselink = NULL;
	private $hiddenTabs = 'noscreen';
	private static $use = 0;
	private $parameters = array();
	
	public function __construct($name=NULL, $usejs=true, $link=NULL) {
		$name = str_ireplace('-', '', strtolower($name));
		self::$use++;
		if (self::$use > 1) $id = (self::$use-1);
		else $id = NULL;
		if (!$usejs) {
			if (eregi('\?', $link)) $link .= '&amp;';
			$this->baselink = $link;
		}
		$this->tabsname = (string) $name.$id;
		$this->js = (bool) $usejs;
	}
	
	public function setPar($par, $val) {
		$this->parameters[$par] = $val;
	}
	
	public function addTab($name, $title=NULL, $default=false, $content=NULL, $reg=0) {
		if ((bool) $default) $this->clearDefaults();
		if (empty($title)) $title = $name;
		$this->tabs[$name]['name'] = $name;
		$this->tabs[$name]['title'] = $title;
		$this->tabs[$name]['default'] = (bool) $default;
		$this->tabs[$name]['content'] = $content;
		$this->tabs[$name]['registered'] = (int) $reg;
	}
	
	public function addContent($name, $content) {
		$this->tabs[$name]['content'] = $content;
	}

	public function setDefault($name) {
		$this->clearDefaults();
		$this->tabs[$name]['default'] = true;
	}
	
	public function setHiddenTabsClass($class) {
		$this->hiddenTabs = $class;
	}

	public function getTabs() {
		$tabs = NULL;
		$href = NULL;
		$hrefend = NULL;
		foreach ($this->tabs as $key=>$res) {
			if (empty($tabs) && !empty($this->tabsname)) $tabs = '<div id="'.$this->tabsname.'-tabs">
			';
			if ($this->isDefault($key)) $def = ' class="active"';
			else $def = ' class="passive"';
			if ($this->js) $onclick = ' onclick="activate'.$this->tabsname.'Tab(\''.$res['name'].'\');"';
			else {
				$href = '<a href="'.$this->getLink($res['name']).'">';
				$hrefend = '</a>';
			}
			if ($res['registered'] == -1) {
				$before = '<?php if (!(bool) $_SESSION["user"]["idu"]) { ?>';
				$after = '<?php } ?>';
			}
			elseif ($res['registered'] > 0) {
				$before = '<?php if ($_SESSION["user"]["perm"] >= '.$res['registered'].') { ?>';
				$after = '<?php } ?>';
			}
			else {
				$before = NULL;
				$after = NULL;
			}
			$tabs .= $before.'<p id="'.$this->tabsname.'tab'.$res['name'].'"'.$def.$onclick.'>'.$href.$res['title'].$hrefend.'</p>
			'.$after;
		}
		if (!empty($this->tabsname)) $tabs .= '</div>';
		return $tabs;
	}
	
	public function getContents() {
		$conts = NULL;
		foreach ($this->tabs as $key=>$res) {
			if (empty($conts) && !empty($this->tabsname)) $conts = '<div id="'.$this->tabsname.'-contents">
			';
			if ($this->isDefault($key)) $class = $this->tabsname.'cont';
			else $class = $this->hiddenTabs;
			if ($res['registered'] == -1) {
				$before = '<?php if (!(bool) $_SESSION["user"]["idu"]) { ?>';
				$after = '<?php } ?>';
			}
			elseif ($res['registered'] > 0) {
				$before = '<?php if ($_SESSION["user"]["perm"] >= '.$res['registered'].') { ?>';
				$after = '<?php } ?>';
			}
			else {
				$before = NULL;
				$after = NULL;
			}
			$conts .= $before.'<div class="'.$class.'" id="'.$this->tabsname.'cont'.$res['name'].'">'.$res['content'].'</div>
			'.$after;
		}
		if (!empty($this->tabsname)) $conts .= '</div>';
		return $conts;
	}
	
	public function getScripts() {
		$data = '
		<script type="text/javascript">
		<!--
		function activate'.$this->tabsname.'Tab(name) {
			var tabs = document.getElementById("'.$this->tabsname.'-tabs");
			var ins = tabs.getElementsByTagName("*");
			for (var i=0; i<ins.length; i++) {
				ins[i].className = "passive";
			}
			tabs = document.getElementById("'.$this->tabsname.'-contents");
			ins = tabs.getElementsByTagName("div");
			for (i=0; i < ins.length; i++) {
				if (ins[i].className == "'.$this->tabsname.'cont") ins[i].className = "noscreen";
			}
			var tab = document.getElementById("'.$this->tabsname.'tab" + name);
			var cnt = document.getElementById("'.$this->tabsname.'cont" + name);
			tab.className = "active";
			cnt.className = "'.$this->tabsname.'cont";
			set'.$this->tabsname.'TabToCookie(name);
		}
		function set'.$this->tabsname.'TabToCookie(name)
		{
			var '.$this->tabsname.'_date = new Date("December 31, 2099");
			var '.$this->tabsname.'_cookie_date = '.$this->tabsname.'_date.toGMTString();
			var '.$this->tabsname.'_cookie = "'.$this->tabsname.'=" + name;
			the_cookie = '.$this->tabsname.'_cookie + ";expires=" + '.$this->tabsname.'_cookie_date;
			document.cookie = '.$this->tabsname.'_cookie;
		} 
		-->
		</script>
		';
		return $data;
	}
	
	public function getAll() {
		$content = NULL;
		if ($this->js) $content .= $this->getScripts();
		$content .= $this->getTabs();
		$content .= $this->getContents();
		return $content;
	}
	
	private function getLink($name) {
		if (empty($this->tabsname)) $par = 'mytab';
		else $par = $this->tabsname;
		return $this->baselink.$par.'='.$name;
	}
	
	private function isDefault($name) {
		if (isset($_GET[$this->tabsname])) {
			$_REQUEST[$this->tabsname] = $_GET[$this->tabsname];
			$_COOKIE[$this->tabsname] = $_GET[$this->tabsname];
		}
		if (isset($_REQUEST[$this->tabsname])) {
			if (array_key_exists($_REQUEST[$this->tabsname], $this->tabs)) {
				if ($_REQUEST[$this->tabsname] == $name) return true;
				else return false;
			}
			else return (bool) $this->tabs[$name]['default'];
		}
		else {
			if (isset($_COOKIE[$this->tabsname])) {
				if (array_key_exists($_COOKIE[$this->tabsname], $this->tabs)) {
					if ($_COOKIE[$this->tabsname] == $name) return true;
					else return false;
				}
				else return (bool) $this->tabs[$name]['default'];
			}
			else return (bool) $this->tabs[$name]['default'];
		}
	}
	
	private function clearDefaults() {
		foreach ($this->tabs as $key=>$res) $this->tabs[$key]['default'] = false;	
	}
	
}
?>