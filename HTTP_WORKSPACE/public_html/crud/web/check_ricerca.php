<!DOCTYPE html>
<html lang="en">
<head>
  <title>Risultati Ricerca</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
	
	foreach($impiegati as $impiegato){
		echo "";
	}
	//print_r($p1->getAllImpiegati());



?>


</body>
</html>
