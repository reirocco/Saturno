<?php

	
    class PassaggioValori{
		
        

        private function getQueryResult($sql){
            require "Impiegato.class.php";
			require "../lib/costanti.php";
			require "../connection/db_con.php";
			
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
				$impiegati = array();
                while($row = $result->fetch_assoc()) {
                    
					$tmp_obj = new Impiegato();
					for ($i = 0; $i < count($row);$i++){
						//echo "->" . array_keys($row)[$i];
						$key = array_keys($row)[$i];
						
						
						if($key == NOME_COL){
							$tmp_obj->setNome($row[$key]);
						}else if($key == COGNOME_COL){
							$tmp_obj->setCognome($row[$key]);
						}else if($key == ID_COL){
							$tmp_obj->setId($row[$key]);
						}


					}
					array_push($impiegati, $tmp_obj );
					//echo $tmp_obj->toString();
  
                
                }
            }else{
				$impiegati = null;
			}

			return $impiegati;
        }
		
		
		function getImpiegatiById($id){
			$sql = "SELECT * FROM users WHERE id = " . $id;
			return $this->getQueryResult($sql);
		}
		
		function getImpiegatiByName($nome){
			$sql = "SELECT * FROM users WHERE nome  LIKE '%" . $nome . "%'";
			return $this->getQueryResult($sql);
		}
		
		function getImpiegatiByCognome($cognome){
			$sql = "SELECT * FROM users WHERE nome  LIKE '%" . $cognome . "%'";
			return $this->getQueryResult($sql);
		}
        
		function getAllImpiegati(){
			$sql = "SELECT * FROM users";
			return $this->getQueryResult($sql);
		}
        
		function getImpiegatiByNomeAndId($nome, $id){
			$sql = "SELECT * FROM users WHERE nome = '" . $nome . "'AND id = " . $id;
			return $this->getQueryResult($sql);
		}
		

    }


?>