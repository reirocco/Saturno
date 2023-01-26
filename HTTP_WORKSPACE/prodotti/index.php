<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

	<head>
		<title>HomePage</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<!--<link rel="stylesheet" type="text/css" href="css/style.css"/>-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	</head>

	<body>
		<div class="container text-center">
			<form method="get" action="web/action_index.php">
				<h1>Inserisci</h1>
				Linea di prodotto: <select name="linea">
					<option value="Default">Default</option>
					<option value="Classic Cars">Classic Cars</option>
					<option value="Motorcycles">Motorcycles</option>
					<option value="Planes">Planes</option>
					<option value="Ships">Ships</option>
					<option value="Trucks and Buses">Trucks and Buses</option>
					<option value="Vintage Cars">Vintage Cars</option>
					</select><br>
				Tipo statistica: <select name="tipo">
					<option value="">--Scegli un tipo di statistica--</option>
					<option value="v">Valore</option>
					<option value="q">Quantità</option>
				</select><br><br>
				<button type="submit" name="cerca">Cerca</button>
			</form>
		</div>
	</body>

</html>
