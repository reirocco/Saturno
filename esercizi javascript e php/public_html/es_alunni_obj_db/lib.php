<?php
	require 'costanti.php';

	
	function creaClasse(){
		require 'connection/db_con.php';
		require 'Model/Alunno.class.php';
		
	    $sql = 'select * from studenti';

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output dta of each row
			$array = array();
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$tmp = new Alunno($row['firstname'],$row['lastname']);
				$array[$i] = $tmp;
				$i++;
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		return $array;
	}
	
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
