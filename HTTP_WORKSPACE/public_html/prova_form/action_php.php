<!DOCTYPE html>
<html>
<body>

<?php

	$name = $_REQUEST['firstname'];
	$psw = $_REQUEST['psw'];
	
	if($name == "rocco" && $psw == "password"){
		echo "<h2>login effettuato correttamente</h2> <br/><h1>Benvenuto Rocco </h1>";
	}else{
		echo "utente o password errata";
	}

?>

</body>
</html>
