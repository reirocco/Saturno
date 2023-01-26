<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Controllo accessi</title>
	<META name="viewport" content="width=device-width, initial-scale=1.0" />
	<LINK rel="icon" href="../../img/logo_black.png">
	
	<!-- inizio importazione bootstrap e jquery -->
	<SCRIPT src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></SCRIPT>
	<SCRIPT src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" INTEGRITY="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" CROSSORIGIN="anonymous"></SCRIPT>
	<LINK rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" INTEGRITY="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" CROSSORIGIN="anonymous">
	<script src="../js/popper.min.js"></script>
	<SCRIPT src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" INTEGRITY="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" CROSSORIGIN="anonymous"></SCRIPT>
	<!-- fine importazione bootstrap e jquery-->
	
	<!-- inizio importazione stili e script personali -->
	<LINK href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../style.css">
	<script src="../openMenu.js"></script>
	<script src="../../js/tableSearch.js"></script>
	<script src="/js/scrolltotop.js"></script>
	<script src="filter.js"></script>
	<!-- fine importazione stili e script personali-->
		
	<!-- inizio importazione fa per icone -->
	<script src="https://kit.fontawesome.com/bea6002302.js"></script>
	<!-- importazione fa per icone -->
</head>

<body>
	<div class="container-fluid">
		<!-- inizio sidebar -->
		<div class="sidenav">
			<div id="open-menu-btn">
				<a href="javascript:void(0)" onClick="visualizzaMenu()"><i class="fas fa-bars"></i></a>
			</div>
			<div id="hidden-btn">
				<a href="/gestione" title="Dashboard" class="active"><i class="fas fa-home"></i></a>
				<a href="/gestione/controllo_accessi/" title="Controllo accessi"><i class="fas fa-sign-in-alt"></i></a>
				<a href="/gestione/avanzamento_quiz/" title="Controllo avanzamento quiz"><i class="fas fa-tasks"></i></a>
				<a href="" title="Statistiche quiz"><i class="fas fa-chart-line"></i></a>
				<a href="" title="Log generale"><i class="fas fa-receipt"></i></a>
				<hr>
				<a href="/gestione/gestione_studenti/" title="Gestione scuole"><i class="fas fa-school"></i></a>
				<a href="/gestione/gestione_domande/" title="Gestione domande"><i class="fas fa-list"></i></a>
				<a href="/gestione/impostazioni_quiz/" title="Impostazioni quiz"><i class="fas fa-sliders-h"></i></a>
				<hr>
				<a href="" title="Avvio quiz"><i class="fas fa-play"></i></a>
			</div>
		</div>
		<!-- fine sidebar -->
		
		<!-- contenuto pagina -->
		<div class="main">
			<!-- inizio barra superiore -->
			<div class="topbar">
				<div class="dropdown">
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><img src="../img/user_avatar.png" width="40">&nbsp;&nbsp;
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
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../impostazioni_account">Impostazioni account</a>
						<a class="dropdown-item" href="#">Logout</a>
					</div>
				</div>
			</div>
			<!-- fine barra superiore-->
			
			<h1>Controllo accessi</h1>
			<p>In questa pagina è possibile controllare in tempo reale gli accessi degli studenti: verrà indicato se avrà effettuato l'accesso, se è in lista d'attesa per il quiz, se lo sta svolgendo e se l'ha completato. É possibile vedere l'avanzamento del quiz ed effettuare altre azioni per gli studenti partecipanti (come l'annullamento del quiz) nella pagina <a href="../avanzamento_quiz/">Controllo avanzamento quiz</a>.</p><br>
			
			<!-- inizio sezione ricerca -->
			<input class="form-control" type="text" id="search-box" onKeyUp="ricercaNomi()" placeholder="Ricerca username...">
			
			<div style="margin-top: 15px;">
				<span>Cerca: </span>
				<div class="form-check-inline">
					<label>
						<input type="radio" name="search-radio" value="search-username" checked> <span class="label-text">Username</span>
					</label>
				</div>
				<div class="form-check-inline">
					<label>
						<input type="radio" name="search-radio" value="search-istituto"> <span class="label-text">Istituto</span>
					</label>
				</div>
			</div>
			
			<!-- fine sezione ricerca -->
			
			<div class="table-responsive">
				<table class="table table-dark" id="tabella">
					<thead>
						<tr>
							<th>Username</th>
							<th>Istituto</th>
							<th>Login effettuato</th>
							<th>Attesa quiz</th>
							<th>Svolgimento quiz</th>
							<th>Quiz terminato</th>
						</tr>
					</thead>
					<tbody>
						<?php
							session_start();
							include("../../db_con.php");
						
							$result = mysql_query("SELECT * FROM `users` WHERE `tipoUtente`!=1 ORDER BY `id` ASC");
						
							if(mysql_num_rows($result) > 0){
								while($row = mysql_fetch_assoc($result)){
									echo '<tr><td>' . $row['username'] . '</td>';
									
									echo '<td>' . $row['nomeScuola'] . '</td><td><img src="img/no.svg" width="30"></td><td><img src="img/no.svg" width="30"></td><td><img src="img/no.svg" width="30"></td><td><img src="img/no.svg" width="30"></td></tr>';
								}
							}else{
								echo 'Nessun utente registrato.';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- pulsante torna su -->
		<button onClick="topFunction()" id="top-btn" title="Scorri in alto"><i class="fas fa-arrow-up"></i></button>
	</div>
</body>
</html>