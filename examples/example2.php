<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">		
		<style>
			body {
				padding:20px 5%;
			}
			code { padding:2px; font-family:'courier new'; }	
			.contentBox { padding-top:15px; }	 
		</style>
		<title>Small Axe Templating</title>
		<script src="https://cdn.jsdelivr.net/remarkable/1.7.1/remarkable.min.js"></script>
	</head>
	<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Small Axe Templating</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/examples/example1.php">Example 1</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/examples/example2.php">Example 2</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/examples/example3.php">Example 3</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/examples/example4.php">Example 4</a>
					</li>						
				</ul>
			</div>
		</nav>	
		<br>	
		
		<div class='card card-body bg-light'>
		<h1>Template Reuse</h1>
		<p>You can use a template multiple times.</p>
		</div><br>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link disabled sourceToggle" rel="#void" href="#void"><b>Example 2</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link active sourceToggle" rel="#compiledBox" href="#">Rendered</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#sourceBox" href="#">Source</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#tmplBox" href="#">demo2-1.tmpl</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#tmpl2Box" href="#">demo2-2.tmpl</a>
			</li>
		</ul>
		<div id='compiledBox' class='contentBox'>
<?php
# require the templating library 
require 'example2-php.php'; 
?>
		</div>
		<div id='sourceBox' class='contentBox'>
<?php
# highlight the templating library 
highlight_file('example2-php.php'); 
?>
		</div>		
		<div id='tmplBox' class='contentBox'>
<?php
# highlight the template  
highlight_file('../templates/demo2-1.tmpl'); 
?>
		</div>		
		<div id='tmpl2Box' class='contentBox'>
<?php
# highlight the template  
highlight_file('../templates/demo2-2.tmpl'); 
?>
		</div>				
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script>
		$(function() {
			$('.contentBox').hide();
			$('#compiledBox').show();
			$('.sourceToggle').click(function() { 
				var whichBox = $(this).attr('rel'); 
				$('.contentBox').hide(); 
				$('.sourceToggle').removeClass('active'); 
				$(whichBox).show(); 
				$(this).addClass('active');
			});
		}); 
		</script>	
	</body>
</html>