<?php
	$HOST = "localhost";
	$USERNAME = "5b_nori";
	$PASSWORD = "5b_nori";
	$DBNAME = "5b_nori_escrud";

	// Create connection
	$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>
