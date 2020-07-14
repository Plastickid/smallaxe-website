<?php
/**
 * Smallaxe templating engine
 *
 * @param $tmpl   - template file
 * @param $args   - Associative array of variables to pass to the template file.
 * @return string - Output of the template file. Likely HTML.
 */
 
namespace Smallaxe;

class smallaxe_template { 
	
	public $tmpl_path;
	
	function __construct($tmpl_path) {
		$this->tmpl_path  = $tmpl_path;
		if('/' != substr($this->tmpl_path, -1)) {
			$this->tmpl_path."/"; 
		}	
	}	
	
	function load_template($tmpl){
		if(file_exists($this->tmpl_path.$tmpl)) {
			return file_get_contents($this->tmpl_path.$tmpl);   
		} elseif(file_exists($tmpl)) {
			return file_get_contents($tmpl); 
		} else { 
			return false;  
		}
	}
	
	function render($template,$args) {
		if(is_array($args)){
			foreach($args as $k=>$v) { 
				preg_match_all(
					'/(\{\{)('.$k.')(\|)([A-Za-z0-9-_:]+)(\}\})/U', $template, $matches
				); 
				if(is_array($matches)) {
					foreach($matches as $key=>$val) {
						$var	= $matches[0][0]; 
						switch($matches[4][0]) { //the function name
							case 'upper': 
								$template = str_replace($var,strtoupper($v),$template); 
								break; 
							case 'lower': 
								$template = str_replace($var,strtolower($v),$template); 
								break; 
							case 'trim': 
								$template = str_replace($var,trim($v),$template); 
								break; 
							case 'ucfirst': 
								$template = str_replace($var,ucfirst(strtolower($v)),$template); 
								break; 
							case 'ucwords': 
								$template = str_replace($var,ucwords(strtolower($v)),$template); 
								break; 
							case 'escape': 
							case 'e': 
								$template = str_replace($var,htmlspecialchars($v,ENT_QUOTES),$template);
								break;
							case 'nl2br': 
								$template = str_replace($var,nl2br($v),$template); 
								break; 
							default: 
								$template = str_replace($var,$v,$template); 
								break; 
						}
					}
					unset($matches,$var); 
				}
				$template = str_replace('{{'.$k.'}}',$v,$template); 
			}
		}
		return $template; 
	}
}