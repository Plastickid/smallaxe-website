<?php

# require the templating library 
require '../source/smallaxe_templating.php'; 

# first, you instantiate a Small Axe object
$T = new Smallaxe\smallaxe_template();

# set the template path
$T->set_template_path(__DIR__.'/../templates/');

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
