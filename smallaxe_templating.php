<?php
/**
 * Smallaxe templating engine
 *
 */
 
namespace Smallaxe;

class smallaxe_template { 
	
	public $tmpl_path;
	public $mc;
	public $ttl; 
	private $caching;
		
	function __construct($tmpl_path,$options=[]) {
		$this->tmpl_path  = $tmpl_path;
		if('/' != substr($this->tmpl_path, -1)) {
			$this->tmpl_path."/"; 
		}
		$this->mc = false; 
		$this->ttl = 0; 
		$this->caching = false; 
		$this->default_fx = ['ucfirst','ucwords','strtoupper','strtolower','htmlspecialchars','trim','nl2br', 'number_format','stripslashes', 'strip_tags', 'md5','intval'];  
		$this->all_supported = ['addcslashes', 'addslashes', 'bin2hex', 'chop', 'chr', 'chunk_split', 'convert_cyr_string', 'convert_uudecode', 'convert_uuencode', 'count_chars', 'crc32', 'crypt', 'get_html_translation_table', 'hex2bin', 'html_entity_decode', 'htmlentities', 'htmlspecialchars_decode', 'lcfirst', 'ltrim', 'metaphone', 'money_format',  'ord', 'quotemeta', 'rtrim', 'sha1', 'soundex', 'str_rot13', 'str_word_count',  'stripcslashes', 'strlen', 'strrev', 'strtok','floatval','ceil','floor' ];
		$this->allow_fx = $this->default_fx; 
	}	
	
	/**
	* enable_cache()
	*
	* @param memcached - a memcache or memcached object
	* @param ttl - an integer, seconds to keep template in memory cache, default: 300/5 mins
	* @return void
	*/		
	public function enable_cache($memcached,$ttl=300) {
		if(is_object($memcached)) { 
			$this->mc = $memcached; 
			$this->ttl = $ttl;
			$this->caching = true; 
		}
	}
	
	/**
	* extend()
	*
	* add supported functions to template renderer
	* @return void
	*/		
	public function extend($functions=[]) {
		foreach($functions as $fx) { 
			if(!in_array($fx,['exec','system','passthru','shell_exec'])) {
				$this->allow_fx[] = $fx; 
			}
		}
	}

	/**
	* uncache()
	*
	* delete a template from memory cache
	* @return void
	*/		
	public function uncache($tmpl) { 
		if($this->caching) {
			$this->mc->delete(md5($tmpl));
		}
	} 

	/**
	* unextend()
	*
	* reset allowed functions to only defaults
	* @return void
	*/		
	public function unextend() { 
		$this->allow_fx = $this->default_fx;
	}

	/**
	* load_supported_functions()
	*
	* loads all known supported functions 
	* @return void
	*/		
	public function load_supported_functions() { 
		foreach($this->default_fx as $fx) { 
			$this->allow_fx[] = $fx; 
		}
		foreach($this->all_supported as $fx) { 
			$this->allow_fx[] = $fx; 
		}		
	}

	/**
	* load_template()
	*
	* @param $tmpl   - template file
	* @return string - template contents
    */		
	function load_template($tmpl) {
		if($this->caching) { 
			$text = $this->mc->get(md5($tmpl)); 
			if($text) { return $text; }
		}
		if(file_exists($this->tmpl_path.$tmpl)) {
			$text = file_get_contents($this->tmpl_path.$tmpl);
			if($this->caching) { $this->mc->set(md5($tmpl), $text, $this->ttl); }
			return $text;   
		} elseif(file_exists($this->tmpl_path.$tmpl.".tmpl")) {
				$tmpl .= ".tmpl";
				$text = file_get_contents($this->tmpl_path.$tmpl);
				if($this->caching) { $this->mc->set(md5($tmpl), $text, $this->ttl); }
			return $text;   			
		} elseif(file_exists($tmpl)) {
			$text = file_get_contents($tmpl); 
			if($this->caching) { $this->mc->set(md5($tmpl), $text, $this->ttl); }
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
								case 'escape': 
								case 'e': 
									$string = htmlspecialchars($string,ENT_QUOTES); 
									break;
								default: 
									if(function_exists($fx)) {
										if(in_array($fx,$this->allow_fx)) {
											$string = $fx($string); 
										}
									}
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
				$template = str_replace('[[uniqid]]',uniqid(),$template); 	
				$template = str_replace('[[year]]',date("Y"),$template);	 	
				$template = str_replace('{{'.$k.'}}',$v,$template); 
			endforeach; 
		endif; 
		return $template; 
	}
}

