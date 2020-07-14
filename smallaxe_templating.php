<?php
/**
 * Smallaxe templating engine
 *
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

	/**
	* load_template()
	*
	* @param $tmpl   - template file
	* @return string - template contents
    */		
	function load_template($tmpl){
		if(file_exists($this->tmpl_path.$tmpl)) {
			return file_get_contents($this->tmpl_path.$tmpl);   
		} elseif(file_exists($tmpl)) {
			return file_get_contents($tmpl); 
		} else { 
			return false;  
		}
	}
	
	/**
	* render()
	*
	* @param $tmpl   - template file
	* @param $args   - Associative array of variables to pass to the template file.
	* @return string - Output of the template file. Likely HTML.
    */	
	
	function render($template,$args) {
		if(is_array($args)):
			foreach($args as $k=>$v):  
				preg_match_all(
					'/(\{\{)('.$k.')(\|)([A-Za-z0-9-_:|]+)(\}\})/U', $template, $matches
				); 
				if(is_array($matches)) {
					foreach($matches[0] as $key=>$pattern):
						if(!$pattern) { continue; }  
						$string 	= $v; 
						$functions	= explode("|",$matches[4][$key]); 
						foreach($functions as $fx):
							switch($fx): //the function name
								case 'upper': 
									$string = strtoupper($string); 
									break; 
								case 'lower': 
									$string = strtolower($string); 
									break; 
								case 'trim': 
									$string = trim($string); 
									break; 
								case 'ucfirst': 
									$string = ucfirst(strtolower($string)); 
									break; 
								case 'ucwords': 
									$string = ucwords(strtolower($string)); 
									break; 
								case 'escape': 
								case 'e': 
									$string = htmlspecialchars($string,ENT_QUOTES); 
									break;
								case 'nl2br': 
									$string = nl2br($string); 
									break; 
								case 'rot13': 
									$string = str_rot13($string); 
									break; 
								default: 
									break; 
							endswitch; 
						endforeach; // end functions
						$template = str_replace($pattern,$string,$template); 
					endforeach; // end matches
					unset($matches,$var,$string,$pattern,$functions); 
				}
				$template = str_replace('{{'.$k.'}}',$v,$template); 
			endforeach; 
		endif; 
		return $template; 
	}
}

