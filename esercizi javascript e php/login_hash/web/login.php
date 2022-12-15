<!DOCTYPE html>
<html lang="it">
<head>
  <title>Login with hash</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
	
  <?php
		session_start();
	
		if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
			echo "<h1>Sei già loggato con un altro utente</h1><br>
			<input type='button'onclick=\"window.location.href = '../'\" class='btn btn-success' value='Torna alla home page'>";
		}else{
	
   ?>	
	
  <form class="form-horizontal" action="check.php"  method="post">
	  <h2>Inserisci le tue credenziali</h2>
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Accedi</button>
      </div>
    </div>
  </form>
</div>
	<?php
		}
	?>

</body>
</html>
