<?php
	require 'costanti.php';
	
	function creaSquadra($squadra){
	   
	    $calciatori = array();
	    
		if($squadra == DAT_JUV){
		    $calciatori[0] = "W. Szczesny";
		    $calciatori[1] = "M. Perin";
		    $calciatori[2] = "G. Buffon";
		    $calciatori[3] = "C. Pinsoglio";
		    $calciatori[4] = "M. de Ligt";
		    $calciatori[5] = "L. Bonucci";
		    $calciatori[6] = "D. Rugani";
		    $calciatori[7] = "M. Demiral";
		    $calciatori[8] = "G. Chiellini";
		    $calciatori[9] = "Emre Can";
		    $calciatori[10] = "Alex Sandro";
		    $calciatori[11] = "Danilo";
		    $calciatori[12] = "M. De Sciglio";
		}elseif($squadra == DAT_MIL){
		    $calciatori[0] = "PEPE REINA";
		    $calciatori[1] = "MATTEO SONCIN";
		    $calciatori[2] = "LEONARDO MARIA MOLERI";
		    $calciatori[3] = "ANTONIO DONNARUMMA";
		    $calciatori[4] = "GIANLUIGI DONNARUMMA";
		    $calciatori[5] = "DAVIDE CALABRIA";
		    $calciatori[6] = "ANDREA CONTI";
		    $calciatori[7] = "ALESSIO ROMAGNOLI";
		    $calciatori[8] = "THEO HERNANDEZ";
		    $calciatori[9] = "MATEO MUSACCHIO";
		    $calciatori[10] = "MATTIA CALDARA";
		    $calciatori[11] = "LEROY ABANDA";
		    $calciatori[12] = "LEROY ABANDA";
		}elseif($squadra == DAT_ROM){
		    $calciatori[0] = "Abel Balbo";
		    $calciatori[1] = "Marco Delvecchio";
		    $calciatori[2] = "Francesco Antonioli";
		    $calciatori[3] = "Gabriel Omar Batistuta";
		    $calciatori[4] = "Daniele De Rossi";
		    $calciatori[5] = "Simone Perrotta";
		    $calciatori[6] = "Alberto Aquilani";
		    $calciatori[7] = "Marteen Stekelenburg";
		    $calciatori[8] = "Erik Lamela";
		    $calciatori[9] = "Alessandro Florenzi";
		    $calciatori[10] = "Miralem Pjanic";
		    $calciatori[11] = "Kevin Strootman";
		    $calciatori[12] = "Davide Astori";
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
