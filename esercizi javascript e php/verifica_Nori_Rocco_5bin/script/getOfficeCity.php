<?php
    require_once "../config/db_con.php";

    $sql = "SELECT offices.city FROM offices WHERE 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $response = array();
        while($row = $result->fetch_assoc()){
            array_push($response, $row['city']);
        }    
    }

    echo json_encode($response);

?>