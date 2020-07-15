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

The functions that are current supported by default are: 
* trim 
* ucfirst 
* ucwords   
* nl2br 
* strtoupper
* strtolower
* htmlspecialchars
* number_format
* stripslashes
* strip_tags
* md5

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

A few notes: functions will only work if they accept a string with no further arguments and return a string. The functions that Small Axe Templating is known to support are: ```addcslashes, addslashes, bin2hex, chop, chr, chunk_split, convert_cyr_string, convert_uudecode, convert_uuencode, count_chars, crc32, crypt, get_html_translation_table, hex2bin, html_entity_decode, htmlentities, htmlspecialchars_decode, lcfirst, ltrim, metaphone, money_format, ord, quotemeta, rtrim, sha1, soundex, str_rot13, str_word_count, stripcslashes, strlen, strrev, strtok```

Small Axe will **not** accept the functions _exec(), system(), passthru(),_ or _shell_exec()_ as these functions can create dangerous execution conditions. 

### Other syntax
{{date|format}} is supported, where format is an unquoted string using the arguments at php.net/date. 
{{uniqid}} will generate a unique - [but not unguessable](https://www.php.net/uniqid) - identifier.  

## Interacting with the Small Axe object
``` $t->extend(['function1','function2','function3']); ``` will allow you to add additional supported functions 

```$t->unextend()``` will reset the allowed functions list to the small list of permitted default functions 

```$t->load_supported_functions()``` will load all known supported string functions




