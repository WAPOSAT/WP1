<!DOCTYPE html>
<html lang="es">

<head>
    <title>Monitoreo</title>
    
    <!-- Including general head -->
    <?php  include_once("../include/head.general.php");?>
    <!-- Especific CSS -->
    <link href="index/style.index.css" rel="stylesheet">
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    <!-- Especific JS -->
    <script src="../js/Chart.js"></script>
    <script src="index/index.js"></script>
    <script src="index/CuadroMonitoreo.js"></script>
    
    
</head>

<body>
    
    <!-- Navigation -->
    <?php include_once("../include/navbar.general.php"); ?>
    
    <!-- Body -->
    <div class="tab-content">  
        <!-- GoogleMaps -->
        <div id="map-canvas" class="col-xs-12 col-md-12 " ></div>

        <!-- Container -->
        <div id="container" class="col-xs-12 col-md-12">
            <div id="information"  >
                
            </div> <!-- information -->
        </div> <!-- /Container -->
    </div> <!-- /Body -->
    
    <!-- Footer -->
    <?php include_once("../include/footer.general.php"); ?>
    
    <!-- Cargando info del mapa-->    
    <?php  include_once("index/maps.load.php"); ?>
    
</body>
</html>