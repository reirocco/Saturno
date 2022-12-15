<?php
	class Alunno{
		private $nome;
		private $cognome;
		private $residenza;
		
		function __construct($nome,$cognome,$residenza){
			$this->nome = $nome;
			$this->cognome = $cognome;
			$this->residenza = $residenza;
		}
		
		function getNome(){
			return $this->nome;
		}
		
		function getCognome(){
			return $this->cognome;
		}
		
		function getResidenza(){
			return $this->residenza;
		}
	}
	

?>
