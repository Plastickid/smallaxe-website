# Small Axe Templating

### The options array 

The second, optional argument for the Small Axe Templating object is the `$options` array. You can specify configuration options at the time you instantiate the Small Axe object. 

`$options['replace_empty'] = bool;`

If `replace_empty` is set to true (or 1), any unmatched variable, e.g. `{{unmatched}}`, will be stripped from the rendered template. Turn this on if you don't want unmatched variables in your final HTML code. 

`$options['cache_compiled'] = bool;`

If `cache_compiled` is set to true (or 1), templates will be cached AFTER they are rendered. *Be very careful with this argument*, if there is user specific data in the template, it will be served to the next visitor!

`$options['memcached'] = object $Memcached;`

If `memcached` is a valid Memcached object, uncompiled templates will be loaded into memory, making template loading much faster on subsequent calls. 

`$options['ttl'] = int $ttl;`

`ttl` specifies the time to cache any data loaded into Memcached. If Memcached is not set, ttl will be ignored. 
