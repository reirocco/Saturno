<?php

    require_once "../conn/conn.php";

    $linea = $_REQUEST['linea'];
    $ricerca = $_REQUEST['raggruppa_per'];

//==================================================================================================
    $sql = "SELECT `productLine` FROM `productlines` WHERE 1";
    $result = $conn->query($sql);

	$response = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($response, $row['productLine']);
        }    
    }

//==================================================================================================

    $sql = "SELECT products.productCode,products.productName,products.productLine, products.productDescription";
	$order = " ORDER BY ";
    if($ricerca == "v"){
        $sql .= ", (orderdetails.quantityOrdered*orderdetails.priceEach) as valore";
		$order .= "valore ASC";
    }else{
        $sql .= ", quantityOrdered as quantita";
		$order .= " quantita ASC";
    }

    $sql .= " FROM `products` INNER JOIN orderdetails ON products.productCode = orderdetails.productCode WHERE ";

    $i = 0;
    $trovato = false; 
    while( $i < count($response) && !$trovato){
        if($linea == $response[$i]){
            $trovato = true;
            $sql .= "productLine = '".$response[$i]."'";
        }
        $i++;
    }

	$sql .= $order;

	die($sql);

	


?>