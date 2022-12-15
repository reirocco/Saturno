<div>
	<h1>Form Aggiunta Persona PHP</h1>
	<form role="form" method="post" action="?model=persona&action=create">
		<label>Nome:</label> &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="nome" placeholder="Ex: Mario"><br><br>
		<label>Cognome:</label>	&nbsp;
		<input type="text" name="cognome" placeholder="Ex: Rossi"><br><br>
		<label>Anno:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="anno" placeholder="EX: 2000"> <br><br>
		<div class="spazio">	
			<input type="submit" name="send" value="INVIA" class="btn btn-dark">
			<a class="btn btn-dark" href="?model=persona">Torna Indietro</a>
		</div>
	</form>
</div>
