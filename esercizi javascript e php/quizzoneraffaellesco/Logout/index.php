<!--pagina per effettuare il logout-->
<?php 
	session_start();// come sempre prima cosa, aprire la sessione 
	// verifico se il cookie esiste
	$name = 'qruser';
	$session_name = "qruser";
	$user = json_decode($_SESSION[$session_name], true);
	//echo 'logged : ' . $_SESSION["logged"];
	//echo "<br>";
	//echo 'user : ' . $_SESSION[$name]['email'];
	//echo "<br>";
	
if(isset($_SESSION['logged']) && isset($_SESSION[$session_name])) {
	//unsetto il cookie con le informazioni utente
  	//setcookie($name, '', time()-3600, '/');
	//unset($_COOKIE[$name]);
	$_SESSION[$name] = null;
	$_SESSION["logged"] = false;
	unset($_SESSION["logged"]);
	unset($_SESSION[$name]);
    session_destroy();
	//echo 'logged : ' . $_SESSION["logged"];
	//echo "<br>";
	//echo 'user : ' . $_SESSION[$name]['email'];
	//header("location:/index.php");
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
}else{
	header("location:/index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>


<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">
      <h1>Logout eseguito correttamente</h1>
      <button type="button" onClick="document.location.href='/index.php';" class="btn">Home</button>
      <button type="button" onClick="document.location.href='/login';" class="btn">Accedi</button>
      <p></p>
    </div>
</div>
</body>
</html>
