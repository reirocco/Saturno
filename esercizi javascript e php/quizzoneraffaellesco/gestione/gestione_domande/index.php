<!-- pagina per la gestione delle domande -->
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestione domande</title>
	<META name="viewport" content="width=device-width, initial-scale=1.0" />
	<LINK rel="icon" href="../../img/logo_black.png">
	
	<!-- inizio importazione bootstrap e jquery -->
    
	<SCRIPT src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></SCRIPT>
	<SCRIPT src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" INTEGRITY="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" CROSSORIGIN="anonymous"></SCRIPT>
	<LINK rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" INTEGRITY="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" CROSSORIGIN="anonymous">
	<SCRIPT src="../js/popper.min.js"></SCRIPT>
	<SCRIPT src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" INTEGRITY="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" CROSSORIGIN="anonymous"></SCRIPT>
	<!-- fine importazione bootstrap e jquery-->
	
	<!-- inizio importazione stili e script personali -->
	<LINK href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<LINK rel="stylesheet" href="../style.css">
	<SCRIPT src="../openMenu.js"></SCRIPT>
	<script src="../../js/tableSearch.js"></script>
	<script src="scripts.js"></script>
	<script src="../../js/loginbtnsecure.js"></script>
    <script src="tableSelection.js"></script>
	<!-- fine importazione stili e script personali-->
		
	<!-- inizio importazione fa per icone -->
	<SCRIPT src="https://kit.fontawesome.com/bea6002302.js"></SCRIPT>
	<!-- importazione fa per icone -->
</head>

<body>
	<div class="container-fluid">
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
				
		<div class="main">
			<!-- inizio barra superiore -->
			<DIV class="topbar">
				<DIV class="dropdown">
					<BUTTON type="button" class="btn dropdown-toggle" DATA-TOGGLE="dropdown"><IMG src="../img/user_avatar.png" width="40">&nbsp;&nbsp;
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
						<A class="dropdown-item" href="../impostazioni_account">Impostazioni account</A>
						<A class="dropdown-item" href="/Logout">Logout</A>
					</DIV>
				</DIV>
			</DIV>
			<!-- fine barra superiore-->
				
			<!-- inizio contenuto -->
			<h1>Gestione domande</h1><br>
			
			<!-- inizio sezione ricerca -->
			<input class="form-control" type="text" id="search-box" onKeyUp="ricercaNomi()" placeholder="Ricerca per numero di domanda...">
			<br>
				
			<button type="button" class="btn btn-card" id="addQuestionBtn"><i class="fas fa-plus"></i>&nbsp;&nbsp;Aggiungi</button>
			<button type="button" class="btn btn-card" id='editBtn' disabled><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Modifica domanda</button>
			<button type="button" class="btn btn-card" id='deleteBtn' disabled><i class="fas fa-trash"></i>&nbsp;&nbsp;Elimina</button>
				
			<!-- inizio tabella -->
			<div class="table-responsive">
				<table class="table table-hover table-dark" id="tabella">
					<thead>
						<th>N. domanda</th>
						<th>Risposta 1</th>
						<th>Risposta 2</th>
						<th>Risposta 3</th>
						<th>Risposta 4</th>
						<th>Risposta esatta</th>
						<th>Immagine</th>
					</thead>
					<tbody>
						<?php
							session_start();
							include("../../db_con.php");
						
							$result = mysql_query("SELECT * FROM `domande` ORDER BY `id` ASC");
						
							if(mysql_num_rows($result) > 0){
								$ndomande = 1;
								while($row = mysql_fetch_assoc($result)){
									echo "<tr id='" . $row['id'] . "'><td class='nDomanda'>" . $ndomande . "</td><td class='risp1'>" . $row['risposta1'] . "</td><td class='risp2'>" . $row['risposta2'] . "</td><td class='risp3'>" . $row['risposta3'] . "</td><td class='risp4'>" . $row['risposta4'] . "</td><td class='rispCorretta'>" . $row['r_esatta'] . "</td><td><a id='img-" . $row['id'] . "' class='viev-img' href='javascript:void(0)'><img class='image-domanda' src='" . $row['link_immagine'] . "' width='60'></a></td></tr>";
									
									$ndomande = $ndomande + 1;
								}
							}else{
								echo 'Nessuna domanda aggiunta.';
							}
						?>
					</tbody>
				</table>
			</div>
			<!-- fine tabella -->
		</div>
	</div>
    
    <!--inizio modal per inserimento parametri domanda-->
    
   	<div id="addQuestionModal" class="modal">
		<div class="modal-content" style="margin: 4% auto;">
			<h4>Aggiungi una domanda</h4>
			<form method="post" action="action_addQuestion.php" enctype="multipart/form-data" class="form-group">
				Immagine: <input type="file" name="chooseFile" id="chooseFile" class="upload_file" required>
				Risposta 1: <input type="text" class="form-control" name="r1" id="r1" required>
				Risposta 2: <input type="text" class="form-control" name="r2" id="r2" required>
				Risposta 3: <input type="text" class="form-control" name="r3" id="r3" required>
				Risposta 4: <input type="text" class="form-control" name="r4" id="r4" required>
				Risposta esatta: 
				<select class="form-control" name="resatta" id="resatta" required>
					<option disabled>numero risposta esatta (1-4)</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select><br>
				
				<button type="submit" name="submit" class="btn btn-card">Aggiungi</button>
				<button type="button" class="btn btn-card" onClick="closeModal('addQuestionModal')">Annulla</button>
			</form>
		</div>
	</div>
    <!--fine modal per inserimento parametri domanda-->
    
	<!-- inizio modale immagine -->
	<div id="modalImage" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="internalImg">
	</div>
	<!-- fine modale immagine -->
    
    
    <!-- inizio modale modifica Domanda -->
	<div id="editQuestionModal" class="modal">
		<div class="modal-content" style="margin: 4% auto;">
			<h4>Modifica domanda</h4>
			<form class="form-group" method="post" action="action_editQuestion.php" enctype="multipart/form-data">
				Immagine: <br><img id="old-image" width="100%">
				Cambia immagine: <input type="file" name="chooseFile" class="upload_file" id="chooseFile2">

				Risposta 1: <input type="text" class="form-control" name="old_r1" id="old_r1" required>
				Risposta 2: <input type="text" class="form-control" name="old_r2" id="old_r2" required>
				Risposta 3: <input type="text" class="form-control" name="old_r3" id="old_r3" required>
				Risposta 4: <input type="text" class="form-control" name="old_r4" id="old_r4" required>
				Risposta esatta: 
				<select class="form-control" name="old_resatta" id="old_resatta" required>
					<option disabled>numero risposta esatta (1-4)</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select><br>
				
				<input type="number" name="question_id" id="question_id" style="display: none;" readonly>
				<input type="text" name="old_img_src" id="old_img_src" style="display: none;" readonly>
				
				<button type="submit" name="submit" class="btn btn-card">Modifica</button>
				<button type="button" class="btn btn-card" onClick="closeModal('editQuestionModal')">Annulla</button>
			</form>
		</div>
	</div>
	<!-- fine modale modifica domanda -->
</body>
</html>