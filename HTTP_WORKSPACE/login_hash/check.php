<?php 
session_start();

require "config/db_con.php";


$username = $_REQUEST['username'];
$pwd = $_REQUEST['pwd'];
$login = false;

$username = $conn -> real_escape_string($username);
$pwd = $conn -> real_escape_string($pwd);
$pwd = hash("sha256", $pwd,0);

$sql =  "SELECT * FROM utenti WHERE username = '" . $username."'";
$result = $conn->query($sql) or die("Errore : ". mysqli_error($conn));

if($result->num_rows >0){
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