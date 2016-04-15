<?php
//require_once ("../require/conexion_class.php");

class estaciones {
    private $_conexion;
    
    public function __construct(){
        $this->_conexion = new conexion();
    }
    
    public function registrar_valor ($id_sensor, $id_equipo, $valor){
        //aun no hay nada aqui :P
    }
    
    public function mostrar_todas () {
        $sql = "SELECT * FROM estaciones ORDER BY id_estacion DESC";
        $this->_conexion->ejecutar_sentencia($sql);
    }
    
    public function mostrar_by_id ($id_equipo){
        $sql = "SELECT * FROM estaciones WHERE id_equipo='".$id_equipo."' ";
        $this->_conexion->ejecutar_sentencia($sql);
    }
    
    public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
}

?>
