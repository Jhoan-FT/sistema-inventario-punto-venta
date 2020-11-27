<?php 
	
	class ControladorConsultas{
    /**
     *  MOSTRAR
     */
    static public function ctrMostrarInactivos(){
        $tabla = "usuarios";
        $respuesta = ModeloConsultas::mdlMostrarInactivos($tabla);
        return $respuesta;
    }        
    /**
     *  MOSTRAR
     */
    static public function ctrMostrarUltimo2($tabla, $item){
        $respuesta = ModeloConsultas::mdlMostrarUltimo2($tabla, $item);
        return $respuesta;
    }         
    /**
     *  MOSTRAR
     */
    static public function ctrMostrarUltimo($tabla, $item){
        $respuesta = ModeloConsultas::mdlMostrarUltimo($tabla, $item);
        return $respuesta;
    }        
    /**
     *  MOSTRAR
     */
    static public function ctrMostrarInfoSesion($item, $tabla){
        $respuesta = ModeloConsultas::mdlMostrarinfoSesion($item, $tabla);
        return $respuesta;
    }        
	/**
     *  MOSTRAR
     */
    static public function ctrMostrarInfoInicio($valor, $tabla){
        $respuesta = ModeloConsultas::mdlMostrarInfoInicio($tabla, $valor);
        return $respuesta;
    }
    /**
     *  MOSTRAR MAX
     */
    static public function ctrMostrarMax($item, $valor, $tabla){
        $respuesta = ModeloConsultas::mdlMostrarMax($item, $valor, $tabla);
        return $respuesta;
    }
     /**
     *  MOSTRAR MIN
     */
    static public function ctrMostrarMin($item, $valor, $tabla){
        $respuesta = ModeloConsultas::mdlMostrarMin($item, $valor, $tabla);
        return $respuesta;
    }



}

?>	 