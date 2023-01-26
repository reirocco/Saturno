<?php 
session_start();

require "../config/db_con.php";

//recupero il nome utente e la password
$username = $_REQUEST['username'];
$pwd = $_REQUEST['pwd'];
$login = false;

$username = $conn -> real_escape_string($username);
$pwd = $conn -> real_escape_string($pwd);
//trasforma la password in hash
//echo "username ". $username;
//echo "<br>password non cifrata ". $pwd;
$pwd = hash("sha256", $pwd,0);
//echo "<br>password cifrata ". $pwd;

//controllo se lo user esiste nel db, se esiste restituisce tutto dell'utente.
$sql =  "SELECT * FROM utenti WHERE username = '" . $username."'";
$result = $conn->query($sql) or die("Errore : ". mysqli_error($conn));


if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	
	if($row['password'] == $pwd){
		$login = true;
	}else{
			$login = false;
	}
}else{ $login = false;}
	

if($login){
	$_SESSION['logged'] = true;
	echo "login effettuato";
}else{
	echo "ritenta sarai più fortunato";
}

	


?>