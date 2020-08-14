# Small Axe Templating

### Using templates

Once instantiated, you can use the Small Axe object multiple times. If you choose to do so, rather than hard-coding absolute paths to your templates, you may want to point to a location where your templates are stored. If that's the case, you'd call the `set_template_path` method. 

Instantiate the object

*$t = new Smallaxe\smallaxe_template();*

Set your template directory: 

*$template	 = $t->set_template_path('/path/to/templates/');*

If you use this, your file extension (either _tmpl_ or _tpl_) can be safely omitted. 

Next, you load your template of choice: 

*$template	 = $t->load_template('template-name.tmpl');*

Finally, you pass an associative array to the rendering function: 

*$html = $t->render($template,$data);*

Note that you can still pass an absolute path, it will work. So these are all valid: 

*$template	 = $t->load_template('template-name');*
*$template	 = $t->load_template('template-name.tmpl');*
*$template	 = $t->load_template('template-name.tpl');*
*$template	 = $t->load_template('/path/to/template-name.tmpl');*
*$template	 = $t->load_template('/path/to/template-name.some.other.extension');*

That's it. `$html` will now contain your ready-to-go output. 

You can see the output at [code.adamscheinberg.com](https://code.adamscheinberg.com/smallaxe-templating/)