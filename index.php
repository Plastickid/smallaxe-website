<?php

require 'smallaxe_templating2.php'; 

$T = new Smallaxe\smallaxe_template(__DIR__.'/templates/');

$vars = [
	'software_title' => "Small Axe Templating",
	"author"	 	 => "adam scheinberg", 
	'year'		 	 => "2020",
	'language'		 => "PHP",
	'rcs'	 		 => 'github',
	'test_text'		 => "<i><b>This should be escaped text</b></i>"
];

$template	 = $T->load_template("test2.tmpl");
$html		 = $T->render($template,$vars); 

echo $html; 
