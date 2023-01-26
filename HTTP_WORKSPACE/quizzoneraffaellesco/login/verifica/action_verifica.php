<?php
	session_start();// come sempre prima cosa, aprire la sessione 

	
	include("../../db_con.php"); // Include il file di connessione al database
	//viene inviata una mail che informa che si è o non si è riusciti ad accedere all'area amministratori

	//impostazione mail
	/*$nome_mittente = "Quizzone";
	$mail_mittente = "quizzoneraffaellesco@altervista.org";
	$mail_destinatario = $_SESSION['email'];
	$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
	$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
	$mail_headers .= "X-Mailer: PHP/" . phpversion();
	$mail_headers .= "MIME-Version: 1.0\r\n";
	$mail_headers .= "Content-type: text/html; charset=iso-8859-1";*/



	if($_SESSION['codiceVerifica'] == $_POST['codice']){
		unset($_SESSION['codiceVerifica']);
		/*$mail_oggetto = "E' stato autorizzato un accesso all'area amministratori";
		$mail_corpo = "<html><body><p><strong>E' stato autorizzato l'accesso a un utente nell'area amministratori.</strong><br>Dettagli tecnici:</p><ul><li>Orario di accesso e data: " . date('d/m/Y \a\l\l\e H:i:s') . "</li><li>IP del computer da dove è stato rilevato l'accesso: " . $_SERVER['REMOTE_ADDR'] . "</li></ul></body></html>";
		echo '<script>disableLoginBtn()</script>';
		mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers);*/
		$query = mysql_query("SELECT * FROM users WHERE email='".$_SESSION["email"]."'");
		unset($_SESSION['email']);
		$user = mysql_fetch_assoc($query);
		$session_value = json_encode($user);
		/*setcookie('qruser',$cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		$_SESSION['logged'] = true;*/
		$_SESSION['logged'] = TRUE;
		$session_value = json_encode($user);
		$_SESSION["qruser"] = $session_value;
		header("location: /gestione");
	}else{
		unset($_SESSION['codiceVerifica']);
		/*$mail_oggetto = "Qualcuno ha tentato di accedere all'area amministratori";
		$mail_corpo = "<html><body><p><strong>Qualcuno ha tentato di accedere all'area amministartori senza successo.</strong><br>Dettagli tecnici:</p><ul><li>Orario del tentativo e data: " . date('d/m/Y \a\l\l\e H:i:s') . "</li><li>IP del computer da dove è stato rilevato il tentativo: " . $_SERVER['REMOTE_ADDR'] . "</li></ul></body></html>";
		
		mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers);*/
		header("location: ./errore");
	}
?>