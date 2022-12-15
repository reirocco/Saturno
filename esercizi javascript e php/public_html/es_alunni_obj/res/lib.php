<?php
	require 'costanti.php';
	
	function creaClasse($classe){
	    
		if($classe == DAT_5BIN){
		    require "5BIN.php";
		}elseif($classe == DAT_5AIN){
		    require "5AIN.php";
		}elseif($classe == DAT_5CIN){
		    require "5CIN.php";
		}
		return $elencoAlunni;
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
