function CargarCuadroGraficas (id_equipo) {
    $parametros = {
            'boton-llamar-cuadro-Graficas' : true,
            'id_equipo' : id_equipo,
            'AnimationState' : AnimationState,
        };
    $url = "index/CuadroMonitoreo.php";
    $.ajax({
        type: "POST",
        url: $url,
        data: $parametros,
        success: function(data){
            $("#information").html(data);
        }
    });
}