<?php
    require_once("./Config/config.php");
    
    if(isset($_REQUEST['model']))
        $model = $_REQUEST['model'];
    else 
        $model = 'home';
    
    switch($model){
        case 'home':
            include("./Home/controller.php");
            break;
        case 'persona':
            include("./Controller/Persona/controller.php");
            break;
        default: 
            include("./Home/controller.php");
            break;
    }
    
    include("./Static/template.php");
?>
