<?php

class Impiegato{
	private $id;
	private $nome;
	private $cognome;
	
	function Impiegato(){
		
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setCognome($cognome){
		$this->cognome = $cognome;
	}
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getCognome(){
		return $this->cognome;
	}
	
	function toString(){
		return "id -> ". $this->id . "<br>\v\tnome -> ". $this->nome . "<br>\v\tcognome -> ". $this->cognome;
	}
	
}





?>