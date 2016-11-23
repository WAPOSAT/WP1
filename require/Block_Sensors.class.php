<?php
//require_once ("../require/conexion_class.php");

class Block_Sensors {
    private $_conexion;
    
    public function __construct(){
        $this->_conexion = new conexion();
    }
    
    public function get_block ($id){
        $sql = "SELECT * FROM Block_Sensors WHERE active=1 AND id=".$id." ";
        $this->_conexion->ejecutar_sentencia($sql);
    }
    
    public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
}

?>
