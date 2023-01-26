<?php
	session_start();
	include("../../db_con.php");

	$email = $_POST['usr_email'];

	if($email != "" && mysql_query("DELETE FROM `users` WHERE `email`='" . $email . "'")){
		exit;
	}else{
		die("Errore nell'eliminazione dell'utente: " . mysql_error());
	}
?>