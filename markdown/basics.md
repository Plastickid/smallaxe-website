# Small Axe Templating

### Basics
Small Axe Templating is a simple PHP templating library that is designed to be extremely simple to use. There are three steps to using a Small Axe template. 

First, you instantiate the object and pass it the path to templates. 

*$t = new Smallaxe\smallaxe_template('/path/to/templates/');*

Next, you load your template of choice: 

*$template	 = $t->load_template('template-name.tmpl');*

Finally, you pass an associative array to the rendering function: 

*$html = $t->render($template,$data);*

That's it. `$html` will now contain your ready-to-go output. 

You can see the output at [code.adamscheinberg.com](https://code.adamscheinberg.com/smallaxe-templating/)