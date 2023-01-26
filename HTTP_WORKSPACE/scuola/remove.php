<?php
	
	//Creo la connessione
	$host = "localhost";
	$username = "5b_nori";
	$psw = "5b_nori";
	$db = "5b_nori_Scuola";

	$conn = new mysqli($host,$username,$psw,$db);
	
	//effettuo controlli sulla connessione
	if($conn->connect_error){
		die("impossibile collegarsi al db");
	}
	
	$matricola = $_REQUEST['matricola'];


	if($matricola == "" ){
		die("inserire tutti i campi correttamente");
	}

	
	$sql = "DELETE FROM Docente WHERE Docente.matricola = '" . $matricola . "'; ";
	
	$conn -> query($sql) or die("errore nella query");
	header("location: ./remove.html");


?>