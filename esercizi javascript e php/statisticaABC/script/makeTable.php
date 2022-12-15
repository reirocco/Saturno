<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statistica ABC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
<?php

    require_once "../conn/conn.php";
    $linea = $_REQUEST['linea'];
    $ricerca = $_REQUEST['raggruppa_per'];
	$cerca = $_REQUEST['cerca'];

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

    $sql = "SELECT products.productCode as cod,products.productName as name,products.productLine as line, products.productDescription as descr ";
	$order = " ORDER BY variable ASC";
	if($cerca <= 0 )
		$cerca = 1;
	$limit = " LIMIT ".(($cerca *10)-10).",10";
    if($ricerca == "v"){
        $sql .= ", (orderdetails.quantityOrdered*orderdetails.priceEach) as variable";
		//$order .= "valore ASC";
		$ricerca = "Valore";
    }else{
        $sql .= ", quantityOrdered as variable";
		//$order .= " quantita ASC";
		$ricerca = "Quantità";
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
	$sql .= $limit;
	//die($sql);
	$result = $conn->query($sql) or die("Errore : ". mysqli_error($conn));
	if($result->num_rows >0){
		echo "<table class='table table-hover'>"
				."<thead>"
				  ."<tr>"
					."<th>Codice</th>"
					."<th>Nome</th>"
					."<th>Linea</th>"
					."<th>Descrizione</th>"
					."<th>".$ricerca."</th>"
				."</tr>"
				."</thead>"
				."<tbody>";
		
		while($row = $result->fetch_assoc()){
			echo "<tr>
				<td>".$row['cod']."</td>
				<td>".$row['name']."</td>
				<td>".$row['line']."</td>
				<td>".$row['descr']."</td>
				<td>".$row['variable']."</td>
				";
		}
				
		echo "</tbody>"
			  ."</table>"
				."</div>";
	
	}
	


?>
	
<nav aria-label="Navigator">
  <ul class="pagination">
	<?php if(!($cerca <= 1)):?>
    <li class="page-item">
      <a class="page-link" href="<?php echo "?linea=".$linea."&raggruppa_per=".$ricerca."&cerca=".($cerca-1);?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
	<?php endif; ?>
    <li class="page-item"><a class="page-link" href="<?php echo "?linea=".$linea."&raggruppa_per=".$ricerca."&cerca=".$cerca;?>"><?php echo $cerca;?></a></li>
    <li class="page-item">
      <a class="page-link" href="<?php echo "?linea=".$linea."&raggruppa_per=".$ricerca."&cerca=".($cerca+1);?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  <li class="page-item">
	  <a class="page-link" href="../" aria-label="Home Page">
		Home Page
	  </a>
    </li>
  </ul>
</nav>	
	
	
</div>

	
	
	
</body>
</html>