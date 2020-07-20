# Small Axe Templating

### Functions 
You can also manipulate the variable using piped functions, e.g. `{{variable|function}}`. Note that functions can be chained, meaning `{{variable|function1|function2|function3}}` is valid syntax.  

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
* intval

The following short-hand functions are supported: 
* upper &mdash; wrap output in strtoupper
* lower &mdash; wrap output in strtolower
* escape &mdash; escape output
* e &mdash; an alias of <i>escape</i>
* sup &mdash; wrap output in sup tags
* sub &mdash; wrap output in sub tags

### Multi-argument functions
Small Axe templates support multi-argument functions in the format `{{var|function:arg1:arg2:arg3}}`. Currently, you can use the following functions: 

* substr:offset:length, e.g. `{{str|substr:3:10}}`

### Special functions

You can also use the shortcut function `ellipsis` to trim a string if it exceeds the argument. For example, `{{var|ellipsis:18}}` will trim and append "..." to a $var only if it exceeds 18 characters in length, including spaces. 

`{{date|format}}` is supported, where format is an unquoted string using the arguments at php.net/date. 