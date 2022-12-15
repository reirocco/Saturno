<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lista Offices</title>
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


    $citta_ufficio = $_REQUEST['citta_ufficio'];
    $stato_cliente = $_REQUEST['stato_cliente'];
	


    $sql = "SELECT offices.officeCode, offices.city, offices.country, offices.phone, customers.customerNumber, customers.customerName, customers.country, customers.city 
            FROM offices 
            INNER JOIN employees ON offices.officeCode = employees.officeCode
            INNER JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
            
            ";
    $order = " ORDER BY offices.city, customers.country, customers.city";
    if($citta_ufficio != "" || $stato_cliente != ""){
        $where = " WHERE ";
        if($citta_ufficio != ""){
            $where .= " offices.city = '".$citta_ufficio."'";
            if($stato_cliente != ""){
                $where .= " AND ";
            }
        }
        if($stato_cliente != ""){
            $where .= " customers.country = '".$stato_cliente."'";
        }
        $sql .= $where;
    }
    

    
    $sql .= $order;
	//die($sql);
	$result = $conn->query($sql) or die("Errore : ". mysqli_error($conn));
	if($result->num_rows >0){
        echo "<table class='table table-head'>"
                ."<thead>"
                ."<tr>"
                ."<th>codice ufficio</th>"
                ."<th>città ufficio</th>"
                ."<th>stato ufficio</th>"
                ."<th>telefono ufficio</th>"
                ."<th>numero cliente</th>"
                ."<th>nome cliente</th>"
                ."<th>stato cliente</th>"
                ."<th>città cliente</th>"
				."</tr>"
				."</thead>"
				."<tbody>";
        
                
		while($row = $result->fetch_assoc()){
			echo "<tr>
				<td>".$row['officeCode']."</td>
				<td>".$row['city']."</td>
				<td>".$row['country']."</td>
				<td>".$row['phone']."</td>
                <td>".$row['customerNumber']."</td>
                <td>".$row['customerName']."</td>
                <td>".$row['country']."</td>
                <td>".$row['city']."</td>
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