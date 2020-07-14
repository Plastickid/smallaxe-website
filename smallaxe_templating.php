<?php
/**
 * Smallaxe templating engine
 *
 */
 
namespace Smallaxe;

class smallaxe_template { 
	
	public $tmpl_path;
	public $memcache;
	public $ttl; 
		
	function __construct($tmpl_path,$memcache=false,$ttl=300) {
		$this->tmpl_path  = $tmpl_path;
		if('/' != substr($this->tmpl_path, -1)) {
			$this->tmpl_path."/"; 
		}
		$this->memcache = false; 
		$this->ttl = 300; 	
		if($memcache) { 
			$this->memcache = $memcache; 
			$this->ttl = $ttl; 
		} 
	}	
	
	function cache_get($tmpl) { 
		$tmpl = $this->memcache->get(md5($tmpl)); 
		if($tmpl) { echo "Found in cache!"; return $tmpl; }
		return false; 
	}

	function cache_put($tmpl,$text) { 
		$tmpl = $this->memcache->set(md5($tmpl),$text,$this->ttl); 
		return; 
	}

	/**
	* load_template()
	*
	* @param $tmpl   - template file
	* @return string - template contents
    */		
	function load_template($tmpl) {
		if($this->memcache) { 
			$cache = $this->cache_get($tmpl); } 
			if($cache) { return $cache; 
			$use_cache = true; 
		}
		if(file_exists($this->tmpl_path.$tmpl)) {
			$text = file_get_contents($this->tmpl_path.$tmpl);
			if($use_cache) { $this->cache_put($tmpl, $text); }
			return $text;   
		} elseif(file_exists($tmpl)) {
			$text = file_get_contents($tmpl); 
			if($use_cache) { $this->cache_put($tmpl, $text); }
			return $text;			
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
				$template = preg_replace_callback('/(\{\{date\|)([A-Za-z0-9-, |]+)(\}\})/U',function($matches) {
					return date($matches[2]); 
				},$template); 			
				$template = str_replace('{{'.$k.'}}',$v,$template); 
			endforeach; 
		endif; 
		return $template; 
	}
}

