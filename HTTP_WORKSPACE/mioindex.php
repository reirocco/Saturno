<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Pagina di reindirizzamento</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
	  <h2>Esercizi svolti 2019-2020</h2>
	<?php

		$elementi = scandir(".");
		foreach ($elementi as &$x) {
			if(!($x == "index.php" || $x == "." || $x == ".." || $x == ".metadata")){

			echo "<div class='card' style='width:50%'>
				    <div class='card-body'>
							<h1>".$x."</h1>
				      <a href='".$x."' class='btn btn-primary'>Vai all'esercizio</a>
				    </div>
				  </div>
				  <br>";
			}
		}

	?>


	</div>




</body>

</html>
