<?php
require_once ("../require/conexion.class.php");
require_once ("../require/monitoreo.class.php");

// URL tipo
// /estaciones.waposat.com/public_html/Template/InsertDataRND.php?id_equipo=1&numS=3&IDS1=1&IDS2=2&IDS3=3

$id_equipo = htmlspecialchars($_GET["equipo"],ENT_QUOTES);
$numS = htmlspecialchars($_GET["numS"],ENT_QUOTES);
if ($numS>=1){
    $IDS1  = htmlspecialchars($_GET["IDS1"],ENT_QUOTES);
}
if ($numS>=2){
    $IDS2  = htmlspecialchars($_GET["IDS2"],ENT_QUOTES);
}
if ($numS>=3){
    $IDS3  = htmlspecialchars($_GET["IDS3"],ENT_QUOTES);
}
if ($numS>=4){
    $IDS4  = htmlspecialchars($_GET["IDS4"],ENT_QUOTES);
}


//echo "se han leido los valores";
$monitoreo = new monitoreo();
//echo "se ha creado el objeto";

//Inicio del Programa de creacion de datos en el tiempo

$hora = date('H');
$hora = $hora - 1;
$PI = 3.14159;

// IDS1 = pH
$aleatorioPH = rand(0,100)/100;
$aleatorio2PH = rand(0,100)/100;
$PH = $aleatorioPH*$aleatorio2PH*0.3+(-1*cos(($hora)*$PI/12)*0.35)+7.3;
$PH = round($PH,2);

// IDS2 = Temperatura
$aleatorioT = rand(0,100)/100;
$aleatorio2T = rand(0,100)/100;
$Temp = $aleatorioT*$aleatorio2T*0.3+(-1*cos(($hora)*$PI/12)*1.2)+19.01;
$Temp = round($Temp,2);    

// IDS3 = Disolucion de Oxigeno
$aleatorioDO = rand(0,100)/100;
$aleatorio2DO = rand(0,100)/100;
$DO = $aleatorioDO*$aleatorio2DO*0.3+(-1*cos(($hora)*$PI/12)*1.2)+6.01;
$DO = round($DO,2);

// IDS4 = Nivel
$aleatorioN = rand(0,100)/100;
$aleatorio2N = rand(0,100)/100;
$N = $aleatorioN*$aleatorio2N*0.3+(-1*cos(($hora)*$PI/12)*0.3)+4.01;
$N = round($DO,2);

if ($numS>=1){
    $monitoreo->registrar_valor($IDS1, $id_equipo, $PH);
    echo ("pH: ".$PH."<br>");
}
if ($numS>=2){
    $monitoreo->registrar_valor($IDS2, $id_equipo, $Temp);
    echo ("Temp: ".$PH."<br>");
}
if ($numS>=3){
    $monitoreo->registrar_valor($IDS3, $id_equipo, $DO);
    echo ("DO: ".$PH."<br>");
}
if ($numS>=4){
    $monitoreo->registrar_valor($IDS4, $id_equipo, $N);
    echo ("Nivel: ".$PH."<br>");
}

// Mensaje de verificacion
echo ("Proceso realizado correctamente. WAPOSAT.");
?>