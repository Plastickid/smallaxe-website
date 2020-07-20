# Small Axe Templating

### Loops
You can create loops in templates using the command ```@loop```. You must provide an argument called ```data```, where data is the name of the element in your $data array that itself contains an array of data. For example: 

```Smarty
<ul>
{{@loop data=people}}
	<li>{{firstname|ucwords}} {{lastname|ucwords}}</li>
{{/loop}}
</ul>
```

Would be called like so: 

<pre><div class='colorMe'>// prep the data array
$args['people'] = [
	['firstname'=>'Charlie', 'lastname'=>'Bucket'],
	['firstname'=>'Violet', 'lastname'=>'Beauregard'],
	['firstname'=>'Veruca', 'lastname'=>'Salt'],
];

// create the Small Axe object
$t = new Smallaxe\smallaxe_template('/path/to/templates/');

// load the template 
$template = $t->load_template('template-name.tmpl'); 

// render the template
echo $t->render($template,$args); </div></pre>

You can see this in action in [example 2](/smallaxe-templating/examples/example2.php).