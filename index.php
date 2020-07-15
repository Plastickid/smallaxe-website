<?php

# require the templating library 
require 'smallaxe_templating.php'; 


# first, you instanciate a Small Axe object
$T = new Smallaxe\smallaxe_template(__DIR__.'/templates/',$memcache);

# You can feed the Small Axe object a memcached resource for storing uncompiled templates
# a memory cache system is optional
$memcache = new Memcached();
$memcache->addServer("localhost", 11211);
$T->enable_cache($memcache); 

# you can also add functions that the template can parse
# currently, functions are only supported if they can take the value as an argument and return it as a string
# only functions explicitly allowed will work in your templates
# this will add the "sha1()" function  
$T->extend(['sha1']); 

# the extend method will also accept your custom functions
function custom_function($string) { 
	return '&quot;<i>'.ucwords(strtolower($string))."-".strtoupper($string).'&quot;</i>'; 
}
$T->extend(['custom_function']); 

# define our variables
$vars = [
	'software_title' 	=> "Small Axe Templating",
	"author"		  	=> "adam scheinberg", 
	'year'			  	=> "2020",
	'language'		 	=> "php",
	'test_text'		 	=> "<i><b>This should be escaped text</b></i>",
	'random'			=> "This is a random string"
];

# load template by passing either the file in the templates folder OR a hard coded path 
# if no file extension is provided and no file is matched without extension, it will assume ".tmpl"
$template	 = $T->load_template("test");

# compile the template 
$html		 = $T->render($template,$vars); 

# echo the template 
echo $html; 
