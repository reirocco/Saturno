<!DOCTYPE html>
<html>
<style>
table  {
	border-collapse:collapse
}
td, th {
	border:1px solid #ddd;
	padding:8px;
}
</style>
<body>
	

<?php
	require 'lib.php';
	
	$elencoAlunni = creaClasse();
	 
	
	echo '<h1>Elenco alunni </h1>';
	
	$arrlength = count($elencoAlunni);
	
	
	//inizio tabella
	echo "<table>
			<tr><th>Nome</th><th>Cognome</th></tr>";
	foreach ($elencoAlunni as &$x) {
		
		$nome = $x->getNome();
		$nome = trasformaStringa($nome);
		
		$cognome = $x->getCognome();
		$cognome = trasformaStringa($cognome);
		
		echo "<tr><td>". $nome ."</td><td>". $cognome ."</td><tr>";
	}
	echo "</table>";
	//fine tabella
	
?>
</body>
</htm
