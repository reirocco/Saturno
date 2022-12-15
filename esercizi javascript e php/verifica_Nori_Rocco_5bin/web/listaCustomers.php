<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lista Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
<?php
    require_once "../config/db_con.php";


    $nome_cliente = $_REQUEST['nome_cliente'];
    $stato_cliente = $_REQUEST['stato_cliente'];
    $citta_cliente = $_REQUEST['citta_cliente'];
    $pagina = $_REQUEST['pagina'];
    $numero_record_pagina = 15;

    $sql = "SELECT customers.customerNumber, customers.customerName, customers.city, customers.country, customers.phone 
            FROM customers 
            
            ";
    $order = " ORDER BY customers.customerName ASC ";
    $limit = " LIMIT ".(($pagina *$numero_record_pagina)-$numero_record_pagina).",".$numero_record_pagina;
    if($nome_cliente != "" || $stato_cliente != "" || $citta_cliente != ""){
        $where = " WHERE ";
        if($nome_cliente != " "){
            $where .= " customers.customerName LIKE '%".$nome_cliente."%'";
            if($stato_cliente != "" || $citta_cliente != ""){
                $where .= " AND ";
            }
        }
        if($stato_cliente != ""){
            $where .= " customers.country = '".$stato_cliente."'";
            if($citta_cliente != ""){
                $where .= " AND ";
            }
        }
        if($citta_cliente != ""){
            $where .= " customers.city LIKE '%".$citta_cliente."%'";
            
        }
        $sql .= $where;
    }
    

    
    $sql .= $order;
    $sql .= $limit;
	$result = $conn->query($sql) or die("Errore : ". mysqli_error($conn));
	if($result->num_rows >0){
        echo "<table class='table table-head'>"
                ."<thead>"
                ."<tr>"
                ."<th>numero cliente</th>"
                ."<th>nome cliente</th>"
                ."<th>città cliente</th>"
                ."<th>stato cliente</th>"
                ."<th>telefono cliente</th>"
				."</tr>"
				."</thead>"
				."<tbody>";

                
		while($row = $result->fetch_assoc()){
			echo "<tr>
                <td>".$row['customerNumber']."</td>
                <td>".$row['customerName']."</td>
                <td>".$row['city']."</td>
                <td>".$row['country']."</td>
                <td>".$row['phone']."</td>
				</tr>";
		}
				
		echo "</tbody>"
			  ."</table>"
				."</div>";
	
    }else{
        echo "Nessun record corrispondente con i criteri di ricerca";
    }
    
	


?>
	
	
	
</div>

	
	
	
</body>
</html>