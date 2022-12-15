<!DOCTYPE html>
<html>
<body>

<?php
	session_start();
	if(empty($_SESSION['id'])){
		$id = "";
		$nome = "";
		$cognome = "";
	}else{
		$id = $_SESSION["id"];
		$nome= $_SESSION["nome"];
		$cognome = $_SESSION["cognome"];
		session_destroy();
	}
?>


<form action="./check.php" method='POST'>
	Id: <input type="number" name="id"  placeholder="Inserisci l'id" value="<?php echo $id ?>" required><br>
	Nome: <input type="text" name="nome" value="<?php echo $nome ?>" placeholder="Inserisci il nome" required><br>
	Cognome: <input type="text" name="cognome" value="<?php echo $cognome ?>" placeholder="Inserisci il cognome" required><br>
	<input type="submit" value="Inserisci">
</form>


</body>
</html>

