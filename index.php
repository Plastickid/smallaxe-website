<?php

# require the templating library 
require 'smallaxe_templating.php'; 

# creating a memory cache system is optional
$memcache = new Memcached();
$memcache->addServer("localhost", 11211);

# You can feed the Small Axe object a memcached resource for storing uncompiled templates
$T = new Smallaxe\smallaxe_template(__DIR__.'/templates/',$memcache);

# you can also add functions that the template can parse
# currently, functions are only supported if they can take the value as an argument and return it as a string
# only functions explictly allowed will work
# this will add the "ucwords()" function  
$T->extend(['ucwords']); 

# define our variables
$vars = [
	'software_title' 	=> "Small Axe Templating",
	"author"		  	=> "adam scheinberg", 
	'year'			  	=> "2020",
	'language'		 	=> "php",
	'rcs'			  	=> 'github',
	'test_text'		 	=> "<i><b>This should be escaped text</b></i>"
];

# load template by passing either the file in the templates folder OR a hard coded path 
$template	 = $T->load_template("test.tmpl");

# compile the template 
$html		 = $T->render($template,$vars); 

# echo the template 
echo $html; 
