<?php
	$server="localhost";
	$username="root";
	$password="Waposat1_UNI";
	$db='DB_waposat';
	$con=mysqli_connect($server,$username,$password)or die("no se ha podido establecer la conexion");
	$sdb=mysqli_select_db($con, $db)or die("la base de datos no existe");
?>
