<?php
/**
 * Parse class - templating system is 
 * using package PEAR HTML_Template_IT
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      16. October 2008
 */

require('HTML/Template/IT.php');

class wgParse extends HTML_Template_IT {
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @param string $source Source of the template (template in variable if $root is "var" or filename
	 * @param string root Root folder of the template or "var" for source as a variable (default)
	 * @param bool cleanVars Clean unknown variables from template
	 * @param bool cleanBlocks Clean unknown and unused blocks
	 * @return object object
	 */ 
	public function __construct($source, $root='var', $cleanVars=true, $cleanBlocks=true, $delimiters=array('{', '}')){
		$this->openingDelimiter = $delimiters[0];
		$this->closingDelimiter = $delimiters[1];
		if ($root == 'var') {
			$this->HTML_Template_IT();
			$this->setTemplate($source, $cleanVars, $cleanBlocks);
		}
		else {
			$this->HTML_Template_IT($root);
			$this->loadTemplatefile($source, $cleanVars, $cleanBlocks);
		}
		
	}
	
	public static function parseVariables($data) {
		$arr = array();
		preg_match_all('/\{\%(.*?)\}/', $data, $arr);
		foreach ($arr[1] as $k=>$var) {
			$var = '<?php echo $'.strtolower($var).'; ?>';
			$data = str_ireplace($arr[0][$k], $var, $data);
		}
		//print $data.'<br />';
		return $data;
	}
	
	
	public static function parseVarTemplate($source, $var=array(), $delimiters=array('{', '}')) {
		$block = 'parseit';
		$source = '<!-- BEGIN '.$block.' -->'.$source.'<!-- END '.$block.' -->';
		$tpl = new wgParse($source, 'var', true, false, $delimiters);
		$tpl->setCurrentBlock($block);
		if (!empty($var) && is_array($var)) $tpl->setVariable($var);
		$tpl->parseBlock($block);
		return $tpl->getBlock($block);
	}
	
	public static function parseBlockVarsInVars($source, $into='$%s', $var=array(), $delimiters=array('{', '}')) {
		$block = 'parseit';
		$source = '<!-- BEGIN '.$block.' -->'.$source.'<!-- END '.$block.' -->';
		$tpl = new wgParse($source, 'var', true, false, $delimiters);
		$tpl->setCurrentBlock($block);
		if (!empty($var) && is_array($var)) $tpl->setVariable($var);
		else $var = array();
		if (!empty($tpl->blockvariables['parseit']) && is_array($tpl->blockvariables['parseit'])) {
			foreach ($tpl->blockvariables['parseit'] as $k=>$v) {
				if (!isset($var[$k])) $tpl->setVariable($k, sprintf($into, strtolower($k)));
			}
		}
		$tpl->parseBlock($block);
		return $tpl->getBlock($block);
	}
	
	public static function parseFrontendTemplate($source, $obj=false) {
		$block = '__global__';
		//$source = '<!-- BEGIN '.$block.' -->'.$source.'<!-- END '.$block.' -->';
		$tpl = new wgParse($source, 'var', false, false, array('{%', '}'));
		$tpl->setCurrentBlock($block);
		$var = &$tpl->blockvariables[$block];
		if (!empty($var) && is_array($var)) foreach ($var as $k=>$v) {
			if ($k == 'PAGER') $tpl->setVariable($k, '<?php if (isset($arr[\'pager\'])) echo $arr[\'pager\']; ?>');
			else {
				if ((bool) $obj) {
					if (method_exists($obj, 'get'.ucfirst($k))) $data = '<?php echo $v->get'.ucfirst($k).'(); ?>';
					else $data = '';
				}
				else $data = '';
				$tpl->setVariable($k, $data);
			}
		}
		$tpl->parseBlock($block);
		return $tpl->getBlock($block);
	}
	
	/**
	 * Decode template for <textarea>
	 * 
	 * @name decode
	 * @param string $text Text to decode
	 * @return string Decoded string
	 */ 
	public function decode($text) {
		$text = str_ireplace('&', '&amp;', $text);
		return $text = valid::decodeTemp(valid::decodeHTML($text));
	}
		
	/**
	 * Parse block of the template
	 * 
	 * @name parseBlock
	 * @param string $block Block identifier
	 */ 
	public function parseBlock($block){
		if (isset($this->blocklist[$block])) {
			if(preg_match_all("{{w([A-Z]*)}}", $this->blocklist[$block], $arr)){
				foreach($arr[1] as $vartoset){
					$this->setVariable("w".$vartoset, wgLang::get(strtolower($vartoset)));
				}
			}
		}
		$this->parse($block);
	}
	
	/**
	 * Get error (if any)
	 * 
	 * @name getError
	 * @param bool $print Print error on the screen
	 * @return message Error message
	 */ 
	public function getError($print=false) {
		if (!empty($this->err[0]->message)) {
			if ((bool) $print) echo $this->err[0]->message;
			return $this->err[0]->message;
		}
		else return NULL;
	}
	
	/**
	 * Show (print) parsed block of the template
	 * 
	 * @name showBlock
	 * @param string $block Block identifier
	 */ 
	public function showBlock($block) {
		$this->show($block);
		$error = $this->getError();
		//if (!empty($error)) wgError::add($error);
	}
	
	/**
	 * Returns parsed block of the template
	 * 
	 * @name showBlock
	 * @param string $block Block identifier
	 * @return string Parsed block
	 */ 
	public function getBlock($block) {
		$code = $this->get($block);
		//$error = $this->getError();
		//if (!empty($error)) wgError::add($error);
		return $code;
	}
	
	public function handleCheckBox($value, $code) {
		if ((bool) $value) $this->setVariable($code, ' checked="checked"');
	}

	/**
	 * Object destructor
	 * 
	 * @name __construct
	 */ 
	function __destruct() {
	
	}
}

?>