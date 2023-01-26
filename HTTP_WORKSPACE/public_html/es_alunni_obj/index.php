<!DOCTYPE html>
<html>
<body>

<h2>Elenco Alunni Itis Mattei</h2>
<?php
	require 'res/costanti.php';
?>

<form action="action_page.php" method="GET">
	Seleziona la classe
	<select name="classe" type='text'>
	  
	  <option value=<?php echo DAT_5BIN;  ?>>5BIN</option>
	  <option value=<?php echo DAT_5AIN; ?>>5AIN</option>
	  <option value=<?php echo DAT_5CIN;  ?>>5CIN</option>
	</select>

	<br><br>

	  <input type="submit" value="Submit">
</form> 


</body>
</html>
