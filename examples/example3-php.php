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
$template2	 = $T->load_template("demo2");

echo "<ul>";
$bandlist = '';
foreach($members as $member) {
	$bandlist .= $T->render($template2,$member); 
}
echo $bandlist; 
echo "</ul>";

# we can use the output of the template above to feed back into another template
$band = [
	'bandname' => 'yes',
	'year_formed'=>1968,
	'number_albums'=>21,
	'bandlist'=>$bandlist
];
$template3 = $T->load_template("demo3");
echo $T->render($template3,$band); 
