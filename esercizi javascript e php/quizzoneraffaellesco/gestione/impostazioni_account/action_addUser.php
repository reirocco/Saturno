<?php
	session_start();
	include("../../db_con.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$id = mysql_result(mysql_query("SELECT (`id` + 1) FROM `users` ORDER BY id DESC LIMIT 0, 1"),0);

	if($id == ""){
		$id = 0;
	}

	if($username != "" && mysql_query("INSERT INTO `my_quizzoneraffaellesco`.`users` (`username`, `password`, `tipoUtente`, `email`, `id`) VALUES ('" . $username . "', '" . $password . "', '1', '" . $email . "', '" . $id . "');")){
		header("location: .");
	}else{
		echo "Errore di inserimento dell'utente: " . mysql_error();
	}
?>