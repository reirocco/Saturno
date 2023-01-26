<?php 
class Persona{
    private $nome;
    private $cognome;
    private $anno;
    private $indice;
    
    public function __construct($indice, $nome, $cognome, $anno){
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->anno=$anno;
        $this->indice=$indice;
    }
    
    public function __destruct(){}
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getCognome(){
        return $this->cognome;
    }
    
    public function getAnno(){
        return $this->anno;
    }

    public function getIndice(){
        return $this->indice;
    }
    
#    public function isMaggiorenne(){
#        if(oggi - getAnno() > 18){
#            return true;
#        } else {
#            return false;
#        }
#    }

    public function save(){
        if($this->getIndice() != NULL)
            PersonaTabella::update($this);
        else 
            PersonaTabella::create($this);
    }
    
    public function delete(Persona $persona){
        PersonaTabella::delete($persona);
    }
}

?>