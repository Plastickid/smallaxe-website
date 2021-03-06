<?php

# require the templating library 
require '../source/smallaxe_templating.php'; 

# first, you instantiate a Small Axe object
$T = new Smallaxe\smallaxe_template();

# set the template path
$T->set_template_path(__DIR__.'/../templates/');

# You can feed the Small Axe object a memcached resource for storing uncompiled templates
# a memory cache system is optional
$memcache = new Memcached();
$memcache->addServer("localhost", 11211);
$T->enable_cache($memcache); 

# you can also add functions that the template can parse
# currently, functions are only supported if they can take the value as an argument and return it as a string
# only functions YOU explicitly allow will work in your templates
# for example, this will add the "sha1()" and "str_rot13" functions  
$T->extend(['sha1', 'str_rot13']); 

# the extend() method will also accept your custom functions
function custom_function($string) { 
	return '&quot;<i>'.ucwords(strtolower($string))."-".strtoupper($string).'&quot;</i>'; 
}
$T->extend(['custom_function']); 

# define our variables
$vars = [
	'software_title' 	=> "Small Axe Templating",
	"author"		  	=> "adam scheinberg", 
	'year'			  	=> date('Y'),
	'language'		 	=> "php",
	'test_text'		 	=> "<i><b>This should be escaped text</b></i>",
	'random'			=> "This is a random string",
	'longstring'		=> "The quick brown fox jumped over the lazy dog"
];

# load template by passing either the file in the templates folder OR a hard coded path 
# when searching the template directory, if no file extension is provided and no file is matched without an extension, 
# it will assume ".tmpl" or ".tpl"
$template	 = $T->load_template("demo1");

# compile the template 
$html		 = $T->render($template,$vars); 

# echo the template 
echo $html; 