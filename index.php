<html>
	<head>
		<style>
			body {
				color: black;
				font-family: Verdana; 
				padding:20px 5%;
			}
			h1 { background:#cff; padding:10px; }
			h2 { background:#ffc; padding:5px; }
			h3 { background:#ddd; padding:5px; }
			code { background:#eee; padding:2px; font-family:'courier new'; }		 
		</style>
		<title>Small Axe Templating</title>
		<script src="https://cdn.jsdelivr.net/remarkable/1.7.1/remarkable.min.js"></script>
	</head>
	<body>
		<div id="content">&nbsp;</div>
		<div id="mdsource" style="display:none"><?php include 'README.md'; ?></div>
		<script>
			var md = new Remarkable({ html: true });
			document.getElementById('content').innerHTML = md.render(document.getElementById('mdsource').innerHTML);
		</script>
	</body>
</html>