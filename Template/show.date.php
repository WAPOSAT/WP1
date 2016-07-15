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
    <script>
        window.onload = function(){
           CargarCuadroGraficas ();
        }
    </script>
    
</head>


<body>
    
    <!-- Navigation -->
    <?php include_once("../include/navbar.general.php"); ?>
    
    <!-- Body -->
    <div>
        <div class="col-xs-12 col-md-4">
            <input type="text" id="Station" value="20">
        </div>
        <div class="col-xs-12 col-md-4">
            <input type="date" id="Date" value="2016-07-15">
        </div>
        <div class="col-xs-12 col-md-4">
            <button onclick="myFunction()">Ver</button>
        </div>
    </div>
    <div class="tab-content">
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