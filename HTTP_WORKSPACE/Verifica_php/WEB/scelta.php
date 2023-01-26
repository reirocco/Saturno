<!DOCTYPE html>
<html>
<body>

<h2>Elenco Squadre</h2>
<?php
	require '../LIB/costanti.php';
?>

<form action="elenco.php" method="POST">
	Seleziona la classe
	<select name="squadra" type='text'> 
	  <option value=<?php echo DAT_BIA;  ?>>Bianchi</option>
	  <option value=<?php echo DAT_VER; ?>>Verdi</option>
	  <option value=<?php echo DAT_BLU;  ?>>Blue</option>
	</select>

	<br><br>

	  <input type="submit" value="Submit">
</form> 


</body>
</html>
