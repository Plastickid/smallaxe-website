# Small Axe Templating

### Nested templates
You can include templates within templates by using the syntax `{{@template file=template_name}}` where ```template_name``` is the file name of the template, e.g. _test.tmpl_. Templates can be nested within nested templates recursively, as well. 

Data within nested templates will be in the outer template's scope. In other words, you will load your $data for all templates, including nested templates, in the initial $data array.  To specify different values for nested templates, you can created an array within your data array with an index of the template name and rewrite the elements. For example: 

<pre>
template.tpl
	- template2.tpl
		- template3.tpl 
	- template4.tpl 
</pre>

<pre>
$data => Array[
	x => string_a,
	y => string_b,
	z => string_c,
	template2 = Array[
		z => string_d
	]
]
</pre>

In template 1 and 4, x will be "string_a", y will be "string_b", and z will be "string_d".

In template 2 and 3, however, x will be "string_a", y will be "string_b", and **z will be "string_d".** Because $data['template2']['x'] exists, it overwrites $data['x'] for template 2. And template 3 will be fed by template 2. If you want data for template 3, you'd need to create an array like this: 
 
<pre>
$data => Array[
	x => string_a,
	y => string_b,
	z => string_c,
	template2 = Array[
		z => string_d
		template3 => Array[
			y => string_e
			z => string_f
		]
	]
]
</pre>
