<!DOCTYPE html>
<html>
<header>    
    <link href="../CSS/file.css" rel="stylesheet" type="text/css">    
</header>
<body>
	

<?php
    require '../LIB/costanti.php';
	$squadra = $_REQUEST['squadra'];
	
	if($squadra == DAT_BIA){
        require "../DATI/array_bianchi.php";
    }elseif($squadra == DAT_VER){
        require "../DATI/array_verdi.php";
    }elseif($squadra == DAT_BLU){
        require "../DATI/array_blue.php";
    }
	 
	
	echo '<h1>Elenco alunni '. $squadra . '</h1>';
	
	
	//inizio tabella
	echo "<table>
			<tr><th>Nome</th><th>Cognome</th><th>Residenza</th></tr>";
	foreach ($nomi as $x => $x_value) {
		
		echo "<tr><td>". $x ."</td><td>". $x_value ."</td><td>". $residenze[$x] ."</td><tr>";
	}
	echo "</table>";
	//fine tabella
	
?>
</body>
</htmL>
