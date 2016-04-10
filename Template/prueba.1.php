<!DOCTYPE html>
<html lang="es">

<head>
    <title>Monitoreo</title>
    
    <!-- Including general head -->
    <?php  include_once("../include/head.general.php");?>
    <!-- Especific CSS -->
    <link href="index/style.index.css" rel="stylesheet">
    <!-- Especific JS -->
    <script src="../js/Chart.js"></script>
    <script src="index/index.js"></script>
    
    <!-- <script src="monitoreo/CuadroMonitoreo.js"></script> -->
    
</head>

<body>

</body>

<!-- Cargando info del mapa-->    
<script type='text/javascript' languaje='javascript'>
    var ArrayDataTime = {},
            ChartData = 15;
	function cargar_cuadro_datos_integrante (){
        // Programa Ajax para pedir DataTime
        $parametros = {
                'boton-obtener-data-tiempo' : true,
            };

        $url = "index/data.maps.probe.php";
        $.ajax({
            type: "POST",
            url: $url,
            data: $parametros,
            dataType : "json",
            success: function(data){
                ArrayDataTime = data;      
            }
        });
    }
    
    window.onload = function(){
	   cargar_cuadro_datos_integrante();
    }
</script>
</html>

