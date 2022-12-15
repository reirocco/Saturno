<!--pagina per l'invio della email per verifica a due fattori-->
<?php
session_start();// come sempre prima cosa, aprire la sessione 
include("../db_con.php"); // Include il file di connessione al database
generatePsw($_SESSION['email']);


function generatePsw($email_destinatario){
		// Imposto la lunghezza della password a 10 caratteri
		$lung_pass = 5;
		
		// Creo un ciclo for che si ripete per il valore di $lung_pass
		for ($x=1; $x<=$lung_pass; $x++)
		{
			// Se $x è multiplo di 2...
			if ($x % 2){
			// Aggiungo una lettera casuale usando chr() in combinazione
			// con rand() che genera un valore numerico compreso tra 97
			// e 122, numeri che corrispondono alle lettere dell'alfabeto
			// nella tabella dei caratteri ASCII
			$mypass = $mypass . chr(rand(97,122));
			
			// Se $x non è multiplo di 2...
			}else{
				// Aggiungo alla password un numero compreso tra 0 e 9
				$mypass = $mypass . rand(0,9);
			}
		}
		
		$_SESSION["codiceVerifica"] = $mypass;
		
		// invio mail con codice
		$nome_mittente = "Quizzone";
		$mail_mittente = "qraffaellesco@gmail.com";
		$mail_oggetto = "Richiesta autenticazione area amministratori";
		
		$messaggio = "<html lang = 'it'>
							<head>
							<meta name='viewport' content='width=device-width, initial-scale=1'>
							<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
							<meta charset='UTF-8'>
							</head>			
							<body>
							<div class='w3-container w3-blue'>
							  <h1>Quizzone Raffaellesco</h1> 
							  <p>Richiesta autenticazione a 2 fattori</p> 
							</div>
							
							<div class='w3-row-padding'>
							  <div>
								<p>Abbiamo ricevuto la sua richiesta</p>
								 <h2>Password : " . $_SESSION['codiceVerifica'] . "</h2>
								 <p>La email e' stata autogenerata da <a href='http://quizzoneraffaellesco.altervista.org/'>quizzoneraffaellesco.altervista.org/</a></p>
								 
							  </div>
							</div>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
							</body>
							</html>";
		
			$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
			$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
			$mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

			// Aggiungo alle intestazioni della mail la definizione di MIME-Version,
			// Content-type e charset (necessarie per i contenuti in HTML)
			$mail_headers .= "MIME-Version: 1.0\r\n";
			$mail_headers .= "Content-type: text/html; charset=iso-8859-1";


		if(!mail($email_destinatario, $mail_oggetto, $messaggio, $mail_headers)){
			echo "errore nell'invio del messaggio";	
		}else{
			header("location: /login/verifica/");
		}
       }

?>