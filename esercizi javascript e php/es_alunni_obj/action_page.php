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
	require 'res/lib.php';
	$classe = $_REQUEST['classe'];
	
	$elencoAlunni = creaClasse($classe);
	 
	
	echo '<h1>Elenco alunni '. $classe . '</h1>';
	
	$arrlength = count($elencoAlunni);
	
	//inizio tabella
	echo "<table>
			<tr><th>Nome</th><th>Cognome</th><th>Residenza</th></tr>";
	foreach ($elencoAlunni as &$x) {
		
		$nome = $x->getNome();
		$nome = trasformaStringa($nome);
		
		$cognome = $x->getCognome();
		$cognome = trasformaStringa($cognome);
		
		$residenza = $x->getResidenza();
		$residenza = trasformaStringa($residenza);
		
		echo "<tr><td>". $nome ."</td><td>". $cognome ."</td><td>". $residenza ."</td><tr>";
	}
	echo "</table>";
	//fine tabella
	
?>
</body>
</htm
