<!--gestione studenti-->
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestione studenti</title>
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
	<script src="tableSelection.js"></script>
	<script src="gestione.js"></script>
	<script src="/js/tableSearch.js"></script>
	<script src="/js/loginbtnsecure.js"></script>
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
				<a href="/gestione/gestione_studenti/" title="Gestione studenti"><i class="fas fa-school"></i></a>
				<a href="/gestione/gestione_domande/" title="Gestione domande"><i class="fas fa-list"></i></a>
				<a href="/gestione/impostazioni_quiz/" title="Impostazioni quiz"><i class="fas fa-sliders-h"></i></a>
				<hr>
				<a href="" title="Avvio quiz"><i class="fas fa-play"></i></a>
			</div>
		</div>
		<!-- fine sidebar -->
		
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
						<a class="dropdown-item" href="/Logout">Logout</a>
					</div>
				</div>
			</div>
			<!-- fine barra superiore-->
			
			<h1>Gestione studenti</h1><br>
			
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
						<input type="radio" name="search-radio" value="search-email"> <span class="label-text">Email</span>
					</label>
				</div>
				<div class="form-check-inline">
					<label>
						<input type="radio" name="search-radio" value="search-nomescuola"> <span class="label-text">Nome scuola</span>
					</label>
				</div>
				<div class="form-check-inline">
					<label>
						<input type="radio" name="search-radio" value="search-indirizzo"> <span class="label-text">Indirizzo scuola</span>
					</label>
				</div>
			</div><br>
			
			<!-- fine sezione ricerca -->
			
			<button id="addUserBtn" class="btn btn-card"><i class="fas fa-plus"></i>&nbsp;&nbsp;Aggiungi nuovo</button>
			<button id="editBtn" class="btn btn-card" disabled><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Modifica</button>
			<button id="deleteBtn" class="btn btn-card" disabled><i class="fas fa-trash"></i>&nbsp;&nbsp;Rimuovi</button>
			<br>
			
			<div class="table-responsive">
				<table class="table table-hover table-dark" id="tabella">
					<thead>
						<tr>
							<th>Username</th>
							<th>Password</th>
							<th>Email</th>
							<th>Nome scuola</th>
							<th>Indirizzo scuola</th>
						</tr>
					</thead>
					<tbody>
						<?php
							session_start();
							include("../../db_con.php");
							
							$result = mysql_query("SELECT * FROM `users` WHERE tipoUtente = 0 ORDER BY `id` ASC");
						
							if(mysql_num_rows($result) > 0){
								while($row = mysql_fetch_assoc($result)){
									echo '<tr id="' . $row['id'] . '"><td class="td-username">' . $row['username'] . '</td><td class="td-password">' . $row['password'] . '</td><td class="td-email">' . $row['email'] . '</td><td class="td-nomescuola">' . $row['nomeScuola'] . '</td><td class="td-indirizzo">' . $row['indirizzoScuola'] . '</td></tr>';
								}
							}else{
								echo '<tr>Nessuno studente registrato.</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<!-- inizio modale aggiungi studente -->
	<div id="addStudentModal" class="modal">
		<div class="modal-content">
			<h4>Aggiungi studente</h4>
			<form method="post" action="action_addStudent.php" class="form-group">
				Username: <input id="username" class="form-control" type="text" name="username" required>
				Password (<a href="javascript:void(0)" onClick="generaPassword()">clicca qui</a> per generarne una automatica): <input id="password" class="form-control" type="password" name="password" required>
				E-mail: <input id="email" class="form-control" type="email" name="email" required>
				<hr>
				Nome scuola: <input id="nomeScuola" class="form-control" type="text" name="nomeScuola" required>
				Indirizzo: <input id="indirizzo" class="form-control" type="text" name="indirizzo" required><br>
				
				<button type="submit" id="addUserBtn" class="btn btn-card">Aggiungi studente</button><button type="button" id="closeAddModalBtn" class="btn btn-card">Annulla</button>
			</form>
		</div>
	</div>
	<!-- fine modale aggiungi studente -->
	
	<!-- inizio modale modifica studente -->
	<div id="editStudentModal" class="modal">
		<div class="modal-content">
			<h4>Modifica studente</h4>
			<form method="post" action="action_editStudent.php" class="form-group">
				Username: <input id="new-username" class="form-control" type="text" name="username" required>
				Password (<a href="javascript:void(0)" onClick="generaPasswordModificata()">clicca qui</a> per generarne una automatica): <input id="new-password" class="form-control" type="password" name="password" required>
				E-mail: <input id="new-email" class="form-control" type="email" name="email" required>
				<hr>
				Nome scuola: <input id="new-nomeScuola" class="form-control" type="text" name="nomeScuola" required>
				Indirizzo: <input id="new-indirizzo" class="form-control" type="text" name="indirizzo" required><br>

				<input class="form-control" type="email" id="old-email" name="old-email" readonly style="display: none;;">

				<button type="submit" id="editUserBtn" class="btn btn-card">Modifica studente</button><button type="button" id="closeEditModalBtn" class="btn btn-card">Annulla</button>
			</form>
		</div>
	</div>
	<!-- fine modale modifica studente -->
</body>
</html>