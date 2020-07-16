<?php

# require the templating library 
require '../smallaxe_templating.php'; 

# first, you instanciate a Small Axe object
$T = new Smallaxe\smallaxe_template('../templates/');

$data = [
	'subject'=>'Space',
	'grade'=>4,
	'suffix'=>'th',
	'fact'=>"Space is really, really big",
	'demo4-2.tmpl' => ['subject'=>'neptune', 'fact'=>"Neptune is the blue planet"],
	'demo4-3.tmpl' => ['subject'=>'geology' ]
];

# load template
$template	= $T->load_template("demo4-1");

echo $T->render($template,$data); 
