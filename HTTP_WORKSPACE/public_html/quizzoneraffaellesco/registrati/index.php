<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Iscrizione al Quizzone</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="../img/logo_black.png">
	
	<!-- inizio importazione bootstrap e jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- fine importazione bootstrap e jquery-->
	
	<!-- inizio importazione stili e script personali -->
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<script src="/js/loginbtnsecure.js"></script>
	<!-- fine importazione stili e script personali-->
</head>

<body>
	<!-- inizio controllo apertura iscrizioni -->
	<?php
		session_start();
		include("../db_con.php");
		$iscrizioni_aperte = mysql_result(mysql_query("SELECT `iscrizioniAperte` from quizSettings LIMIT 1"),0);
		if($iscrizioni_aperte == 0){
			header("location:./coming_soon");
		}
	?>
	<!-- fine controllo apertura iscrizioni -->
	
	<div class="container-fluid">
		<div class="top-left">
			<a href="/" title="Torna alla home page"><img src="/img/logo_black.png" width="60"></a>
			&ensp;<a href="../"><button class="btn btn-light" type="button" style="width:auto"><i class="fa fa-chevron-circle-left"></i> Torna alla home</button></a>
		</div>
		<div class="top-right">
			<p>Wallpaper by • <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:11px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@martinadams?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Martin Adams"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Martin Adams</span></a></p>
		</div>
		
		<div class="middle">
			<?php
				session_start();
				include("../db_con.php");
				
				$nome_quiz = mysql_result(mysql_query("SELECT `nomeQuiz` FROM `quizSettings` LIMIT 1"),0);
			
				echo '<p class="big-text text-center">' . $nome_quiz . '</p><p class="ml-2">Iscrizioni aperte •<button onclick="apriRegolamento()" class="btn btn-regolamento">REGOLAMENTO</button></p>';
				
			?>
			
		</div>
		<div class="bottom-left">
			<button onclick="apriRegistrazione()" class="btn">ISCRIVITI ORA</button>
		</div>
		<div class="bottom-right">
			<?php
				session_start();
				include('../db_con.php');
				
				/* per ottenere i risultati delle date in italiano */
				mysql_query("SET NAMES 'utf8';");
				mysql_query("SET lc_time_names = 'it_IT';");
			
				/* ottenimento dati */
				$data_apertura = mysql_result(mysql_query("SELECT DATE_FORMAT(`dataApertura`,'%W %e %M %Y alle %H:%i') FROM `quizSettings` LIMIT 1"),0);
				$orario_inizio = mysql_result(mysql_query("SELECT DATE_FORMAT(`orarioInizio`,'%H:%i') FROM `quizSettings` LIMIT 1"),0);
				$orario_fine = mysql_result(mysql_query("SELECT DATE_FORMAT(`orarioFine`,'%H:%i') FROM `quizSettings` LIMIT 1"),0);
			
				/* differenza tra orario inizio e fine quiz */
				$differenza = date_diff(date_create($orario_inizio), date_create($orario_fine));
			
				echo '<p>Il quiz apre ' . $data_apertura . '<br>Inizia alle ore ' . $orario_inizio . '<br>Durata ';
			
				/* se il quiz dura più di un'ora stampo a video anche le ore, sennò solo i minuti */
				if($differenza->format("%H") > 0 && $differenza->format("%i") > 0){
					echo $differenza->format("%H ore e %i minuti");
				}else if($differenza->format("%H") > 0){
					echo $differenza->format("%H ore");
				}else{
					echo $differenza->format("%i minuti");
				}
			
				echo '</p>'
			?>
		</div>
	</div>
	
	<!-- inizio modale regolamento -->
	<div id="modalRegolamento" class="modal">
		<div class="modal-content">
			<h1>Regolamento</h1>
			<span onclick="chiudiRegolamento()" class="close">&times;</span>
			<?php
				session_start();
				include("../db_con.php");
				mysql_query("SET NAMES 'utf8';");
				$regolamento = mysql_result(mysql_query("SELECT `regolamento` FROM `quizSettings` LIMIT 1"),0);
				echo $regolamento;
			?>
		</div>
	</div>
	<!-- fine modale regolamento -->
	
	<!-- inizio overlay fullscreen registrazione -->
	<div class="overlay" id="registration-overlay">
		<div class="registration-box">
			<h1>Modulo d'iscrizione</h1>
			<span onclick="chiudiRegistrazione()" class="close close-reg-box">&times;</span>
			<p>Compila il seguente modulo per iscriverti al Quizzone. Non appena la richiesta verrà approvata riceverai i dati di accesso per poter partecipare al quiz.</p>
			<form autocomplete="off" name="formmail" method="post" action="./action_registration.php">
				<input class="textbox" type="text" id="nome" name="nome" placeholder="Il vostro nome" required/>
				<input class="textbox" type="email" id="email" name="email" placeholder="La vostra email" required/>
				<input class="textbox" type="text" id="nomeScuola" name="nomeScuola" placeholder="Nome dell'istituto" required>
				<input class="textbox" "text" id="indirizzoIstituto" name="indirizzoIstituto" placeholder="Indirizzo dell'istituto" required>
				<input class="textbox" type="text" id="comune" name="comune" placeholder="Comune" required>
				<input class="textbox" type="number" id="cap" name="cap" min="0" maxlength="6" placeholder="CAP" required>
				<select id="provincia" name="provincia" required>
					<option selected="selected" disabled>Provincia</option>
					<option>Agrigento</option>
					<option>Alessandria</option>
					<option>Ancona</option>
					<option>Aosta</option>
					<option>Arezzo</option>
					<option>Ascoli Piceno</option>
					<option>Asti</option>
					<option>Avellino</option>
					<option>Barletta-Andria-Trani</option>
					<option>Belluno</option>
					<option>Benevento</option>
					<option>Bergamo</option>
					<option>Biella</option>
					<option>Bolzano</option>
					<option>Brescia</option>
					<option>Brindisi</option>
					<option>Caltanissetta</option>
					<option>Campobasso</option>
					<option>Caserta</option>
					<option>Catanzaro</option>
					<option>Chieti</option>
					<option>Como</option>
					<option>Cosenza</option>
					<option>Cremona</option>
					<option>Crotone</option>
					<option>Cuneo</option>
					<option>Enna</option>
					<option>Fermo</option>
					<option>Ferrara</option>
					<option>Foggia</option>
					<option>Forlì-Cesena</option>
					<option>Frosinone</option>
					<option>Gorizia</option>
					<option>Grosseto</option>
					<option>Imperia</option>
					<option>Isernia</option>
					<option>L'Aquila</option>
					<option>La Spezia</option>
					<option>Latina</option>
					<option>Lecce</option>
					<option>Lecco</option>
					<option>Livorno</option>
					<option>Lodi</option>
					<option>Lucca</option>
					<option>Macerata</option>
					<option>Mantova</option>
					<option>Massa-Carrara</option>
					<option>Matera</option>
					<option>Modena</option>
					<option>Monza e Brianza</option>
					<option>Novara</option>
					<option>Nuoro</option>
					<option>Oristano</option>
					<option>Padova</option>
					<option>Parma</option>
					<option>Pavia</option>
					<option>Perugia</option>
					<option>Pesaro e Urbino</option>
					<option>Pescara</option>
					<option>Piacenza</option>
					<option>Pisa</option>
					<option>Pistoia</option>
					<option>Pordenone</option>
					<option>Potenza</option>
					<option>Prato</option>
					<option>Ragusa</option>
					<option>Ravenna</option>
					<option>Reggio Emilia</option>
					<option>Rieti</option>
					<option>Rimini</option>
					<option>Rovigo</option>
					<option>Salerno</option>
					<option>Sassari</option>
					<option>Savona</option>
					<option>Siena</option>
					<option>Siracusa</option>
					<option>Sondrio</option>
					<option>Sud Sardegna</option>
					<option>Taranto</option>
					<option>Teramo</option>
					<option>Terni</option>
					<option>Trapani</option>
					<option>Trento</option>
					<option>Treviso</option>
					<option>Trieste</option>
					<option>Udine</option>
					<option>Varese</option>
					<option>Verbano-Cusio-Ossola</option>
					<option>Vercelli</option>
					<option>Verona</option>
					<option>Vibo Valentia</option>
					<option>Vicenza</option>
					<option>Viterbo</option>
				</select><br><br>

				<button class="btn btn-reg btn-dark" type="submit">Invia Richiesta registrazione</button>
				<br><br>
			</form>
		</div>
		
	</div>
	<!-- fine overlay fullscreen registrazione -->
</body>

<script>
	function verificaEmail(email) {
	  var re = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
	  return re.test(email);
	}
	
	function apriRegolamento(){
		$("#modalRegolamento").fadeIn(250);
	}
	
	function chiudiRegolamento(){
		$("#modalRegolamento").fadeOut(250);
	}
	
	function apriRegistrazione(){
		$("#registration-overlay").fadeIn(250);
	}
	
	function chiudiRegistrazione(){
		$("#registration-overlay").fadeOut(250);
	}
</script>

</html>
