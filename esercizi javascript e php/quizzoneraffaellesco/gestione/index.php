<!doctype html>
<HTML>
<HEAD>
	<META CHARSET="utf-8">
	<TITLE>Dashboard - Amminstrazione Quizzone</TITLE>
	<META name="viewport" content="width=device-width, initial-scale=1.0" />
	<LINK rel="icon" href="../img/logo_black.png">
	
	<!-- inizio importazione bootstrap e jquery -->
	<SCRIPT src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></SCRIPT>
	<SCRIPT src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" INTEGRITY="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" CROSSORIGIN="anonymous"></SCRIPT>
	<LINK rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" INTEGRITY="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" CROSSORIGIN="anonymous">
	<SCRIPT src="../js/popper.min.js"></SCRIPT>
	<SCRIPT src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" INTEGRITY="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" CROSSORIGIN="anonymous"></SCRIPT>
	<!-- fine importazione bootstrap e jquery-->
	
	<!-- inizio importazione stili e script personali -->
	<LINK href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<LINK rel="stylesheet" href="style.css">
	<SCRIPT src="openMenu.js"></SCRIPT>
	<!-- fine importazione stili e script personali-->
		
	<!-- inizio importazione fa per icone -->
	<SCRIPT src="https://kit.fontawesome.com/bea6002302.js"></SCRIPT>
	<!-- importazione fa per icone -->
</HEAD>

<BODY>
	<DIV class="container-fluid">
		<!-- inizio sidebar -->
		<DIV class="sidenav">
			<DIV id="open-menu-btn">
				<A href="javascript:void(0)" onClick="visualizzaMenu()"><I class="fas fa-bars"></I></A>
			</DIV>
			<DIV id="hidden-btn">
				<A href="/gestione" title="Dashboard" class="active"><I class="fas fa-home"></I></A>
				<A href="/gestione/controllo_accessi/" title="Controllo accessi"><I class="fas fa-sign-in-alt"></I></A>
				<A href="/gestione/avanzamento_quiz/" title="Controllo avanzamento quiz"><I class="fas fa-tasks"></I></A>
				<A href="" title="Statistiche quiz"><I class="fas fa-chart-line"></I></A>
				<A href="" title="Log generale"><I class="fas fa-receipt"></I></A>
				<HR>
				<A href="/gestione/gestione_studenti/" title="Gestione studenti"><I class="fas fa-school"></I></A>
				<A href="/gestione/gestione_domande/" title="Gestione domande"><I class="fas fa-list"></I></A>
				<A href="/gestione/impostazioni_quiz/" title="Impostazioni quiz"><I class="fas fa-sliders-h"></I></A>
				<HR>
				<A href="" title="Avvio quiz"><I class="fas fa-play"></I></A>
			</DIV>
		</DIV>
		<!-- fine sidebar -->
		
		
		
		<!-- contenuto pagina -->
		<DIV class="main">
			<!-- inizio barra superiore -->
			<DIV class="topbar">
				<DIV class="dropdown">
					<BUTTON type="button" class="btn dropdown-toggle" DATA-TOGGLE="dropdown"><IMG src="img/user_avatar.png" width="40">&nbsp;&nbsp;
                    	<?php 
							session_start();
							$session_name = "qruser";
							if(!isset($_SESSION['logged']) && !isset($_SESSION[$session_name]) && $_SESSION['logged'] == true){
								 header('Location:/');
							} else {
								$user = json_decode($_SESSION[$session_name], true);
                                if($user['tipoUtente'] == 1){
									echo $user['username'];
                                } else{
                                	header('Location:/');
                                }
                               
							}
					?>
                    
                    </BUTTON>
					<DIV class="dropdown-menu">
						<A class="dropdown-item" href="./impostazioni_account">Impostazioni account</A>
						<A class="dropdown-item" href="/Logout">Logout</A>
					</DIV>
				</DIV>
			</DIV>
			<!-- fine barra superiore-->
			
			<!-- inizio schede -->
			<DIV class="row">
				<DIV class="col-md-8">
					<!-- inizio scheda n. utenti connessi -->
					<DIV class="card">
						<DIV class="card-body">
							<H4 class="card-title">Utenti</H4>
							<?php
								session_start();
								include("../db_con.php");
							
								$result2 = mysql_query("SELECT * FROM `users` WHERE `tipoUtente`=0");
							
								
								echo '<p class="card-text"><h5 class="big-number">' . mysql_num_rows($result2) . '</h5> studenti iscritti</p>';
							?>
							
							<BUTTON onClick="window.location = './gestione_studenti/'" class="btn btn-card">Gestione studenti</BUTTON>
						</DIV>
					</DIV>
					<!-- fine scheda n. utenti connessi -->
			
					<!-- inizio scheda caratteristiche quiz -->
					<DIV class="card">
						<DIV class="card-body">
							<H4 class="card-title">Caratteristiche quiz</H4>
							
							<?php
								session_start();
								include("../db_con.php");
							
								/* per ottenere i risultati delle date in italiano */
								mysql_query("SET NAMES 'utf8';");
								mysql_query("SET lc_time_names = 'it_IT';");
							
								$num_domande = mysql_query("SELECT * FROM `domande` WHERE 1");
								$data_apertura = mysql_result(mysql_query("SELECT DATE_FORMAT(`dataApertura`,'%W %e %M %Y alle %H:%i') FROM `quizSettings` LIMIT 1"),0);
								$orario_inizio = mysql_result(mysql_query("SELECT DATE_FORMAT(`orarioInizio`,'%H:%i') FROM `quizSettings` LIMIT 1"),0);
								$orario_fine = mysql_result(mysql_query("SELECT DATE_FORMAT(`orarioFine`,'%H:%i') FROM `quizSettings` LIMIT 1"),0);
								
								/* differenza tra orario inizio e fine quiz */
								$differenza = date_diff(date_create($orario_inizio), date_create($orario_fine));
							
								echo '<p class="card-text"><h5 class="big-number">' . mysql_num_rows($num_domande) . '</h5> domande</p>';
								echo '<p class="card-text"><h5 class="big-number">';
								
								/* se il quiz dura più di un'ora stampo a video anche le ore, sennò solo i minuti */
								if($differenza->format("%H") > 0 && $differenza->format("%i") > 0){
									echo $differenza->format("%H ore e %i minuti");
								}else if($differenza->format("%H") > 0){
									echo $differenza->format("%H ore");
								}else{
									echo $differenza->format("%i minuti");
								}

								echo '</h5> Durata</p>';
							
								echo '<p class="card-text"><strong>Apre</strong> ' . $data_apertura . '; <strong>inizia alle</strong> ' . $orario_inizio . '</p>';
							?>
							
							<BUTTON onclick="window.location='./gestione_domande';" class="btn btn-card">Gestione domande</BUTTON>
							<BUTTON class="btn btn-card">Gestione quiz</BUTTON>
						</DIV>
					</DIV>
					<!-- fine scheda caratteristiche quiz -->
				</DIV>
				<DIV class="col-md-4">
					<!-- inizio scheda log -->
					<DIV class="card logcard">
						<DIV class="card-body">
							<H4 class="card-title" style="display: inline;">Log</H4>&nbsp;&nbsp;&nbsp;
							<A href="#" class="card-link">Ingrandisci</A>
							<DIV class="alert-container">
								<DIV class="alert">
									<STRONG>Success!</STRONG> Indicates a successful or positive action.<BR><EM>10 secondi fa</EM>
								</DIV>
								<DIV class="alert">
									<STRONG>Success!</STRONG> Indicates a successful or positive action.<BR><EM>10 secondi fa</EM>
								</DIV>
								<DIV class="alert">
									<STRONG>Success!</STRONG> Indicates a successful or positive action.<BR><EM>10 secondi fa</EM>
								</DIV>
								<DIV class="alert">
									<STRONG>Success!</STRONG> Indicates a successful or positive action.<BR><EM>10 secondi fa</EM>
								</DIV>
								<DIV class="alert">
									<STRONG>Success!</STRONG> Indicates a successful or positive action.<BR><EM>10 secondi fa</EM>
								</DIV>
								<DIV class="alert">
									<STRONG>Success!</STRONG> Indicates a successful or positive action.<BR><EM>10 secondi fa</EM>
								</DIV>
							</DIV>
						</DIV>
					</DIV>
					<!-- fine scheda log -->
					
				</DIV>
			</DIV>
			<!-- fine schede -->
		</DIV>
	</DIV>
</BODY>
</HTML>
