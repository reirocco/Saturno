<?php
	/* ottenimento dei destinatari (utenti tipo root) */
	session_start();
	include("../db_con.php");
	$result = mysql_query("SELECT `email` FROM `users` WHERE `tipoUtente` = 1");
	$array_destinatari = array();
	if(mysql_num_rows($result) > 0){
		while( $row = mysql_fetch_assoc( $result)){
			array_push($array_destinatari,$row['email']); // Inside while loop
		}
	}

	//mittente e destinatario
	$nome_mittente = $_POST['nome'];
	$email_mittente = $_POST['email'];
	$email_destinatario = implode(' ,',$array_destinatari);
	
	//altri dati della scuola
	$nome_istituto = $_POST['nomeScuola'];
	$indirizzo_istituto = $_POST['indirizzoIstituto'];
	$comune = $_POST['comune'];
	$cap = $_POST['cap'];
	$provincia = $_POST['provincia'];

	//oggetto
	$subject = 'RICHIESTA ISCRIZIONE AL QUIZZONE';
	
	//corpo messaggio
	$mail_corpo = '<html><body><h1>Richiesta iscrizione al Quizzone</h1><ul><li>Nome richiedente: ' . $nome_mittente . '</li><li>Email richiedente: ' . $email_mittente . '</li><li>Nome scuola: ' . $nome_istituto . '</li><li>Indirizzo: ' . $indirizzo_istituto . '</li><li>Comune: ' . $comune . '</li><li>CAP: ' . $cap . '</li><li>Provincia: ' . $provincia . '</li></ul></body></html>';

	// aggiusto un po' le intestazioni della mail
	// E' in questa sezione che deve essere definito il mittente (From)
	// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
	$mail_headers = "From: " .  $nome_mittente . " <" .  $email_mittente . ">\r\n";
	$mail_headers .= "Reply-To: " .  $email_mittente . "\r\n";
	$mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

	// Aggiungo alle intestazioni della mail la definizione di MIME-Version,
	// Content-type e charset (necessarie per i contenuti in HTML)
	$mail_headers .= "MIME-Version: 1.0\r\n";
	$mail_headers .= "Content-type: text/html; charset=iso-8859-1";

	if(mail($email_destinatario, $subject, $mail_corpo, $mail_headers))
		header("location:./successo/index.html");
	else
		echo "Errore nell'invio del messaggio: ";
		echo error_get_last()['message'];
?>