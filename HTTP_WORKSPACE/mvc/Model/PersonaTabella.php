<?php
class PersonaTabella{
    public static function getAll(){
        $persone = Array();
        $query = sprintf("SELECT * FROM persone");
        $result = Connection::$conn->query($query);
        foreach ($result as $row)
        {   
            $idDB = $row['id'];
            $nomeDB = $row['nome'];
            $cognomeDB = $row['cognome'];
            $annoDB = $row['anno'];
            
            $persona = new Persona ($idDB, $nomeDB, $cognomeDB, $annoDB);
            $persone[$idDB] = $persona;
        }
        $result->free();
        return $persone;
    }
    
    public static function getById($key){
        $elenco = PersonaTabella::getAll();
        return $elenco[$key];
    }
    
    public static function create(Persona $persona){
  #     $persone = PersonaTabella::getAll();
  #     $persone[]=$persona;
        PersonaTabella::doCreate($persona);
    }
    
    public static function update(Persona $persona){
  #     $persone = PersonaTabella::getAll();
  #     $persone[$persona->getIndice()] = $persona;
        PersonaTabella::doUpdate($persona);
    }
    
    public static function delete(Persona $persona){
  #     $persone = PersonaTabella::getAll();
  #     unset($persone[$persona->getIndice()]);
        PersonaTabella::doDelete($persona);
    }
    
    # CON LA FUNZIONE MYSQL_QUERY:
    #   $query =  " ... " ;
    #   $result = mysql_query($query);
    #   --> NON E' RICHIESTO IL PARAMETRO DELLA CONNESSIONE
    
    private static function doCreate(Persona $persona){    
        $query = sprintf("INSERT INTO persone (nome, cognome, anno) values ('%s', '%s', %d)", $persona->getNome(), $persona->getCognome(), $persona->getAnno());
        if(!(Connection::$conn->query($query))){
            die("Error: " . mysqli_error(Connection::$conn));
        }
    }
    
    private static function doUpdate(Persona $persona){        
        $query = sprintf("UPDATE persone SET nome='%s', cognome='%s', anno=%d WHERE id=%d", $persona->getNome(), $persona->getCognome(), $persona->getAnno(), $persona->getIndice());
        if(!(Connection::$conn->query($query))){
            die("Error: " . mysqli_error(Connection::$conn));
        }
    }
    
    private static function doDelete(Persona $persona){
        $query = sprintf("DELETE from persone WHERE id=%d", $persona->getIndice());
        if(!(Connection::$conn->query($query))){
            die("Error: " . mysqli_error(Connection::$conn));
        }
    }
    
#    private static function save($persone){
#        $fp = fopen("./../../Storage/persona.txt", "w");
#        foreach($persone as $row){
#            fprintf($fp, "%s\t%s\t%d\n", $row->getNome(), $row->getCognome(), $row->getAnno());
#        }
#        fclose($fp);
#    }

}

?>