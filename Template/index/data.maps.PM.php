<?php
require_once ("../../require/conexion.class.php");
require_once ("../../require/estaciones.class.php");

$pointMarker = array();

$estaciones = new estaciones();
$estaciones->mostrar_todas();

while($marker = $estaciones->retornar_SELECT()){
    
    $Latitud = (double)$marker["Latitud"];
    $Longitud = (double)$marker["Longitud"];
    $id = (int)$marker["id_estacion"];
    $nombre = (string)$marker["nombre"];
    $codeName = (string)$marker["codeName"];
    
    $point = array('id' => $id, 'lat' =>$Latitud, 'lng' =>$Longitud, 'name' =>$nombre, 'codename' =>$codeName, 'imgpuntero'=>"../img/PointSensor.png");
    array_push($pointMarker, $point);
}

$mapOption = array('zoom'=>13, 'centerPosition' => [40.623813,-8.734692]);

$arr = array('pointMarker' => $pointMarker, 'mapOption' => $mapOption );
echo json_encode($arr);

?>
