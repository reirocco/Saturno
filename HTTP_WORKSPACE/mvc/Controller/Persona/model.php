<?php 
function controlloCampi($nome, $cognome, $anno){
    if(empty($nome) || empty($cognome) || empty($anno)){
        return false;
    }
    return true;
}
?>