<?php
    require './../DATI/array_users.php';
    $user = $_REQUEST['user'];
    $psw = $_REQUEST['psw'];

    if( array_key_exists($user, $users) && $users[$user] == $psw){
		header("location: ../WEB/scelta.php");
	}else{
		header("location: ../WEB/errlogin.html");
	}

?>