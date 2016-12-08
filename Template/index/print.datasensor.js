// Objetos que contendran las graficas
var generalChart;
var adviceChart;

// Variables para el ciclo de actualizacion
var actualizarSensor=null;
var lastId = 0;

// Se crea como variable global para poder visualizarla en la consola
var Data = [];
var slides = 5;

function print_datasensor() {
  $.getJSON('show.example/get.datasensor.php?BS='+ID_BS, function (data) {
    
    // Analisando la informacion obtenida
    var state="btn btn-success btn-lg";
    var content_state = "NORMAL"
    var state_color = "#449d44";
    if(data.Last.Value>=data.LMR && data.Last.Value<=data.LMP){
      state="btn btn-warning btn-lg";
      content_state = "CUIDADO";
      state_color = "#ec971f";
    }else if(data.Last.Value>data.LMP){
      state="btn btn-danger btn-lg";
      content_state = "PELIGRO!!";
      state_color = "#c9302c";
    }

    // Cambiando la informacion general
    for(var a=1; a<=slides; a++){
      $("#parameter-name-"+a).html(data.SensorName);
      $("#parameter-state-"+a).removeClass();
      $("#parameter-state-"+a).addClass(state);
      $("#parameter-state-"+a).html(content_state);

      $("#last-sensor-value-"+a).html(data.Last.Value+' '+data.Unit);
    }

    // SCREEN 1
    $("#last-measure-date").html("Ultima medición: "+data.DateText);

    // SCREEN 2

    
    // Generando la data para la grafica
    for (var a=0;a<data.Data.Value.length ;a++){

      //Si data.Data.Date[a] se recibe como un texto del tipo '2016-03-11 11:00:00' usar lo siguiente
      //var d = new Date(data.Data.Date[a]).getTime();
      //Data.push([d, data.Data.Value[a]]);
      
      //Si data.Data.Date[a] se recibe como el valor Unix  se puede utilizar asi
      Data.push([data.Data.Date[a], data.Data.Value[a]]);
    }

    // Estableciendo opciones para la visualizacion de la grafica con Limites Maximos permitidos
    var OptionChart = {
      rangeSelector: {
          selected: 1,
      },

      title: {
          text: data.Unit+" vs Tiempo"
      },

      yAxis: {
          title: {
              text: "Nivel de "+ data.SensorName
          },
          plotLines: [{
              value: data.LMR,
              color: 'green',
              dashStyle: 'shortdash',
              width: 2,
              label: {
                  text: 'Limite de Riesgo'
              }
          }, {
              value: data.LMP,
              color: 'red',
              dashStyle: 'shortdash',
              width: 2,
              label: {
                  text: 'Limite de Peligro'
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
          name: data.SensorName,
          data: Data,
          tooltip: {
              valueDecimals: 2
          }
      }]
    };

    generalChart = Highcharts.stockChart('container', OptionChart);

    
    // SCREEN 3
    $("#parameter-teory").html(data.InfoParameter);
      

    // SCREEN 4
    
    // Estableciendo visualizacion para la vista de la grafica con Maximo-Minimo
    OptionChart = {
      rangeSelector: {
          selected: 1
      },

      navigator: {
          enabled: false
      },

      title: {
          text: data.Unit+" vs Tiempo"
      },

      yAxis: {
          title: {
              text: "Nivel de "+ data.SensorName
          },
          plotLines: [{
              value: data.MinValue,
              color: 'green',
              dashStyle: 'shortdash',
              width: 2,
              label: {
                  text: 'Punto Minimo'
              }
          }, {
              value: data.MeanValue,
              color: 'blue',
              dashStyle: 'shortdash',
              width: 2,
              label: {
                  text: 'Media Total'
              }
          }, {
              value: data.MaxValue,
              color: 'red',
              dashStyle: 'shortdash',
              width: 2,
              label: {
                  text: 'Punto Maximo'
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
          name: data.SensorName,
          data: Data,
          tooltip: {
              valueDecimals: 2
          }
      }]
    };  

    adviceChart = Highcharts.stockChart('container2',OptionChart);

    $("#screen-4").css("background-color",state_color);
    $("#footer-screen-4").css("background-color",state_color);
    adviceChart.chartBackground.attr({fill:state_color});
    $("#advice").html(data.MessageAdvice);
    /*
    $("#max-value").html("<strong class='max'>Maximo:</strong>"+data.MaxValue+" "+data.Unit);
    $("#mean-value").html("<strong class='mean'>Media:</strong>"+data.MeanValue+" "+data.Unit);
    $("#min-value").html("<strong class='min'>Minimo:</strong>"+data.MinValue+" "+data.Unit);
    $("#last-value").html("<strong class='last'>Ultimo:</strong>"+data.Last.Value+" "+data.Unit);
    */

    // SCREEN 5

    LoadMapMark (data.Map);



    lastId = data.Last.Id;
    clearInterval(actualizarSensor);
    actualizarProceso=setInterval('DataSensorUpdate('+data.IdBlockSensor+')', (data.RefreshFrequencySeg*1000));

  });
}