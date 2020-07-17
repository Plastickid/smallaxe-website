<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">		
		<style>
			body {
				padding:20px 5%;
			}
			h1 { background:#efe; padding:10px; }
			h2 { background:#ffe; padding:5px; }
			h3 { background:#cecece; padding:5px; }
			em { font-style:normal; background:#eee; color:#e83e8c; padding:2px; font-family:'courier new';}
			code { font-style:normal; background:#eee; color:#e83e8c; padding:2px; font-family:'courier new'; }	
			.colorMe, pre{ font-style:normal; color:#e83e8c; padding:2px; font-family:'courier new'; }	
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
					<li class="nav-item active">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/">Home <span class="sr-only">(current)</span></a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/examples/example1.php">Example 1</a>
					</li>
					<li class="nav-item">
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
		
		<div id="content" style='margin-top:20px;'>&nbsp;</div>
		<div id="mdsource" style="display:none"><?php include 'README.md'; ?></div>
		<script>
			var md = new Remarkable({ html: true});
			document.getElementById('content').innerHTML = md.render(document.getElementById('mdsource').innerHTML);
		</script>	
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>		
	</body>
</html>