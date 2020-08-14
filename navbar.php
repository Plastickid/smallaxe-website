<?php 
	include __DIR__.'/../../nav.php'; 
	echo "<br>";
?><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Small Axe Templating</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item<?php if('index'===$page) { ?> active<?php } ?>">
				<a class="nav-link" href="https://code.adamscheinberg.com/smallaxe-templating/">Home</a>
			</li>	
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Documentation
				</a>
				<div class="dropdown-menu">
<?php 
foreach (glob(__DIR__."/markdown/*.md") as $filename) {
    $mdfiles[] = str_replace(__DIR__."/markdown/",'',trim($filename));
}
foreach($mdfiles as $key=>$val) { 
	$val = trim($val);
	if(404==$val) continue; 
	$page_no_md = str_replace(".md","",$val);
?>						
					<a class="dropdown-item<?php if($page_no_md==$page) { ?> active<?php } ?>" href="https://code.adamscheinberg.com/smallaxe-templating/docs/<?php echo $val; ?>"><?php echo ucfirst($page_no_md); ?></a>
<?php } ?>
				</div>		
      		</li>
			<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Examples
				  </a>
				  <div class="dropdown-menu">
<?php for($i=1;$i<5;$i++) { ?>					  
					  <a class="dropdown-item<?php if($i==$page) { ?> active<?php } ?>" href="https://code.adamscheinberg.com/smallaxe-templating/examples/example<?php echo $i; ?>.php">Example <?php echo $i; ?></a>
<?php } ?> 
				  </div>		
      		</li>	
    		<li class="nav-item">
			  <a class="nav-link" href="https://github.com/sethadam1/smallaxe-templating/">Source @ Github</a>
			</li>	
		</ul>
		<ul class='navbar-nav mr-auto'>			  			  				
			<li class="nav-item">
				<a class="nav-link" href="/">code.adamscheinberg.com</a>
			</li>		
		</ul>
	</div>
</nav>	
