<!DOCTYPE html>
<html lang="es">

<head>
  <title>Monitoreo</title>
    
  <!-- Including general head -->
  <?php  include_once("../include/head.general.php");?>
  <!-- Especific CSS -->
  <link rel="stylesheet" type="text/css" href="index/style.index.css">
  <!-- Especific JS -->
  <script src="../js/stock/highstock.js"></script>
  <script src="../js/stock/modules/exporting.js"></script>
    
</head>
<body>
  
  <div id="header" class="col-md-12" >
  <!-- Navigation -->
    <?php include_once("../include/navbar.general.php"); ?>  
  </div>

  <!--   -->
  <div id="myCarousel" class="col-md-12 carousel slide" >   <!-- data-ride="carousel"  -->
    <ol class="carousel-indicators" >
      <li data-target="#myCarousel" style="background-color: #4DB4DE" data-slide-to="0" class="active" ></li>
      <li data-target="#myCarousel" style="background-color: #1D648E" data-slide-to="1" ></li>
      <li data-target="#myCarousel" style="background-color: #5BB598" data-slide-to="2" ></li>
      <li data-target="#myCarousel" style="background-color: #ABD099" data-slide-to="3" ></li>
    </ol>
    <div class="carousel-inner" > <!-- role="listbox" -->
      

    <!--  Primera Vista -->
      <div class="item">
        <div id="screen-1" class="col-md-12" style="height: 400px; min-width: 310px">
          <div class="col-md-12 text-center parameter-info">
            <strong id="parameter-name" >Potencial Redox</strong> <button id="parameter-state" type="button" class="btn btn-success">NORMAL</button>
          </div>
          <div id="last-sensor-value" class="col-md-12 text-center">
            4234.0 mg/L
          </div>
        </div>
        <div  class="col-md-12" style="height: 50px; min-width: 310px"></div>
      </div>


      <!--  Segunda Vista -->
      <div class="item">
        <div id="screen-2" class="col-md-12" style="height: 400px; min-width: 310px">
          <div class="col-md-12 text-center parameter-info">
            <strong id="parameter-name" >Potencial Redox</strong> <button id="parameter-state" type="button" class="btn btn-success">NORMAL</button>
          </div>
          <div class="col-md-12 text-center" >
            <div id="last-measure-date" class="col-md-12" > Ultima medicion: 2016-11-21 18:00:05</div>
            <div class="col-md-8 col-md-offset-2  ">
              <div id="container" style="height: 250px" ></div>  
            </div>
          </div>
        </div>
        <div class="col-md-12" style="height: 50px; min-width: 310px"></div>
      </div>

      <!--  Tercera Vista -->
      <div class="item active">
        <div id="screen-3" class="col-md-12" style="height: 400px; min-width: 310px">
          <div class="col-md-12 text-center parameter-info">
            <strong id="parameter-name" >Potencial Redox</strong> <button id="parameter-state" type="button" class="btn btn-success">NORMAL</button>
          </div>
          <div id="parameter-teory" class="col-md-8 col-md-offset-2 col-xs-12">
            <!-- Contenido de la tercera vista -->
              
          </div>
          
        </div>
        <div class="col-md-12" style="height: 50px; min-width: 310px"></div>
      </div>


      <!--  Cuarta Vista -->
      <div class="item">
        <div id="screen-4" class="col-md-12" style="height: 400px; min-width: 310px">
          <div class="col-md-12 text-center parameter-info">
            <strong id="parameter-name" >Potencial Redox</strong> <button id="parameter-state" type="button" class="btn btn-success">NORMAL</button>
          </div>
          Cuarto
        </div>
        <div class="col-md-12" style="height: 50px; min-width: 310px"></div>
      </div>
      <!--  Final de las vistas -->


    </div>       
    <a class="left carousel-control" href="#" onclick="$('#myCarousel').carousel('prev')">
      <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#" onclick="$('#myCarousel').carousel('next')">
      <span class="icon-next"></span>
    </a>
  </div>

  

  <!-- Footer -->
  <?php include_once("../include/footer.general.php"); ?>

  <script type="text/javascript">
    // Configuracion del tiempo de cambio en el slide
    /*$('.carousel').carousel({
      interval: 1000 * 10
    });
    */

    // Tomando datos

    var num0;
    $(function () {
    $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {

        var startDate = new Date(data[data.length - 1][0]), // Get year of last data point
            minRate = 1,
            maxRate = 0,
            startPeriod,
            date,
            rate,
            index;

        startDate.setMonth(startDate.getMonth() - 5); // a quarter of a year before last data point
        startPeriod = Date.UTC(startDate.getFullYear(), startDate.getMonth(), startDate.getDate());

        for (index = data.length - 1; index >= 0; index = index - 1) {
            date = data[index][0]; // data[i][0] is date
            rate = data[index][1]; // data[i][1] is exchange rate
            if (date < startPeriod) {
                break; // stop measuring highs and lows
            }
            if (rate > maxRate) {
                maxRate = rate;
            }
            if (rate < minRate) {
                minRate = rate;
            }
        }

        // Create the chart
        num0 = Highcharts.stockChart('container', {

            rangeSelector: {
                selected: 1
            },

            title: {
                text: 'mg/L VS Tiempo'
            },

            yAxis: {
                title: {
                    text: 'Exchange rate'
                },
                plotLines: [{
                    value: minRate,
                    color: 'green',
                    dashStyle: 'shortdash',
                    width: 2,
                    label: {
                        text: 'Last quarter minimum'
                    }
                }, {
                    value: maxRate,
                    color: 'red',
                    dashStyle: 'shortdash',
                    width: 2,
                    label: {
                        text: 'Last quarter maximum'
                    }
                }]
            },

            credits: {
                position: {
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            },

            series: [{
                name: 'USD to EUR',
                data: data,
                tooltip: {
                    valueDecimals: 4
                }
            }]
        });
    });
});



    </script>
</body>
</html>