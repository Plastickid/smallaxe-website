# Small Axe Templating

## Caching
Small Axe Templating supports a number of in-meory caching operations. In order to use caching, you'll need to have either [Memcache](https://www.php.net/memcache) or [Memcached](https://www.php.net/memcached) enabled. Once you have a Memcached object, you will pass it to your Small Axe object using the _enable_cache()_ method. 
  
*$t->enable_cache(resource $memcache, int $ttl)* will enable memory caching of uncompiled templates. You can pass a Memcache or Memcached resource to enable to cache. An optional $ttl will specify the "time to live" of your memcached object, which defaults to 300 seconds. You may want to set $ttl to a large number to reduce file system reads. 1 day - 86400 seconds - or 30 days - which is a value of 2592000 - are reasonable numbers for templates that don't change often.   
 
*$t->uncache()* will delete the memcached entry for a template. If you've made changes to a template with a long $ttl, you can uncache it.   

Small Axe allows you to store compiled templates as well. **You should not use this for user specific data!** You can do this manually or automatically. 

*$t->cache_compiled(true)* will enable the caching of compiled templates. By default, this option is set to false. 

Similarly, *$t->cache_compiled(false)* will disable caching of compiled templates. 

*$t->cache_create($tmpl,$text,$ttl)* will manually cache a template. $tmpl is the name of the template, $text is the compiled template text, and $ttl is the cache length, which defaults to 86400, or 1 day. If you attempt to store a template that already exists, **it will fail**. 

*$t->cache_create($tmpl,$text,$ttl)* will manually cache a template. $tmpl is the name of the template, $text is the compiled template text, and $ttl is the cache length, which defaults to 86400, or 1 day. If you attempt to store a template that already exists, **the old value will be overwritten by the new one**. 

*$t->cache_read($tmpl)* will retrieve a compiled template from cache. 

*$t->cache_destroy($tmpl)* will delete a compiled template from cache. 