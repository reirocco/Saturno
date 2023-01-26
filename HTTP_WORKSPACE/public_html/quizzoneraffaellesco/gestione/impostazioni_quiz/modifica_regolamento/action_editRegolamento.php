<?php
	session_start();
	include("../../../db_con.php");

	$new_regolamento = $_POST['new_regolamento'];
	
	if(!empty($new_regolamento) && !mysql_query("UPDATE quizSettings SET regolamento='" . $new_regolamento . "'")){
		die("Impossibile aggiornare il regolamento: " . mysql_query());
	}
?>