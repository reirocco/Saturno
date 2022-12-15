<?php

require "../config/db_con.php";

$username = $_REQUEST['username'];
$pwd = $_REQUEST['pwd'];
$op = $_REQUEST['op'];

$username = $conn -> real_escape_string($username);
$pwd = $conn -> real_escape_string($pwd);
$pwd = hash("sha256", $pwd,0);

$sql =  "INSERT INTO `utenti` (`id`, `username`, `password`, `admin`) VALUES (NULL, '".$username."', '".$pwd."', '".$op."');";
$conn->query($sql) or die("Errore nll'inserimento dell'utente: ". mysqli_error($conn));

header("location: manage.html");




?>