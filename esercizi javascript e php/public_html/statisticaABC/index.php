<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>Statistica ABC</title>
</head>
<body onload="getLine()">

<p>Statistica ABC</p>
<form method="get" action="./script/makeTable.php">
	<label for="linea">cerca per -></label>
	<select id="linea" name="linea">
		<option value=""> </option>
	</select>
	
	<br>
	<br>
	
	<label for="raggruppa_per">Raggruppa per -></label>
	<select id="raggruppa_per" name="raggruppa_per">
		<option value=""></option>
		<option value="v"> valore </option>
		<option value="q"> Quantità </option>
	</select>
	
	<br>
	<br>
	<br>
	<button type="submit" id="submit">Submit</button>
</form>


<script src="script/index.js"></script>

</body>
</html>
