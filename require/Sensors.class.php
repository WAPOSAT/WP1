<?php
//require_once ("../require/conexion_class.php");

class Sensors {
    private $_conexion;
    
    public function __construct(){
        $this->_conexion = new conexion();
    }
    
    public function get_sensor ($id_sensor){
        $sql = "SELECT * FROM Sensors,Sensor_Models,Measurements_units,Parameters WHERE  Sensors.id_sensor_model=Sensor_Models.id_sensor_model AND Sensor_Models.id_parameter=Parameters.id_parameter AND Sensor_Models.id_measurement_unit=Measurements_units.id_measurement_unit AND  Sensors.id_sensor=".$id_sensor." ";
        $this->_conexion->ejecutar_sentencia($sql);
    }
    
    public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
}

?>
