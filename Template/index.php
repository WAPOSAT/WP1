<!DOCTYPE html>
<html lang="es">

<head>
    <title>Monitoreo</title>
    
    <!-- Including general head -->
    <?php  include_once("../include/head.general.php");?>
    
    <!-- Especific CSS -->
    <link href="monitoreo/style.monitoreo.css" rel="stylesheet">
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    
    <!-- Especific JS -->
    <?php  include_once("monitoreo/maps.scriptJS.php"); ?>
    <script src="../js/Chart.js"></script>
    <script src="monitoreo/monitoreo.js"></script>
    
    <script src="monitoreo/CuadroMonitoreo.js"></script>
    
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
    
    
</body>
    
</html>