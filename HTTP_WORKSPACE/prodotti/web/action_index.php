<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Risultato</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container text-center">
		<?php
			/*Per quantità --> SELECT products.productCode, products.productName, products.productLine, 
			 * products.productDescription, orderdetails.quantityOrdered FROM products 
			 * INNER JOIN orderdetails ON orderdetails.productCode = products.productCode ORDER BY orderdetails.quantityOrdered DESC LIMIT 10*/

			/*Per valore --> SELECT products.productCode, products.productName, products.productLine, 
			 * products.productDescription, (orderdetails.quantityOrdered * orderdetails.priceEach) AS Valore FROM products 
			 * INNER JOIN orderdetails ON products.productCode = orderdetails.productCode ORDER BY (orderdetails.quantityOrdered * orderdetails.priceEach) DESC LIMIT 10*/

			/*Per linea di prodotto --> SELECT products.productCode, products.productName, products.productLine, products.productDescription 
			 * FROM products INNER JOIN productlines ON products.productLine = productlines.productLine WHERE productlines.productLine = "..."*/

			require '../config/conn.php';

			$linea = $_GET['linea'];	//recupero la linea di prodotto inserita
			$tipo = $_GET['tipo'];		//recupero il tipo inserito
			
			if($tipo == ""){			//se non ho inserito il tipo, mi dà errore
				echo "<h4>Errore. Inserire il tipo di statistica</h4>";
				header("refresh:2;url=../");		
			} else {
				$sql = "SELECT products.productCode, products.productName, products.productLine, products.productDescription FROM products 
				INNER JOIN productlines ON products.productLine = productlines.productLine WHERE productlines.productLine = '" . $linea . "'";	//seleziono i parametri che mi interessano e

				$result = $conn->query($sql);

				if($tipo == "v"){
					$sql = "SELECT products.productCode, products.productName, products.productLine, products.productDescription, 
					(orderdetails.quantityOrdered * orderdetails.priceEach) AS Valore FROM products 
					INNER JOIN orderdetails ON products.productCode = orderdetails.productCode WHERE products.productLine = '" . $linea . "'
					ORDER BY (orderdetails.quantityOrdered * orderdetails.priceEach) DESC LIMIT 10";
				} else if ($tipo == "q"){
					$sql = "SELECT products.productCode, products.productName, products.productLine, 
					products.productDescription, orderdetails.quantityOrdered 
					FROM products INNER JOIN orderdetails ON orderdetails.productCode = products.productCode WHERE products.productLine = '" . $linea . "'
					ORDER BY orderdetails.quantityOrdered DESC LIMIT 10";
				}
				

				$result = $conn->query($sql);

				$table = writeTable($result,$tipo);
				echo $table;
			}

		function writeTable($result,$tipo){
			
			$tmp = "";
			$tmp .=  "<table class=\"table table-bordered\">"
					."<thead class=\"thead-dark\">"
					  ."<tr>"
						."<th>Codice</th>"
						."<th>Nome</th>"
						."<th>Linea</th>"
						."<th>Descrizione</th>";
						if($tipo == "q"){
							$tmp .= "<th>Quantità</th>" ;
						}else{
							$tmp .= "<th>Valore</th>" ;	
						}
					$tmp .= " </tr>"
					."</thead>";

			$tmp .= "<tbody>";

			while($row = $result->fetch_assoc()) {
				$tmp .= "<tr>";
				$tmp .= "<td> " . $row["productCode"] . " </td>";
				$tmp .= "<td> " . $row["productName"] . " </td>";
				$tmp .= "<td> " . $row["productLine"] . " </td>";
				$tmp .= "<td> " . $row["productDescription"] . " </td>";
				if($tipo == "q"){
							$tmp .= "<td> " . $row["quantityOrdered"] . " </td>";
						}else{
							$tmp .= "<td> " . $row["Valore"] . " </td>";
						}
				$tmp .= "</tr>";
			}
			$tmp .= "</tbody>";
			$tmp .= "</table>";

			return $tmp;
		}
		?>
		</div>

		</body>
		</html>
