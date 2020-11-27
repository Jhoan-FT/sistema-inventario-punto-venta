<?php 

require_once "../controlador/bodegas.controlador.php";
require_once "../modelo/bodegas.modelo.php";
class AjaxBodegas{
                    
		// Editar Bodegas
	       public $idBog;

               public function ajaxEditarBodegas(){

                $item = "id_bodega";
                $valor = $this->idBog;
                $respuesta = ControladorBodegas::ctrMostrarBodegas($item, $valor);
                echo json_encode($respuesta);

                }
}

// Editar Bodegas
if (isset($_POST["idBog"])) {
        $editar = new AjaxBodegas();
        $editar -> idBog = $_POST["idBog"];
        $editar -> ajaxEditarBodegas();
}                

?>