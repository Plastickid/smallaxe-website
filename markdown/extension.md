# Small Axe Templating

### Extention
Small Axe can handle other functions in templates using the extend() method. For example:  
*$t->extend(['function1','function2','function3']);* 
will add additional functionality to the templating process. 

A few notes: functions will only work if they 1) accept a string with no further arguments and 2) return a string. The functions that Small Axe Templating is known to support are: `addcslashes, addslashes, bin2hex, chop, chr, chunk_split, convert_cyr_string, convert_uudecode, convert_uuencode, count_chars, crc32, crypt, get_html_translation_table, hex2bin, html_entity_decode, htmlentities, htmlspecialchars_decode, lcfirst, ltrim, metaphone, money_format, ord, quotemeta, rtrim, sha1, soundex, str_rot13, str_word_count, stripcslashes, strlen, strrev, strtok, floatval, ceil, floor`

Small Axe will **not** accept the functions `exec(), system(), passthru(),`` or `shell_exec()`` as these functions can create dangerous execution conditions. 

You can also define your own function extensions. For example:

```php
function custom_function($string) { 
	return '&quot;<i>'.ucwords(strtolower($string))."-".strtoupper($string).'&quot;</i>'; 
}
$T->extend(['custom_function']);
```

is valid syntax and will enable `custom_function()` inside your Small Axe templates. 