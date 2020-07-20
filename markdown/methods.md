# Small Axe Templating

## Interacting with the Small Axe object
*$t->extend(['function1','function2','function3']);* will allow you to add additional supported functions 

*$t->unextend()* will reset the allowed functions list to the small list of permitted default functions 

*$t->load_supported_functions()* will load all known supported string functions