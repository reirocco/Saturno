<div>
	<h1>Script Aggiunta Persona PHP</h1>
	<div>
		<ul>
			<li><?php echo "Nome persona aggiunto: " . $persona->getNome(); ?></li>
			<li><?php echo "Cognome persona aggiunto: " . $persona->getCognome(); ?></li>
			<li><?php echo "Anno persona aggiunto: " . $persona->getAnno(); ?></li>
		</ul>
		<a href="?model=persona">Torna all'elenco</a>
	</div>		
</div>	
