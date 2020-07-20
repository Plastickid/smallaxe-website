<?php

# require the templating library 
require '../source/smallaxe_templating.php'; 

# first, you instanciate a Small Axe object
$T = new Smallaxe\smallaxe_template(__DIR__.'/../templates/');

$members = [
	['firstname'=>'steve', 'lastname'=>'howe', 'instrument'=>'guitar'],
	['firstname'=>'jon', 'lastname'=>'anderson', 'instrument'=>'vocals'],
	['firstname'=>'rick', 'lastname'=>'wakeman', 'instrument'=>'keyboards'],
	['firstname'=>'bill', 'lastname'=>'bruford', 'instrument'=>'drums'],
	['firstname'=>'chris', 'lastname'=>'squire', 'instrument'=>'bass'],
];

# here's one way to loop through, in PHP
$template2	 = $T->load_template("demo2-1.tmpl");
echo "Here's one way to loop, in PHP<ul>";
$bandlist = '';
foreach($members as $member) {
	$bandlist .= $T->render($template2,$member); 
}
echo $bandlist; 
echo "</ul>\n\n";

echo "<hr>";

# here's another way, in a template
echo "A second way is in the template itself";
$template2	 = $T->load_template("demo2-2.tmpl");
$args['members'] = $members; 
echo $T->render($template2,$args); 