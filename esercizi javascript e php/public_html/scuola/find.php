  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Find page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<?php 

	$host = "localhost";
	$username = "5b_nori";
	$psw = "5b_nori";
	$db = "5b_nori_Scuola";

	$conn = new mysqli($host,$username,$psw,$db);

	if($conn->connect_error){
		die("impossibile collegarsi al db");
	}

	$matricola = $_REQUEST['matricola'];
	$nome = $_REQUEST['nome'];
	$cognome = $_REQUEST['cognome'];

	$sql = "SELECT * FROM Docente";

	$where = " WHERE ";
	
	if($matricola != ""){
		$where .= " Docente.matricola = '".$matricola."'";
	}
	if($nome != ""){
		if($matricola != ""){
			$where .= " AND ";
		}
		$where .= " Docente.nome LIKE '%".$nome."%'";
	}
	if($cognome != ""){
		if($matricola != "" || $nome != ""){
			$where .= " AND ";
		}
		$where .= " Docente.cognome LIKE '%".$cognome."%'";
	}
	
	$sql .= $where;
	

	$result = $conn -> query($sql) or die("errore nella query");
	writeTable($result);
	



	function writeTable ($tmp){
		echo "<table class=\"table\">"
			  ."<thead>"
				."<tr>"
				  ."<th >Matricola</th>"
				  ."<th >Nome</th>"
				  ."<th >Cognome</th>"
				."</tr>"
			  ."</thead>"
			  ."<tbody>";
		
		while($row = $tmp -> fetch_assoc()){
		 	echo "<tr>"
			  ."<td>".$row['matricola']."</td>"
			  ."<td>".$row['nome']."</td>"
			  ."<td>".$row['cognome']."</td>"
			."</tr>";
		}
		
		echo  "</tbody></table>";
	}
	

?>
	</div>
	
	</body>
</html>