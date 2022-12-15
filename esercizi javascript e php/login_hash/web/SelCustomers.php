<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sel Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body onload="getCustomersCountry()">

<div class="container">
	
	<?php
		session_start();
	
		if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
			header("location: login.php");
		}
	
   ?>	
	
	
  <h2>benvenuti nel "SelCustomers" </h2>
  <form action="./listaCustomers.php" method="GET">


    <div class="form-group">
        <label for="cliente">inserisci il nome del cliente :</label>
        <input type="text" class="form-control" id="cliente" placeholder="name" name="nome_cliente">
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="stato">Seleziona la città dell'ufficio</label>
        <select name="stato_cliente" class="form-control" id="stato_cliente">
          <option value="">...</option>
        </select>
      </div>
    </div>

    <div class="form-group">
        <label for="citta_cliente">inserisci la città del cliente :</label>
        <input type="text" class="form-control" id="citta_cliente" placeholder="name" name="citta_cliente">
    </div>

    <button type="submit" name="pagina" value="1" id="submit" class="btn btn-success">Cerca</button>
  </form>
</div>

<script src="../script/index.js"></script>

</body>
</html>
