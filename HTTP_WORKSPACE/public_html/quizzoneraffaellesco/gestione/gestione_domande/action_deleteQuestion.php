<?php
	session_start();
	include("../../db_con.php");
	
	$id = $_POST['id'];

	/* parte 1: eliminazione immagine */
	$immagine = mysql_result(mysql_query("SELECT `link_immagine` FROM `domande` WHERE `id`='" . $id . "'"),0);

	if(!unlink($immagine)){
		die("Si è verificato un errore durante l'eliminazione dell'immagine.<br><a href='.'>Torna indietro</a>");
	}

	
	/* parte 2: eliminazione da db */
	if(!mysql_query("DELETE FROM `domande` WHERE `id`='" . $id . "'")){
		die("Si è verificato un errore durante l'esecuzione della query: " . mysql_query() . "<br><a href='.'>Torna indietro</a>");
	}
?>