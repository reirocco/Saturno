<?php
	require "../connection/db_con.php";
	$id = $_REQUEST["id"];
	$nome= $_REQUEST["nome"];
	$cognome = $_REQUEST["cognome"];
	
	$sql = "SELECT * FROM users WHERE id = ". $id ;
	$result = $conn->query($sql);
     
    if (mysqli_num_rows($result) == "0"){ 
		$sql = "insert into users values ('".$id."','".$nome."','".$cognome."')";
		$result = $conn->query($sql) or die("Unable to ad sql -->". $sql);
		header('Location: gestione.php');
		
    }else{
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['nome'] = $nome;
		$_SESSION['cognome'] = $cognome;
		header("Location: gestione.php");
    }
	

	$connessione->close();
?>
