<?php
//require_once ("../../require/conexion_class.php");

class Parameters {
    private $_conexion;
    
    public function __construct(){
        $this->_conexion = new conexion();
    }
    
    public function getParameter_bySensor ($id_sensor){
        $sql = "SELECT * FROM Measurements_units,Parameters,Sensors,Sensor_Models WHERE Sensor_Models.id_parameter=Parameters.id_parameter AND Sensors.id_sensor_model=Sensor_Models.id_sensor_model AND Measurements_units.id_measurement_unit=Sensor_Models.id_measurement_unit AND Sensors.id_sensor='".$id_sensor."' LIMIT 1";
        $this->_conexion->ejecutar_sentencia($sql);
        return $this->retornar_SELECT();
    }
    
    public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
}

?>
