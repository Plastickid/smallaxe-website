# Small Axe Templating

Small Axe Templating is a simple PHP templating library that is designed to be extremely simple to use. There are three components to using a Small Axe template. 

### Use 

First, we instanciate the object and pass it the path to templates. 

``` $t = new Smallaxe\smallaxe_template('/path/to/templates/'); ```

Next, you load your template of choice: 

``` $template	 = $t->load_template('template-name.tmpl'); ```

Finally, you pass an associative array to the rendering function: 

``` echo $t->render($template,$data); ```

### Variables 

Small Axe Templating uses double curly braces for template variable, e.g. {{variable}}. If a curly-brace-wrapped variable matches the index of your data array, it will be replaced in your rendered template. If it doesn't match an argument, it will be left alone.  

### Functions 
You can also manipulate the variable using piped functions, e.g. {{variable|function}}. Note that functions can be chained, meaning {{variable|function1|function2|function3}} is valid syntax.  

The functions that are current supported are: 
* trim &mdash; trim output
* ucfirst &mdash; wrap output in ucfirst
* ucwords &mdash; wrap output in ucwords  
* nl2br &mdash; convert line breaks to HTML br tags

The following short-hand functions are supported: 
* upper &mdash; wrap output in strtoupper
* lower &mdash; wrap output in strtolower
* escape &mdash; escape output
* e &mdash; an alias of _escape_
* rot13 &mdash; rotate letters 13 characters forward

### Extention
Small Axe can handle other functions in templates using the extend() method. For example:  
``` $t->extend(['function1','function2','function3']); ``` 
will add additional functionality to the templating process. 
A few notes: functions will only work if they accept a string with no further arguments and return a string. Also, Small Axe will not accept the functions exec(), system(), passthru(), or shell_exec() as these functions can create dangerous execution conditions. 

### Other syntax
{{date|format}} is supported, where format is an unquoted string using the arguments at php.net/date.  

## Interacting with the Small Axe object
``` $t->extend(['function1','function2','function3']); ``` will allow you to add additional supported functions 
```$t->unextend()``` will reset the allowed functions list to the small list of permitted default functions 
```$t->load_supported_functions()``` will load all known supported string functions




