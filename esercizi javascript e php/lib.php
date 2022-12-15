<?php
		function creaLista($percorso){
			$results = [];
			$elementi = scandir($percorso);
			foreach ($elementi as &$x) {
				if(is_dir($x) && file_exists($x."/info.php")){
					array_push($results, $x);
				}
				
			}
			creaGrafica($results);
		}
	
		function creaGrafica($reasults){
			$ris = "";
			
			foreach ($results as &$x) {
				require $x . "info.php";
				
			}
			
			
		}
?>
