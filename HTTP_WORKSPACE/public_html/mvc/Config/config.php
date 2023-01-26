<?php 
    Class Connection{
        public static $conn;        
    }
    
    spl_autoload_register(function ($class_name){
        include "./Model/".$class_name.'.php';
    });
    
        
    $dbServerName = "localhost";
    $dbUsername = "5a_chiuselli";
    $dbPassword = "chiuselli";
    $dbName = "5a_chiuselli_mvc";
        
    Connection::$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
    
    if(Connection::$conn -> connect_errno){
        die("Error: " . mysqli_error(Connection::$conn));
    }
?>