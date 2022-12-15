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
	$squadra = $_REQUEST['squadra'];
	
	$calciatori = creaSquadra($squadra);
	 
	
	echo '<h1>Calciatori '. $squadra . '</h1>';
	
	$arrlength = count($calciatori);
	
	//inizio tabella
	echo "<table>";
	for($x = 0; $x < $arrlength; $x++) {
		$calciatore = $calciatori[$x];
		//$calciatore = strtolower($calciatore);	//trasformo i caratteri della stringa maiuscoli in minuscoli
		//$calciatore = ucfirst($calciatore);	//traspormo in maiuscola la prima letera della stringa
		$calciatore = trasformaStringa($calciatore);
		echo "<tr><td>Nome : ". $calciatore ."</td><tr>";
	}
	echo "</table>";
	//fine tabella
	
?>
</body>
</htm
