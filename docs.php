<?php

require "./vendors/parsedown-master/Parsedown.php"; 
$Parsedown = new Parsedown();

?><html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">		
		<style>
			body {
			padding:20px 5%;
			}
			h1 { padding:10px; }
			h2 { padding:5px; }
			h3 { padding:5px; }
			em { font-style:normal; color:#e83e8c; padding:2px; font-family:'courier new';}
			code { font-style:normal; color:#e83e8c; padding:2px; font-family:'courier new'; }	
			.colorMe, pre{ font-style:normal; color:#e83e8c; padding:2px; font-family:'courier new'; }	
		</style>
		<title>Small Axe Templating</title>
	</head>
	<body>
		
<?php 
	$file = "File Not Found"; $filename='404'; $page=false; 
	if(preg_match('/[A-Za-z0-9-_]+/U',$_GET['file'])) {
		$filename = $_GET['file']; 
	} 
	if(file_exists("./markdown/".$filename.".md")) { 
		$page = $filename;
		$file = "./markdown/".$filename.".md";
	} 
	include 'navbar.php'; 
?>		
		<br><br>
		<div class='row'>
			<div class='col'>
				<div class='card bg-light'>
					<div class='card-body'>
<?php
	echo $Parsedown->text(file_get_contents($file)); 
?>
					</div>
				</div>
			</div> <!-- /col --> 
			<div class='col col-lg-3'>
				<div class="list-group list-group-flush">
					<a class="list-group-item list-group-item-secondary">Documentation</a>
<?php foreach($mdfiles as $key=>$val) { 
	$val = trim($val);
	if(404==$val) continue; 
	$page_no_md = str_replace(".md","",$val);
?>					
					<a class="list-group-item list-group-item-action<?php if($page_no_md==$page) {?>  list-group-item-warning<?php } ?>"  href="<?php echo $val; ?>"><?php echo ucfirst($page_no_md); ?></a>
<?php } ?>		
				</div>
			</div> <!-- /col --> 
		</div> <!-- /row --> 
			
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>		
	</body>
</html>