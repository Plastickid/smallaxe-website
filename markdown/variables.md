# Small Axe Templating

### Using Variables

Small Axe Templating uses double curly braces for template variable, e.g. `{{variable}}`. If a curly-brace-wrapped variable matches an index of your $data array, it will be replaced by the value of that array element your rendered template. 

If a curly-brace-wrapped variable doesn't match an argument in your array, it will be left alone and rendered in the final output. You can change this behavior in two ways. 

If you terminate a variable with an exclamation point, e.g. `{{variable!}}`, it will be either replaced normally or it will be force stripped from the final output. 

Alternatively, you can enable this behavior globally using the `replace_options` argument, which is discussed on the [options](options.md) page.    

Small Axe uses double brackets for dynamic replacement. `[[year]]`, for example, will show the current year.  

### Dynamic Placeholders
Dynamics placeholders will be replaced in the rendered template, but accept no arguments. 

* `[[year]]` will display the current year.  
* `[[uniqid]]` will generate a unique - [but not unguessable](https://www.php.net/uniqid) - identifier. 
* `[[timestamp]]` will generate a current UNIX timestamp 
* `[[datetime]]` will generate a MySQL compatible timestamp in the current server timezone, e.g. YYYY-mm-dd 24:00:00
* `[[utcdatetime]]` will generate a MySQL compatible timestamp in UTC, e.g. YYYY-mm-dd 24:00:00