<?php 

require_once "../controlador/clientes.controlador.php";
require_once "../modelo/clientes.modelo.php";
class AjaxClientes{
                   
		// Editar Clientes
	        public $idCliente;

                public function ajaxEditarClientes(){

                $item = "num_doc_cli";
                $valor = $this->idCliente;
                $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);
                echo json_encode($respuesta);


                }
}

// Editar Clientes
if(isset($_POST["idCliente"])){
                $editar = new AjaxClientes();
                $editar -> idCliente = $_POST["idCliente"];
                $editar -> ajaxEditarClientes();

}


?>