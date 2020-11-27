<?php 

require_once "../controlador/proveedores.controlador.php";
require_once "../modelo/proveedores.modelo.php";
class AjaxProveedores{
                    
		// Editar Proveedores
	       public $idProov;

               public function ajaxEditarProveedores(){

                $item = "doc_proveedor";
                $valor = $this->idProov;
                $respuesta = ControladorProveedores::ctrMostrarProveedores($item, $valor);
                echo json_encode($respuesta);

                }
}

// Editar Proveedores
if (isset($_POST["idProov"])) {
        $editar = new AjaxProveedores();
        $editar -> idProov = $_POST["idProov"];
        $editar -> ajaxEditarProveedores();
}                

?>