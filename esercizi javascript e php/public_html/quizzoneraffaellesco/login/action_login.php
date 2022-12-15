<!--Page php per effetuare il Login-->
<?php
	session_start();// come sempre prima cosa, aprire la sessione 
	include("../db_con.php"); // Include il file di connessione al database
	$_SESSION['logged'] = FALSE;
	$_SESSION["email"]=$_REQUEST["email"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
	$password = $_REQUEST["password"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password	
	$infezione = false;
	if ((preg_match('/\s+/', $_SESSION["email"])) || preg_match('/\s+/', $password) ) {
      $infezione = true;
  	}
	$_SESSION["email"] = mysql_real_escape_string($_SESSION["email"]);
	$password = mysql_real_escape_string($password);
	if(!$infezione){
		$query = mysql_query("SELECT * FROM users WHERE email='".$_SESSION["email"]."' AND password ='".$password."'");  //per selezionare nel db l'utente e pw che abbiamo appena scritto nel log
		//or DIE('query non riuscita'.mysql_error());
		// Con il SELECT qua sopra selezione dalla tabella users l utente registrato (se lo è) con i parametri che mi ha passato il form di login, quindi
		// Quelli dentro la variabile POST. username e password.
		if(mysql_num_rows($query)){        //se c'è una persona con quel nome nel db allora loggati
			
			$user = mysql_fetch_assoc($query);
			if($user['tipoUtente'] == 1){
				$_SESSION['errore_login'] = "";
				//echo "sono un amministratore";
				header("location: verifica/invio_email.php");
			}else{
				$_SESSION['errore_login'] = "";
				//echo "sono uno studente";
				//$_SESSION['user'] = $user;
				$_SESSION['logged'] = TRUE;
				$session_value = json_encode($user);
				$_SESSION["qruser"] = $session_value;
				//ini_set('session.gc_maxlifetime', '1');
				//$cookie_value = json_encode($user);
				//setcookie('qruser',$cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				//echo $_COOKIE['qruser'];
				header("location:/index.php"); 
			}
		}else{
			$_SESSION['errore_login'] = "<p style='color:#ff3333'>Email o Password errati.</p><br>";
			header("location:.");
		}
	}else{
		$_SESSION['errore_login'] = "<p style='color:#ff3333'>Email o Password errati.</p><br>";
		header("location:.");
	}
?>