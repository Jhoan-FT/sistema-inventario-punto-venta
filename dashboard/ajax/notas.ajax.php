<?php 

require_once "../controlador/notas.controlador.php";
require_once "../modelo/notas.modelo.php";
class AjaxNotas{
                    
		// Editar Notas
	       public $idNota;

               public function ajaxEditarNotas(){

                $item = "id_nota";
                $valor = $this->idNota;
                $respuesta = ControladorNotas::ctrMostrarNotas($item, $valor);
                echo json_encode($respuesta);

                }
}

// Editar Notas
if (isset($_POST["idNota"])) {
        $editar = new AjaxNotas();
        $editar -> idNota = $_POST["idNota"];
        $editar -> ajaxEditarNotas();
}                

?>