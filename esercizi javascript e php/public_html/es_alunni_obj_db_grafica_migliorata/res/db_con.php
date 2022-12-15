<?php
	$HOST = "localhost";
	$USERNAME = "5b19es";
	$PASSWORD = "5b19es";
	$DBNAME = "5b19es";

	// Create connection
	$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>
