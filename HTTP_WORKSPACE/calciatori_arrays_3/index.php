<!DOCTYPE html>
<html>
<body>

<h2>www.giocatori.it</h2>
<?php
	require 'res/costanti.php';
?>

<form action="action_page.php" method="GET">
	Seleziona la squadra
	<select name="squadra" type='text'>
	  
	  <option value=<?php echo DAT_JUV;  ?>>Juve</option>
	  <option value=<?php echo DAT_MIL; ?>>Milan</option>
	  <option value=<?php echo DAT_ROM;  ?>>Roma</option>
	</select>

	<br><br>

	  <input type="submit" value="Submit">
</form> 


</body>
</html>
