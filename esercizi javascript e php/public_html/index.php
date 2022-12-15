<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//IT"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

	<head>
		<title>Indice</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Geany 1.32" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	
	</head>

	<body>
		<br>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-4"></div>
				<div class="col-sm-4 text-center">
					<h1>Menù di selezione esercizi</h1>
				</div>
				<div class="col-sm-4 text-right">
					<p><br>Nori Rocco 5BIN</p>
				</div>
				
			</div>
		</div><br><br>
				
		<div class="container">
			
		<?php

			$file = scandir(".");
			echo "<div class='tabella'>
							<table class='table table-hover text-center'>
						
								<thead>
									<tr>
										<th>Nome esercizio</th>
										<th></th>
									</tr>
								</thead>
					";
			foreach ($file as &$x) {
				if(!($x == "index.php" || $x == "." || $x == ".." || $x == ".metadata")){

					echo "<tbody>
						
									<tr>
										<td>".$x."</td>
										<td><a href='".$x."'><button class='btn btn-info'><i class='fas fa-eye'></i> Vedi esercizio</button></a></td>
									</tr>
						
								</tbody>
							";
					}
				
				}
			echo "	</table>
				</div>";
		?>	

		</div>
			
	</body>

</html>
