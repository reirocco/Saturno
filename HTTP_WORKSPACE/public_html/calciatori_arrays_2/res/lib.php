<?php
	
	function creaSquadra($squadra){
	
		require 'costanti.php';
		if($squadra == DAT_JUV){
		 	require 'juve.php';
		}elseif($squadra == DAT_MIL){
			require 'milan.php';
		}elseif($squadra == DAT_ROM){
			require 'roma.php';
		}
		return $calciatori;
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
