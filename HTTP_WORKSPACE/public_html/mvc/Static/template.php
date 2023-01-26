<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./Static/css/bootstrap.min.css">
		<link rel="stylesheet" href="./Static/css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
	</head>
	<body class="text-center">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  			<a class="navbar-brand" href="?">MVC</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarNavDropdown">
    			<ul class="navbar-nav">
      				<li class="nav-item active">
        				<a class="nav-link normal" href="?">Home <span class="sr-only">(current)</span></a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link normal" href="./../../gestione/list.php">Altro</a>
      				</li>
      				<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle normal" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          					Modelli
				        </a>
        				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          					<a class="dropdown-item bg-light" href="?model=persona">Persona</a>
          					<a class="dropdown-item bg-light" href="?">Animale</a>
          				</div>
      				</li>
    			</ul>
  			</div>
		</nav>
		
		<?php include($view); ?>
			
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script src="./Static/js/bootstrap.min.js"></script>	
	</body>
</html>