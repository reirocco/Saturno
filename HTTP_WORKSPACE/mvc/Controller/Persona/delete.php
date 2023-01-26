<div>
	<h1>Script Elimina Persona PHP</h1>
	<div>
		<ul>
			<li><?php echo "Nome persona eliminato: " . $persona->getNome(); ?></li>
			<li><?php echo "Cognome persona eliminato: " . $persona->getCognome(); ?></li>
			<li><?php echo "Anno persona eliminato: " . $persona->getAnno(); ?></li>
		</ul>
		<a href="?model=persona">Torna all'elenco</a>
	</div>
</div>