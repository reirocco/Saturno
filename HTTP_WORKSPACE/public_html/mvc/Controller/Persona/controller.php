<?php 
   // require_once("../../Config/config.php");
    if(isset($_REQUEST['action']))      
        $action = $_REQUEST['action'];
    else 
        $action = 'list';
    
    switch($action){
        case 'list':
            $elenco = PersonaTabella::getAll();
            $view = "./Controller/Persona/list.php";
            break;
        case 'new':
            $view = "./Controller/Persona/new.php";
            break;
        case 'create':
            include ("./Controller/Persona/model.php");
            
            if(!controlloCampi($_POST['nome'], $_POST['cognome'], $_POST['anno']))
                header("Location: ?model=persona&action=new");

            $persona = new Persona(NULL, $_POST['nome'], $_POST['cognome'], $_POST['anno']);
            $persona->save();
            
            $view = "./Controller/Persona/create.php";
            break;
        case 'edit':
            $persona = PersonaTabella::getById($_REQUEST['id']);
            
            $view = "./Controller/Persona/edit.php";            
            break;
        case 'update':
            $persona = new Persona($_REQUEST['id'], $_REQUEST['nome'], $_REQUEST['cognome'], $_REQUEST['anno']);
            $persona->save();
            
            $view = "./Controller/Persona/update.php";
            break;
        case 'delete':
            $persona = PersonaTabella::getById($_REQUEST['id']);
            $persona->delete($persona);
            
            $view = "./Controller/Persona/delete.php";
            break;
    }
?>