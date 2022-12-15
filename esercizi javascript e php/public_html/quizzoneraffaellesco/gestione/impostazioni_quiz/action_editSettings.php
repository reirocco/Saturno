<?php
	session_start();
	include("../../db_con.php");

	/* controllo tipo di richiesta */
	$tipo_richesta = $_POST['type'];
	
	
	if($tipo_richiesta == "editName"){
		$nuovo_nome = $_POST['newName'];
		
		if(!mysql_query("UPDATE quizSettings SET nomeQuiz='" . $nuovo_nome . "' WHERE 1")){
			die("Errore durante il cambiamento del nome: " . mysql_error() . '<br><a href=".">Torna indietro</a>');
		}
	}
?>