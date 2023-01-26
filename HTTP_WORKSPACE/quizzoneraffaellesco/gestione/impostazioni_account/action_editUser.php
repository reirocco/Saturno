<?php
	session_start();
	include("../../db_con.php");

	$new_username = $_POST['new_username'];
	$new_password = $_POST['new_password'];
	$new_email = $_POST['new_email'];
	$old_email = $_POST['old_email'];

	$id = mysql_result(mysql_query("SELECT `id` FROM `users` WHERE `email`='" . $old_email . "'"),0);

	if($new_email != "" && mysql_query("UPDATE `users` SET `username`='" . $new_username . "',`password`='" . $new_password . "',`tipoUtente`=1,`email`='" . $new_email . "',`id`='" . $id . "' WHERE id='" . $id . "'")){
		header("location: .");
	}else{
		echo "Errore durante la modifica dell'utente: " . mysql_error();
	}
?>