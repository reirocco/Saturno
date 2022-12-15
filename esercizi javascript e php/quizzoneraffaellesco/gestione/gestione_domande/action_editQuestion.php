<?php
	session_start();
	include("../../db_con.php");
	error_reporting(E_ALL);

	/* passo 1: controllo se l'immagine è da sostituire, in caso di si cancello la vecchia e carico la nuova */
	if(!empty($_FILES['chooseFile']['name'])){
		//l'immagine è diversa da quella originale, la vado a sostituire
		$old_image = $_POST['old_img_src'];
		if(!unlink($old_image)){
			die("Si è verificato un errore durante l'eliminazione del file.<br><a href='.'>Torna indietro</a>");
		}
		
		
		//carico la nuova immagine
		$target_dir = "../../immagini_quiz/";		//cartella di upload
		$target_file = $target_dir . basename($_FILES["chooseFile"]["name"]);		//file da caricare
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	//estensione file
		
		// controllo se l'immagine è veramente un'immagine
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["chooseFile"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
				die("Non è stata selezionato un file valido.<br><a href='.'>Torna indietro</a>");
			}
		}
		
		// controllo se esiste già il file desiderato
		if (file_exists($target_file)) {
			$uploadOk = 0;
			die("Il file esiste già.<br><a href='.'>Torna indietro</a>");
		}
		
		// controllo se è un file immagine
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$uploadOk = 0;
			die("Sono accettati solamente file immagini(JPG, PNG, JPEG, GIF).<br><a href='.'>Torna indietro</a>");
		}
		
		// se va tutto bene caricare il file
		if (move_uploaded_file($_FILES["chooseFile"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			die("Si è verificato un errore durante il caricamento del file.");
		}
	}


	/* passo 2: aggiorno i dati della domanda se non c'è nessun nuovo file da caricare */
	if(empty($_FILES['chooseFile']['name'])){
		$new_image = $_POST['old_img_src'];
	}else{
		$new_image = $target_file;
	}

	$r1 = $_POST['old_r1'];
	$r2 = $_POST['old_r2'];
	$r3 = $_POST['old_r3'];
	$r4 = $_POST['old_r4'];
	$resatta = $_POST['old_resatta'];
	$id = $_POST['question_id'];

	if(mysql_query("UPDATE domande SET id='" . $id . "', risposta1='" . $r1 . "', risposta2='" . $r2 . "', risposta3='" . $r3 . "', risposta4='" . $r4 . "', r_esatta='" . $resatta . "', link_immagine='" . $new_image . "' WHERE id='" . $id . "'")){
		header("location: .");
	}else{
		die("errore durante la query: " . mysql_error());
	}
?>