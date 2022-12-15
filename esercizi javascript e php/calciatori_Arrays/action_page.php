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
	$squadra = $_REQUEST['squadra'];
	
	if($squadra == 'Juve'){
		include 'juve/index.php';
	}elseif($squadra == 'Milan'){
		include 'milan/index.php';
	}elseif($squadra == 'Roma'){
		include 'roma/index.php';
	}
	
	echo '<h1>Calciatori '. $nome_sqadra . '</h1>';
	
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
	
	function trasformaStringa($string){
		$string = explode (" ", $string);
		$final_string = "";
		foreach ($string as &$x) {
			$x = strtolower($x);
			$x = ucfirst($x);
			$final_string .=  " ".$x;
		}
		return $final_string;
	}
	
?>
</body>
</htm
