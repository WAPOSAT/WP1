<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TEST PAGE</title>
</head>
<body>
<h1>Received data from arduino</h1>
<?php
	session_start();
	include 'conexion.php';
	if(isset($_GET['monitor'])){
		$RData=$_GET['monitor'];
		echo "Received data ".$RData."<br>";
			//$aData = array('nS' => "", 'mK' => "", 'tK' => "", 'p1' => "", 'p2' => "", 'p3' => "", 'p4' => "");
			$aData = ["", "", "", "", "", "", ""];

		for ($i=0, $j=0; $i <strlen($RData) ; $i++) { 
			if ($RData[$i] == '|') {
				$j++;
			}
			else $aData[$j] .= $RData[$i]; 
		}

		$re = mysqli_query($con,"SELECT tempKey FROM estaciones WHERE (id_estacion=".$aData[0]." AND tempKey='".$aData[2]."')") or die(mysql_error());

		if(mysqli_num_rows($re)==1){
			echo "La selección devolvio ".mysqli_num_rows($re)." filas<br>";
			$f=mysqli_fetch_array($re);
			echo "TEmp key ".$f[0]."<br>";
			//print_r($aData);
			//echo "Esto fue un array<br>";

			for ($i=0; $i<4 ; $i++) { 

				$q=mysqli_query($con,"INSERT into monitoreo (id_sensor, id_equipo, fecha, valor) values(".(int)($i+1).",".(int)$aData[0].",NOW(),".(float)$aData[$i+3].")")or die(mysql_error());

				if ($q==TRUE) {
					echo "Inserted sensor ".$i."<br>";
					} else {
					echo "NOT inserted sensor ".$i."<br>";
					}	
			}

			

			$ntk = (int)microtime(true);
			echo "$".(string)$ntk."$<br>";
			$q=mysqli_query($con,"UPDATE estaciones SET tempKey='".(int)$ntk."' WHERE id_estacion=".(int)$aData[0])or die(mysql_error());
			if ($q==TRUE) {
				echo "Updated Estaciones";
			} else {
				echo "NOT updated Estaciones";
			}
			
		} 
		else {
			echo "Failed to select of db<br>";
		}

		echo "<h3>Finish to query<br></h3>";	
	}
	else{
		echo "Nothing Received"."<br>";
	}
?>

</body>
</html>