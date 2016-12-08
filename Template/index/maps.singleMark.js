
/*
	LoadMapMark (map)
	Muestra la vista de Google Maps con un marcador de la geolocalizacion de la estacion
	Parametros:
		mapa -> es un objeto que contiene la informacion de la geolocalizacion del punto
*/

function LoadMapMark (mapa){
	mapOptions = {
    zoom: mapa.Option.zoom,
    //zoom: 16,
    center: {lat: mapa.Option.LatCenter, lng: mapa.Option.LngCenter},
    //center: new google.maps.LatLng(-12.01109 ,-77.050624 ),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map-slide'), mapOptions );
	var infowindow = new google.maps.InfoWindow();
	/*
	var marker = new google.maps.Marker({
    position: {lat: mapa.Marker.Lat, lng: mapa.Marker.Lng},
    map: map,
    title: 'Hello World!'
  });
	*/
  
	var marker = new google.maps.Marker({
    position: {lat: mapa.Marker.Lat, lng: mapa.Marker.Lng},
    icon: "../img/PointSensor.png",
    title: "WAPOSAT",
    map: map,
    animation: google.maps.Animation.DROP  
  });
}