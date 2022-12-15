<?php
	$DBhost = "localhost";	//nome dell'host del database
	$username = "5b_nori";	//nome dell'username
	$password = "5b_nori";	//nome della password
	$DBname = "5b_classicmodels";	//nome del database
	

	// Crea la connessione
	$conn = new mysqli($DBhost, $username, $password, $DBname);
	
	// Controlla la connessione
	if ($conn->connect_error) {
		die("Connessione fallita: " . $conn->connect_error);
	}
?>
