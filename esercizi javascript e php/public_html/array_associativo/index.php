<?php
/*
 * index.php
 * 
 * Copyright 2019 s_nrorcc01s05g479m <s_nrorcc01s05g479m@ltsp147>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>prova array</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
</head>

<body>
	
	<?php
		$users = array("Rocco" => "Pesaro", "Alessandro" => "Pesaro", "Michele" => "Pesaro","Martin" => "Morciola","Antonio" => "Montecchio"); 
		echo "<h1>Elenco studenti classe 5Bin </h1><br>\n";
		$arrlength = count($users);
		foreach($users as $x => $x_value) {
			echo "<h3>Nome : ". $x ." Provenienza : ". $x_value ."</h3><br>\n";
		}
	?>
	
	
</body>

</html>
