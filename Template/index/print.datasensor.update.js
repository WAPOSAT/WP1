// Esta parte es activada desde print.datasensor.js

function DataSensorUpdate (id_bs){
	// Solicitando los ultimos datos del sensor
	$.getJSON('show.example/get.datasensor.update.php?BS='+id_bs+'&last='+lastId, function (data) {
		if(data.Long>0){
			// Cargando nuevos valores en las graficas
		for (var a=0;a<data.Data.Value.length ;a++){
	      
	      //Si data.Data.Date[a] se recibe como un texto del tipo '2016-03-11 11:00:00' usar lo siguiente
	      //var d = new Date(data.Data.Date[a]).getTime();
	      //generalChart.series[0].addPoint([d,data.Data.Value[a]],true,true);
	      //adviceChart.series[0].addPoint([d,data.Data.Value[a]],true,true);

	      //Si data.Data.Date[a] se recibe como el valor Unix  se puede utilizar asi
				generalChart.series[0].addPoint([data.Data.Date[a],data.Data.Value[a]],true);
	      adviceChart.series[0].addPoint([data.Data.Date[a],data.Data.Value[a]],true);	      

	    }
	    // Cargando informacion dinamica
	    for(var a=1; a<=slides; a++){
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
	      $("#last-sensor-value-"+a).html(data.Last.Value+' '+data.Unit);
	    }

      $("#last-measure-date").html("Ultima medición: "+data.DateText);

      $("#max-value").html("<strong class='max'>Maximo:</strong>"+data.MaxValue+" "+data.Unit);
      $("#mean-value").html("<strong class='mean'>Media:</strong>"+data.MeanValue+" "+data.Unit);
      $("#min-value").html("<strong class='min'>Minimo:</strong>"+data.MinValue+" "+data.Unit);
      $("#last-value").html("<strong class='last'>Ultimo:</strong>"+data.Last.Value+" "+data.Unit);

      $("#advice").html(data.MessageAdvice);

      lastId = data.Last.Id;
			
		}

	});
}