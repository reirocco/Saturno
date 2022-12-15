<?php
	require "../connection/db_con.php";
	$id = $_REQUEST["id"];
	$nome= $_REQUEST["nome"];
	$cognome = $_REQUEST["cognome"];
	
	$sql = "SELECT * FROM users WHERE id = ". $id ;
	$result = $conn->query($sql);
     
    if (mysqli_num_rows($result) == "0"){ 
		$sql = "insert into users values (".$id.",".$nome.",".$cognome.");";
		$result = $conn->query($sql) or die("Unable to ad ".mysqli_error());;
		echo $result;
		
    }else{ 
       echo "l'id esiste"; 
    }
	

	//$connessione->close();

?>
