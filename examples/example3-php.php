<?php

# require the templating library 
require '../smallaxe_templating.php'; 

# first, you instanciate a Small Axe object
$T = new Smallaxe\smallaxe_template(__DIR__.'/../templates/');

$members = [
	['firstname'=>'steve', 'lastname'=>'howe', 'instrument'=>'guitar'],
	['firstname'=>'jon', 'lastname'=>'anderson', 'instrument'=>'vocals'],
	['firstname'=>'rick', 'lastname'=>'wakeman', 'instrument'=>'keyboards'],
	['firstname'=>'bill', 'lastname'=>'bruford', 'instrument'=>'drums'],
	['firstname'=>'chris', 'lastname'=>'squire', 'instrument'=>'bass'],
];

# load demo2 template
$template2	= $T->load_template("demo2");
$bandlist 	= null;
foreach($members as $member) {
	# render the template and appoend it to the $bandlist variable
	$bandlist .= $T->render($template2,$member); 
}

# we don't need to instantiate the object ($T) again to use another template, just load a new template
$template3 = $T->load_template("demo3");

# we can use the output of the template above (stored in $bandlist) to feed into another template
$band = [
	'bandname' => 'yes',
	'year_formed'=>1968,
	'number_albums'=>21.2, //this will be corrected via intval
	'bandlist'=>$bandlist
];
echo $T->render($template3,$band); 
