<div>
	<h1>Form Modifica Persona PHP</h1>
	<form role="form" method="post" action="?model=persona&action=update">
		<label>Nome:</label> &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="nome" value=<?php echo $persona->getNome(); ?>><br><br>
		<label>Cognome:</label>	&nbsp;
		<input type="text" name="cognome" value=<?php echo $persona->getCognome(); ?>><br><br>
		<label>Anno:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" name="anno" value=<?php echo $persona->getAnno(); ?>><br><br>
		<div style="display:none;">
			<input type="text" name="id" value=<?php echo $persona->getIndice(); ?>>
		</div>
		<div>
			<input type="submit" name="send" value="INVIA" class="btn btn-dark">
			<a class="btn btn-dark" href="?model=persona">Torna Indietro</a>
		</div>
	</form>
</div>