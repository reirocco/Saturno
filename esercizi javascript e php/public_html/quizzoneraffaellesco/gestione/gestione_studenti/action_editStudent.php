<?php
	session_start();
	include("../../db_con.php");
	
	$new_username = $_POST['username'];
	$new_password = $_POST['password'];
	$old_email = $_POST['old-email'];
	$new_email = $_POST['email'];
	$new_nomescuola = $_POST['nomeScuola'];
	$new_indirizzo = $_POST['indirizzo'];

	$id = mysql_result(mysql_query("SELECT `id` FROM `users` WHERE `email`='" . $old_email . "'"),0);

	$sql = "UPDATE `users` SET `username`='" . $new_username . "',`password`='" . $new_password . "',`tipoUtente`=0,`email`='" . $new_email . "',`nomeScuola`='" . $new_nomescuola . "',`indirizzoScuola`='" . $new_indirizzo . "', `id`='" . $id . "' WHERE id='" . $id . "'";

	if($new_email != "" and mysql_query($sql)){
		header("location: .");
	}else{
		echo "Errore durante la modifica dello studente: " . mysql_error();
	}
?>