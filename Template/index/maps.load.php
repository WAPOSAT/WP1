<script>
    var pointMarker = [
      {
          lat: 40.6386333,
          lng: -8.745,
          name: "Estación CITRAR-UNI",
          address1:"Rua Diogo Cão, 125",
          codename: "PMT-1",
          imgpuntero: "../img/PointSensor.png" // don’t insert comma in the last item of each marker
       },
       {
          lat: 40.59955,
          lng: -8.7498167,
          name: "Estación Rio Rimac",
          address1:"Quinta dos Patos, n.º 2",
          codename: "PMT-2",
          imgpuntero: "../img/PointSensor.png" // don’t insert comma in the last item of each marker
       },
       {
          lat: 40.6247167,
          lng: -8.7129167,
          name: "Estación Peru Cola",
          address1:"Rua dos Balneários do Complexo Desportivo",
          codename: "PMT-3",
          imgpuntero: "../img/PointSensor.png" // don’t insert comma in the last item of each marker
       } // don’t insert comma in last item
    ];
    
    function GenerateChart (id_equipo, id_parametro, periodo, IdChart, parametro,IdLastData){
        var ArrayDataTime = {},
            ChartData = {};

        // Programa Ajax para pedir DataTime
        $parametros = {
                'boton-obtener-data-tiempo' : true,
                'id_equipo' : id_equipo,
                'id_parametro' : id_parametro
            };

        $url = "monitoreo/chart.DataTime.php";
        $.ajax({
            type: "POST",
            url: $url,
            data: $parametros,
            dataType : "json",
            success: function(data){
                ArrayDataTime = data;
                var LimSup = ArrayDataTime.LimSup,
                    LimInf = ArrayDataTime.LimInf,
                    lastID = ArrayDataTime.lastID;

                ChartData = CargarData (ArrayDataTime.DataTime,  ArrayDataTime.DataValue, LimSup, LimInf);
                //$("#LastData").html(ArrayDataTime.DataValue[ArrayDataTime.long-1]);
                //$("#LastData").html("holassss");
                var ctx = document.getElementById(IdChart).getContext("2d");
                var MyLine = new Chart(ctx).Line(ChartData, {animation: true, responsive: true});
                GenerateAnimationChart (MyLine, id_equipo, id_parametro, LimSup, LimInf, periodo, lastID, parametro);      
            }
        });
    } 
    
    // informacion del mapa
    var centerPosition = new google.maps.LatLng(40.601203,-8.668173);
    
    var mapOptions = {
      zoom: 11,
      center: centerPosition,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions );
    
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    
    for (i = 0; i < pointMarker.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(pointMarker[i].lat, pointMarker[i].lng),
        icon: pointMarker[i].imgpuntero,
        title: pointMarker[i].codename,
        map: map,
        animation: google.maps.Animation.DROP  
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(pointMarker[i].name);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
</script>