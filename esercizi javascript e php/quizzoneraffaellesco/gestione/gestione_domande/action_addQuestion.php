<?php
	session_start();
	include("../../db_con.php");

	/* parte 1: caricamento dell'immagine */
	error_reporting(E_ALL);
	$target_dir = "../../immagini_quiz/";						//cartella dove viene caricata l'immagine
	$target_file = $target_dir . basename($_FILES["chooseFile"]["name"]);		//percorso file
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));		//tipologia file
	
	// controllo se l'immagine è effettivamente un'immagine
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
			die('Non è stata selezionato un file valido.<br><a href=".">Torna indietro</a>');
		}
	}

	// controllo se il file già esiste
	if (file_exists($target_file)) {
		$uploadOk = 0;
		die('Il file selezionato è già stato caricato.<br><a href=".">Torna indietro</a>');
	}

	// controllo se il file è di tipo immagine
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$uploadOk = 0;
		die('Sono accettati solamente i file immagini (es. JPG, PNG, JPEG, GIF).<br><a href=".">Torna indietro</a>');
	}

	// controllo se non ci sono errori
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// se va tutto bene caricare l'immagine
	} else {
		if (move_uploaded_file($_FILES["chooseFile"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["chooseFile"]["name"]). " has been uploaded.";
		} else {
			die('Si è verificato un errore nel caricamento del file.<br><a href=".">Torna indietro</a>');
		}
	}


	/* parte 2: caricamento delle domande */
	$r1 = mysql_real_escape_string($_POST['r1']);
	$r2 = mysql_real_escape_string($_POST['r2']);
	$r3 = mysql_real_escape_string($_POST['r3']);
	$r4 = mysql_real_escape_string($_POST['r4']);
	$resatta = mysql_real_escape_string($_POST['resatta']);
	
	$sql = "INSERT INTO domande (id, risposta1, risposta2, risposta3, risposta4, r_esatta, link_immagine) VALUES (NULL, '" . $r1 . "', '" . $r2 . "', '" . $r3 . "', '" . $r4 . "', '" . $resatta . "', '" . mysql_real_escape_string($target_file) . "')";

	if (mysql_query($sql)) {
		header("location: .");
	} else {
		die("Error: " . $sql . "<br>" . mysql_error());
	}
?>