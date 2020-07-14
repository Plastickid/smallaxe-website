# Small Axe Templating

Small Axe Templating is a simple PHP templating library that is designed to be extremely simple to use. There are three components to using a Small Axe template. 

### Use 

First, we instanciate the object and pass it the path to templates. 

``` $t = new Smallaxe\smallaxe_template('/path/to/templates/'); ```

Next, you load your template of choice: 

``` $template	 = $t->load_template('template-name.tmpl'); ```

Finally, you pass an associative array to the 

``` echo $t->render($template,$data); ```

### Operations

Small Axe Templating uses double curly braces for template variable, e.g. {{variable}}. You can also manipulate the variable using a piped function, e.g. {{variable|function}}. 

The functions that are current supported are: 
* upper &mdash; wrap output in strtoupper
* lower &mdash; wrap output in strtolower
* trim &mdash; trim output
* ucfirst &mdash; wrap output in ucfirst
* ucwords &mdash; wrap output in ucwords  
* escape &mdash; escape output
* e &mdash; an alias of _escape_
* nl2br &mdash; convert line breaks to HTML br tags





