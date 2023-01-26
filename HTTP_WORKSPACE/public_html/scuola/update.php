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

	$sql = "UPDATE Docente set nome = '".$nome."', cognome = '".$cognome."' WHERE matricola = '".$matricola."' ";

	$conn -> query($sql) or die("errore nella query");
	header("location: ./update.html");
?>
