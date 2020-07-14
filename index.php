<?php

require 'smallaxe_templating.php'; 

// Optionally, you can feed it a memcached object
$memcache = new Memcache();
$memcache->addServer("localhost", 11211);

$T = new Smallaxe\smallaxe_template(__DIR__.'/templates/',$memcache);

$vars = [
	'software_title' => "Small Axe Templating",
	"author"		  => "adam scheinberg", 
	'year'			  => "2020",
	'language'		 => "PHP",
	'rcs'			  => 'github',
	'test_text'		 => "<i><b>This should be escaped text</b></i>"
];

$template	 = $T->load_template("test.tmpl");
$html		 = $T->render($template,$vars); 

echo $html; 
