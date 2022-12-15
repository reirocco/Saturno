<?php
	session_start();
	include("../../db_con.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nome_scuola = $_POST['nomeScuola'];
	$indirizzo = $_POST['indirizzo'];
	$id = mysql_result(mysql_query("SELECT (`id` + 1) FROM `users` ORDER BY id DESC LIMIT 0, 1"),0);
	
	if($id == ""){
		$id = 0;
	}

	$sql = "INSERT INTO users (username, password, tipoUtente, email, nomeScuola, indirizzoScuola, id)
	VALUES ('" . $username . "', '" . $password . "', '0', '" . $email . "', '" . $nome_scuola . "', '" . $indirizzo . "', '" . $id . "')";

	if($username != "" and mysql_query($sql)){
		header("location: .");
	}else{
		echo "Errore nella creazione dello studente: " . mysql_error();
	}
?>