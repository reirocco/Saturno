<!DOCTYPE html>
<html lang="en">
<head>
  <title>Risultati Ricerca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
    
    require "../model/PassaggioValori.class.php";
	
	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	
	$p1 = new PassaggioValori();
    
	if($id == "" && $nome != ""){
		$impiegati = $p1->getImpiegatiByName($nome);	
	}else if ($id != "" && $nome == ""){
		$impiegati = $p1->getImpiegatiById($id);
	}else if($id != "" && $nome != ""){
		$impiegati = $p1->getImpiegatiByNomeAndId($nome,$id);
	}else if($id == "" && $nome == ""){
		$impiegati = $p1->getAllImpiegati();
	}
	

	if(!is_null($impiegati)){

		echo "<table class='table'>
				<thead class='thead-dark'>
					<tr>
						<th scope='col'>ID</th>
						<th scope='col'>Nome</th>
						<th scope='col'>Cognome</th>
						<th scope='col'></th>
						<th scope='col'></th>
					</tr>
				</thead>
				<tbody>";

		foreach($impiegati as $impiegato){
			echo "<tr>
					<td>". $impiegato->getId() ."</td>
					<td>". $impiegato->getNome() ."</td>
					<td>". $impiegato->getCognome() ."</td>
					<td><button type='button' class='btn btn-outline-primary'>Modifica</button></td>
					<td><button type='button' class='btn btn-outline-primary'>Elimina</button></td>
				</tr>";
		}

		echo "</tbody>
		</table>";

	}else{
		echo "<div class='w3-container'> 
				<h1>Nessun Impiegato con i valori specificati</h1>
			</div>";
	}




?>


</body>
</html>
