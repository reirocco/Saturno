<?php
    require_once '../conn/conn.php';

    $sql = "SELECT `productLine` FROM `productlines` WHERE 1";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $response = array();
        while($row = $result->fetch_assoc()){
            array_push($response, $row['productLine']);
        }    
    }

    echo json_encode($response);



?>
