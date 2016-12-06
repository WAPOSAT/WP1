// Objetos que contendran las graficas
var generalChart;
var adviceChart;

// Variable que contendra el ciclo de actualizacion

// Se crea como variable global para poder visualizarla en la consola
var Data = [];

$(function () {
  $.getJSON('show.example/get.datasensor.php?BS='+ID_BS, function (data) {
    
    // Generando la data para la grafica
    for (a=0;a<data.Data.Value.length ;a++){
      var d = new Date(data.Data.Date[a]).getTime();
      Data.push([d, data.Data.Value[a]]);
    }

    // Estableciendo opciones para la visualizacion de la grafica con Limites Maximos permitidos
    var OptionChart = {
      rangeSelector: {
          selected: 1
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

    // Generando los cambios de informacion del sensor
    
    // Cambiando la informacion general
    var slides = 4;
    for(a=1; a<=slides; a++){
      $("#parameter-name-"+a).html(data.SensorName);

        var state="btn btn-success btn-lg";
        var content_state = "NORMAL"
      if(data.Last.Value>=data.LMR && data.Last.Value<=data.LMP){
        state="btn btn-warning btn-lg";
        content_state = "CUIDADO"
      }else if(data.Last.Value>data.LMP){
        state="btn btn-danger btn-lg";
        content_state = "PELIGRO!!"
      }

      $("#parameter-state-"+a).removeClass();
      $("#parameter-state-"+a).addClass(state);
      $("#parameter-state-"+a).html(content_state);
    }

      $("#parameter-teory").html(data.InfoParameter);
      $("#last-measure-date").html("Ultima medición: "+data.DateText);

      $("#max-value").html("<strong class='max'>Maximo:</strong>"+data.MaxValue+" "+data.Unit);
      $("#mean-value").html("<strong class='mean'>Media:</strong>"+data.MeanValue+" "+data.Unit);
      $("#min-value").html("<strong class='min'>Minimo:</strong>"+data.MinValue+" "+data.Unit);
      $("#last-value").html("<strong class='last'>Ultimo:</strong>"+data.Last.Value+" "+data.Unit);

      $("#advice").html(data.MessageAdvice);

    // Estableciendo visualizacion para la vista de la grafica con Maximo-Minimo
    OptionChart = {
      rangeSelector: {
          selected: 1
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
                  text: 'Punto Medio'
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


  });
});